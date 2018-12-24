$(function() {
    $(document).on('change', '#avatar', function(event) {
        event.preventDefault();
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar_frame').css('background-image','url(' + e.target.result + ')');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $(document).on('click', '.btn-child-edit', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: base_url + "/child?id="+id+"&include=m_school.m_schooltranslations",
            type: "get",
            success: function(response) {
                if(response.code == 200) {
                    $('#idChild').val(id);
                    $('#nameChild').val(response.data.name);
                    if(response.data.gender == 0) {
                        $('#boy').prop("checked", true);
                    } else {
                        $('#girl').prop("checked", true);
                    }
                    $('#birthChild').val(response.data.dob.replace(' 00:00:00', ''));
                    $.each(response.data.genitive, function( index, value ) {
                        $('#genitiveChild').tagsinput('add', value);
                    });

                    $('.block-list-child').fadeOut(function() {
                        $('.block-form-child').fadeIn();
                    });
                } else {
                    Lobibox.notify("warning", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: response.msg
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Lobibox.notify("warning", {
                    title: 'Thông báo',
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    icon: false,
                    sound: false,
                    msg: response.msg
                });
            }
        });
	});
    
    $(document).on("click", ".unWishlist", function() {
        var action_type =  $(this).attr('data-action');
        var  data_post = {
            id: $(this).attr('data-id'),
            action: action_type,
        };
        $.ajax({
            url: base_url + "/wishlist",
            data: data_post,
            type: "post",
            success: function(response) {
                if(response.code == 200) {
                    Lobibox.notify("success", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: response.msg
                    });
                } else {
                    Lobibox.notify("warning", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: response.msg
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Lobibox.notify("warning", {
                    title: 'Thông báo',
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    icon: false,
                    sound: false,
                    msg: response.msg
                });
            }
        });
    });

    $('.block-user-edit').hide();
    $(".file-upload").on('change', function() {
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });

    $(document).on("click", ".btn-user-edit", function(event) {
        event.preventDefault();
        $('.block-user-info').fadeOut(function() {
            $('.block-user-edit').fadeIn();
        });
    });

    // $(document).on("click", ".btn-user-save", function(event) {
    //     event.preventDefault();
    //     $('#form-account').submit();
    // });

    $(document).on("click", ".btn-child-delete", function(event) {
        event.preventDefault();
        $('#confirm-delete-modal').modal('show');
    });

    // $(document).on("click", ".btn-child-save", function(event) {
    //     event.preventDefault();
    //     $('#form-child').submit();
    // });

    $(".birthday").datepicker({ dateFormat: 'yy-mm-dd' });

    if ($().validator) {
        $('#form-account').validator().on('submit', function(e) {
            var fullName = $('#fullName').val()
            var birthday = $('.birthday').val()
            var phone = $('#phone ').val()
            var gender = $('.w-radio-input:checked').val()          
            $.ajax({
                url: 'edituser',
                type: 'get',
               // dataType: "json",
                data: {
                    fullName,
                    birthday,
                    phone,
                    gender
                },
                success: function (res) {
                    // $('#comment').html(res.comment)
                    // $('#comment').show()
                    console.log(res)
                },
                error: function (error) {
                    console.log(error)
                }
            })

            // if (!e.isDefaultPrevented()) {
            //     e.preventDefault();
            //     Lobibox.notify("success", {
            //         title: 'Thành công',
            //         pauseDelayOnHover: true,
            //         continueDelayOnInactiveTab: false,
            //         icon: false,
            //         sound: false,
            //         msg: 'Cập nhật tài khoản thành công.'
            //     });

            //     $('.block-user-edit').fadeOut(function() {
            //         $('.block-user-info').fadeIn();
            //     });
            // }
        });

        $('#form-child').validator({
            custom: {
                required: function($el) {
                    return !!$.trim($el.val())
                }
            }
        }).on('submit', function(e) {
            if (!e.isDefaultPrevented()) {
                e.preventDefault();
                Lobibox.notify("success", {
                    title: 'Thành công',
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    icon: false,
                    sound: false,
                    msg: 'Thêm / Cập nhật thông tin trẻ em thành công.'
                });

                $('.block-form-child').fadeOut(function() {
                    $('.block-list-child').fadeIn();
                });
            }
        });
    }

    $(document).on("click", ".btn-user-save", function(event) {
        var fullName = $('#fullName').val()
        var birthday = $('.birthday').val()
        var phone = $('#phone ').val()
        var gender = $('.w-radio .w-radio-input:checked').val()
        $.ajax({
            url: 'edituser',
            type: 'get',
            // dataType: "json",
            data: {
                fullName,
                birthday,
                phone,
                gender
            },
            success: function (res) {
                Lobibox.notify("success", {
                    title: 'Thông báo',
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    icon: false,
                    sound: false,
                    msg: res
                });
            },
            error: function (error) {
                Lobibox.notify("warning", {
                    title: 'Thông báo',
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    icon: false,
                    sound: false,
                    msg: error
                });
                // console.log(error)
            }
        })
    });

    $(document).on("click", ".btn-child-save", function(event) {
        var idChild = $('#idChild').val();
        var nameChild = $('#nameChild').val();
        var birthday = $('#birthChild').val();
        var gender = $("input[name='genderChild']:checked").val();

        var gen = $("input[name='genitivechild']").val();
        // var gen = genitive_arr.toString();
        // var gen = genjsonstring.toString()
        // // console.log(phone_arr[0]);
        // console.log(genjsonstring.toString());
        if(idChild==0){
            console.log(typeof(idChild));
            console.log("idChild==0");

            $.ajax({
                url: 'addchild',
                type: 'get',
                //  dataType: "json",
                data: {
                    nameChild,
                    birthday,
                    gen,
                    gender
                },
                success: function (res) {
                    Lobibox.notify("success", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: res
                    });
                },
                error: function (error) {
                    Lobibox.notify("warning", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: error
                    });
                    // console.log(error)
                }
            })
        }
        else
        {
            $.ajax({
                url: 'editchild',
                type: 'get',
                //  dataType: "json",
                data: {
                    idChild,
                    nameChild,
                    birthday,
                    gen,
                    gender
                },
                success: function (res) {
                    Lobibox.notify("success", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: res
                    });
                },
                error: function (error) {
                    Lobibox.notify("warning", {
                        title: 'Thông báo',
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: false,
                        sound: false,
                        msg: error
                    });
                    // console.log(error)
                }
            })
        } 
    });

    $(document).on('click', '.btn-child-add', function() {
        event.preventDefault();
        console.log("abcccccc")
        $('.block-list-child').fadeOut(function() {
            $('.block-form-child').fadeIn();
        });
	});







    $(document).on("focusin", ".birthday", function() {
        $(this).prop('readonly', true);
    });

    $(document).on("focusout", ".birthday", function() {
        $(this).prop('readonly', false);
    });
});

var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.profile-pic').css('background-image', 'url(' + e.target.result + ')');
        }

        reader.readAsDataURL(input.files[0]);
    }
}