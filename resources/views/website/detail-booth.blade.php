@extends('website.welcome')

@section('content')
    <input id="id_booth_katalog" value="{{ $data->id }}" class="hidden">
    <input id="nama_booth_katalog" value="{{ $data->JenisBooth->nama }}" class="hidden">
    <input id="harga_booth_katalog" value="{{ number_format($data->harga, 0, ',', '.') }}" class="hidden">
    <section class="katalog mt-[25px] md:mt-[20px] w-screen">
        <div class="w-full bg-prim-brown py-20 text-center">
            <h1 class="text-[36px] text-prim-yellow font-bold">Katalog Produk Booth</h1>
            <a href="/katalog" class="text-prim-white text-[14px] hover:text-prim-red">Katalog</a>
            <span class="text-prim-white"> / </span>
            <a href="" class="text-prim-yellow text-[14px] hover:text-prim-red">{{ $data->JenisBooth->nama }}</a>
        </div>
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px]">
            <div class="detail-produk grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center ">
                <div class="detail-img text-center">
                    <img src="{{ asset('assets/images/booth-2.png') }}" alt="" class="w-[80%] mx-auto">
                </div>
                <div class="detail-editor">
                    <h2 class="text-prim-brown text-[24px] font-bold mb-8">
                        {{ $data->JenisBooth->nama }}</h2>
                    <h2 class="text-prim-brown text-[24px] font-bold mb-8">Rp.
                        {{ number_format($data->harga, 0, ',', '.') }}</p>
                    </h2>

                    <p class="text-prim-brown font-bold text-[14px]">Pilih Warna :</p>
                    <div class="color-pick grid grid-cols-12 mt-3 gap-16 mb-6">
                        <div class="w-10 h-10 bg-prim-red rounded-full color cursor-pointer  outline-1">
                        </div>
                        <div class="w-10 h-10 bg-prim-brown rounded-full color cursor-pointer">
                        </div>
                        <div class="w-10 h-10 bg-prim-yellow rounded-full color cursor-pointer">
                        </div>
                        <div class="w-10 h-10 bg-prim-red rounded-full color cursor-pointer">
                        </div>
                    </div>
                    <p class="text-prim-brown font-bold text-[14px]">
                        Ukuran Booth :
                    </p>
                    <div class="field-ukuran mt-2 justify-between">
                        <ul class="grid gap-6 w-full md:grid-cols-2">
                            <li>
                                <input type="radio" id="ukuran_booth_katalog" name="ukuran"
                                    value=" {{ str_replace('*', 'x', $data->ukuran) }}" class="hidden peer">
                                <label for="ukuran_booth_katalog"
                                    class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border-2 border-prim-brown cursor-pointer transition-all dark:hover:text-prim-brown dark:border-prim-brown dark:peer-checked:text-prim-brown peer-checked:bg-prim-yellow peer-checked:text-blue-600 hover:text-prim-whitee hover:bg-prim-yellow">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            {{ str_replace('*', 'x', $data->ukuran) }}</div>
                                    </div>

                                </label>
                            </li>
                            {{-- <li>
                                <input type="radio" id="60x50x80" name="ukuran" value="60x50x80" class="hidden peer">
                                <label for="60x50x80"
                                    class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border-2 border-prim-brown cursor-pointer transition-all dark:hover:text-prim-brown dark:border-prim-brown dark:peer-checked:text-prim-brown peer-checked:bg-prim-yellow peer-checked:text-blue-600 hover:text-prim-whitee hover:bg-prim-yellow">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">60cm x 50cm x 80cm</div>

                                    </div>
                                </label>
                            </li>
                             --}}
                        </ul>
                    </div>
                    <div class="button-pesan mt-9 w-fit">

                        {{-- <button
                                class="pesan text-prim-white bg-prim-red px-6 py-2 rounded-lg hover:bg-prim-brown transition-colors"
                                onclick="location.href = '/custom';">Pesan
                                Booth</button> --}}
                        <button type="button"
                            class=" text-prim-white bg-prim-red px-6 py-2 rounded-lg hover:bg-prim-brown transition-colors"
                            onclick=" order_booth()">Pesan
                            Booth</button>
                    </div>

                </div>

            </div>
            <div class="produk-serupa mt-16">
                <h2 class="text-prim-brown text-[24px] font-bold">Produk Serupa</h3>
                    <div class="rekomendasi grid grid-cols-2 md:grid-cols-3 gap-10 lg:gap-40 mt-7">
                        @foreach ($related_product as $r)
                            <div class="produk">
                                <div class="bg-prim-brown w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
                                    <img src="{{ asset('assets/images/booth-2.png') }}" alt=""
                                        class="w-52 mx-auto mb-3">
                                    <p class="text-prim-yellow text-[18px] font-bold nama-produk">
                                        {{ $r->JenisBooth->nama }}
                                    </p>
                                    <p class="text-prim-yellow text-[14px] font-bold harga-produk mb-3">Rp.
                                        {{ number_format($r->harga, 0, ',', '.') }}</p>
                                    </p>
                                </div>
                                <button type="button"
                                    class="bg-prim-yellow text-prim-brown w-full py-3 font-bold rounded-b-lg"
                                    onclick="location.href = '/detail-booth/{{ $r->id }}';">Pilih Booth</button>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
        <div class="w-full bg-prim-yellow py-10 text-center mt-[150px] px-14">
            <h1 class="text-[20px] md:text-[36px] text-prim-brown font-bold">Sudah memiliki desain dan sketsa booth sendiri
                ? <br> Upload desain Anda di sini!</h1>
            <button
                class="bg-prim-red text-prim-white px-6 py-2 rounded-lg mt-5 hover:bg-prim-white hover:text-prim-red transition-colors"
                type="submit">Upload
                Desain</button>
        </div>
    </section>
@endsection
