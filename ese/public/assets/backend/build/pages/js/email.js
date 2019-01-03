var app = app || {};

app.init = function () {
	$('.select2').select2();
	if ($('input[type="radio"], input[type="checkbox"]').length > 0) {
		$('input[type="radio"], input[type="checkbox"]').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		});
	}
	$('[data-mask]').inputmask();
	$('.textarea').wysihtml5();	

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
		
	var table_dynamic_account = $('.table-dynamic-account').DataTable({
		"processing": true,
		"ajax": "/data/account.json",
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
			{"data": "smtp"},
			{"data": "port"},
			{"data": "username"},
			{"data": "password"},
			{"data": "protocal"},
			{"data": "sender"},
			{"data": "default"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '150px',
				targets: [3, 4, 5, 6],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0, 2, -2],
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
			},
			{
				targets: [-2],
				render: function (data, type, row, meta) {
					if (data == 1) {
							return '<i class="fas fa-check-circle text-green"></i>';
					} else {
							return '';
					}
				}
			}
		]
	});

	var table_dynamic_email = $('.table-dynamic-email').DataTable({
		"processing": true,
		"ajax": "/data/email.json",
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
			{"data": "title"},
			{"data": "body"},
			{"data": "date"},
			{"data": "status"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '150px',
				targets: [3, 4],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				width: '300px',
				targets: [2]
			},
			{
				width: '200px',
				targets: [-1],
				orderable: false,
				class: 'text-center',
				render: function (data, type, row, meta) {
					return ' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			}
		]
	});

	$('#addAccountForm').validator().on('submit', function (e) {
		$('#addAccountBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addAccountBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addAccountBtn').button('reset');
		}
	});

	$('#editAccountForm').validator().on('submit', function (e) {
		$('#editAccountBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#editAccountBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editAccountBtn').button('reset');
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

	$(document).on('click', '.table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-account-edit').modal('show');
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

	$(document).on('click', '#addAccount', function (e) {
		e.preventDefault();
		$('#modal-account-add').modal('show');		
	});

	$(document).on('click', '#addAccountBtn', function (e) {
		e.preventDefault();
		$('#addAccountForm').submit();
	});

	$(document).on('click', '#editAccountBtn', function (e) {
		e.preventDefault();
		$('#editAccountForm').submit();
	});

	$(document).on('click', '#SelectAllBtn', function (e) {
		e.preventDefault();
		$(".select-email > option").prop("selected", "selected");
		$(".select-email").trigger("change");
	});

	$(document).on('click', '#UnselectAllBtn', function (e) {
		e.preventDefault();
		$(".select-email").val(null).trigger("change");
	});
}

$(function() {
	app.init();
});