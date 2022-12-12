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

class MidtransController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //
    public function getSnapToken(Request $req)
    {

        // $item_list = array();
        // $amount = 0;
        // Config::$serverKey = 'SB-Mid-server-Om5tljPgzx6GgKequ_fp4uvG';
        // if (!isset(Config::$serverKey)) {
        //     return "Please set your payment server key";
        // }
        // Config::$isSanitized = true;

        // // Enable 3D-Secure
        // Config::$is3ds = true;

        // // Required

        // $item_list[] = [
        //     'id' => "111",
        //     'price' => 20000,
        //     'quantity' => 1,
        //     'name' => "Majohn"
        // ];

        // $transaction_details = array(
        //     'order_id' => rand(),
        //     'gross_amount' => 20000, // no decimal allowed for creditcard
        // );


        // // Optional
        // $item_details = $item_list;

        // // Optional
        // $billing_address = array(
        //     'first_name'    => "Andri",
        //     'last_name'     => "Litani",
        //     'address'       => "Mangga 20",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16602",
        //     'phone'         => "081122334455",
        //     'country_code'  => 'IDN'
        // );

        // // Optional
        // $shipping_address = array(
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // );

        // // Optional
        // $customer_details = array(
        //     'first_name'    => "Andrsi",
        //     'last_name'     => "Litani",
        //     'email'         => "andri@litani.com",
        //     'phone'         => "081122334455",
        //     'billing_address'  => $billing_address,
        //     'shipping_address' => $shipping_address
        // );

        // // Optional, remove this to display all available payment methods
        // $enable_payments = array();

        // // Fill transaction details
        // $transaction = array(
        //     'enabled_payments' => $enable_payments,
        //     'transaction_details' => $transaction_details,
        //     'customer_details' => $customer_details,
        //     'item_details' => $item_details,
        // );
        // // return $transaction;
        // try {
        //     $snapToken = Snap::getSnapToken($transaction);
        //     return response()->json($snapToken);
        //     // return ['code' => 1 , 'message' => 'success' , 'result' => $snapToken];
        // } catch (\Exception $e) {
        //     dd($e);
        //     return ['code' => 0, 'message' => 'failed'];
        // }


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
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        return response()->json($snapToken);
    }
}
