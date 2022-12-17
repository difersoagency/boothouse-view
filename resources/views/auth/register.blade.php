<!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://kit.fontawesome.com/d3b03c8acc.js" crossorigin="anonymous"></script>
    <title>Register BootHouse Indonesia</title>
</head>

<body>
    <section class="bg-prim-white loginPage overflow-hidden">
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[90px]">
            <div class=" grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
                <div class="formLogin mt-[30%] lg:mt-0">
                    <div class="py-3 w-fit">
                        <img src="{{ asset('assets/images/logo_new.png') }}" alt="" class="w-52">
                    </div>
                    <p class="text-prim-dark-green">
                        Buat akun dan kreasikan booth sesuai dengan imajinasi
                    </p>
                    <form action="{{('register')}}" method="POST" class="mt-10 grid grid-cols-2 gap-5">
                        @csrf
                        <input type="text" class="w-full  px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Nama Depan" name="depan">
                        <input type="text" class="w-full  px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Nama Belakang" name="belakang">
                        <input type="email" class="w-full col-span-2 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Email" name="email">
                        <input type="text" class="w-full col-span-2 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Telepon" name="telp">
                        <input type="text" class="w-full col-span-2 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Username" name="username">
                        <input type="password" class="w-full col-span-2 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Password" name="password">
                        <input type="password" class="w-full col-span-2 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Ulangi Password" name="password_confirmation">
                        <button class="mt-4 w-full mx-auto col-span-2 px-10 py-3 bg-prim-dark-green rounded-full hover:bg-prim-light-blue transition-colors hover:text-prim-dark-green text-prim-white font-bold" type="submit">
                            Daftar
                        </button>
                    </form>
                    <div class="w-full lg:w-80 text-center mt-2 col-span-2 mx-auto">
                        <p class="text-prim-dark-green text-[12px]">Sudah mempunyai akun? <span><a href="/login" class="font-bold underline hover:text-prim-light-blue transition-colors mx-auto">Masuk
                                    dengan Akun</a></span></p>
                    </div>

                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('assets/images/register.png') }}" alt="Register Image" class="h-screen ml-auto">
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>