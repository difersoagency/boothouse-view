@foreach ($data as $d)
<div class="produk">
    <div class="bg-prim-light-blue w-full px-3 py-5 text-center rounded-t-lg h-64 md:h-80">
        <img src="{{ asset('assets/images/booth-2.png') }}" alt="" class="w-52 mx-auto mb-3">
        <p class="text-prim-dark-green text-[18px] font-bold nama-produk">{{ $d->JenisBooth->nama }}</p>
        <p class="text-prim-dark-green text-[14px] font-bold harga-produk mb-3">Rp.
            {{ number_format($d->harga, 0, ',', '.') }}
        </p>
    </div>
    <button class="bg-prim-dark-green text-prim-white hover:bg-prim-dark-blue w-full py-3 font-bold rounded-b-lg transition-colors" onclick="location.href = '/detail-booth/{{ $d->id }}';">Pilih Booth</button>
</div>
@endforeach