
<form action="{{route('master.booth.store')}}" method="POST" id="formtambah_booth">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Jenis Booth</label>
		<select class="form-control select2" name="jenis">
			@foreach($booth as $p)
			<option value="{{$p->id}}">{{$p->nama}}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Ukuran Booth</label>
		<div class="input-group mb-3">
			<input type="number" class="form-control" placeholder="Panjang" aria-label="Panjang" name="panjang">
			<span class="input-group-text">X</span>
			<input type="number" class="form-control" placeholder="Lebar" aria-label="Lebar" name="lebar">
			<span class="input-group-text">X</span>
			<input type="number" class="form-control" placeholder="Tinggi" aria-label="Tinggi" name="tinggi">
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormPassword1">Harga</label>
		<input type="text" class="form-control"  placeholder="Masukkan Harga" name="harga">
	</div>
	
	<button type="submit" class="btn btn-primary">Tambah</button>
</form>