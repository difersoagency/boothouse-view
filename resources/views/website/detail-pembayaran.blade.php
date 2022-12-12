@extends('website.welcome')

@section('content')
    <section class="katalog mt-[25px] md:mt-[20px] w-screen">
        <div class="w-full bg-prim-brown py-20 text-center">
            <h1 class="text-[36px] text-prim-yellow font-bold">Pemesanan dan Pembayaran</h1>
        </div>
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px] mb-16">
            <div class="grid grid-cols-2 gap-10">
                <div class="informasiKirim">
                    <h2 class="text-[26px] text-prim-brown font-bold">Informasi Pengiriman</h2>
                    <form action="" class="grid grid-cols-2 mt-7 gap-x-8 gap-y-4">
                        <div>
                            <label for="nama-depan" class="text-prim-brown font-bold text-[14px]">Nama Depan</label> <br>
                            <input type="text" name="nama-depan" id="nama-depan"
                                class="mt-3 h-10 w-full rounded-md border-2 border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div>
                            <label for="nama-belakang" class="mb-2 text-prim-brown font-bold text-[14px]">Nama
                                Belakang</label> <br>
                            <input type="text" name="nama-belakang" id="nama-belakang"
                                class="mt-3 h-10 rounded-md border-2 w-full border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div>
                            <label for="provinsi" class="mb-2 text-prim-brown font-bold text-[14px]">Provinsi</label> <br>
                            <input type="text" name="provinsi" id="provinsi"
                                class="mt-3 h-10 rounded-md border-2 w-full border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div>
                            <label for="kota" class="mb-2 text-prim-brown font-bold text-[14px]">Kota</label> <br>
                            <input type="text" name="kota" id="kota"
                                class="mt-3 h-10 rounded-md border-2 w-full border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div class="col-span-2">
                            <label for="alamat" class="mb-2 text-prim-brown font-bold text-[14px]">Alamat Lengkap</label>
                            <br>
                            <input type="text" name="alamat" id="alamat"
                                class="mt-3 h-10 rounded-md border-2 w-full border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div class="">
                            <label for="tel" class="mb-2 text-prim-brown font-bold text-[14px]">No.Telepon</label> <br>
                            <input type="tel" name="tel" id="tel"
                                class="mt-3 h-10 rounded-md border-2 w-full border-prim-brown px-3 text-prim-brown">
                        </div>
                        <div></div>
                        <div class="submit-pembayaran">
                            <button type="button" class=" mt-5 px-5 py-2 bg-prim-red rounded-md text-prim-white"
                                onclick="snap_bayar()">Pembayaran</button>
                        </div>
                    </form>
                </div>
                <div class="informasiPesanan">
                    <div class="px-8 py-5 bg-prim-yellow rounded-t-md">
                        <h2 class="text-[26px] font-bold text-prim-brown">Detail Pesanan</h2>
                        <div class="produk-pesanan mt-3 grid grid-cols-2 gap-5 items-center mb-5">
                            <img src="{{ asset('assets/images/booth1.png') }}" alt="" width="80%">
                            <div class="info">
                                <p class="text-prim-brown font-bold text-[16px]">Nama Produk</p>
                                <p class="text-prim-brown font-bold mt-2 text-[16px]">Warna : Merah</p>
                                <p class="text-prim-brown font-bold mt-2 text-[16px]">Ukuran : 10 x 10 x 10</p>
                                <p class="text-prim-brown font-bold mt-2 text-[16px]">Harga : Rp. 925.000</p>
                            </div>
                        </div>
                        <h3 class="text-prim-brown text-[20px] font-bold">Jenis Pengriman</h3>
                        <div class="mt-3">
                            <ul class="grid gap-6 w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="mandiri" name="ukuran" value="mandiri" class="hidden peer"
                                        required>
                                    <label for="mandiri"
                                        class="inline-flex justify-between items-center px-5 py-2 w-full rounded-lg border-2 border-prim-brown bg-prim-white text-prim-brown font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-prim-brown dark:peer-checked:text-prim-white peer-checked:bg-prim-brown peer-checked:text-blue-600 hover:text-prim-white hover:bg-prim-brown">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Pengambilan Mandiri</div>
                                        </div>

                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="jasaKirim" name="ukuran" value="jasaKirim"
                                        class="hidden peer">
                                    <label for="jasaKirim"
                                        class="inline-flex justify-between items-center text-center py-2 w-40 rounded-lg border-2 border-prim-brown bg-prim-white text-prim-brown font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-prim-brown dark:peer-checked:text-prim-white peer-checked:bg-prim-brown peer-checked:text-blue-600 hover:text-prim-white hover:bg-prim-brown">
                                        <div class="block text-center mx-auto">
                                            <div class="w-full text-lg font-semibold">Jasa Kirim</div>
                                        </div>

                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="subtotal grid grid-cols-2 mt-8 gap-y-3 items-center">
                            <p class="text-prim-brown">Subtotal</p>
                            <p class="text-prim-brown font-bold">: Rp <span>900.000</span></p>
                            <p class="text-prim-brown">Pajak (10%)</p>
                            <p class="text-prim-brown font-bold">: Rp <span>900.000</span></p>
                            <p class="text-prim-brown">Ongkos Kirim</p>
                            <p class="text-prim-brown font-bold">: Rp <span>900.000</span></p>
                            <p class="text-prim-brown">Uang Muka (Optional)</p>
                            <p>: <input type="number" name="dibayar" id="dibayar"
                                    class="px-2 focus:outline-none h-8 rounded-md border-2 text-prim-brown border-prim-brown">
                            </p>
                        </div>
                    </div>
                    <div class="px-8 py-5 bg-prim-brown rounded-b-md">
                        <h2 class="text-prim-yellow font-bold text-[26px]">Total</h2>
                        <p class="text-prim-yellow font-bold text-[26px]">Rp. <span>950.000</span> </p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key=""></script>
@endsection
