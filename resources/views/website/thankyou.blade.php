@extends('website.welcome')

@section('content')
<section class="w-screen">
    <div class="w-full lg:w-[1280px] mx-auto text-center px-10 lg:px-[80px] py-10">
        <img src="{{ asset('assets/images/thankyou.png') }}" alt="Thankyou Components" class="mx-auto w-60">
        <h1 class="text-prim-brown font-bold text-[24px] md:text-[42px] mb-3">Terima Kasih telah pesan Booth di BootHouse
            Indonesia</h1>
        <p class="text-prim-brown">Anda dapat melihat perjalanan pesanan Anda di halaman order status, jika ada yang
            dirasa tidak sesuai pada booth yang telah dikirim dapat menghubungi Admin di Whatsapp. Untuk pengiriman
            barang dilakukan setelah pembayaran selesai dilunasi.</p>
        <button class="mt-4 mx-auto col-span-2 px-5 py-2 hover:bg-prim-light-blue rounded-full bg-prim-dark-green transition-colors text-prim-white hover:text-prim-dark-green font-bold"  onclick="location.href='status'">
            Status Pesanan
        </button>
    </div>
</section>
@endsection