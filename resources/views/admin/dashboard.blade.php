@extends('layouts.master')

@section('content_header')
<div class="hk-pg-header pg-header-wth-tab pt-7">
					<div class="d-flex">
						<div class="d-flex flex-wrap justify-content-between flex-1">
							<div class="mb-lg-0 mb-2 me-8">
								<h1 class="pg-title">Dashboard</h1>
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
													<span class="badge-status">
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
											<h6>Pesanan Baru
											</h6>
											<!-- <div class="card-action-wrap">
												<button class="btn btn-sm btn-outline-light"><span><span class="icon"><span class="feather-icon"><i data-feather="upload"></i></span></span><span class="btn-text">import</span></span></button>
												<button class="btn btn-sm btn-primary ms-3"><span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><span class="btn-text">Add new</span></span></button>
											</div> -->
										</div>
										<div class="card-body">
											<div class="contact-list-view">
												<table id="datable_1" class="table nowrap w-100 mb-5">
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
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-1.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">Phone Pay</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">phonepay.in</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-blue-dark-3 w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">90%</div>
																	</div>
																</div>
															</td>
															<td>10 June, 2022</td>
															<td>
																<span class="badge badge-soft-secondary  my-1  me-2">admin</span>
																<span class="badge badge-soft-secondary my-1  me-2">Finance</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-2.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">Swiggy</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">swiggy.com</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-blue w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">75%</div>
																	</div>
																</div>
															</td>
															<td>09 July, 2022</td>
															<td>
																<span class="badge badge-soft-secondary my-1  me-2">customer data</span>
																<span class="badge badge-soft-secondary  my-1  me-2">admin</span>
																<span class="badge badge-soft-secondary  my-1  me-2">+4</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-3.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">Coursera</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">coursera.com</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-primary w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">50%</div>
																	</div>
																</div>
															</td>
															<td>24 Aug, 2022</td>
															<td>
																<span class="badge badge-soft-secondary my-1  me-2">education</span>
																<span class="badge badge-soft-secondary  my-1  me-2">admin</span>
																<span class="badge badge-soft-secondary  my-1  me-2">+3</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-4.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">Tinder</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">tinder.com</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-primary-dark-2 w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">60%</div>
																	</div>
																</div>
															</td>
															<td>17 May, 2022</td>
															<td>
																<span class="badge badge-soft-secondary my-1  me-2">Social</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-5.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">PCD</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">pcdeals.com</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-grey w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">30%</div>
																	</div>
																</div>
															</td>
															<td>13 July, 2022</td>
															<td>
																<span class="badge badge-soft-secondary my-1  me-2">Portal</span>
																<span class="badge badge-soft-secondary  my-1  me-2">admin</span>
																<span class="badge badge-soft-secondary  my-1  me-2">+3</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="{{asset('assets/admin/dist/img/logo-avatar-6.png')}}" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em">Icons 8</div> 
																		<div class="fs-7"><a href="#" class="table-link-text link-medium-em">icons8.com</a></div> 
																	</div>
																</div>
															</td>
															<td>
																<div class="progress-lb-wrap">
																	<div class="d-flex align-items-center">
																		<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																			<div class="progress-bar bg-green-dark-1 w-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																		<div class="fs-8 ms-3">45%</div>
																	</div>
																</div>
															</td>
															<td>14 July, 2022</td>
															<td>
																<span class="badge badge-soft-secondary my-1  me-2">Library</span>
																<span class="badge badge-soft-secondary  my-1  me-2">Asset</span>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
																</div>
															</td>
														</tr>
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