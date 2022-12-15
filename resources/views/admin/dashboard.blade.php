@extends('layouts.master')

@section('content_header')
<div class="hk-pg-header pg-header-wth-tab pt-7">
	<div class="d-flex">
		<div class="d-flex flex-wrap justify-content-between flex-1">
			<div class="mb-lg-0 mb-2 me-8">
				<h1 class="pg-title text-prim-yellow">Dashboard</h1>
			</div>
			<div class="pg-header-action-wrap">
				<div class="input-group w-300p">
					<span class="input-affix-wrapper">
						<span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
						<input class="form-control form-wth-icon" name="datetimes" value="Aug 18,2020 - Aug 19, 2020">
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('body')
<div class="hk-pg-body">
	<div class="tab-content">
		<div class="tab-pane fade show active" id="tab_block_1">
			<div class="row">
				<div class="col-xxl-12 col-lg-12 col-md-12 mb-md-4 mb-3">
					<div class="card card-border mb-0 h-100">
						<div class="card-header card-header-action">
							<h6>Penjualan</h6>
						</div>
						<div class="card-body">
							<div class="text-center">
								<div class="d-inline-block">
									<span class="badge-status mx-1">
										<span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
										<span class="badge-label">Tingkat Penjualan</span>
									</span>

                                    <span class="badge-status mx-1">
										<span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
										<span class="badge-label">Tingkat Penjualan</span>
									</span>

                                    <span class="badge-status mx-1">
										<span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
										<span class="badge-label">Tingkat Penjualan</span>
									</span>
								</div>
							</div>
							<div id="column_chart_2"></div>
							<div class="separator-full mt-5"></div>
							<div class="flex-grow-1 ms-lg-3">
								<div class="row">
									<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
										<span class="d-block fw-medium fs-7">Pesanan Belum Proses</span>
										<div class="d-flex align-items-center">
											<span class="d-block fs-4 fw-medium text-dark mb-0">8.8k</span>
											<span class="badge badge-sm badge-soft-success ms-1">
												<i class="bi bi-arrow-up"></i> 7.5%
											</span>
										</div>
									</div>
									<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
										<span class="d-block fw-medium fs-7">Pesanan Dalam Proses</span>
										<div class="d-flex align-items-center">
											<span class="d-block fs-4 fw-medium text-dark mb-0">18.2k</span>
											<span class="badge badge-sm badge-soft-success ms-1">
												<i class="bi bi-arrow-up"></i> 7.2%
											</span>
										</div>
									</div>
									<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
										<span class="d-block fw-medium fs-7">Dalam Pengiriman</span>
										<div class="d-flex align-items-center">
											<span class="d-block fs-4 fw-medium text-dark mb-0">46.2%</span>
											<span class="badge badge-sm badge-soft-danger ms-1">
												<i class="bi bi-arrow-down"></i> 0.2%
											</span>
										</div>
									</div>
									<div class="col-xxl-3 col-sm-6">
										<span class="d-block fw-medium fs-7">Pesanan Selesai</span>
										<div class="d-flex align-items-center">
											<span class="d-block fs-4 fw-medium text-dark mb-0">4m 24s</span>
											<span class="badge badge-sm badge-soft-success ms-1">
												<i class="bi bi-arrow-up"></i> 10.8%
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mb-md-4 mb-3">
					<div class="card card-border mb-0 h-100">
						<div class="card-header card-header-action">
							<h6>Pesanan

							</h6>
							<!-- <div class="card-action-wrap">
												<button class="btn btn-sm btn-outline-light"><span><span class="icon"><span class="feather-icon"><i data-feather="upload"></i></span></span><span class="btn-text">import</span></span></button>
												<button class="btn btn-sm btn-primary ms-3"><span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><span class="btn-text">Add new</span></span></button>
											</div> -->
						</div>
						<div class="card-body">
							<div class="contact-list-view">
								<table id="penjualantable" class="table nowrap w-100 mb-5">
									<thead>
										<tr>
											<th><span class="form-check fs-6 mb-0">
													<input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
													<label class="form-check-label" for="customCheck1"></label>
												</span></th>
											<th>Nama Customer</th>
											<th class="w-25">Tanggal Pemesanan</th>
											<th>Total Pesanan</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
