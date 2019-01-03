var app = app || {};

app.init = function () {
	app.changeUrl($('#inputAddName'), $('#inputAddSEO'));
	app.changeUrl($('#inputAddSEO'), $('#inputAddSEO'));
	app.changeUrl($('#inputEditName'), $('#inputEditSEO'));
	app.changeUrl($('#inputEditSEO'), $('#inputEditSEO'));
	changeImage('#logoImage', 'input[id="logoFile"]');
	changeImage('#logoEditImage', 'input[id="logoEditFile"]');
	$('#schoolDetail, #addSchoolBtn, #editschoolDetail, #editSchoolBtn, #ckbFacility, #addPrevBtn, #editPrevBtn').hide();
	$('.select2').select2();	
	$('.my-colorpicker').colorpicker();
	$("#add_city, #edit_city").select2({
    placeholder: "Chọn tỉnh/thành phố",
    allowClear: true
	});
	$("#add_district, #edit_district").select2({
    placeholder: "Chọn quận/huyện",
    allowClear: true
	});
	$("#add_ward, #edit_ward").select2({
    placeholder: "Chọn phường/xã",
    allowClear: true
	});
	$('.slider').slider();
	$('#tagCourse, #tagEditCourse').select2({
		data: ["Khóa 2018","Khóa 2017"],
		tags: true,
		tokenSeparators: [','], 
		placeholder: "Tên khóa học"
	});
	$('#tagClass, #tagEditClass').select2({
		data: ["Lớp 01","Lớp 02"],
		tags: true,
		tokenSeparators: [','], 
		placeholder: "Tên lớp học"
	});
	$('#tagTeacher, #tagEditTeacher').select2({
		data: ["Giáo viên mầm non","Giáo viên tiếng anh"],
		tags: true,
		tokenSeparators: [','], 
		placeholder: "Loại giáo viên"
	});
	$('[data-mask]').inputmask();
	$('#modal-course-list, #modal-program-list, #modal-comment-list').on( 'shown.bs.modal', function (e) {
		$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
	});

	$('.modal').on( 'show.bs.modal', function (e) {
		if ($('input[type="radio"], input[type="checkbox"]').length > 0) {
			$('input[type="radio"], input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});
		}
	});
	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
	$('a[href="#tab_vn"]').on( 'show.bs.tab', function (e) {
		console.log('vn');
	});
	$('a[href="#tab_en"]').on( 'show.bs.tab', function (e) {
		console.log('en');
	});
	$('a[href="#tab_vn_edit"]').on( 'show.bs.tab', function (e) {
		console.log('vn');
	});
	$('a[href="#tab_en_edit"]').on( 'show.bs.tab', function (e) {
		console.log('en');
	});
	var table_dynamic_school = $('.table-dynamic-school').DataTable({
		"processing": true,
		"ajax": "/data/school.json",
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
			{"data": "level"},
			{"data": "type"},
			{"data": "district"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1, 2, 3, 4],
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
					return '<a class="table-action table-action-view text-blue cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-comments"></i></a>' +
							'<a class="table-action table-action-add text-aqua cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-plus-circle"></i></a>' +
							'<a class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>' +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			}
		]		
	});

	var table_dynamic_course = $('.table-dynamic-course').DataTable({
		"processing": true,
		"ajax": "/data/course.json",
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
			{"data": "class"},
			{"data": "date"},
			{"data": "status"},
			{"data": "number"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [2, 3, 4],
				class: 'text-center'
			},
			{
				width: '100px',
				targets: [-1, 0, 5],
				class: 'text-center'
			},
			{
				targets: [-1],
				orderable: false,
				render: function (data, type, row, meta) {
					return '<a class="table-action table-action-add text-aqua cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-plus-circle"></i></a>' +
							'<a class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-edit"></i></a>';
				}
			}
		]		
	});

	var table_dynamic_program = $('.table-dynamic-program').DataTable({
		"processing": true,
		"ajax": "/data/program.json",
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
			{"data": "time"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [-1],
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

	var table_dynamic_comment = $('.table-dynamic-comment').DataTable({
		"processing": true,
		"ajax": "/data/comment.json",
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
			{"data": "address"},
			{"data": "date"},
			{"data": "content"},
			{"data": "point"},
			{"data": "voted"},
			{"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '200px',
				targets: [2, 3],
				class: 'text-center'
			},
			{
				width: '400px',
				targets: [4],
				class: 'text-multi-row'
			},
			{
				width: '100px',
				targets: [-1, 0, 5, -2],
				class: 'text-center'
			},
			{
				targets: [-1],
				orderable: false,
				render: function (data, type, row, meta) {
					var agree = "";
					if(data.agree == 0) {
						agree = '<a class="table-action table-action-agree text-blue cursor-pointer" data-id="' + data.id + '"><i' +
										' class="far fa-square"></i></a>';
					} else {
						agree = '<a class="table-action table-action-agree text-blue cursor-pointer" data-id="' + data.id + '"><i' +
										' class="far fa-check-square"></i></a>';
					}
					return agree +
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
							' class="fa fa-trash"></i></a>';
				}
			},
			{
				targets: [-2],
				render: function (data, type, row, meta) {
					var val = '';
					switch (data)
					{
						case '1':
						{
							val = '<i class="fa fa-star text-green"></i>';
							break;
						}
						case '2':
						{
							val = '<i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i>';
							break;
						}
						case '3':
						{
							val = '<i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i>';
							break;
						}
						case '4':
						{
							val = '<i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i>';
							break;
						}
						case '5':
						{
							val = '<i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i><i class="fa fa-star text-green"></i>';
							break;
						}
						default:
						{
							val = data;
						}
					}
					return val;					
				}
			},
			{
				targets: [5],
				render: function (data, type, row, meta) {
					if (data != "") {
							return '<span class="text-green">' + data + '/10</span>';
					} else {
							return '';
					}
				}
			}
		]		
	});

	$('#addSchoolForm').validator().on('submit', function (e) {
		$('#addSchoolBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addSchoolBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addSchoolBtn').button('reset');
		}
	});

	$('#addSchoolForm').validator().on('submit', function (e) {
		$('#addSchoolBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addSchoolBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addSchoolBtn').button('reset');
		}
	});
	
	$('#editSchoolForm').validator().on('submit', function (e) {
		$('#editSchoolBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg_edit').removeClass('no-display');
						$('#editSchoolBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editSchoolBtn').button('reset');
		}
	});

	$('#addProgramForm').validator().on('submit', function (e) {
		$('#addProgramBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg').removeClass('no-display');
						$('#addProgramBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#addProgramBtn').button('reset');
		}
	});
	
	$('#editProgramForm').validator().on('submit', function (e) {
		$('#editProgramBtn').button('loading');
		$('.alert').addClass('no-display');
		if (!e.isDefaultPrevented()) {
				e.preventDefault();
				setTimeout(function () {
						$('#alert_msg_edit').removeClass('no-display');
						$('#editProgramBtn').button('reset');
						setTimeout(function () {
								$('.alert').addClass('no-display');
						}, 3000);
				}, 1000);
		} else {
				$('#editProgramBtn').button('reset');
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

	$(document).on('click', '.table-dynamic-course .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-course-edit').modal('show');
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

	$(document).on('click', '.table-dynamic-school .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-school-edit').modal('show');
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

	$(document).on('click', '.table-dynamic-program .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-program-edit').modal('show');
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

	$(document).on('click', '.table-facility .table-action-edit', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('#modal-facility-edit').modal('show');
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

	$(document).on('click', '#addSchool', function (e) {
		e.preventDefault();
		$('#modal-school-add').modal('show');		
	});

	$(document).on('click', '#addCourse', function (e) {
		e.preventDefault();
		$('#modal-course-add').modal('show');		
	});

	$(document).on('click', '#addProgram', function (e) {
		e.preventDefault();
		$('#modal-program-add').modal('show');		
	});

	$(document).on('click', '#addFacility', function (e) {
		e.preventDefault();
		$('#modal-facility-add').modal('show');		
	});

	$(document).on('click', '.table-dynamic-school .table-action-add', function (e) {
		e.preventDefault();
		$('#modal-course-list').modal('show');		
	});

	$(document).on('click', '.table-dynamic-school .table-action-view', function (e) {
		e.preventDefault();
		$('#modal-comment-list').modal('show');		
	});

	$(document).on('click', '.table-dynamic-course .table-action-add', function (e) {
		e.preventDefault();
		$('#modal-program-list').modal('show');		
	});

	$(document).on('click', '#addSchoolBtn', function (e) {
		e.preventDefault();
		$('#addSchoolForm').submit();
	});

	$(document).on('click', '#editSchoolBtn', function (e) {
		e.preventDefault();
		$('#editSchoolForm').submit();
	});

	$(document).on('click', '#addCourseBtn', function (e) {
		e.preventDefault();
		$('#addCourseForm').submit();
	});

	$(document).on('click', '#editCourseBtn', function (e) {
		e.preventDefault();
		$('#editCourseForm').submit();
	});

	$(document).on('click', '#addProgramBtn', function (e) {
		e.preventDefault();
		$('#addProgramForm').submit();
	});

	$(document).on('click', '#editProgramBtn', function (e) {
		e.preventDefault();
		$('#editProgramForm').submit();
	});

	$(document).on('click', '#addNextBtn', function (e) {
		$(this).hide();
		$('#schoolGeneral').hide();
		$('#schoolDetail, #addSchoolBtn, #addPrevBtn').show();
	});

	$(document).on('click', '#addPrevBtn', function (e) {
		$(this).hide();
		$('#schoolGeneral, #addNextBtn').show();
		$('#schoolDetail, #addSchoolBtn').hide();
	});

	$(document).on('click', '#editNextBtn', function (e) {
		$(this).hide();
		$('#editschoolGeneral').hide();
		$('#editschoolDetail, #editSchoolBtn, #editPrevBtn').show();
	});

	$(document).on('click', '#editPrevBtn', function (e) {
		$(this).hide();
		$('#editschoolGeneral, #editNextBtn').show();
		$('#editschoolDetail, #editSchoolBtn').hide();
	});

	$('#add_type_facility').on("change", function (e) {
		var value = $(this).val();
		if(value == "1") {
			$('#ckbFacility').hide();
			$('#inputFacility').show();
		} else {
			$('#ckbFacility').show();
			$('#inputFacility').hide();
		}
	});
	
	$('.example-movie').barrating('show', {
		theme: 'bars-movie'
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