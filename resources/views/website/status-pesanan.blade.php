@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px]  mb-16">
        <div>
            <ul class="grid gap-6 md:grid-cols-4">
                <li>
                    <input type="radio" id="mandiri" name="ukuran" value="mandiri" class="hidden peer" required>
                    <label for="mandiri" class="inline-flex justify-between items-center px-5 py-2 rounded-lg border-2 border-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all  peer-checked:bg-prim-light-blue peer-checked:text-prim-dark-green hover:text-prim-dark-green hover:bg-prim-light-blue">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Infomrasi Data Diri</div>
                        </div>

                    </label>
                </li>
                <li>
                    <input type="radio" id="jasaKirim" name="ukuran" value="jasaKirim" class="hidden peer">
                    <label for="jasaKirim" class="inline-flex justify-between items-center text-center py-2 px-5 rounded-lg border-2 border-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all  peer-checked:bg-prim-light-blue peer-checked:text-prim-dark-green hover:text-prim-dark-green hover:bg-prim-light-blue">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">Riwayat Pemesanan</div>
                        </div>

                    </label>
                </li>
            </ul>
        </div>
        <div class="riwayat mt-10 ">
            <h1 class="text-prim-dark-green text-[26px] font-bold">Riwayat Pemesanan</h1>
            <div class="listRiwayat grid grid-cols-3 gap-6 mt-5">
                @foreach($order as $d)
                <div class="px-4 py-5 bg-prim-light-blue rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                    <div class="ket">
                        <div class="px-7 py-2 bg-success w-fit rounded-md text-prim-white font-bold">
                            {{$d->Status->nama}}
                        </div>
                        <p class="text-prim-dark-green text-[14px] mt-4 font-bold">{{$d->DetailOrder->DetailBooth->JenisBooth->nama}}</p>
                        <p class="text-prim-dark-green text-[14px] mt-4 font-bold">{{$d->DetailOrder->DetailBooth->ukuran}} ({{$d->DetailOrder->warna_booth}})</p>
                        <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Tanggal : <span> {{$d->tgl_order}} </span> </p>
                        <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Total : <span>Rp. {{number_format($d->total_harga)}}</span> </p>
                        <p class="text-prim-dark-green text-[14px] mt-1 font-bold">{{ $d->total_harga != $d->Pembayaran->sum('total_bayar') ? 'Belum Lunas' : 'Lunas'}}</p>
                        <button class="bg-prim-dark-green px-5 mt-3 hover:bg-prim-dark-blue transition-colors rounded-lg py-1  text-prim-white font-bold">
                            Detail
                        </button>
                    </div>
                </div>
                @endforeach
                {{-- <div class="px-4 py-5 bg-prim-light-blue rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                <div class="ket">
                    <div class="px-7 py-2 bg-yellow w-fit rounded-md text-prim-dark-green font-bold">
                        Pembuatan
                    </div>
                    <p class="text-prim-dark-green text-[14px] mt-4 font-bold">Container Booth</p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                    <button class="bg-prim-dark-green px-5 mt-3 hover:bg-prim-dark-blue  transition-colors rounded-lg py-1 text-prim-white font-bold">
                        Detail
                    </button>
                </div>
            </div>
            <div class="px-4 py-5 bg-prim-light-blue rounded-md grid grid-cols-2 items-center">
                <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                <div class="ket">
                    <div class="px-7 py-2 bg-fail w-fit rounded-md text-prim-white font-bold">
                        Pengiriman
                    </div>
                    <p class="text-prim-dark-green text-[14px] mt-4 font-bold">Container Booth</p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                    <button class="bg-prim-dark-green px-5 mt-3 hover:bg-prim-dark-blue  transition-colors rounded-lg py-1 text-prim-white font-bold">
                        Detail
                    </button>
                </div>
            </div>
            <div class="px-4 py-5 bg-prim-light-blue rounded-md grid grid-cols-2 items-center">
                <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                <div class="ket">
                    <div class="px-7 py-2 bg-prim-white w-fit rounded-md text-prim-dark-green border-2 border-prim-dark-green font-bold">
                        Pembayaran
                    </div>
                    <p class="text-prim-dark-green text-[14px] mt-4 font-bold">Container Booth</p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                    <p class="text-prim-dark-green text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                    <button class="bg-prim-dark-green px-5 mt-3 hover:bg-prim-dark-blue  transition-colors rounded-lg py-1 text-prim-white font-bold">
                        Detail
                    </button>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="dataDiri mt-10 w-[50%] hidden">
        <h1 class="text-[26px] text-prim-dark-green font-bold">Informasi Data Diri</h1>
        <form action="" class="grid grid-cols-2 mt-5">
            <div>
                <label for="email" class="text-prim-dark-green text-[16px]">Email</label>
                <br>
                <input type="text" name="email" id="email-field" class="mt-3 bg-prim-white px-3 py-2 border-2 rounded-xl border-prim-brown text-prim-brown" placeholder="email@gmail.com" value="{{ Auth::user()->email }}" disabled>
                <br>
                <button class="bg-prim-dark-green text-prim-white text-[14px] px-4 py-2 mt-7 rounded-xl" onclick="fieldDisable('#email-field')">Ubah Email</button>
            </div>
            <div>
                <label for="password" class="text-prim-dark-green text-[16px]">Password</label>
                <br>
                <input type="password" name="password" id="password" class="mt-3 bg-prim-white px-5 py-2 border-2 rounded-xl border-prim-brown text-prim-dark-green" placeholder="Password">
            </div>
        </form>
    </div>
    </div>
</section>


@endsection