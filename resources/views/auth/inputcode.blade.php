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
                        Masukan Kode Reset Password
                    </h1>
                    <p class=" mt-5 text-prim-dark-green">Masukan kode untuk reset Password yang telah Anda terima di Email.</p>
                    <form action="{{('login')}}" class="mt-10" method="POST">
                        @csrf
                        <input type="text" class="w-full lg:w-80 px-5 rounded-3xl text-prim-dark-green bg-prim-white border-2 h-12 border-prim-brown" placeholder="Kode Anda" name="kodereset">
                        <div class="w-full lg:w-80 text-right mt-2">
                            <a href="/lupa-password" class="text-prim-dark-green underline text-[14px] hover:text-prim-dark-blue transition-colors">Belum Mendapatkan Kode ?</a>
                        </div>

                        <button class="mt-9 w-full lg:w-80 px-10 py-3 bg-prim-dark-green rounded-full hover:bg-prim-light-blue transition-colors hover:text-prim-dark-green text-prim-white font-bold" type="submit">
                            Konfirmasi
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>