<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function data_penjualan()
    {
        $order = Order::all();
        $data = array();
        foreach($order as $key => $res){
            $data[$key] = array('id' => $res->id,
            'customer' => $res->Customer->nama,
            'tgl_order' => $res->tgl_order,
            'status' => $res->Status->nama);
        }

        return response()->json(['data' => $data]);
    }
}
