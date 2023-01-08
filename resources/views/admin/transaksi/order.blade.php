@extends('layouts.master')

@section('content_header')
<div class="hk-pg-header pg-header-wth-tab pt-7">
	<div class="d-flex">
		<div class="d-flex flex-wrap justify-content-between flex-1">
			<div class="mb-lg-0 mb-2 me-8">
				<h1 class="pg-title text-prim-yellow">Order</h1>
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
								<table id="ordertable" class="table nowrap w-100 mb-5">
									<thead>
										<tr>
											<th>No Order</th>
											<th>Tgl Order</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Kota</th>
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
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-body">
			
			</div>
		</div>
	</div>
</div>
@section('custom_js')

<script>
	$(document).on('click', '#detail-modal-order', function(event) {
    event.preventDefault();
	var data_id = $(this).attr('data-id');
	var data_inv = $(this).attr('data-inv');
	
	$.ajax({
		url: "/api/transaksi/order/detail/" + data_id,
         
            // return the result
            success: function(result) {
				$('#modal-form').modal("show");
				$('#modal-title').text("Detail Order : " + data_inv);
                $('#modal-body').html(result).show();
				// $(".select2").select2({
   				// 	 dropdownParent: $("#modal-form")
 				//  });
            },
        })
});
	</script>
	@stop
@endsection
