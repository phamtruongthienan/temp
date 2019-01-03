var app = app || {};

app.init = function () {

	$('.select2').select2({
		placeholder: 'Chọn quyền'
	});
	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
	$.fn.validator.Constructor.INPUT_SELECTOR = ':input:not([type="submit"], button):enabled';

	var table_dynamic_role = $('.table-dynamic-role').DataTable({
		"processing": true,
		"ajax": "/data/role.json",
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
			{"data": "description"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [2],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1, 1],
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

	$('#addRoleForm').validator().on('submit', function (e) {
		$('#addRoleBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_role_msg').removeClass('no-display');
						$('#addRoleBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addRoleBtn').button('reset');
		}
	});
	
	$('#editRoleForm').validator().on('submit', function (e) {
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

	$(document).on('click', '.table-dynamic-role .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-role-edit').modal('show');
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

	$(document).on('click', '#addRole', function (e) {
		e.preventDefault();
		$('#modal-role-add').modal('show');		
	});

	$(document).on('click', '#addRoleBtn', function (e) {
		e.preventDefault();
		$('#addRoleForm').submit();
	});

	$(document).on('click', '#editRoleBtn', function (e) {
		e.preventDefault();
		$('#editRoleForm').submit();
	});

	$(document).on('click', '#SelectAllBtn', function (e) {
		e.preventDefault();
		$(".select-permission > option").prop("selected", "selected");
		$(".select-permission").trigger("change");
	});

	$(document).on('click', '#UnselectAllBtn', function (e) {
		e.preventDefault();
		$(".select-permission").val([]).trigger('change.select2');
	});
	
	$(document).on('click', '#SelectAllBtnEdit', function (e) {
		e.preventDefault();
		$(".select-permission-edit > option").prop("selected", "selected");
		$(".select-permission-edit").trigger("change");
	});

	$(document).on('click', '#UnselectAllBtnEdit', function (e) {
		e.preventDefault();
		$(".select-permission-edit").val(null).trigger("change");
	});
}

$(function() {
	app.init();
});