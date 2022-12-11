@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px]  mb-16">
        <div>
            <ul class="grid gap-6 md:grid-cols-4">
                <li>
                    <input type="radio" id="mandiri" name="ukuran" value="mandiri" class="hidden peer" required>
                    <label for="mandiri" class="inline-flex justify-between items-center px-5 py-2 rounded-lg border-2 border-prim-brown bg-prim-white text-prim-brown font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-prim-brown dark:peer-checked:text-prim-white peer-checked:bg-prim-brown peer-checked:text-blue-600 hover:text-prim-white hover:bg-prim-brown">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Infomrasi Data Diri</div>
                        </div>

                    </label>
                </li>
                <li>
                    <input type="radio" id="jasaKirim" name="ukuran" value="jasaKirim" class="hidden peer">
                    <label for="jasaKirim" class="inline-flex justify-between items-center text-center py-2 px-5 rounded-lg border-2 border-prim-brown bg-prim-white text-prim-brown font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-prim-brown dark:peer-checked:text-prim-white peer-checked:bg-prim-brown peer-checked:text-blue-600 hover:text-prim-white hover:bg-prim-brown">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">Riwayat Pemesanan</div>
                        </div>

                    </label>
                </li>
            </ul>
        </div>
        <div class="riwayat mt-10 hidden">
            <h1 class="text-prim-brown text-[26px] font-bold">Riwayat Pemesanan</h1>
            <div class="listRiwayat grid grid-cols-3 gap-6 mt-5">
                <div class="px-4 py-5 bg-prim-yellow rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                    <div class="ket">
                        <div class="px-7 py-2 bg-success w-fit rounded-md text-prim-white font-bold">
                            Selesai
                        </div>
                        <p class="text-prim-brown text-[14px] mt-4 font-bold">Container Booth</p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                        <button class="bg-prim-red px-3 mt-3 hover:bg-prim-white hover:text-prim-red transition-colors rounded-lg py-1 text-prim-white font-bold">
                            Detail
                        </button>
                    </div>
                </div>
                <div class="px-4 py-5 bg-prim-yellow rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                    <div class="ket">
                        <div class="px-7 py-2 bg-prim-white w-fit rounded-md text-prim-brown font-bold">
                            Pembuatan
                        </div>
                        <p class="text-prim-brown text-[14px] mt-4 font-bold">Container Booth</p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                        <button class="bg-prim-red px-3 mt-3 hover:bg-prim-white hover:text-prim-red transition-colors rounded-lg py-1 text-prim-white font-bold">
                            Detail
                        </button>
                    </div>
                </div>
                <div class="px-4 py-5 bg-prim-yellow rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                    <div class="ket">
                        <div class="px-7 py-2 bg-prim-brown w-fit rounded-md text-prim-white font-bold">
                            Pengiriman
                        </div>
                        <p class="text-prim-brown text-[14px] mt-4 font-bold">Container Booth</p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                        <button class="bg-prim-red px-3 mt-3 hover:bg-prim-white hover:text-prim-red transition-colors rounded-lg py-1 text-prim-white font-bold">
                            Detail
                        </button>
                    </div>
                </div>
                <div class="px-4 py-5 bg-prim-yellow rounded-md grid grid-cols-2 items-center">
                    <img src="{{asset('assets/images/booth1.png')}}" alt="Booth 1">
                    <div class="ket">
                        <div class="px-7 py-2 bg-prim-yellow w-fit rounded-md text-prim-red border-2 border-prim-red font-bold">
                            Pembayaran
                        </div>
                        <p class="text-prim-brown text-[14px] mt-4 font-bold">Container Booth</p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Tanggal : <span> 10-10-2022 </span> </p>
                        <p class="text-prim-brown text-[14px] mt-1 font-bold">Total : <span>Rp.123.000</span> </p>
                        <button class="bg-prim-red px-3 mt-3 hover:bg-prim-white hover:text-prim-red transition-colors rounded-lg py-1 text-prim-white font-bold">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="dataDiri mt-10 w-[50%]">
            <h1 class="text-[26px] text-prim-brown font-bold">Informasi Data Diri</h1>
            <form action="" class="grid grid-cols-2 mt-5">
                <div>
                    <label for="email" class="text-prim-brown text-[16px]">Email</label>
                    <br>
                    <input type="text" name="email" id="email-field" class="mt-3 bg-prim-white px-3 py-2 border-2 rounded-xl border-prim-brown text-prim-brown" placeholder="email@gmail.com" value="youremail@gmail.com" disabled>
                    <br>
                    <button class="bg-prim-red text-prim-white text-[14px] px-4 py-2 mt-7 rounded-xl" onclick="fieldDisable('#email-field')">Ubah Email</button>
                </div>
                <div>
                    <label for="password" class="text-prim-brown text-[16px]">Password</label>
                    <br>
                    <input type="password" name="password" id="password" class="mt-3 bg-prim-white px-3 py-2 border-2 rounded-xl border-prim-brown text-prim-brown" placeholder="Password">
                </div>
            </form>
        </div>
    </div>
</section>


@endsection