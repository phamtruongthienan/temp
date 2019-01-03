var app = app || {};

app.init = function () {

	$('[data-mask]').inputmask();

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});

	$('#list-child-modal').on( 'shown.bs.modal', function (e) {
		$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
	});

	$('#modal-customer-add, #modal-customer-edit, #modal-child-edit').on( 'show.bs.modal', function (e) {
		if ($('input[type="radio"]').length > 0) {
			$('input[type="radio"]').iCheck({
					radioClass: 'iradio_minimal-blue'
			});
		}
	});

	var table_dynamic_customer = $('.table-dynamic-customer').DataTable({
		"processing": true,
		"ajax": "/data/customer.json",
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
			{"data": "name"},
			{"data": "phone"},
			{"data": "email"},
			{"data": "loginby"},
			{"data": "active"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '150px',
				targets: [2, 3, 5],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0, 4],
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
							' class="fa fa-trash"></i></a>' +
							' <a class="table-action text-aqua table-action-view cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-eye"></i></a>';
				}
			},
			{
				targets: [5],
				render: function (data, type, row, meta) {
					if (data == 1) {
							return '<i class="fas fa-check-circle text-green"></i>';
					} else {
							return '';
					}
				}
			},
			{
				targets: [4],
				render: function (data, type, row, meta) {
					switch (data)
					{
						case "1":
						{
							return '<i class="table-action fab fa-google-plus text-red"></i>';
							break;
						}
						case "2":
						{
							return '<i class="table-action fab fa-facebook-square text-blue"></i>';
							break;
						}
						default:
						{
							return '';
						}
					}
				}
			}
		]		
	});

	var table_dynamic_child = $('.table-dynamic-child').DataTable({
		"processing": true,
		"ajax": "/data/child.json",
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
			{"data": "name"},
			{"data": "sex"},
			{"data": "old"},
			{"data": "status"},
			{"data": "desire"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},			
			{
				width: '150px',
				targets: [2, 3],
				class: 'text-center'
			},		
			{
				width: '200px',
				targets: [4, -1],
				class: 'text-center'
			},		
			{
				width: '300px',
				targets: [-2],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				targets: [-1],
				orderable: false,
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

	$('#addCustomerForm').validator().on('submit', function (e) {
		$('#addCustomerBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_customer_msg').removeClass('no-display');
						$('#addCustomerBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addCustomerBtn').button('reset');
		}
	});
	
	$('#editCustomerForm').validator().on('submit', function (e) {
		$('#editCustomerBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_customer_msg_edit').removeClass('no-display');
						$('#editCustomerBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editCustomerBtn').button('reset');
		}
	});

	$('#editChildForm').validator().on('submit', function (e) {
		$('#editChildBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_child_msg_edit').removeClass('no-display');
						$('#editChildBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editChildBtn').button('reset');
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

	$(document).on('click', '.table-dynamic-customer .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-customer-edit').modal('show');
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

	$(document).on('click', '.table-dynamic-child .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-child-edit').modal('show');
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

	$(document).on('click', '.table-action-view', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#list-child-modal').modal('show');		
	});

	$(document).on('click', '#addCustomer', function (e) {
		e.preventDefault();
		$('#modal-customer-add').modal('show');		
	});

	$(document).on('click', '#addCustomerBtn', function (e) {
		e.preventDefault();
		$('#addCustomerForm').submit();
	});

	$(document).on('click', '#editCustomerBtn', function (e) {
		e.preventDefault();
		$('#editCustomerForm').submit();
	});

	$(document).on('click', '#editChildBtn', function (e) {
		e.preventDefault();
		$('#editChildForm').submit();
	});
}

$(function() {
	app.init();
});