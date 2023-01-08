@extends('layouts.master')

@section('content_header')
<div class="hk-pg-header pg-header-wth-tab pt-7">
	<div class="d-flex">
		<div class="d-flex flex-wrap justify-content-between flex-1">
			<div class="mb-lg-0 mb-2 me-8">
				<h1 class="pg-title text-prim-yellow">Provinsi</h1>
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
							<button type="button" class="btn btn-outline-success btn-sm" id="tambah-modal-provinsi"><i class="fas fa-plus"></i> Tambah</button>
							<div class="contact-list-view">
								<table id="provinsitable" class="table nowrap w-100 mb-5">
									<thead>
										<tr>
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
<div class="modal fade" id="modal-form"  role="dialog" aria-labelledby="modal-kota" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="modal-body">
			</div>
		</div>
	</div>
</div>
@section('custom_js')

<script>
	$(document).on('click', '#tambah-modal-provinsi', function(event) {
    event.preventDefault();
	$.ajax({
            url: "{{ route('master.provinsi.tambah') }}",
         
            // return the result
            success: function(result) {
                $('#modal-form').modal("show");
                $('#modal-title').text("Tambah Provinsi");
                $('#modal-body').html(result).show();
				$(".select2").select2({
   					 dropdownParent: $("#modal-form")
 				 });
            },
        })

});
	$(document).on('click', '#edit-modal-provinsi', function(event) {
    event.preventDefault();
	var data_id = $(this).attr('data-id');

	$.ajax({
            url: "/api/master/provinsi/edit/" + data_id,
         
            // return the result
            success: function(result) {
                $('#modal-form').modal("show");
                $('#modal-title').text("Edit Provinsi");
                $('#modal-body').html(result).show();
				$(".select2").select2({
   					 dropdownParent: $("#modal-form")
 				 });
            },
        })

});


$(document).on('submit', '#formtambah_provinsi', function(event) {
            event.preventDefault();
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: 'POST',
                data: $('#formtambah_provinsi').serialize(),
                success: function(result) {
                    if (result.data == "success") {
                        Swal.fire({
                            title: 'Berhasil',
                            text: result.msg,
                            icon: 'success',
                        });
                        window.location.reload();
                    } else {
                        Swal.fire({
                            title: 'Gagal',
                            text: result.msg,
                            icon: 'error',
                        });
                    }
                }
            });
        })


		$(document).on('submit', '#formedit_provinsi', function(event) {
            event.preventDefault();
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: 'POST',
                data: $('#formedit_provinsi').serialize(),
                success: function(result) {
                    if (result.data == "success") {
                        Swal.fire({
                            title: 'Berhasil',
                            text: result.msg,
                            icon: 'success',
                        });
                        window.location.reload();
                    } else {
                        Swal.fire({
                            title: 'Gagal',
                            text: result.msg,
                            icon: 'error',
                        });
                    }
                }
            });
        })

		$(document).on('click', '#hapus_provinsi', function() {
        var id = $(this).attr('data-id');
        Swal.fire({
            title: 'Hapus',
            text: "Yakin, untuk menghapus data ini ?" ,
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Iya',

        }).then(function(isConfirm) {
      if (isConfirm) {
    $.ajax({
                    url: '{{route('master.provinsi.delete')}}',
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "_method": "DELETE",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        if (result.info == "success") {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Data berhasil di hapus',
                                icon: 'success',
                            });
                            window.location.reload();
                        } else {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Data gagal di hapus',
                                icon: 'error',
                            });
                        }
                    }
                });
      } 
    })
    })
	</script>
	@stop
@endsection
