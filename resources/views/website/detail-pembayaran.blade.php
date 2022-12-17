@extends('website.welcome')

@section('content')
<section class="katalog mt-[25px] md:mt-[20px] w-screen">
    <div class="w-full bg-prim-dark-green py-20 text-center">
        <h1 class="text-[36px] text-prim-white  font-bold">Pemesanan dan Pembayaran</h1>
    </div>
    <div class="w-full lg:w-[1280px] mx-auto px-[20px] lg:px-[80px] mt-[70px] mb-16">
        <div class="grid grid-cols-2 gap-10">
            <div class="informasiKirim">
                <h2 class="text-[26px] text-prim-dark-green font-bold">Informasi Pengiriman</h2>
                <div id="checkout-booths" action="checkout" class="grid grid-cols-2 mt-7 gap-x-8 gap-y-4">
                    <div>
                        <label for="nama-depan" class="text-prim-dark-green font-bold text-[14px]">Nama Depan</label> <br>
                        <input type="text" name="nama-depan" id="nama-depan" class="mt-3 h-10 w-full rounded-md border-2 border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->customer->nama_depan }}">
                    </div>
                    <div>
                        <label for="nama-belakang" class="mb-2 text-prim-dark-green font-bold text-[14px]">Nama
                            Belakang</label> <br>
                        <input type="text" name="nama-belakang" id="nama-belakang" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->customer->nama_belakang }}">
                    </div>
                    <div>
                        <label for="provinsi" class="mb-2 text-prim-dark-green font-bold text-[14px]">Provinsi</label> <br>
                        <select type="text" name="provinsi" id="select-provinsi" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green">
                        </select>
                    </div>
                    <div>
                        <label for="kota" class="mb-2 text-prim-dark-green font-bold text-[14px]">Kota</label> <br>
                        <select type="text" name="kota" id="select-kota" class="select2 mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green">
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="alamat" class="mb-2 text-prim-dark-green font-bold text-[14px]">Alamat Lengkap</label>
                        <br>
                        <input type="text" name="alamat" id="alamat" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green">
                    </div>
                    <div class="">
                        <label for="tel" class="mb-2 text-prim-dark-green font-bold text-[14px]">No.Telepon</label> <br>
                        <input type="text" name="tel" id="tel" class="mt-3 h-10 rounded-md border-2 w-full border-bg-prim-dark-green px-3 text-prim-dark-green" value="{{ Auth::user()->customer->no_telp }}">
                    </div>
                    <div></div>
                    <div class="submit-pembayaran">
                        <button onclick="checkoutBooth()" type="button" class=" mt-5 px-5 py-2 bg-prim-dark-green rounded-md text-prim-white">Pembayaran</button>
                    </div>
                </div>
            </div>
            <div class="informasiPesanan">
                <div class="px-8 py-5 bg-prim-light-blue rounded-t-md">
                    <h2 class="text-[26px] font-bold text-prim-dark-green">Detail Pesanan</h2>
                    <div class="produk-pesanan mt-3 grid grid-cols-2 gap-5 items-center mb-5">
                        <img src="{{ asset('assets/images/booth1.png') }}" alt="" width="80%">
                        <div class="info">
                            <p class="text-prim-dark-green font-bold text-[16px]" id="nama-booth-bayar">Nama Produk</p>
                            <p class="text-prim-dark-green font-bold mt-2 text-[16px]">Warna : <span id="warna-booth">-</span></p>
                            <p class="text-prim-dark-green font-bold mt-2 text-[16px]">Ukuran : <span id="ukuran-booth-bayar">-</span></p>
                            <p class="text-prim-dark-green font-bold mt-2 text-[16px]">Harga : Rp <span id="harga-booth-bayar">0</span>
                            </p>
                        </div>
                    </div>
                    <h3 class="text-prim-dark-green text-[20px] font-bold">Jenis Pengriman</h3>
                    <div class="mt-3">
                        <ul class="grid gap-6 w-full md:grid-cols-2">
                            <li>
                                <input type="radio" id="mandiri" name="jenis_kirim" value="mandiri" class="hidden peer" required onchange="handleChange(this);" checked>
                                <label for="mandiri" class="inline-flex justify-between items-center px-5 py-2 w-full rounded-lg border-2 border-bg-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-bg-prim-dark-green dark:peer-checked:text-prim-white peer-checked:bg-prim-dark-green peer-checked:text-prim-white hover:text-prim-white hover:bg-prim-dark-green">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Pengambilan Mandiri</div>
                                    </div>

                                </label>
                            </li>
                            <li>
                                <input type="radio" id="jasaKirim" name="jenis_kirim" value="jasaKirim" class="hidden peer" onchange="handleChange(this);">
                                <label for="jasaKirim" class="inline-flex justify-between items-center text-center py-2 w-40 rounded-lg border-2 border-bg-prim-dark-green bg-prim-white text-prim-dark-green font-bold cursor-pointer transition-all dark:hover:text-prim-white dark:border-bg-prim-dark-green dark:peer-checked:text-prim-white peer-checked:bg-prim-dark-green peer-checked:text-prim-white hover:text-prim-white hover:bg-prim-dark-green">
                                    <div class="block text-center mx-auto">
                                        <div class="w-full text-lg font-semibold">Jasa Kirim</div>
                                    </div>

                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="subtotal grid grid-cols-2 mt-8 gap-y-3 items-center">
                        <p class="text-prim-dark-green">Subtotal</p>
                        <p class="text-prim-dark-green font-bold">: Rp <span id="subtotal-booth-bayar">0</span></p>
                        <p class="text-prim-dark-green">Pajak (10%)</p>
                        <p class="text-prim-dark-green font-bold">: Rp <span id="pajak-booth-bayar">0</span></p>
                        <p class="text-prim-dark-green">Ongkos Kirim</p>
                        <p class="text-prim-dark-green font-bold">: Rp <span id="ongkir-booth-bayar">0</span></p>
                        <input id="ongkir-booth-bayar-text" value="0" class="hidden">
                        <p class="text-prim-dark-green">Uang Muka (Optional)</p>
                        <p>: <input type="number" name="dibayar" id="dp-booth-bayar" value="0" onkeyup="total();" class="px-2 focus:outline-none h-8 rounded-md border-2 text-prim-dark-green border-bg-prim-dark-green">
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 bg-prim-dark-green rounded-b-md">
                    <div class="px-8 py-5 bg-prim-brown rounded-b-md">
                        <h2 class="text-prim-white font-bold text-[26px]">Total</h2>
                        <p class="text-prim-white font-bold text-[26px]">Rp <span id="total-booth-bayar">0</span>
                        </p>
                    </div>
                    <div class="px-8 py-5 bg-prim-brown rounded-b-md">
                        <h2 class="text-prim-white font-bold text-[26px]">Sisa</h2>
                        <p class="text-prim-white font-bold text-[26px]">Rp <span id="sisa-booth-bayar">0</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('js/select2/css/select2.min.css') }}">
<script src="{{ asset('js/select2/js/select2.min.js') }}"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-bJIjYUlD5RrvI9Er"></script>
<script type="text/javascript">
    $('#select-kota').select2({
        placeholder: "Pilih Kota",
    });


    $('#select-provinsi').select2({
        placeholder: "Pilih Provinsi",
        ajax: {
            minimumResultsForSearch: 20,
            dataType: 'json',
            theme: "bootstrap",
            delay: 250,
            type: 'GET',
            url: '/provinsi/0',
            data: function(params) {
                return {
                    term: params.term,
                }
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(obj) {
                        return {
                            id: obj.id,
                            text: obj.nama
                        };
                    })
                };
            },
        }
    }).change(function() {
        reset_pengiriman();
        total();
        $("#select-kota").val("").trigger("change");
        var id = $(this).val();
        $('#select-kota').select2({
            placeholder: "Pilih Kota",
            ajax: {
                minimumResultsForSearch: 20,
                dataType: 'json',
                theme: "bootstrap",
                delay: 250,
                type: 'GET',
                url: '/provinsi/' + id,
                data: function(params) {
                    return {
                        term: params.term,
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(obj) {
                            return {
                                id: obj.id,
                                text: obj.nama
                            };
                        })
                    };
                },
            }
        }).change(function() {
            var id = $(this).val();
            $.ajax({
                url: '/kota/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    reset_pengiriman()
                    sessionStorage.setItem('ongkir_kota', res.biaya_kirim);
                    total();
                }
            });
        })
    });

    function reset_pengiriman() {
        document.getElementById("mandiri").checked = true;
        document.querySelector('#ongkir-booth-bayar').textContent = 0;
        document.getElementById('ongkir-booth-bayar-text').value = 0;
    }


    function submitForm(data) {
        $.ajax({
            url: "/checkout",
            method: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            datatype: "json"
        });
    }


    function checkoutBooth() {
        let depan = $("#nama-depan").val();
        let belakang = $("#nama-belakang").val();
        let provinsi = $("#select-provinsi").val();
        let kota = $("#select-kota").val();
        let alamat = $("#alamat").val();
        let tel = $("#tel").val();
        let ukuranbooth = sessionStorage.getItem(
            "ukuran-booth");
        let ongkir = $("#ongkir-booth-bayar-text").val();
        let dp = $("#dp-booth-bayar").val();
        let nama_booths = sessionStorage.getItem(
            "nama-booth");
        let total_bayar = sessionStorage.getItem(
            "total-booth");
        let sisa_bayar = sessionStorage.getItem(
            "sisa-booth");
        let id_booth = sessionStorage.getItem(
            "id-booth");
        let jenis_kirim = $('input[name="jenis_kirim"]:checked').val();
        let warna = sessionStorage.getItem("warna-booth");


        if (depan == "" || belakang == "" || provinsi == null || kota == null || alamat == "" || tel == "") {
            alert('form kosong')
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '/payToken',
                data: {
                    depan: depan,
                    belakang: belakang,
                    provinsi: provinsi,
                    kota: kota,
                    alamat: alamat,
                    tel: tel,
                    ukuran: ukuranbooth,
                    warna: warna,
                    ongkir: ongkir,
                    dp: dp,
                    total_bayar: total_bayar,
                    sisa_bayar: sisa_bayar,
                    jenis_kirim: jenis_kirim,
                    id_booth: id_booth,
                    nama_booths: nama_booths,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'JSON',
                success: function(response) {
                    //  console.log(response.data)
                    snap.pay(response.token, {
                        onSuccess: function(result) {
                            window.location.href = '/thankyou';
                            submitForm(response.data)
                            clearSession()
                        },
                        onPending: function(result) {
                            alert('pembayaran dibatalkan')
                        },
                        onError: function(result) {
                            alert('eror')
                        }
                    });
                },
                error: function(xhr, status, error) {
                    alert('nok')
                }
            })
        }

    }
    setValueBayar();
    total();

    function setValueBayar() {
        let harga = sessionStorage.getItem(
            "harga-booth").split('.').join("");
        let pajak = harga * 0.1
        let convert_pajak = pajak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById('nama-booth-bayar').innerText = sessionStorage.getItem("nama-booth");
        document.getElementById('harga-booth-bayar').innerText = sessionStorage.getItem("harga-booth");
        document.getElementById('warna-booth').innerText = sessionStorage.getItem("warna-booth");
        document.getElementById('subtotal-booth-bayar').innerText = sessionStorage.getItem(
            "harga-booth");
        document.getElementById('pajak-booth-bayar').innerText = convert_pajak;
        document.getElementById('ukuran-booth-bayar').innerText = sessionStorage.getItem(
            "ukuran-booth");

    }



    function handleChange(src) {
        let result = document.querySelector('#ongkir-booth-bayar');
        let result_text = document.getElementById('ongkir-booth-bayar-text');
        switch (src.value) {
            case 'mandiri':
                message = 0;
                values = 0;
                break;
            case 'jasaKirim':
                message = sessionStorage.getItem("ongkir_kota") === null ? '0' : sessionStorage.getItem("ongkir_kota")
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                values = sessionStorage.getItem("ongkir_kota") === null ? '0' : sessionStorage.getItem("ongkir_kota");
                break;
        }

        result_text.value = values;
        result.textContent = message;
        total()
    }


    function total() {
        let dp = document.getElementById('dp-booth-bayar').value;
        let ongkir = document.getElementById('ongkir-booth-bayar-text').value;
        let harga = sessionStorage.getItem(
            "harga-booth").split('.').join("");
        let pajak = harga * 0.1
        let total_dp = parseInt(dp) + parseInt(pajak) + parseInt(ongkir);
        let total_cash = parseInt(harga) + parseInt(pajak) + parseInt(ongkir);
        let total = dp != 0 ? total_dp : total_cash;
        let sisa = dp != 0 ? parseInt(harga) + parseInt(pajak) + parseInt(ongkir) - parseInt(total_dp) : 0
        let convert_total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        let convert_sisa = sisa.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById('total-booth-bayar').innerText = convert_total;
        document.getElementById('sisa-booth-bayar').innerText = convert_sisa;
        sessionStorage.setItem('total-booth', total);
        sessionStorage.setItem('sisa-booth', sisa);
    }


    const numInputs = document.getElementById('dp-booth-bayar')


    numInputs.addEventListener('change', function(e) {
        if (e.target.value == '') {
            e.target.value = 0
            total()
        }
    })
</script>
@endsection