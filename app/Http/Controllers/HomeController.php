<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Snap;
use App\Models\DetailBooth;
use App\Models\DetailOrder;
use App\Models\Kota;
use App\Models\Order;
use App\Models\Provinsi;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        return view('website.home');
    }
    public function cara_pesan()
    {
        return view('website.cara');
    }
    public function detail_booth($id)
    {
        $data = DetailBooth::find($id);
        $related_product = DetailBooth::where('jenis_booth_id', $data->jenis_booth_id)->whereNotIn('id', [$id])->get();
        return view('website.detail-booth', ['data' => $data, 'related_product' => $related_product]);
    }
    public function thankyou()
    {
        return view('website.thankyou');
    }
    public function katalog()
    {
        $data = DetailBooth::all();

        return view('website.katalog', ['data' => $data]);
    }
    public function getPayment()
    {

        $client = new Client();
        try {
            $res = $client->request('GET', 'http://localhost:96/api/coba', []);
            $data = json_decode($res->getBody()->getContents());
            dd($data);
        } catch (Exception $e) {
            return response()->json(['code' => 'as']);
        }
    }

    public function checkout(Request $request)
    {
        // dd($Request->all());

        $order =  Order::create([
            'no_order' => 'sds',
            'tgl_order' => Carbon::now(),
            'customer_id' => auth()->user()->customer_id,
            'total_harga' => $request->total_bayar,
            'jenis_pengiriman_id' => 1,
            'alamat' => $request->alamat,
            'kota_id' => $request->kota,
            'no_telp' => $request->tel,
            'biaya_kirim' => $request->ongkir,
            'status_id' => 1,
        ]);

        DetailOrder::create([
            'order_id' => $order->id,
            'detail_booth_id' => $request->id_booth,
            'image_file' => '-',
            'warna_booth' => 'merah',
            'text' => 'testing',
            'hasil_custom' => 'hasil',
        ]);


        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-Om5tljPgzx6GgKequ_fp4uvG';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total_bayar,
            ),
            'customer_details' => array(
                'first_name' =>  $request->depan,
                'last_name' =>  $request->belakang,
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
            'shipping_address' => array(
                'address'       =>  $request->total_bayar,
                'city'          => "Jakarta",
                'phone'         => $request->tel,
                'country_code'  => 'IDN'
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        return response()->json($snapToken);
    }

    public function selectprovinsi(Request $request, $id)
    {
        if ($id != 0) {
            $data = Kota::where('provinsi_id', $id)->get();
        } else {
            $data = Provinsi::where('nama', 'LIKE', '%' . $request->input('term', '') . '%')->select('id', 'nama')->get();
        }

        echo json_encode($data);
    }
    public function selectkota($id)
    {
        $data = Kota::find($id);
        echo json_encode($data);
    }
}
