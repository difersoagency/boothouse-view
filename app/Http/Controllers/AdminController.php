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
                'status' => $res->Status->nama,
                'total_harga' => $res->total_harga
            );
        }
        return response()->json(['data' => $data]);
    }

    public function data_penjualan_tanggal(Request $r){
        $tglmin = $r->tgl_min;
        $tglmax = $r->tgl_max;

        $order = Order::select('tgl_order')->addSelect(['count_booth_display' => function($q){
            $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
            ->from('detail_booth')
            ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
            ->where('detail_booth.jenis_booth', '=', '1')
            ->whereColumn('detail_order.id', 'order.id');
        },
        'count_booth_outdoor' => function($q){
            $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
            ->from('detail_booth')
            ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
            ->where('detail_booth.jenis_booth', '=', '2')
            ->whereColumn('detail_order.id', 'order.id');
        },
        'count_booth_portable' => function($q){
            $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
            ->from('detail_booth')
            ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
            ->where('detail_booth.jenis_booth', '=', '3')
            ->whereColumn('detail_order.id', 'order.id');
        }])->where([['tgl_order', '>=', $tglmin],['tgl_order', '<=', $tglmax]])->groupBy('tgl_order')->get();
        $data = array();
        foreach($order as $key => $res){
            $data['tgl_order'][$key] = $res->tgl_order;
            $data['display'][$key] = $res->count_booth_display;
            $data['portable'][$key] = $res->count_booth_portable;
            $data['outdoor'][$key] = $res->count_booth_outdoor;
        }
        return response()->json($data);
    }

    public function data_penjualan_status(){
        Order::selectRaw('status_id, count(status_id)')->groupBy('status')->get();
    }
}
