@extends('layouts.master')

@section('content_header')
<div class="hk-pg-header pg-header-wth-tab pt-7">
	<div class="d-flex">
		<div class="d-flex flex-wrap justify-content-between flex-1">
			<div class="mb-lg-0 mb-2 me-8">
				<h1 class="pg-title text-prim-yellow">Kota</h1>
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
				<div class="col-md-12 mb-md-4 mb-3">
					<div class="card card-border mb-0 h-100">
						<div class="card-body">
							<div class="contact-list-view">
								<table id="kotatable" class="table nowrap w-100 mb-5">
									<thead>
										<tr>
											<th>Provnsi</th>
											<th>Nama</th>
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
