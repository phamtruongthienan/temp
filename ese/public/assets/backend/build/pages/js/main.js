function changeImage(image, input, form) {
	$(image).on('click', function() {
		$(input).click();
	});

	$(input).change(function () {
		var input = this;
		var url = $(this).val();
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
		{
			var reader = new FileReader();
			reader.onload = function (e) {
				$(form+' #image_hash').val(e.target.result);
				$(image).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
		else
		{
			Lobibox.notify("warning", {
				title: 'Thông báo',
				pauseDelayOnHover: true,
				continueDelayOnInactiveTab: false,
				icon: false,
				sound: false,
				msg: 'Vui lòng chọn ảnh có dung lượng thấp hơn 3MB.'
			});
		}
	});
}

$(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	if($('textarea').length > 0) {
		$('textarea').summernote({
			height: 300,                 // set editor height
			minHeight: 300,             // set minimum height of editor
			maxHeight: 500,             // set maximum height of editor
		  });
	}
	if($('#changeLanguage').length > 0) {
		$('#changeLanguage').on('select2:select', function (e) {
			var url = e.params.data.element.dataset.href;
			window.location.href = url;
		});
	}
});