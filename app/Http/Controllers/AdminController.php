<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Customer;
use App\Models\DetailBooth;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\JenisBooth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class AdminController extends Controller
{
    public function data_penjualan()
    {
        $order = Order::all();
        $data = array();
        foreach ($order as $key => $res) {
            $data[$key] = array(
                'id' => $res->id,
                'customer_nama' => $res->Customer->nama_depan . ' ' . $res->Customer->nama_belakang,
                'tgl_order' => $res->tgl_order,
                'status' => $res->Status->nama,
                'total_harga' => number_format($res->total_harga)
            );
        }
        return response()->json(['data' => $data]);
    }

    public function data_penjualan_tanggal(Request $r)
    {
        $tglmin = $r->tgl_min;
        $tglmax = $r->tgl_max;

        $order = Order::whereRaw('tgl_order >= "' . $tglmin . '" AND tgl_order <= "' . $tglmax . '"')->select('tgl_order')->groupBy('tgl_order')->get();
        $data = array();
        foreach ($order as $key => $i) {
            // $data = array()
            $tgl_order = $i->tgl_order;
            $data['display'][$key] = DetailOrder::whereHas('Order', function ($q) use ($tgl_order) {
                $q->where('tgl_order', '=', $tgl_order);
            })->whereHas('DetailBooth', function ($q) {
                $q->where('jenis_booth_id', '1');
            })->count();
            $data['outdoor'][$key] = DetailOrder::whereHas('Order', function ($q) use ($tgl_order) {
                $q->where('tgl_order', '=', $tgl_order);
            })->whereHas('DetailBooth', function ($q) {
                $q->where('jenis_booth_id', '2');
            })->count();
            $data['portable'][$key] = DetailOrder::whereHas('Order', function ($q) use ($tgl_order) {
                $q->where('tgl_order', '=', $tgl_order);
            })->whereHas('DetailBooth', function ($q) {
                $q->where('jenis_booth_id', '3');
            })->count();

            $data['tgl_order'][$key] = $tgl_order;
        }
        // $order = DB::table('detail_booth')
        // ->join('detail_order', 'detail_order.detail_booth_id', '=', 'detail_booth.id')
        // ->join('order', 'order.id', '=', 'detail_order.order_id')
        // ->whereRaw('tgl_order >= "'. $tglmin .'" AND tgl_order <= "'. $tglmax.'"')
        // ->selectRaw('order.tgl_order as tgl_order,
        // detail_booth.jenis_booth_id as id,
        // coalesce(count("detail_booth.jenis_booth_id"),0) as jumlah')
        // ->groupByRaw('order.tgl_order, detail_booth.jenis_booth_id')
        // ->get();

        // $order = Order::where([['tgl_order', '>=', $tglmin],['tgl_order', '<=', $tglmax]])->select('tgl_order')->addSelect(['count_booth_display' => function($q){
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

        // $data = array();
        // foreach($order as $key => $res){

        //     $data['tgl_order'][$key] = $res->tgl_order;
        //     $data['id'][$key] = $res->id;
        //     $data['count'][$key] = $res->jumlah;
        //     // $data['outdoor'][$key] = $res->count_booth_outdoor;
        // }
        return response()->json($data);
    }

    public function data_penjualan_status()
    {
        $o = Order::selectRaw('status_id, count(status_id) as jumlah')->groupBy('status_id')->with('Status')->get();
        $data = array();
        foreach ($o as $key => $i) {
            $data[$i->Status->nama] = $i->jumlah;
        }
        return response()->json($data);
    }

    public function master_customer()
    {
        $cust = Customer::all();
        $data = array();
        foreach ($cust as $key => $i) {
            $data[$key] = array(
                'id' => $i->id,
                'nama_depan' => $i->nama_depan,
                'nama_belakang' => $i->nama_belakang,
                'no_telp' => $i->no_telp,
                'username' => $i->User->username,
                'email' => $i->User->email
            );
        }
        return response()->json(['data' => $data]);
    }

    public function master_kota()
    {
        $kota = Kota::all();
        $data = array();
        foreach ($kota as $key => $i) {
            $data[$key] = array(
                'id' => $i->id,
                'nama' => $i->nama,
                'provinsi' => $i->provinsi->nama,
                'biaya' => number_format($i->biaya_kirim),
            );
        }

        return response()->json(['data' => $data]);
    }

    public function create_kota()
    {
        $provinsi = Provinsi::all();
        return view('admin.master.kota-modal-create', ['provinsi' => $provinsi]);
    }
    public function edit_kota($id)
    {
        $data = Kota::find($id);
        $provinsi = Provinsi::all();
        return view('admin.master.kota-modal-edit', ['provinsi' => $provinsi, 'data' => $data]);
    }
    public function delete_kota(Request $request)
    {
        $data = Kota::find($request->id);
        $delete = $data->delete();
        if ($delete) {
            return response()->json(['info' => 'success', 'msg' => 'Data berhasil di hapus']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Hapus Gagal, periksa kembali']);
        }
    }
    public function update_kota(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kota' => ['required', 'unique:kota,nama,' . $id],
            'provinsi' => ['required'],
            'ongkir' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data yang sudah diisi dengan benar"]);
        } else {
            $data = Kota::find($id);
            $data->nama = $request->kota;
            $data->provinsi_id = $request->provinsi;
            $data->biaya_kirim = $request->ongkir;
            $data->save();

            if ($data) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di Ubah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Ubah data Gagal, periksa kembali"]);
            }
        }
    }
    public function store_kota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kota' => ['required', 'unique:kota,nama'],
            'provinsi' => ['required'],
            'ongkir' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data telah diisi dengan benar"]);
        } else {
            $c = Kota::create([
                'provinsi_id' => $request->provinsi,
                'nama' => $request->kota,
                'biaya_kirim' => $request->ongkir
            ]);

            if ($c) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di tambah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Tambah data Gagal, periksa kembali"]);
            }
        }
    }

    public function master_provinsi()
    {
        $prov = Provinsi::all();
        $data = array();
        foreach ($prov as $key => $i) {
            $data[$key] = array(
                'id' => $i->id,
                'nama' => $i->nama,
            );
        }

        return response()->json(['data' => $data]);
    }

    public function create_provinsi()
    {
        return view('admin.master.provinsi-modal-create');
    }
    public function edit_provinsi($id)
    {
        $data = Provinsi::find($id);
        return view('admin.master.provinsi-modal-edit', ['data' => $data]);
    }
    public function store_provinsi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => ['required', 'unique:provinsi,nama'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data telah diisi dengan benar"]);
        } else {
            $c = Provinsi::create([
                'nama' => $request->provinsi,
            ]);

            if ($c) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di tambah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Tambah data Gagal, periksa kembali"]);
            }
        }
    }

    public function update_provinsi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => ['required', 'unique:provinsi,nama,' . $id],
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data yang sudah diisi dengan benar"]);
        } else {
            $data = Provinsi::find($id);
            $data->nama = $request->provinsi;
            $data->save();

            if ($data) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di Ubah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Ubah data Gagal, periksa kembali"]);
            }
        }
    }
    public function delete_provinsi(Request $request)
    {
        $data = Provinsi::find($request->id);
        $delete = $data->delete();
        if ($delete) {
            return response()->json(['info' => 'success', 'msg' => 'Data berhasil di hapus']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Hapus Gagal, periksa kembali']);
        }
    }

    public function master_booth()
    {
        $booth = DetailBooth::all();
        $data = array();
        foreach ($booth as $key => $i) {
            $data[$key] = array(
                'id' => $i->id,
                'jenis' => $i->JenisBooth->nama,
                'ukuran' => $i->ukuran,
                'harga' => number_format($i->harga),
            );
        }
        return response()->json(['data' => $data]);
    }

    public function create_booth()
    {
        $booth = JenisBooth::all();
        return view('admin.master.booth-modal-create', ['booth' => $booth]);
    }
    public function edit_booth($id)
    {
        $booth = JenisBooth::all();
        $data = DetailBooth::find($id);
        $split = explode("*", $data->ukuran);
        $panjang =  $split[0];
        $lebar =  $split[1];
        $tinggi =  $split[2];
        return view('admin.master.booth-modal-edit', ['data' => $data, 'booth' => $booth, 'panjang' => $panjang, 'lebar' => $lebar, 'tinggi' => $tinggi]);
    }
    public function update_booth(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => ['required'],
            'panjang' => ['required', 'numeric'],
            'lebar' => ['required', 'numeric'],
            'tinggi' => ['required', 'numeric'],
            'harga' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data yang sudah diisi dengan benar"]);
        } else {
            $data = DetailBooth::find($id);
            $data->jenis_booth_id = $request->jenis;
            $data->ukuran =  $request->panjang . '*' . $request->lebar . '*' . $request->tinggi;
            $data->harga = $request->harga;
            $data->save();

            if ($data) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di Ubah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Ubah data Gagal, periksa kembali"]);
            }
        }
    }
    public function store_booth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => ['required'],
            'panjang' => ['required', 'numeric'],
            'lebar' => ['required', 'numeric'],
            'tinggi' => ['required', 'numeric'],
            'harga' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'error', 'msg' => "Periksa dan Pastikan data telah diisi dengan benar"]);
        } else {
            $c = DetailBooth::create([
                'jenis_booth_id' => $request->jenis,
                'ukuran' => $request->panjang . '*' . $request->lebar . '*' . $request->tinggi,
                'harga' => $request->harga
            ]);

            if ($c) {
                return response()->json(['data' => 'success', 'msg' => "Data berhasil di tambah"]);
            } else {
                return response()->json(['data' => 'error', 'msg' => "Tambah data Gagal, periksa kembali"]);
            }
        }
    }

    public function delete_booth(Request $request)
    {
        $data = DetailBooth::find($request->id);
        $delete = $data->delete();
        if ($delete) {
            return response()->json(['info' => 'success', 'msg' => 'Data berhasil di hapus']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Hapus Gagal, periksa kembali']);
        }
    }
    public function order()
    {
        $order = Order::all();
        $data = array();
        foreach ($order as $key => $i) {
            $data[$key] = array(
                'id' => $i->id,
                'no_order' => $i->no_order,
                'tgl_order' => $i->tgl_order,
                'nama' => $i->nama,
                'pengiriman' => $i->JenisPengiriman->nama,
                'alamat' => $i->alamat,
                'kota' => $i->Kota->nama . ', ' . $i->Kota->Provinsi->nama,
                'no_telp' => $i->no_telp,
                'status' => $i->Status->nama,
            );
        }

        return response()->json(['data' => $data]);
    }

    public function  detail_order($id)
    {
        $order = Order::find($id);
        return view('admin.master.order-modal-detail', ['order' => $order]);
    }
}
