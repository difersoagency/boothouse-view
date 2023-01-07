
<form action="{{route('master.kota.store')}}" method="POST" id="formtambah_kota">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Provinsi</label>
		<select class="form-control select2" name="provinsi">
			@foreach($provinsi as $p)
			<option value="{{$p->id}}">{{$p->nama}}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Kota</label>
		<input type="text" class="form-control"  placeholder="Masukkan Nama Kota" name="kota">
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormPassword1">Ongkir</label>
		<input type="text" class="form-control"  placeholder="Masukkan Ongkos Kirim" name="ongkir">
	</div>
	
	<button type="submit" class="btn btn-primary">Tambah</button>
</form>