@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full bg-prim-dark-green py-20 text-center">
        <h1 class="text-[36px] text-prim-white font-bold">Custom Design Booth</h1>
        <a href="/katalog" class="text-prim-white text-[14px] hover:text-prim-dark-blue">Katalog</a>
        <span class="text-prim-white"> / </span>
        <a href="/detail" class="text-prim-white text-[14px] hover:text-prim-dark-blue" id="nama_booth_custom">Nama
            Produk</a>
        <span class="text-prim-white"> / </span>
        <a class="text-prim-dark-blue text-[14px]">Custom Design</a>
    </div>
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px] mb-16">
        <div class="image-custom">
            <div class="detail-img text-center relative mb-14

            ">
                <img src="{{ asset('assets/images/booth1.png') }}" alt="" class="w-96 mx-auto">
                <canvas class="top-side absolute bottom-[83%] left-[41.4%] w-[11.5rem] h-[4rem] object-fill"></canvas>
                <canvas class="bottom-side  absolute bottom-[3%] left-[41.6%] w-[11.5rem] h-[8.3rem] object-none"></canvas>
            </div>
            <div class="editor-custom bg-prim-light-blue w-full py-14 rounded-xl px-32">
                <div class="grid grid-cols-2">
                    <div class="upload top">
                        <p class="bg-prim-dark-green py-2 rounded-lg text-prim-white w-fit px-4 mb-5">Sisi Atas</p>
                        <h2 class="text-prim-dark-green font-bold text-[30px]">
                            Upload Gambar
                        </h2>
                        <form action="/action_page.php" class="mt-5">
                            <input type="file" id="myFile" name="filename">
                        </form>

                    </div>
                    <div class="upload bot">
                        <p class="bg-prim-dark-green py-2 rounded-lg text-prim-white w-fit px-4 mb-5">Sisi Bawah</p>
                        <h2 class="text-prim-dark-green font-bold text-[30px]">
                            Upload Gambar
                        </h2>
                        <form action="/action_page.php" class="mt-5">
                            <input type="file" id="myFile2" name="filename">
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full text-center">
                <button class="mt-8 rounded-xl px-5 py-2 bg-prim-dark-green text-prim-white" onclick="location.href = '/pesanan';">
                    Pesan Booth
                </button>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    setValueCustom();

    function setValueCustom() {
        document.getElementById('nama_booth_custom').innerText = sessionStorage.getItem("nama-booth");
        document.getElementById("nama_booth_custom").setAttribute("href", "detail-booth/" + sessionStorage
            .getItem("id-booth"));
    }
</script>
@endsection