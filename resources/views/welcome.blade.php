<!DOCTYPE html>
<html lang="en" class="bg-prim-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>BootHouse Indonesia - Tempat Pemesanan Booth Acara Terpercaya</title>
</head>

<body>
    <section class="home overflow-x-hidden">
        <!-- Navigator Atas -->
        @include('navbar')
        @yield('content')
        @include('footer')
    </section>

    <script src="../js/app.js"></script>
</body>

</html>