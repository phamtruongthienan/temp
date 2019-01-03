var app = app || {};

app.init = function () {
	changeImage('#logoImage', 'input[id="logoFile"]');
	$('[data-mask]').inputmask();	
	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    	$.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
	$('.single-select2').select2({
    	placeholder: "Chọn"
	});	

	$('#modal-partner-add, #modal-partner-edit').on( 'show.bs.modal', function (e) {
		if ($('input[type="checkbox"]').length > 0) {
			$('input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue'
			});
		}
	});

	var table_dynamic_partner = $('.table-dynamic-partner').DataTable({
		"processing": true,
        "serverSide": true,
		"ajax": base_admin+"/ajax/client",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
        'order': [[0, 'desc']],
		"columns": [
			{"data": "id"},
			{"data": "name"},
			{"data": "address"},
			{"data": "email"},
			{"data": "phone"},
			{"data": "status"},
			{"data": "email"},
			{"data": "action"}
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
				targets: [0],
				class: 'text-center'
			},
			{
				width: '300px',
				targets: [2],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1],
				class: 'text-center'
			},
			// {
			// 	targets: 6,
			// 	render: function (data, type, row, meta) {
			// 		if (type === 'display') {
			// 			var $span = $('<span></span>');
			// 			if (meta.row > 0) {
			// 				$('<a data-id="'+data.id+'" data-id2="'+(data.sort - 1)+'" class="upBtn table-action text-primary cursor-pointer"><i class="fas fa-caret-square-up"></i></a>').appendTo($span);
			// 			}
			// 			$('<a data-id="'+data.id+'" data-id2="'+(data.sort + 1)+'" class="downBtn table-action text-primary cursor-pointer"><i class="fas fa-caret-square-down"></i></a>').appendTo($span);
			// 			return $span.html();
			// 		}
			// 		return data;
			// 	}
			// }
		],
		// 'drawCallback': function(){
		// 	$('.table-dynamic-partner tr:last .downBtn').remove();
		// 	$('.upBtn').unbind('click');
		// 	$('.downBtn').unbind('click');
		// 	$('.upBtn').on('click', function(){
		// 		moveUp($(this));
		// 	});
		// 	$('.downBtn').on('click', function(){
		// 		moveDown($(this));
		// 	});
		// }
	});

	$('#addPartnerForm').validator().on('submit', function (e) {
		$('#addPartnerBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addPartnerBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addPartnerBtn').button('reset');
		}
	});

	$('#editPartnerForm').validator().on('submit', function (e) {
		$('#editPartnerBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg_edit').removeClass('no-display');
						$('#editPartnerBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editPartnerBtn').button('reset');
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

	$(document).on('click', '.table-dynamic-partner .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-partner-edit').modal('show');
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

	$(document).on('click', '#addPartner', function (e) {
		e.preventDefault();
		$('#modal-partner-add').modal('show');		
	});

	$(document).on('click', '#addPartnerBtn', function (e) {
		e.preventDefault();
		$('#addPartnerForm').submit();
	});

	$(document).on('click', '#editPartnerBtn', function (e) {
		e.preventDefault();
		$('#editPartnerForm').submit();
	});

	function moveUp(element) {
		var fid = element.data('id');
		var tid = element.data('id2');
		var tr = element.parents('tr'); 
		$.ajax({
				// url: base_url + "/v1/departments/init?up=1&id=" + fid + '&tid='+tid,
				// type: "post",
				success: function (response) {
						moveRow(tr, 'up');
						// table_dynamic_partner.ajax.reload(null, false);
				},
				error: function (jqXHR, textStatus, errorThrown) {
						$('#error_msg').html('<i class="fas fa-exclamation-triangle"></i> ' + response.msg).show();
				}
		});
	}

	function moveDown(element) {
		var fid = element.data('id');
		var tid = element.data('id2');
		var tr = element.parents('tr');
		$.ajax({
				// url: base_url + "/v1/departments/init?down=1&id=" + fid + '&tid='+tid,
				// type: "post",
				success: function (response) {
						moveRow(tr, 'down');
						// table_dynamic_partner.ajax.reload(null, false);
				},
				error: function (jqXHR, textStatus, errorThrown) {
						$('#error_msg').html('<i class="fas fa-exclamation-triangle"></i> ' + response.msg).show();
				}
		});
	}
	
	function moveRow(row, direction) {
		var index = table_dynamic_partner.row(row).index();
	
		var order = -1;
		if (direction === 'down') {
			order = 1;
		}
	
		var data1 = table_dynamic_partner.row(index).data();
		data1.sort += order;
	
		var data2 = table_dynamic_partner.row(index + order).data();
		data2.sort += -order;
	
		table_dynamic_partner.row(index).data(data2);
		table_dynamic_partner.row(index + order).data(data1);
	
		table_dynamic_partner.draw(false);
	}
}

app.clearForm = function (action) {
    $('#modal-advertise #action').val(action);
    $('#modal-advertise #id').val('');
    $('#modal-advertise #type').val(1).trigger("change");
    $('#modal-advertise #content').summernote('code', '');
    $('#modal-advertise #logoImage').attr('src', base_url+'/assets/backend/img/no_image.png')
    $('#modal-advertise #image_hash').val('');
    $('#modal-advertise #position').val(null).trigger("change");
    $('#modal-advertise #target').val(null).trigger("change");
    $('#modal-advertise #link').val('');
    $('#modal-advertise #start_date').val('');
    $('#modal-advertise #end_date').val('');
    $('#modal-advertise #status').iCheck('uncheck');
}

$(function() {
	app.init();
});