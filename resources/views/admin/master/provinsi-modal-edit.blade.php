
<form action="{{route('master.provinsi.update',['id' => $data->id])}}" method="POST" id="formedit_provinsi">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Provinsi</label>
		<input type="text" class="form-control"  placeholder="Masukkan Nama Provinsi" name="provinsi" value="{{$data->nama}}">
	</div>
	
	<button type="submit" class="btn btn-primary">Ubah</button>
</form>