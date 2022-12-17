<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Configurations
use App\Http\Controllers\Midtrans\Config;

// Midtrans API Resources
use App\Http\Controllers\Midtrans\Transaction;

// Plumbing
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\SnapApiRequestor;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Snap;

// Sanitization
use App\Http\Controllers\Midtrans\Sanitizer;
use App\Models\Kota;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class MidtransController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //
    public function getSnapToken(Request $request)
    {
        $kota = Kota::find($request->kota);
        $check = Order::all();
        $urut = 1;
        if (count($check) > 0) {
            $urut =  count($check) + 1;
            $no = $urut . '/INV/' . $this->getMonth() . '/' . $this->getYear();
        } else {
            $no = $urut . '/INV/' . $this->getMonth() . '/' . $this->getYear();
        }


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
            'city'          => $kota->nama,
            'phone'         => $request->tel,
        );

        // Optional
        $shipping_address = array(
            'first_name'    => $request->depan,
            'last_name'     => $request->belakang,
            'address'       =>  $request->alamat,
            'city'          =>  $kota->nama,
            'phone'         => $request->tel,

        );

        $customer_details = array(
            'first_name' =>  $request->depan,
            'last_name' =>  $request->belakang,
            'email' => auth()->user()->email,
            'phone' => $request->tel,
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $transaction_details = array(
            'order_id' => $no,
            'gross_amount' =>  $request->total_bayar,
        );

        $item_list[] = [
            'id' =>  rand(),
            'price' => $request->total_bayar,
            'quantity' => 1,
            'name' => 'Booth ' . $request->nama_booths . ' (' . $request->ukuran . ')',
            'brand' => 'BoothHouse Production',
            'category' => $request->nama_booths
        ];
        $item_details = $item_list;
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $data = array(
            'order_id' => $transaction_details['order_id'],
            'depan' => $request->depan,
            'belakang' => $request->belakang,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'tel' => $request->tel,
            'ukuran' => $request->ukuran,
            'warna' => $request->warna,
            'ongkir' => $request->ongkir,
            'dp' => $request->dp,
            'total_bayar' => $request->total_bayar,
            'sisa_bayar' => $request->sisa_bayar,
            'jenis_kirim' => $request->jenis_kirim,
            'id_booth' => $request->id_booth,
            'nama_booths' => $request->nama_booths,
            '_token' => $request->_token,
        );
        $snapToken = Snap::getSnapToken($transaction);
        return response()->json(['token' => $snapToken->token, 'data' => $data]);
    }

    function toRomawi($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
    function getMonth()
    {
        $m = Carbon::now()->format('m');
        return $this->toRomawi($m);
    }
    function getYear()
    {
        return  Carbon::now()->format('Y');
    }
}
