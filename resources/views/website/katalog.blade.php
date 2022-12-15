@extends('website.welcome')

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
                        <button
                            class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white filter_katalog" data-value="semua">Semua</button>
                        <button
                            class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white filter_katalog" data-value="outdoor">Outdoor</button>
                        <button
                            class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white filter_katalog "  data-value="portable">Portable</button>
                        <button
                            class="bg-prim-yellow py-2 rounded-lg text-prim-brown hover:bg-prim-red hover:text-prim-white filter_katalog"  data-value="display">Display</button>
                    </div>
                </div>
                <div class="search text-end mt-10 lg:mt-0 w-full">
                    <input type="text" name="search-booth" id="katalog_search" onkeyup="searchFunc()"
                        class=" border-prim-brown border-2 rounded-lg py-[5px] px-3 w-full lg:w-[300px] product-search"
                        placeholder="Search Product....">
                </div>
            </div>
            <div class="list-produk grid md:grid-cols-3 grid-cols-2 gap-10 mt-[40px]" id="showdata_katalog">
                @include('website.katalog-data')
            </div>
        </div>
        <div class="w-full bg-prim-yellow py-10 text-center mt-[150px] px-14">
            <h1 class="text-[20px] md:text-[36px] text-prim-brown font-bold">Sudah memiliki desain dan sketsa booth sendiri
                ? <br> Upload desain Anda di sini!</h1>
            <button
                class="bg-prim-red text-prim-white px-6 py-2 rounded-lg mt-5 hover:bg-prim-white hover:text-prim-red transition-colors">Upload
                Desain</button>
        </div>
    </section>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script>
        
$(document).ready(function(){
    $(".filter_katalog").click(function(){
        var values_filter = $(this).attr("data-value"); 
        fetch_data(values_filter);
    }); 

function fetch_data(query){
    $.ajax({
    url:"/katalog_data?query="+query,
    success:function(data){
        //console.log(data)
         $('#showdata_katalog').html(data);  
        }
    });

    }
});
    </script>
@endsection
