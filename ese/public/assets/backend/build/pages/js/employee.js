var app = app || {};

app.init = function () {

	$('.select2').select2();
	$('[data-mask]').inputmask();

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});

	$('#activity-log-modal').on( 'shown.bs.modal', function (e) {
		$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
	});

	var table_dynamic_employee = $('.table-dynamic-employee').DataTable({
		"processing": true,
		"ajax": "/data/employee.json",
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
			{"data": "birthday"},
			{"data": "username"},
			{"data": "phone"},
			{"data": "position"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '150px',
				targets: [3, 4, 5],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0, 2],
				class: 'text-center'
			},
			{
				width: '200px',
				orderable: false,
				targets: [-1],
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
			}
		]		
	});

	var table_dynamic_activity = $('.table-dynamic-activity').DataTable({
		"processing": true,
		"ajax": "/data/activity.json",
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
			{"data": "date"},
			{"data": "activity"},
		],
		'columnDefs': [			
			{
				width: '150px',
				targets: [1, 2],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			}
		]		
	});

	$('#addEmployeeForm').validator().on('submit', function (e) {
		$('#addEmployeeBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_employee_msg').removeClass('no-display');
						$('#addEmployeeBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addEmployeeBtn').button('reset');
		}
	});

	$('#editEmployeeForm').validator().on('submit', function (e) {
		$('#editEmployeeBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_employee_msg_edit').removeClass('no-display');
						$('#editEmployeeBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editEmployeeBtn').button('reset');
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
		$('#modal-employee-edit').modal('show');
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
		$('#activity-log-modal').modal('show');		
	});

	$(document).on('click', '#addEmployee', function (e) {
		e.preventDefault();
		$('#modal-employee-add').modal('show');		
	});

	$(document).on('click', '#addEmployeeBtn', function (e) {
		e.preventDefault();
		$('#addEmployeeForm').submit();
	});

	$(document).on('click', '#editEmployeeBtn', function (e) {
		e.preventDefault();
		$('#editEmployeeForm').submit();
	});
}

$(function() {
	app.init();
});