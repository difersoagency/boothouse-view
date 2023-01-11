@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full bg-prim-dark-green py-20 text-center">
        <h1 class="text-[36px] text-prim-white font-bold">Pengaturan dan Riwayat</h1>
    </div>
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px]  mb-16 mt-14">
        <div>
            <ul class="grid md:grid-cols-6 gap-5">
                <li>
                    <input type="radio" id="dataRadio" name="ukuran" value="dataRadio" class="hidden peer" required checked="checked">
                    <label for="dataRadio" class="inline-flex justify-between items-center px-5 py-2 rounded-lg border-2 border-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all  peer-checked:bg-prim-light-blue peer-checked:text-prim-dark-green hover:text-prim-dark-green hover:bg-prim-light-blue">
                        <div class="block">
                            <div class="w-full text-center font-semibold">Informasi Data Diri</div>
                        </div>

                    </label>
                </li>
                <li>
                    <input type="radio" id="riwayatRadio" name="ukuran" value="riwayatRadio" class="hidden peer">
                    <label for="riwayatRadio" class="inline-flex justify-between items-center text-center py-2 px-5 rounded-lg border-2 border-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all  peer-checked:bg-prim-light-blue peer-checked:text-prim-dark-green hover:text-prim-dark-green hover:bg-prim-light-blue">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-center font-semibold">Riwayat Pemesanan</div>
                        </div>

                    </label>
                </li>
            </ul>
        </div>
        <div class="riwayat mt-10 hidden">
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
    <div class="dataDiri mt-10 w-[50%]">
        <h1 class="text-[26px] text-prim-dark-green font-bold">Informasi Data Diri</h1>
        <form action="" class="grid grid-cols-2 mt-5">

            <div class="mr-7">
                <label for="email" class="mb-2 text-prim-dark-green font-bold text-[14px]">Email</label> <br>
                <input type="email" name="email" id="email" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->email }}" disabled>
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 text-prim-dark-green font-bold text-[14px]">Password</label> <br>
                <input type="password" name="password" id="password" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->customer->password }}" disabled>
            </div>
            <div class="mr-7">
                <label for="provinsi" class="mb-2 text-prim-dark-green font-bold text-[14px]">Provinsi</label> <br>
                <select type="text" name="provinsi" id="select-provinsi" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" disabled>
                </select>
            </div>

            <div class="mb-5">
                <label for="kota" class="mb-2 text-prim-dark-green font-bold text-[14px]">Kota</label> <br>
                <select type="text" name="kota" id="select-kota" class="select2 mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" disabled>
                </select>
            </div>
            <div class="col-span-2 mb-5">
                <label for="alamat" class="mb-2 text-prim-dark-green font-bold text-[14px]">Alamat Lengkap</label>
                <br>
                <input type="text" name="alamat" id="alamat" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" disabled>
            </div>
            <div class="">
                <label for="tel" class="mb-2 text-prim-dark-green font-bold text-[14px]">No.Telepon</label> <br>
                <input type="text" name="tel" id="tel" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->customer->no_telp }}" disabled>
            </div>
            <div class="col-span-2">
                <div class="editInfo bg-prim-dark-green text-prim-white text-[14px] px-4 py-2 mt-7 mr-3 rounded-xl w-fit cursor-pointer">Ubah Data Diri</div>
                <div class="saveInfo bg-prim-light-blue text-prim-dark-green text-[14px] px-4 py-2 mt-7 rounded-xl w-fit cursor-pointer" onclick="fieldDisable('#email-field')" disabled>Simpan</div>
            </div>
        </form>
    </div>
    </div>
</section>
<script>
    // Informasi Login
    document.querySelector('.editInfo').onclick = function() {
        document.querySelector('#email').disabled = false;
        document.querySelector('#password').disabled = false;
        document.querySelector('#select-provinsi').disabled = false;
        document.querySelector('#select-kota').disabled = false;
        document.querySelector('#alamat').disabled = false;
        document.querySelector('#tel').disabled = false;
        document.querySelector('.editInfo').classList.remove('bg-prim-dark-green');
        document.querySelector('.editInfo').classList.remove('text-prim-white');
        document.querySelector('.editInfo').classList.remove('cursor-pointer');
        document.querySelector('.editInfo').classList.add('bg-prim-light-blue');
        document.querySelector('.editInfo').classList.add('text-prim-dark-green');

        document.querySelector('.saveInfo').classList.add('bg-prim-dark-green');
        document.querySelector('.saveInfo').classList.add('text-prim-white');
        document.querySelector('.saveInfo').classList.add('cursor-pointer');
        document.querySelector('.saveInfo').classList.remove('bg-prim-light-blue');
        document.querySelector('.saveInfo').classList.remove('text-prim-dark-green');
    }

    document.querySelector('.saveInfo').onclick = function() {
        document.querySelector('#email').disabled = true;
        document.querySelector('#password').disabled = true;
        document.querySelector('#select-provinsi').disabled = true;
        document.querySelector('#select-kota').disabled = true;
        document.querySelector('#alamat').disabled = true;
        document.querySelector('#tel').disabled = true;
        document.querySelector('.saveInfo').classList.remove('bg-prim-dark-green');
        document.querySelector('.saveInfo').classList.remove('text-prim-white');
        document.querySelector('.saveInfo').classList.remove('cursor-pointer');
        document.querySelector('.saveInfo').classList.add('bg-prim-light-blue');
        document.querySelector('.saveInfo').classList.add('text-prim-dark-green');

        document.querySelector('.editInfo').classList.add('bg-prim-dark-green');
        document.querySelector('.editInfo').classList.add('text-prim-white');
        document.querySelector('.editInfo').classList.add('cursor-pointer');
        document.querySelector('.editInfo').classList.remove('bg-prim-light-blue');
        document.querySelector('.editInfo').classList.remove('text-prim-dark-green');
    }

    // Riwayat Radio Button
    let DataButton = document.getElementById('riwayatRadio');
    let RiwayatButton = document.getElementById('dataRadio');

    DataButton.onclick = function() {
        if (document.getElementById('riwayatRadio').checked == true) {
            document.querySelector('.dataDiri').classList.add('hidden');
            document.querySelector('.riwayat').classList.remove('hidden');
        } else if (document.getElementById('dataRadio').checked == true) {
            document.querySelector('.dataDiri').classList.remove('hidden');
            document.querySelector('.riwayat').classList.add('hidden');
        }
    }

    RiwayatButton.onclick = function() {
        if (document.getElementById('riwayatRadio').checked == true) {
            document.querySelector('.dataDiri').classList.add('hidden');
            document.querySelector('.riwayat').classList.remove('hidden');
        } else if (document.getElementById('dataRadio').checked == true) {
            document.querySelector('.dataDiri').classList.remove('hidden');
            document.querySelector('.riwayat').classList.add('hidden');
        }
    }
</script>
@endsection