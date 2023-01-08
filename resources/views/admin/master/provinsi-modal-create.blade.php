
<form action="{{route('master.provinsi.store')}}" method="POST" id="formtambah_provinsi">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Provinsi</label>
		<input type="text" class="form-control"  placeholder="Masukkan Nama Provinsi" name="provinsi">
	</div>
	
	<button type="submit" class="btn btn-primary">Tambah</button>
</form>