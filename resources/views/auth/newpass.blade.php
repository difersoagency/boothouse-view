<!-- <!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://kit.fontawesome.com/d3b03c8acc.js" crossorigin="anonymous"></script>
    <title>Lupa Password | BootHouse Indonesia</title>
</head>

<body>
    <section class="bg-prim-white loginPage overflow-y-hidden h-screen">
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[90px] h-screen">
            <div class="flex items-center justify-center h-screen">
                <div class="formLogin w-80 mx-auto my-auto">
                    <h1 class="text-prim-dark-green font-bold text-4xl">
                        Lupa Password ?
                    </h1>
                    <p class=" mt-5 text-prim-dark-green">Masukan email akun Anda, Anda akan menerima kode untuk melakukan reset password di email Anda.</p>
                    <form action="{{('login')}}" class="mt-10" method="POST">
                        @csrf
                        <input type="text" class="w-full lg:w-80 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Email Anda" name="emaillupa">
                        <br>
                        <button class="mt-9 w-full lg:w-80 px-10 py-3 bg-prim-dark-green rounded-full hover:bg-prim-light-blue transition-colors hover:text-prim-dark-green text-prim-white font-bold" type="submit">
                            Dapatkan Kode
                        </button>
                    </form>
                    <div class="w-full lg:w-80 text-center mt-2">
                        <p class="text-prim-dark-green text-[12px]">Sudah Ingat Password Anda ? <span><a href="/login" class="font-bold underline hover:text-prim-dark-blue transition-colors">Masuk Sekarang</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://kit.fontawesome.com/d3b03c8acc.js" crossorigin="anonymous"></script>
    <title>Kode Password | BootHouse Indonesia</title>
</head>

<body>
    <section class="bg-prim-white loginPage overflow-y-hidden h-screen">
        <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[90px] h-screen">
            <div class="flex items-center justify-center h-screen">
                <div class="formLogin w-80 mx-auto my-auto">
                    <h1 class="text-prim-dark-green font-bold text-4xl">
                        Masukan Password Baru
                    </h1>
                    <p class=" mt-5 text-prim-dark-green">Masukan Password Baru Anda.</p>
                    <form action="{{('login')}}" class="mt-10" method="POST">
                        @csrf
                        <input type="text" class="w-full lg:w-80 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Password Baru" name="passbaru">

                        <input type="text" class="w-full lg:w-80 px-5 rounded-3xl mt-6 text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Konfirmasi Password Baru" name="conf-passbaru">

                        <button class="mt-9 w-full lg:w-80 px-10 py-3 bg-prim-dark-green rounded-full hover:bg-prim-light-blue transition-colors hover:text-prim-dark-green text-prim-white font-bold" type="submit">
                            Simpan
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>