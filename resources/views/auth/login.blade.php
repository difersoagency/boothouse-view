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
                        <img src="{{ asset('assets/images/logo_new.png') }}" alt="" class="w-52">
                    </div>
                    <p class="text-prim-dark-green">
                        Masuk dan buat booth sesuai dengan imajinasi Anda.
                    </p>
                    <form action="{{ 'login' }}" class="mt-10" method="POST">
                        @csrf
                        <input type="text" class="w-full lg:w-80 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Email atau Username" name="email" required>
                        <br>
                        <input type="password" class="mt-6 w-full lg:w-80 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Password" name="password" required>
                        <div class="w-full lg:w-80 text-right mt-2">
                            <a href="/lupa-password" class="text-prim-dark-green underline text-[14px] hover:text-prim-dark-blue transition-colors">Lupa Password ?</a>
                        </div>
                        <button class="mt-9 w-full lg:w-80 px-10 py-3 bg-prim-dark-green rounded-full hover:bg-prim-light-blue transition-colors hover:text-prim-dark-green text-prim-white font-bold" type="submit">
                            Login
                        </button>
                    </form>
                    <div class="w-full lg:w-80 text-center mt-2">
                        <p class="text-prim-dark-green text-[12px]">Belum mempunyai akun? <span><a href="/register" class="font-bold underline hover:text-prim-dark-blue transition-colors">Daftar
                                    Sekarang</a></span></p>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('assets/images/login.png') }}" alt="Login Image" class="h-screen ml-auto">
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(Session::has('error'))
        Swal.fire({
            title: 'Error',
            text: "Username atau password salah",
            icon: 'error',
        });
        @endif
    </script>
</body>

</html>