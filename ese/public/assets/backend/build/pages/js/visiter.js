var app = app || {};

app.init = function () {
	$('.textarea').wysihtml5();
	$('[data-mask]').inputmask();
	$(".select2").select2({
    placeholder: "Chọn",
    allowClear: true
	});
	$('input[name="inputBook"]').daterangepicker({
		singleDatePicker: true,
		timePicker: true,
    minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10),
		locale: {
      format: 'DD/MM/YYYY hh:mm A'
    }
	});

	var table_dynamic_visiter = $('.table-dynamic-visiter').DataTable({
		"processing": true,
		"ajax": "/data/visiter.json",
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
			{"data": "datebook"},
			{"data": "school"},
			{"data": "datevisit"},
			{"data": "name"},
			{"data": "phone"},
			{"data": "email"},
			{"data": "active"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [2],
				class: 'text-ellipsis'
			},			
			{
				width: '150px',
				targets: [1, 3, 5, 6, 7],
				class: 'text-center'
			},		
			{
				width: '200px',
				targets: [4, -1],
				// class: 'text-center'
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
					var visited = '';
					if(data.registed) {
						visited = '<a href="customer.html" class="table-action text-blue cursor-pointer" data-id="' + data.id + '"><i' +
						' class="fa fa-info-circle"></i></a>';
					}
					return '<a class="table-action table-action-reply text-blue cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-reply"></i></a>' +
							'<a class="table-action table-action-view text-blue cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-sticky-note"></i></a>' +
							'<a class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>' +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>' + visited;
				}
			}
		]		
	});

	$('#addVisiterForm').validator().on('submit', function (e) {
		$('#addVisiterBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_visiter_msg').removeClass('no-display');
						$('#addVisiterBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addVisiterBtn').button('reset');
		}
	});
	
	$('#editVisiterForm').validator().on('submit', function (e) {
		$('#editVisiterBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_visiter_msg_edit').removeClass('no-display');
						$('#editVisiterBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editVisiterBtn').button('reset');
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

	$(document).on('click', '.table-dynamic-visiter .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-visiter-edit').modal('show');
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
		$('#note-modal').modal('show');		
	});

	$(document).on('click', '.table-action-reply', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-visiter-reply').modal('show');		
	});

	$(document).on('click', '#addVisiter', function (e) {
		e.preventDefault();
		$('#modal-visiter-add').modal('show');		
	});

	$(document).on('click', '#addVisiterBtn', function (e) {
		e.preventDefault();
		$('#addVisiterForm').submit();
	});

	$(document).on('click', '#editVisiterBtn', function (e) {
		e.preventDefault();
		$('#editVisiterForm').submit();
	});
}

$(function() {
	app.init();
});