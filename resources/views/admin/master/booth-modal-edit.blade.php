
<form action="{{route('master.booth.update',['id' => $data->id])}}" method="POST" id="formedit_booth">
	@csrf
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Jenis Booth</label>
		<select class="form-control select2" name="jenis">
			@foreach($booth as $p)
			<option value="{{$p->id}}"  @if ($p->id == $data->jenis_booth_id) selected @endif>{{$p->nama}}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormEmail1">Ukuran Booth</label>
		<div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="Panjang" aria-label="Panjang" name="panjang" value="{{$panjang}}">
			<span class="input-group-text">X</span>
			<input type="number" class="form-control" placeholder="Lebar" aria-label="Lebar" name="lebar" value="{{$lebar}}">
			<span class="input-group-text">X</span>
			<input type="number" class="form-control" placeholder="Tinggi" aria-label="Tinggi" name="tinggi" value="{{$tinggi}}">
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label" for="exampleDropdownFormPassword1">Harga</label>
		<input type="text" class="form-control"  placeholder="Masukkan Harga" name="harga" value="{{$data->harga}}">
	</div>
	
	<button type="submit" class="btn btn-primary">Ubah</button>
</form>