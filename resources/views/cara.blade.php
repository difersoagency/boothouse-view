@extends('welcome')

@section('content')
<section class="cara-pesan mt-[25px] md:mt-[20px] w-screen mb-12">
    <div class="w-full bg-prim-brown py-20 text-center">
        <h1 class="text-[36px] text-prim-yellow font-bold">Cara Pemesanan Booth</h1>
        <a href="" class="text-prim-yellow text-[14px] hover:text-prim-red"></a>
    </div>
    <div class="step-pesan grid grid-cols-1 md:grid-cols-2 gap-14 w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px]">
        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 1. </span>Pilih Tipe Booth di Katalog</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Pilih tipe dan jenis booth yang Anda inginkan pada katalog BootHouse</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>

            </div>
        </div>
        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 2. </span>Tentukan Warna dan Ukuran Booth</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Setelah memilih tipe dan jenis dari booth, tentukan warna dan ukuran booth</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>
            </div>
        </div>

        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 3. </span>Upload Gambar dan Logo untuk Booth</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Upload Gambar Banner dan Logo Bisnis untuk dipasang pada booth Anda.</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>
            </div>
        </div>

        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 4. </span>Masukan Informasi Pengiriman Anda</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Isi kelengkapan data diri untuk pengiriman ooth ke tempat Anda.</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>
            </div>
        </div>

        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 5. </span>Pilih Metode Pembayaran</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Pilih metode pembarayan yang ingin Anda
                    gunakan dan lakukan pembayaran</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>
            </div>
        </div>

        <div class="step-detail">
            <h2 class="font-bold text-prim-brown text-xl mb-5"><span class="text-prim-red">Step 6. </span>Booth Sudah Di Pesan!</h2>
            <div class="bg-prim-yellow rounded-lg w-full h-h-[170px] lg:h-[130px] py-[10px] px-[27px]">
                <p class="text-prim-brown text-[24px]">Booth sudah dipesan, untuk proses dapat
                    dilihat pada halaman “Pesanan”</p>

                <div class="rounded-full ml-auto bg-prim-red h-[40px] w-[40px] text-center py-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-right text-prim-white"></i>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection