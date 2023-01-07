
<form action="{{route('master.kota.update',['id' => $data->id])}}" method="POST" id="formedit_kota">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Provinsi</label>
		<select class="form-control select2" name="provinsi">
			@foreach($provinsi as $p)
			<option value="{{$p->id}}" @if ($p->id == $data->provinsi_id) selected @endif>{{$p->nama}}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Nama Kota</label>
		<input type="text" class="form-control"  placeholder="Masukkan Nama Kota" name="kota" value="{{$data->nama}}">
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormPassword1">Ongkir</label>
		<input type="text" class="form-control"  placeholder="Masukkan Ongkos Kirim" name="ongkir" value="{{$data->biaya_kirim}}">
	</div>
	
	<button type="submit" class="btn btn-primary">Ubah</button>
</form>