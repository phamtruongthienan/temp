var app = app || {};

app.init = function () {	
	$('.textarea').wysihtml5();
	app.changeUrl($('#inputAddName'), $('#inputAddSEO'));
	app.changeUrl($('#inputAddSEO'), $('#inputAddSEO'));
	app.changeUrl($('#inputEditName'), $('#inputEditSEO'));
	app.changeUrl($('#inputEditSEO'), $('#inputEditSEO'));
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
	});

	var table_dynamic_news = $('.table-dynamic-news').DataTable({
		"processing": true,
		"ajax": "/data/news.json",
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
			{"data": "layout"},
			{"data": "active"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1, 2]
			},
			{
				width: '100px',
				targets: [0, -2],
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

	$('#addNewsForm').validator().on('submit', function (e) {
		$('#addNewsBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addNewsBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addNewsBtn').button('reset');
		}
	});
	
	$('#editNewsForm').validator().on('submit', function (e) {
		$('#editNewsBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg_edit').removeClass('no-display');
						$('#editNewsBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editNewsBtn').button('reset');
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
		$('#modal-news-edit').modal('show');
		// $.ajax({
		// 		// url: base_url + "/api/typecheck?id=" + id,
		// 		// type: "get",
		// 		success: function (response) {
		// 				if (response.code == '200') {	
		// 						$('#modal-news-edit #id').val(response.data.id);
		// 						$('#modal-news-edit').modal('show');
		// 				} else {
		// 						$('#error-modal').modal('show');
		// 				}
		// 		},
		// 		error: function (jqXHR, textStatus, errorThrown) {
		// 				$('#error_msg').html('<i class="fas fa-exclamation-triangle"></i> ' + response.msg).show();
		// 		}
		// });
	});

	$(document).on('click', '#addNews', function (e) {
		e.preventDefault();
		$('#modal-news-add').modal('show');		
	});

	$(document).on('click', '#addNewsBtn', function (e) {
		e.preventDefault();
		$('#addNewsForm').submit();
	});

	$(document).on('click', '#editNewsBtn', function (e) {
		e.preventDefault();
		$('#editNewsForm').submit();
	});
}

app.xoa_dau = function (str) {
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/đ/g, "d");
	return str;
}

app.string_to_slug = function (str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
	str = str.toLowerCase();  
	str = app.xoa_dau(str);// remove accents, swap ñ for n, etc
  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}

app.changeUrl = function (elementConvert, elementValue) {	
	elementConvert.keyup(function() {
		var val = $(this).val();
		var url = app.string_to_slug(val);
		elementValue.val(url);
	});
}

$(function() {
	app.init();
});