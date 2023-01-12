<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Snap;
use App\Models\Customer;
use App\Models\DetailBooth;
use App\Models\DetailOrder;
use App\Models\Kota;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Provinsi;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function status()
    {
        $order =  Order::where('customer_id',  auth()->user()->customer_id)->get();
        return view('website.status-pesanan', ['order' => $order]);
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
    public function katalog_filter($value)
    {
        $data = DetailBooth::whereHas('JenisBooth', function ($q) use ($value) {
            $q->where('nama', 'like', '%' . $value . '%');
        })->get();

        return view('website.katalog', ['data' => $data]);
    }
    public function katalog_data(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace("", "%", $query);
            if ($query != 'semua') {
                $data = DetailBooth::whereHas('JenisBooth', function ($q) use ($query) {
                    $q->where('nama', 'like', '%' . $query . '%');
                })->get();
            } else {
                $data = DetailBooth::all();
            }
            return view('website.katalog-data', compact('data'))->render();
        }
    }

    public function checkout(Request $request)
    {
        // dd($Request->all());

        $order =  Order::create([
            'nama' => $request->depan . ' ' .  $request->belakang,
            'no_order' => $request->order_id,
            'tgl_order' => Carbon::now(),
            'customer_id' => auth()->user()->customer_id,
            'total_harga' => $request->total_bayar + $request->sisa_bayar,
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
            'warna_booth' => $request->warna,
            'text' => 'testing',
            'hasil_custom' => 'hasil',
        ]);

        $bayar = Pembayaran::create([
            'order_id' => $order->id,
            'tanggal' => Carbon::now(),
            'total_bayar' => $request->total_bayar,
        ]);
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
    public function user_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'unique:user,email,' . $id],
            'kota' => ['required'],
            'alamat' => ['required'],
            'tel' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data yang sudah diisi dengan benar"]);
        } else {
            $user = User::find($id);
            $user->email = $request->email;
            $user->save();


            $customer = Customer::find($user->customer_id);
            $customer->kota_id = $request->kota;
            $customer->alamat = $request->alamat;
            $customer->no_telp = $request->tel;
            $customer->save();


            if ($customer) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di Ubah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Ubah data Gagal, periksa kembali"]);
            }
        }
    }
}
