var app = app || {};

app.init = function () {
	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
	$('.modal').on( 'show.bs.modal', function (e) {
		if ($('input[type="radio"], input[type="checkbox"]').length > 0) {
			$('input[type="radio"], input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});
		}		
		$('.select2').select2();
		$('#modal-menu-add input[type="radio"]:first').iCheck('check');
		$('#modal-menu-edit input[type="radio"]:first').iCheck('check');
		$('#ckbSelect, #ckbEditSelect').hide();
		app.toggleElement($('input[type="radio"]#inputLink'), $('#ckbLink'), $('#ckbSelect'), $("#addMenuForm"));
		app.toggleElement($('input[type="radio"]#inputEditLink'),  $('#ckbEditLink'), $('#ckbEditSelect'), $("#editMenuForm"));		
		app.toggleElement($('input[type="radio"]#inputSelect'), $('#ckbSelect'), $('#ckbLink'), $("#addMenuForm"));
		app.toggleElement($('input[type="radio"]#inputEditSelect'), $('#ckbEditSelect'), $('#ckbEditLink'), $("#editMenuForm"));	
	});

	var table_dynamic_menu = $('.table-dynamic-menu').DataTable({
		"processing": true,
		"ajax": "/data/menu.json",
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
			{"data": "position"},
			{"data": "url"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1, 2, 3]
			},
			{
				width: '100px',
				targets: [0],
				class: 'text-center'
			},
			{
				targets: [-1],
				class: 'text-center',
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

	$('#addMenuForm').validator().on('submit', function (e) {
		$('#addMenuBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addMenuBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addMenuBtn').button('reset');
		}
	});
	
	$('#editMenuForm').validator().on('submit', function (e) {
		$('#editMenuBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg_edit').removeClass('no-display');
						$('#editMenuBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editMenuBtn').button('reset');
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
		$('#modal-menu-edit').modal('show');
		// $.ajax({
		// 		// url: base_url + "/api/typecheck?id=" + id,
		// 		// type: "get",
		// 		success: function (response) {
		// 				if (response.code == '200') {	
		// 						$('#modal-menu-edit #id').val(response.data.id);
		// 						$('#modal-menu-edit').modal('show');
		// 				} else {
		// 						$('#error-modal').modal('show');
		// 				}
		// 		},
		// 		error: function (jqXHR, textStatus, errorThrown) {
		// 				$('#error_msg').html('<i class="fas fa-exclamation-triangle"></i> ' + response.msg).show();
		// 		}
		// });
	});

	$(document).on('click', '#addMenu', function (e) {
		e.preventDefault();
		$('#modal-menu-add').modal('show');		
	});

	$(document).on('click', '#addMenuBtn', function (e) {
		e.preventDefault();
		$('#addMenuForm').submit();
	});

	$(document).on('click', '#editMenuBtn', function (e) {
		e.preventDefault();
		$('#editMenuForm').submit();
	});
}

app.toggleElement = function (input, contentOne, contentTwo, form) {
	input.on('ifChecked', function() {
		contentOne.show();	
		contentTwo.hide();	
		contentTwo.children(":first").prop('required',false);
		form.validator('validate');
		contentOne.children(":first").prop('required',true);	
		form.validator('update'); 		
	});
}

$(function() {
	app.init();
});