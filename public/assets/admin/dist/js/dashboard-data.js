/*Dashboard Init*/
"use strict";
/*DataTable Init*/

$(function(){
	if ($("#penjualantable").length > 0) {
		function no_kolom(table){
			table.on('order.dt search.dt', function() {
				table.column(0, {
					search: 'applied',
					order: 'applied'
				}).nodes().each(function(cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();
		}
		var penjualantable = $('#penjualantable').DataTable({
				destroy: true,
				processing: true,
				serverSide: true,
				ajax: {
					'type': 'GET',
					'datatype': 'JSON',
					'url': '/api/penjualan/data',
					'headers': {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				},
				columns: [{
						data: 'customer_nama',
						className: 'nowrap-text align-center',
					},
					{
						data: 'tgl_order',
						className: 'nowrap-text align-center',
					},
					{
						data: 'total_harga',
						className: 'nowrap-text align-center',
					},
					{
						data: null,
						className: 'nowrap-text align-center',
						render: function(data, type, row) {
							if(row.status == "Diproses"){
								return `<span class="badge badge-sm badge-soft-danger ms-1">
								`+row.status+`
							</span> `;
							} else if(row.status == "Diterima"){
								return `<span class="badge badge-sm badge-soft-warning ms-1">
								`+row.status+`
							</span> `;
							} else if(row.status == "Dikirim"){
								return `<span class="badge badge-sm badge-soft-primary ms-1">
								`+row.status+`
							</span> `;
							}
							else if(row.status == "Selesai"){
								return `<span class="badge badge-sm badge-soft-success ms-1">
								`+row.status+`
							</span> `;
							}
						}
					},
					{
						data: null,
						className: 'nowrap-text align-center',
						render: function(data, type, row) {
							var data = '';
							data += `<a data-toggle="detailmodal" data-target="#detailmodal" class="detailmodal" id="detailmodal"><button type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Detail</button></a>`;
							return data;
						}
					}
				],
			"dom": '<"row"<"col-7 mb-3"<"contact-toolbar-left">><"col-5 mb-3"<"contact-toolbar-right"f>>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"ordering": true,
			"columnDefs": [ {
				"searchable": false,
				"orderable": false,
				"targets": [0,3,4]
			} ],
			"order": [1, 'asc' ],
			language: { search: "",
				searchPlaceholder: "Search",
				"info": "_START_ - _END_ of _TOTAL_",
				sLengthMenu: "View  _MENU_",
				paginate: {
				  next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
				  previous: '<i class="ri-arrow-left-s-line"></i>' // or '←'
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple pagination-sm');
			}
		});
	
		// no_kolom(penjualantable);
		// $(document).on( 'click', '.del-button', function () {
		// 	targetDt.rows('.selected').remove().draw( false );
		// 	return false;
		// });
	}
	
	var chart1 = new ApexCharts(document.querySelector("#column_chart_2"), {
		series: [{
			name: 'Display',
			data: [0]
		}, {
			name: 'Outdoor',
			data: [0]
		}, {
			name: 'Portable',
			data: [0]
		}],
		chart: {
			type: 'bar',
			height: 250,
			stacked: true,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
		},
	
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '35%',
				borderRadius: 5,
	
			},
		},
		xaxis: {
			type: 'datetime',
			categories: ['2022-12-16'],
		},
		legend: {
			show:false
		},
		colors: ['#7D5E3F', '#F03861', '#F5D97E'],
		fill: {
			opacity: 1
		},
		dataLabels: {
			enabled: false,
		}
	});
	chart1.render();

	$('#tgl-chart').daterangepicker({
		"cancelClass": "btn-secondary",
	}, function(start, end, label) {
		$.ajax({
			type: "GET",
			url: '/api/penjualan/data_tanggal',
			data:{tgl_min: start.format('YYYY-MM-DD'), tgl_max: end.format('YYYY-MM-DD')},
			dataType: 'json',
			success: function(data) {
				chart1.updateOptions(
					{
						series: [{
							name: 'Display',
							data: data['display']
						}, {
							name: 'Outdoor',
							data: data['outdoor']
						}, {
							name: 'Portable',
							data: data['portable']
						}],
						xaxis: {
							categories: data['tgl_order'],
						}
					  }
				);
			},
			error: function() {
				alert('Error occured');
			}
		});
		
	});

	function status(){
		$.ajax({
			type: "GET",
			url: '/api/penjualan/data_status',
			dataType: 'json',
			success: function(data) {
				console.log(data)
				$('#proses').html(data['Diproses']);
				$('#terima').html(data['Diterima']);
				$('#kirim').html(data['Dikirim']);
				$('#selesai').html(data['Selesai']);
			},
			error: function() {
				alert('Error occured');
			}
		});
	}
	
	status();

	if ($("#customertable").length > 0) {
		var customertable = $('#customertable').DataTable({
				columns: [{
						data: 'nama_depan',
						className: 'nowrap-text align-center',
					},
					{
						data: 'nama_belakang',
						className: 'nowrap-text align-center',
					},
					{
						data: 'username',
						className: 'nowrap-text align-center',
					},
					{
						data: 'email',
						className: 'nowrap-text align-center',
					},
					{
						data: 'no_telp',
						className: 'nowrap-text align-center',
					},
					{
						data: null,
						className: 'nowrap-text align-center',
						render: function(data, type, row) {
							var data = '';
							data += `<a data-toggle="detailmodal" data-target="#detailmodal" class="detailmodal" id="detailmodal"><button type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Detail</button></a>`;
							return data;
						}
					}
				],
			"dom": '<"row"<"col-7 mb-3"<"contact-toolbar-left">><"col-5 mb-3"<"contact-toolbar-right"f>>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"ordering": true,
			"columnDefs": [ {
				"searchable": false,
				"orderable": false,
				"targets": [0]
			} ],
			"order": [0, 'asc' ],
			language: { search: "",
				searchPlaceholder: "Search",
				"info": "_START_ - _END_ of _TOTAL_",
				sLengthMenu: "View  _MENU_",
				paginate: {
				  next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
				  previous: '<i class="ri-arrow-left-s-line"></i>' // or '←'
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple pagination-sm');
			}
		});

		$.ajax({
			url: '/api/master/customer',
			dataType: 'json',
			success: function (json) {
				customertable.rows.add(json.data).draw();
		  
			}
		});

	
		// no_kolom(penjualantable);
		// $(document).on( 'click', '.del-button', function () {
		// 	targetDt.rows('.selected').remove().draw( false );
		// 	return false;
		// });
	}

	if ($("#kotatable").length > 0) {
		var kotatable = $('#kotatable').DataTable({
				columns: [{
						data: 'provinsi',
						className: 'nowrap-text align-center',
					},
					{
						data: 'nama',
						className: 'nowrap-text align-center',
					},
					{
						data: null,
						className: 'nowrap-text align-center',
						render: function(data, type, row) {
							var data = '';
							data += `<a data-toggle="detailmodal" data-target="#detailmodal" class="detailmodal" id="detailmodal"><button type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Detail</button></a>`;
							return data;
						}
					}
				],
			"dom": '<"row"<"col-7 mb-3"<"contact-toolbar-left">><"col-5 mb-3"<"contact-toolbar-right"f>>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"ordering": true,
			"columnDefs": [ {
				"searchable": false,
				"orderable": false,
				"targets": [0]
			} ],
			"order": [0, 'asc' ],
			language: { search: "",
				searchPlaceholder: "Search",
				"info": "_START_ - _END_ of _TOTAL_",
				sLengthMenu: "View  _MENU_",
				paginate: {
				  next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
				  previous: '<i class="ri-arrow-left-s-line"></i>' // or '←'
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple pagination-sm');
			}
		});
	
		$.ajax({
			url: '/api/master/kota',
			dataType: 'json',
			success: function (json) {
				kotatable.rows.add(json.data).draw();
		  
			}
		});

		// no_kolom(penjualantable);
		// $(document).on( 'click', '.del-button', function () {
		// 	targetDt.rows('.selected').remove().draw( false );
		// 	return false;
		// });
	}

	if ($("#provinsitable").length > 0) {
		var provinsitable = $('#provinsitable').DataTable({
			columns: [
				{ data: "nama" },
				{
									data: null,
									className: 'nowrap-text align-center',
									render: function(data, type, row) {
										var data = '';
										data += `<a data-toggle="detailmodal" data-target="#detailmodal" class="detailmodal" id="detailmodal"><button type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Detail</button></a>`;
										return data;
									}
								}
				
			],
			
					"dom": '<"row"<"col-7 mb-3"<"contact-toolbar-left">><"col-5 mb-3"<"contact-toolbar-right"f>>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"ordering": true,
			"columnDefs": [ {
				"searchable": true,
				"orderable": false,
				"targets": [0]
			} ],
			"order": [0, 'asc' ],
			language: { search: "",
				searchPlaceholder: "Search",
				"info": "_START_ - _END_ of _TOTAL_",
				sLengthMenu: "View  _MENU_",
				paginate: {
				  next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
				  previous: '<i class="ri-arrow-left-s-line"></i>' // or '←'
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple pagination-sm');
			}
		});
		$.ajax({
			url: '/api/master/provinsi',
			dataType: 'json',
			success: function (json) {
				provinsitable.rows.add(json.data).draw();
		  
			}
		});
	
		// no_kolom(penjualantable);
		// $(document).on( 'click', '.del-button', function () {
		// 	targetDt.rows('.selected').remove().draw( false );
		// 	return false;
		// });
	}
})
	if ($("#boothtable").length > 0) {
		var boothtable = $('#boothtable').DataTable({
			columns: [
				{ data: "jenis" },
				{ data: "ukuran" },
				{ data: "harga" },
				{
									data: null,
									className: 'nowrap-text align-center',
									render: function(data, type, row) {
										var data = '';
										data += `<a data-toggle="detailmodal" data-target="#detailmodal" class="detailmodal" id="detailmodal"><button type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Detail</button></a>`;
										return data;
									}
								}
				
			],
			
					"dom": '<"row"<"col-7 mb-3"<"contact-toolbar-left">><"col-5 mb-3"<"contact-toolbar-right"f>>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			"ordering": true,
			"columnDefs": [ {
				"searchable": true,
				"orderable": false,
				"targets": [0]
			} ],
			"order": [0, 'asc' ],
			language: { search: "",
				searchPlaceholder: "Search",
				"info": "_START_ - _END_ of _TOTAL_",
				sLengthMenu: "View  _MENU_",
				paginate: {
				  next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
				  previous: '<i class="ri-arrow-left-s-line"></i>' // or '←'
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple pagination-sm');
			}
		});
		$.ajax({
			url: '/api/master/booth',
			dataType: 'json',
			success: function (json) {
				boothtable.rows.add(json.data).draw();
		  
			}
		});
	
		// no_kolom(penjualantable);
		// $(document).on( 'click', '.del-button', function () {
		// 	targetDt.rows('.selected').remove().draw( false );
		// 	return false;
		// });
	}



// /*Apex Column Chart*/
// window.Apex = {
// 	chart: {
// 		foreColor: "#646A71",
// 		fontFamily: 'DM Sans',
// 		toolbar: {
// 			tools: {
// 				download: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>',
// 				selection: '<img src="/static/icons/reset.png" width="20">',
// 				zoom: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>',
// 				zoomin: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>',
// 				zoomout: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>',
// 				pan: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>',
// 				reset: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
// 			}
// 		}
// 	},
// 	grid: {
// 		borderColor: '#F4F5F6',
// 	},
// 	xaxis: {
// 		labels: {
// 			style: {
// 				fontSize: '12px',
// 				fontFamily: 'inherit',
// 			},
// 		},
// 		axisBorder: {
// 			show: false,
// 		},
// 		title: {
// 			style: {
// 				fontSize: '12px',
// 				fontFamily: 'inherit',
// 			}
// 		}
// 	},
// 	yaxis: {
// 		labels: {
// 			style: {
// 				fontSize: '12px',
// 				fontFamily: 'inherit',
// 			},
// 		},
// 		title: {
// 			style: {
// 				fontSize: '12px',
// 				fontFamily: 'inherit',
// 			}
// 		},
// 	},
// };
/*Stacked Column*/

