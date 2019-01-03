var app = app || {};

app.init = function () {
	$('.select2').select2();

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});

	var table_dynamic_place = $('.table-dynamic-place').DataTable({
		"processing": true,
		"ajax": "/data/place.json",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
		"columns": [
			{"data": "id"},
			{"data": "city"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				width: '200px',
				targets: [-1],
				orderable: false,
				class: 'text-center',
				render: function (data, type, row, meta) {
					return '<a' +
							' class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>' +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			}
		]
	});

	var table_dynamic_district = $('.table-dynamic-district').DataTable({
		"processing": true,
		"ajax": "/data/place.json",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
		"columns": [
			{"data": "id"},
			{"data": "district"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				width: '200px',
				targets: [-1],
				orderable: false,
				class: 'text-center',
				render: function (data, type, row, meta) {
					return '<a' +
							' class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>' +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			}
		]
	});

	var table_dynamic_ward = $('.table-dynamic-ward').DataTable({
		"processing": true,
		"ajax": "/data/place.json",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
		"columns": [
			{"data": "id"},
			{"data": "district"},
			{"data": "ward"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '300px',
				targets: [2],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				width: '200px',
				targets: [-1],
				orderable: false,
				class: 'text-center',
				render: function (data, type, row, meta) {
					return '<a' +
							' class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>' +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			}
		]
	});

	$('#addPlaceForm').validator().on('submit', function (e) {
		$('#addPlaceBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addPlaceBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addPlaceBtn').button('reset');
		}
	});

	$('#editPlaceForm').validator().on('submit', function (e) {
		$('#editPlaceBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#editPlaceBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editPlaceBtn').button('reset');
		}
	});

	$('#addWardForm').validator().on('submit', function (e) {
		$('#addWardBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addWardBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addWardBtn').button('reset');
		}
	});

	$(document).on('click', '.table-action-delete', function (e) {
		e.preventDefault();
		var row = $(this);
		var table = $(this).parents('table').DataTable();
		$('#confirm-delete-modal').modal({
				backdrop: 'static',
				keyboard: false
		}).one('click', '#confirm-delete', function (e) {
				table.row(row.parents('tr')).remove().draw();
		});
	});

	$(document).on('click', '.table-dynamic-place .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-city-edit').modal('show');
		// $.ajax({
		// 		// url: base_url + "/api/typecheck?id=" + id,
		// 		// type: "get",
		// 		success: function (response) {
		// 				if (response.code == '200') {	
		// 						$('#modal-language-edit #id').val(response.data.id);
		// 						$('#modal-language-edit').modal('show');
		// 				} else {
		// 						$('#error-modal').modal('show');
		// 				}
		// 		},
		// 		error: function (jqXHR, textStatus, errorThrown) {
		// 				$('#error_msg').html('<i class="fas fa-exclamation-triangle"></i> ' + response.msg).show();
		// 		}
		// });
	});

	$(document).on('click', '#addCity', function (e) {
		e.preventDefault();
		$('#modal-city-add').modal('show');		
	});

	$(document).on('click', '#addDistrict', function (e) {
		e.preventDefault();
		$('#modal-district-add').modal('show');		
	});

	$(document).on('click', '#addWard', function (e) {
		e.preventDefault();
		$('#modal-ward-add').modal('show');		
	});

	$(document).on('click', '.table-dynamic-district .table-action-edit', function (e) {
		e.preventDefault();
		$('#modal-district-edit').modal('show');		
	});

	$(document).on('click', '.table-dynamic-ward .table-action-edit', function (e) {
		e.preventDefault();
		$('#modal-ward-edit').modal('show');		
	});

	$(document).on('click', '#addPlaceBtn', function (e) {
		e.preventDefault();
		$('#addPlaceForm').submit();
	});

	$(document).on('click', '#editPlaceBtn', function (e) {
		e.preventDefault();
		$('#editPlaceForm').submit();
	});

	$(document).on('click', '#addWardBtn', function (e) {
		e.preventDefault();
		$('#addWardForm').submit();
	});
}

$(function() {
	app.init();
});