<div class="row">
	<div class="card col-lg-5 col-md-12 col-sm-12 ">
		<img class="card-img-top" src="{{ asset('assets/images/booth-2.png') }}" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title">Jenis Booth</h5>
			<h6 class="card-subtitle mb-2 text-muted">{{$order->DetailOrder->DetailBooth->JenisBooth->nama}}</h6>
			<h5 class="card-title">Ukuran Booth</h5>
			<h6 class="card-subtitle mb-2 text-muted">{{$order->DetailOrder->DetailBooth->ukuran}}</h6>
			<h5 class="card-title">Warna Booth</h5>
			<h6 class="card-subtitle mb-2 text-muted">{{$order->DetailOrder->warna_booth}}</h6>
		</div>
	</div>
	<div class="card col-lg-7 col-md-12">
		<div class="card-body">
			<table id="detailordertable" class="table nowrap w-100 mb-5">
				<thead>
					<tr>
						<th>Tgl Pembayaran</th>
						<th>Total Bayar</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>