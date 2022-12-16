<nav class="top-nav w-full z-10 lg:w-[1280px] mx-auto grid grid-cols-12 justify-between items-center px-[20px] lg:px-[80px] py-[30px] transition-all">
    <div class="col-span-6 justify-between">
        <img src="{{ asset('assets/images/logo_new.png') }}" alt="Logo BootHouse Indonesia" class="w-[178px]">
    </div>
    <div class="menu col-span-4 hidden lg:block">
        <div class="grid grid-cols-3 justify-between">
            <a href="/" class="text-prim-dark-green text-[16px] font-bold hover:text-prim-dark-blue transition-all">Beranda</a>
            <a href="/katalog" class="text-prim-dark-green text-[16px] font-bold hover:text-prim-dark-blue  transition-all">Katalog</a>
            <a href="/cara-pesan" class="text-prim-dark-green text-[16px] font-bold hover:text-prim-dark-blue  transition-all">Cara
                Pesan</a>
        </div>
    </div>
    <div class="login-button col-span-2 ml-auto hidden lg:block">
        @if (Auth::check())
        <button onclick="location.href = '/logout'; clearSession()" class="bg-prim-dark-blue text-prim-dark-green  font-bold rounded-xl px-[49px] py-[7px]  hover:bg-prim-dark-green hover:text-prim-white transition-all">
            Keluar
        </button>
        @else
        <button onclick="location.href = '/login';" class="bg-prim-dark-blue text-prim-dark-green font-bold rounded-xl px-[49px] py-[7px] hover:bg-prim-dark-green hover:text-prim-white transition-all">
            Masuk
        </button>
        @endif

    </div>
    <div class="col-span-6 ml-auto block lg:hidden">
        <div class="w-7 h-1 bg-prim-dark-green mb-1"></div>
        <div class="w-7 h-1 bg-prim-dark-green mb-1"></div>
        <div class="w-7 h-1 bg-prim-dark-green"></div>
    </div>
</nav>