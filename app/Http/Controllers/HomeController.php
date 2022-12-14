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


    public function checkout(Request $request)
    {
        // dd($Request->all());

        $order =  Order::create([
            'no_order' => rand(),
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


        //Midtrans
        Config::$serverKey = 'SB-Mid-server-Om5tljPgzx6GgKequ_fp4uvG';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Optional
        $billing_address = array(
            'first_name'    => $request->depan,
            'last_name'     => $request->belakang,
            'address'       =>  $request->alamat,
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => $request->tel,
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => $request->depan,
            'last_name'     => $request->belakang,
            'address'       =>  $request->alamat,
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => $request->tel,
            'country_code'  => 'IDN'
        );

        $customer_details = array(
            'first_name' =>  $request->depan,
            'last_name' =>  $request->belakang,
            'email' => 'budi.pra@example.com',
            'phone' => $request->tel,
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' =>  $request->total_bayar,
        );

        $item_list[] = [
            'id' => "111",
            'price' => $request->total_bayar,
            'quantity' => 1,
            'name' => 'Booth ' . $request->nama_booths . ' (' . $request->ukuran . ')'
        ];
        $item_details = $item_list;
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );


        $snapToken = Snap::getSnapToken($transaction);
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


    //Tes Session
    public function step1(Request $request)
    {
        $request->session()->put('step1', 'step1');
        echo "Data telah ditambahkan ke session.";
    }

    public function step2(Request $request)
    {
        if ($request->session()->has('step1')) {
            $request->session()->put('step2', 'step2');
        } else {
            echo 'Tidak ada data dalam session.';
        }
    }

    public function step3(Request $request)
    {
        if ($request->session()->has('step2')) {
            $request->session()->put('step3', 'step3');
        } else {
            echo 'Tidak ada data dalam session.';
        }
    }

    public function selesai(Request $request)
    {
        if ($request->session()->has('step3')) {
            $request->session()->forget('step1');
            $request->session()->forget('step2');
            $request->session()->forget('step3');
        } else {
            echo 'Tidak ada data dalam session.';
        }
    }
}
