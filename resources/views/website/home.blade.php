@extends('website.welcome')

@section('content')
<section class="mt-[25px] md:mt-[80px] w-screen">
    <div class="w-full lg:w-[1280px] mx-auto">

        <!-- Banner Home -->
        <div class="grid grid-cols-1 md:grid-cols-12 lg:gap-14 px-[20px] lg:px-[80px]">
            <div class="text col-span-1 md:col-span-6">
                <h1 class="text-[46px] text-prim-dark-blue font-bold leading-tight">Buat Booth Berkualitas Sesuai Imajinasimu
                </h1>
                <p class="text-[16px] text-prim-dark-green mt-4">Buat booth impianmu menjadi kenyataan di BootHouse Indonesia
                    yang dapat membuat booth sesuai dengan design impianmu dan memiliki hasil akhir yang berkualitas
                    guna mendukung kegiatan Anda menggunakan booth dari BootHouse</p>
                <button class="bg-prim-dark-green    text-prim-white py-[10px] px-[22px] rounded-lg mt-[24px] hover:bg-prim-dark-blue hover:text-prim-yellow transition-colors" onclick="location.href = '/katalog';">Lihat
                    Katalog</button>
            </div>
            <div class="image md:col-span-6 ml-auto mt-10 lg:mt-0">
                <img src="{{ asset('assets/images/banner-home.png') }}" alt="Ilustrasi Booth">
            </div>
        </div>

        <!-- Section Tipe Booth -->
        <div class="tipe mt-[100px] px-[20px] lg:px-[80px]">
            <h2 class="text-prim-dark-blue text-[36px] font-bold mb-[50px]">Tipe Booth di Boot<span class="text-prim-dark-green">House</span> ?</h2>
            <div class="list-tipe grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 justify-between gap-16">
                <div class="lg:col-span-4">
                    <img src="{{ asset('assets/images/booth-1.png') }}" alt="Booth Contoh" class="w-32 mx-auto">
                    <div class="w-full bg-prim-light-blue h-[350px] rounded-t-2xl mt-[-150px] pt-[160px] px-[30px]">
                        <h3 class="text-prim-dark-green font-bold text-[26px]">Display Booth</h3>
                        <p class="text-[12px] text-prim-dark-green mt-2">
                            Booth yang terbuat dari kontainer maupun yang terbuat dari besi hollow menyerupai kontainer
                            memiliki tampilan yang menarik dan lebih modern karena warna-warnanya yang lebih menarik dan
                            juga terdapat ruang yang bisa dilihat dari luar.
                        </p>
                    </div>
                    <button class="w-full h-10 bg-prim-dark-green font-bold text-prim-white hover:bg-prim-dark-blue transition-all mt-[-150px] rounded-b-2xl">
                        Lihat Produk
                    </button>
                </div>
                <div class="lg:col-span-4">
                    <img src="{{ asset('assets/images/booth-1.png') }}" alt="Booth Contoh" class="w-32 mx-auto">
                    <div class="w-full bg-prim-light-blue h-[350px] rounded-t-2xl mt-[-150px] pt-[160px] px-[30px]">
                        <h3 class="text-prim-dark-green font-bold text-[26px]">Outdoor Booth</h3>
                        <p class="text-[12px] text-prim-dark-green mt-2">
                            Booth yang terbuat dari kontainer maupun yang terbuat dari besi hollow menyerupai kontainer
                            memiliki tampilan yang menarik dan lebih modern karena warna-warnanya yang lebih menarik dan
                            juga terdapat ruang yang bisa dilihat dari luar.
                        </p>
                    </div>
                    <button class="w-full h-10 bg-prim-dark-green font-bold text-prim-white hover:bg-prim-dark-blue mt-[-150px] rounded-b-2xl">
                        Lihat Produk
                    </button>
                </div>
                <div class="lg:col-span-4">
                    <img src="{{ asset('assets/images/booth-1.png') }}" alt="Booth Contoh" class="w-32 mx-auto">
                    <div class="w-full bg-prim-light-blue h-[350px] rounded-t-2xl mt-[-150px] pt-[160px] px-[30px]">
                        <h3 class="text-prim-dark-green font-bold text-[26px]">Portable Booth</h3>
                        <p class="text-[12px] text-prim-dark-green mt-2">
                            Booth yang terbuat dari kontainer maupun yang terbuat dari besi hollow menyerupai kontainer
                            memiliki tampilan yang menarik dan lebih modern karena warna-warnanya yang lebih menarik dan
                            juga terdapat ruang yang bisa dilihat dari luar.
                        </p>
                    </div>
                    <button class="w-full h-10 bg-prim-dark-green font-bold text-prim-white hover:bg-prim-dark-blue mt-[-150px] rounded-b-2xl">
                        Lihat Produk
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mengapa BootHouse -->
    <div class="bg-prim-light-blue">
        <div class="menagapa bg-prim-yellow w-full lg:w-[1280px] mt-[120px] px-[20px] lg:px-[80px] py-[55px] mx-auto">
            <div class=" mx-auto">
                <h2 class="text-[36px] text-center text-prim-dark-green font-bold">Mengapa Boot<span class="text-prim-white">House</span> ?</h2>
                <div class="list-mengapa mt-[36px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
                    <div class="lg:col-span-4  w-full bg-prim-white rounded-xl px-[26px] py-[20px]">
                        <img src="{{ asset('assets/images/dummy.png') }}" alt="" class="mx-auto">
                        <p class="text-[16px] text-prim-dark-green mt-4">Booth yang terbuat dari kontainer maupun yang
                            terbuat dari besi hollow menyerupai kontainer memiliki tampilan yang menarik dan lebih
                            modern karena warna-warnanya yang lebih menarik dan juga terdapat ruang yang bisa dilihat
                            dari luar.
                        </p>
                    </div>
                    <div class="lg:col-span-4  w-full bg-prim-white rounded-xl px-[26px] py-[20px]">
                        <img src="{{ asset('assets/images/dummy.png') }}" alt="" class="mx-auto">
                        <p class="text-[16px] text-prim-dark-green mt-4">Booth yang terbuat dari kontainer maupun yang
                            terbuat dari besi hollow menyerupai kontainer memiliki tampilan yang menarik dan lebih
                            modern karena warna-warnanya yang lebih menarik dan juga terdapat ruang yang bisa dilihat
                            dari luar.
                        </p>
                    </div>
                    <div class="lg:col-span-4  w-full bg-prim-white rounded-xl px-[26px] py-[20px]">
                        <img src="{{ asset('assets/images/dummy.png') }}" alt="" class="mx-auto">
                        <p class="text-[16px] text-prim-dark-green mt-4">Booth yang terbuat dari kontainer maupun yang
                            terbuat dari besi hollow menyerupai kontainer memiliki tampilan yang menarik dan lebih
                            modern karena warna-warnanya yang lebih menarik dan juga terdapat ruang yang bisa dilihat
                            dari luar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection