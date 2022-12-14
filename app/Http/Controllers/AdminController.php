<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;

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

        $order = DB::table('detail_booth')
        ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
        ->join('order', 'order.id', '=', 'detail_order.order_id')
        
        ->whereRaw('tgl_order >= "'. $tglmin .'" AND tgl_order <= "'. $tglmax.'"')
        ->selectRaw('order.tgl_order as tgl_order,
        detail_booth.jenis_booth_id as id,
        coalesce(count("detail_booth.jenis_booth_id"),0) as jumlah')
        ->groupByRaw('order.tgl_order, detail_booth.jenis_booth_id')
        ->get();
        // $order = Order::where([['tgl_order', '>=', $tglmin],['tgl_order', '<=', $tglmax]])->addSelect(['count_booth_display' => function($q){
        //     $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
        //     ->from('detail_booth')
        //     ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
        //     ->where('detail_booth.jenis_booth_id', '=', '1')
        //     ->whereColumn('detail_order.id', 'order.id')
        //     ->groupBy('order.tgl_order');
        // },
        // 'count_booth_outdoor' => function($q){
        //     $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
        //     ->from('detail_booth')
        //     ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
        //     ->where('detail_booth.jenis_booth_id', '=', '2')
        //     ->whereColumn('detail_order.id', 'order.id')
        //     ->groupBy('order.tgl_order');
        // },
        // 'count_booth_portable' => function($q){
        //     $q->selectRaw('coalesce(count("detail_booth.jenis_booth_id"),0)')
        //     ->from('detail_booth')
        //     ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
        //     ->where('detail_booth.jenis_booth_id', '=', '3')
        //     ->whereColumn('detail_order.id', 'order.id')
        //     ->groupBy('order.tgl_order');
        // }])->get();
        $data = array();
        foreach($order as $res){
            $data['tgl_order'][$key] = $res->tgl_order;
            $data['id'][$key] = $res->id;
            $data['count'][$key] = $res->jumlah;
            // $data['outdoor'][$key] = $res->count_booth_outdoor;
        }
        return response()->json($data);
    }

    public function data_penjualan_status(){
        $o = Order::selectRaw('status_id, count(status_id) as jumlah')->groupBy('status_id')->with('Status')->get();
        $data = array();
        foreach($o as $key => $i){
            $data[$key] = array('nama' => $i->Status->nama, 'jumlah' => $i->jumlah);
        }
        return response()->json($data);
    }
}
