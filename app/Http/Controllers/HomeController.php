<?php

namespace App\Http\Controllers;

use App\Models\DetailBooth;
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

    public function checkout(Request $Request)
    {
        dd($Request->all());
    }
}
