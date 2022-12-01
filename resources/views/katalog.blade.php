@extends('welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full bg-prim-brown py-20 text-center">
        <h1 class="text-[36px] text-prim-yellow font-bold">Katalog Produk Booth</h1>
        <a href="" class="text-prim-yellow text-[14px] hover:text-prim-red">Katalog</a>
    </div>
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-end">
            <div class="kategori">
                <h2 class="text-[24px] text-prim-brown font-bold">Pilih Tipe Booth</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 mt-6 gap-10">
                    <button class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white">Semua</button>
                    <button class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white">Outdoor</button>
                    <button class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white">Portable</button>
                    <button class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white">Display</button>
                </div>
            </div>
            <div class="search text-end mt-10 lg:mt-0 w-full">
                <input type="text" name="search-booth" id="booth" onkeyup="searchFunc()" class=" border-prim-brown border-2 rounded-lg py-[5px] px-3 w-full lg:w-[300px] product-search" placeholder="Search Product....">
            </div>
        </div>
        <div class="list-produk grid md:grid-cols-3 grid-cols-2 gap-10 mt-[40px]">
            <div class="produk">
                <div class="bg-prim-brown w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
                    <img src="{{asset('assets/images/booth-2.png')}}" alt="" class="w-52 mx-auto mb-3">
                    <p class="text-prim-yellow text-[18px] font-bold nama-produk">Boot Container</p>
                    <p class="text-prim-yellow text-[14px] font-bold harga-produk mb-3">Rp. 20.000</p>
                </div>
                <button class="bg-prim-yellow text-prim-brown w-full py-3 font-bold rounded-b-lg">Pilih Booth</button>
            </div>
            <div class="produk">
                <div class="bg-prim-brown w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
                    <img src="{{asset('assets/images/booth-2.png')}}" alt="" class="w-52 mx-auto mb-3">
                    <p class="text-prim-yellow text-[18px] font-bold nama-produk">Booth Portable</p>
                    <p class="text-prim-yellow text-[14px] font-bold harga-produk mb-3">Rp. 20.000</p>
                </div>
                <button class="bg-prim-yellow text-prim-brown w-full py-3 font-bold rounded-b-lg">Pilih Booth</button>
            </div>
            <div class="produk">
                <div class="bg-prim-brown w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
                    <img src="{{asset('assets/images/booth-2.png')}}" alt="" class="w-52 mx-auto mb-3">
                    <p class="text-prim-yellow text-[18px] font-bold nama-produk">Booth Display</p>
                    <p class="text-prim-yellow text-[14px] font-bold harga-produk mb-3">Rp. 20.000</p>
                </div>
                <button class="bg-prim-yellow text-prim-brown w-full py-3 font-bold rounded-b-lg">Pilih Booth</button>
            </div>
            <div class="produk">
                <div class="bg-prim-brown w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
                    <img src="{{asset('assets/images/booth-2.png')}}" alt="" class="w-52 mx-auto mb-3">
                    <p class="text-prim-yellow text-[18px] font-bold nama-produk">Booth Pameran</p>
                    <p class="text-prim-yellow text-[14px] font-bold harga-produk mb-3">Rp. 20.000</p>
                </div>
                <button class="bg-prim-yellow text-prim-brown w-full py-3 font-bold rounded-b-lg">Pilih Booth</button>
            </div>
        </div>
    </div>
    <div class="w-full bg-prim-yellow py-10 text-center mt-[150px] px-14">
        <h1 class="text-[20px] md:text-[36px] text-prim-brown font-bold">Sudah memiliki desain dan sketsa booth sendiri ? <br> Upload desain Anda di sini!</h1>
        <button class="bg-prim-red text-prim-white px-6 py-2 rounded-lg mt-5 hover:bg-prim-white hover:text-prim-red transition-colors">Upload Desain</button>
    </div>
</section>

@endsection