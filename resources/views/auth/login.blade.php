<!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://kit.fontawesome.com/d3b03c8acc.js" crossorigin="anonymous"></script>
    <title>Login BootHouse Indonesia</title>
</head>

<body>
    <section class="bg-prim-white loginPage overflow-y-hidden">
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[90px]">
            <div class=" grid grid-cols-1 lg:grid-cols-2 items-center">
                <div class="formLogin mt-[45%] lg:mt-0">
                    <div class="py-3 w-fit">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-52">
                    </div>
                    <p class="text-prim-brown">
                        Masuk dan buat booth sesuai dengan imajinasi Anda.
                    </p>
                    <form action="" class="mt-10">
                        <input type="text"
                            class="w-full lg:w-80 px-5 rounded-3xl text-prim-brown bg-prim-white border-2 h-12 border-prim-brown"
                            placeholder="Email">
                        <br>
                        <input type="password"
                            class="mt-6 w-full lg:w-80 px-5 rounded-3xl text-prim-brown bg-prim-white border-2 h-12 border-prim-brown"
                            placeholder="Password">
                        <div class="w-full lg:w-80 text-right mt-2">
                            <a href=""
                                class="text-prim-brown underline text-[14px] hover:text-prim-red transition-colors">Lupa
                                Password ?</a>
                        </div>
                        <button
                            class="mt-9 w-full lg:w-80 px-10 py-3 bg-prim-yellow rounded-full hover:bg-prim-red transition-colors hover:text-prim-white text-prim-brown font-bold">
                            Daftar
                        </button>
                        <div class="w-full lg:w-80 text-center mt-2">
                            <p class="text-prim-brown text-[12px]">Belum mempunyai akun? <span><a href="/register"
                                        class="font-bold underline hover:text-prim-red transition-colors">Daftar
                                        Sekarang</a></span></p>
                        </div>
                    </form>
                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('assets/images/login.png') }}" alt="Login Image" class="h-screen ml-auto">
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
