@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full bg-prim-brown py-20 text-center">
        <h1 class="text-[36px] text-prim-yellow font-bold">Custom Design Booth</h1>
        <a href="/katalog" class="text-prim-white text-[14px] hover:text-prim-red">Katalog</a>
        <span class="text-prim-white"> / </span>
        <a href="/detail" class="text-prim-white text-[14px] hover:text-prim-red">Nama Produk</a>
        <span class="text-prim-white"> / </span>
        <a href="" class="text-prim-yellow text-[14px] hover:text-prim-red">Custom Design</a>
    </div>
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px] mb-16">
        <div class="image-custom">
            <div class="detail-img text-center relative mb-14
            
            ">
                <img src="{{asset('assets/images/booth1.png')}}" alt="" class="w-96 mx-auto">
                <canvas class="top-side absolute bottom-[85%] left-[41%] w-[12rem] h-[3.4rem]"></canvas>
                <canvas class="bottom-side  absolute bottom-[3%] left-[41.6%] w-[11.5rem] h-[8.3rem] object-none"></canvas>
            </div>
            <div class="editor-custom bg-prim-yellow w-full py-14 rounded-xl px-32">
                <div class="grid grid-cols-2">
                    <div class="upload top">
                        <p class="bg-prim-brown py-2 rounded-lg text-prim-yellow w-fit px-4 mb-5">Sisi Atas</p>
                        <h2 class="text-prim-brown font-bold text-[30px]">
                            Upload Gambar
                        </h2>
                        <form action="/action_page.php" class="mt-5">
                            <input type="file" id="myFile" name="filename" class="bg-prim-yellow">
                        </form>

                    </div>
                    <div class="upload bot">
                        <p class="bg-prim-brown py-2 rounded-lg text-prim-yellow w-fit px-4 mb-5">Sisi Bawah</p>
                        <h2 class="text-prim-brown font-bold text-[30px]">
                            Upload Gambar
                        </h2>
                        <form action="/action_page.php" class="mt-5">
                            <input type="file" id="myFile2" name="filename" class="bg-prim-yellow">
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full text-center">
                <button class="mt-8 rounded-xl px-5 py-2 bg-prim-red text-prim-white">
                    Pesan Booth
                </button>
            </div>
        </div>
    </div>
</section>


@endsection