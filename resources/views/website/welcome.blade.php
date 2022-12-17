<!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://kit.fontawesome.com/d3b03c8acc.js" crossorigin="anonymous"></script>
    <title>BootHouse Indonesia - Tempat Pemesanan Booth Acara Terpercaya</title>
</head>

<body class="bg-prim-white">
    <section class="home overflow-x-hidden">
        <!-- Navigator Atas -->
        @include('website.navbar')
        @yield('content')
        @include('website.footer')
    </section>

    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>