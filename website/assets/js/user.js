function base_url(){
    return $('#base_url').val();
}
$(function(){
    $('#btn_login').click(function(){
        $('.box_notify').remove();
        var username = $('#username').val();
        var pass = $('#pass').val();
        var check = $('#loginform').validationEngine('validate');
        if(check){
            $.ajax({
                url: base_url() + 'users/check_login',
                type: "post",
                dataType: "json",
                data: {username:username,pass:pass},
                beforeSend:function(){
                    //$('.hd_log').after('<div class="content_notufy"><div class="text-center"><div class="txt_loading">Vui lòng chờ trong giây lát!</div><div class="box_loading"><div id="floatBarsG"><div id="floatBarsG_1" class="floatBarsG"></div><div id="floatBarsG_2" class="floatBarsG"></div><div id="floatBarsG_3" class="floatBarsG"></div><div id="floatBarsG_4" class="floatBarsG"></div><div id="floatBarsG_5" class="floatBarsG"></div><div id="floatBarsG_6" class="floatBarsG"></div><div id="floatBarsG_7" class="floatBarsG"></div><div id="floatBarsG_8" class="floatBarsG"></div></div></div></div></div>');
                },
                success:function(res){
                    console.log(res);
                    if(res.check==false||res.login == false){
                        $('.content_notufy').remove();
                        $('.hd_log').after('<div class="content_notufy"><div class="group_zano"><div class="box_icon_fi"><img class="icon_notify" src="'+base_url() + 'assets/css/img/icon_notify.png'+'" alt=""/></div><div class="txt_notify_r">'+res.mess+'</div></div></div>');
                    }
                    if (res.login == true) {
                        location.reload();
                        //window.location.href=base_url();
                    }
                    /*if (result.login == false) {
                     $('#login-alert').html(result.message);
                     $('#login-alert').show();
                     }*/
                }
            });
        }


    });
})
$(function(){
    $('#username,#pass').on('focus',function(){
        $('.content_notufy').remove();
    });
});
$(function(){
    $('#btn_register').click(function(){
        var check_form = $('#form_register').validationEngine();
    });
});

function load_captcha(){
    var url = $('#base_url').val();
    $.ajax({
        url: url + 'captchacode/getCaptcha',
        type: "POST",
        dataType: "text",
        success:function(res){
            $('.captcha_value').text(res);
            $('#captcha_check').val(res);
        }
    });
}
load_captcha();

function check_captcha_user()
{
    $('#error_captcha').empty();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'captchacode/checkCaptchaUser',
        data: {code_captcha:$('#captcha_user').val(),captcha_check:$('#captcha_check').val()},
        success: function (result) {
            if(result.check==true){
                if($('#form_register').validationEngine('validate')){
                    document.form_u_register.submit();
                }
            }else{
                $('#error_captcha').html(result.ms);
            }
        }
    })
}

/*function login() {
    alert('jkhkjhsf');
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'dang-nhap',
        data: {user: $('#login-username').val(), pass: $('#login-password').val()},
        success: function (result) {
            if (result.login == true) {
                location.reload();
            }
            if (result.login == false) {
                $('#login-alert').html(result.message);
                $('#login-alert').show();
            }
        }
    })
}*/
function check_mail(val){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/check_email',
        data: {email:val},
        success: function (result) {
            if(result.check==false){
//                        alert (result.mss);
                var ms='<div class="form-validation-field-1formError parentFormloginform formError"\
                        style="opacity: 0.87; position: absolute; top: 0px; left: 376px; margin-top: -31px;">\
                            <div class="formErrorContent">* '+result.mss+'<br></div>\
                            <div class="formErrorArrow">\
                            <div class="line10"> </div><div class="line9"></div><div class="line8">\
                            </div><div class="line7"></div><div class="line6"></div><div class="line5">\
                            </div><div class="line4"></div><div class="line3"></div><div class="line2"></div>\
                            <div class="line1"></div></div>\
                            </div>';

                $('#show_error').html(ms);
                $('#show_error2').html(ms);
                $('#btn-signups').attr('disabled','true');
                $('#status_check').attr('value','2');
            }else if(result.check==true){
                $('#btn-signup').removeAttr('disabled');;
                $('#show_error').empty();
                $('#status_check').attr('value','1');
            }
        }
    })
}
function check_pass(val){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/check_old_pass',
        data: {pass:val},
        success: function (result) {
            if(result.check==false){
//                        alert (result.mss);
                var ms='<div class="form-validation-field-1formError parentFormloginform formError"\
                        style="opacity: 0.87; position: absolute; top: 0px; left: 376px; margin-top: -31px;">\
                            <div class="formErrorContent">* '+result.mss+'<br></div>\
                            <div class="formErrorArrow">\
                            <div class="line10"> </div><div class="line9"></div><div class="line8">\
                            </div><div class="line7"></div><div class="line6"></div><div class="line5">\
                            </div><div class="line4"></div><div class="line3"></div><div class="line2"></div>\
                            <div class="line1"></div></div>\
                            </div>';

                $('#show_error_pass2').html(ms);
                $('#btn-changepass').attr('disabled','true');
                $('#pass_check').attr('value','2');
            }else if(result.check==true){
                $('#btn-changepass').prop("disabled", false);
                $('#show_error_pass2').empty();
                $('#pass_check').attr('value','1');
            }
        }
    })
}

function getsubcate(cateid,target) {
    var id = $(cateid).val();
    // reset option 
    var level = parseInt($(cateid).data( 'level'));
    if(level = 1){
        // top Cate changer 
        $(target).addClass('hidden');
        $(target).html('');
        $('#subcate2').addClass('hidden');
        $('#subcate2').html('');
    }else{
        //sub cate change
        $(target).addClass('hidden');
        $(target).html('');
    }
    // get list subcate
     $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/ajaxcate',
        data: {cate_id:id},
        success: function (result) {
            if(result.stat === true){
                var string = '<option disabled selected>-- Mời chọn Danh Mục con --</option>';
                for (var i = 0; i < result.item.length; i++) {
                    string += '<option value="'+ result.item[i].id +'">'+ result.item[i].name +'</option>';
                }
                $(target).removeClass('hidden');

                $(target).html(string);
            }else{
                $(cate_pro).focus();
                $(target).addClass('hidden');
                $(target).html('');
            }
        }
    })
}

// User info 
function getdistrict(source){
    var province = parseInt($(source).val());
    var district =  $('#district').data('district');
    console.log(district);
    // ẩn tất cả select box quận huyện 
    $('#district').addClass('hidden');
    $('#district').html('');
    $('#ward').addClass('hidden');
    $('#ward').html('');
    // get info 
    $.ajax({
        url: base_url() + 'users/ajaxgetdistric',
        type: 'POST',
        dataType: 'json',
        data: {province: province},
        success : function(result){
            
            if( result.length > 0){
                var string = '<option disabled selected>Chọn Quận/Huyện</option>';
                for (var i = 0; i < result.length; i++) {
                    string +=  '<option value="'+ result[i].districtid +'"';
                    if((district === result[i].districtid) && (district > 0) ){
                        string += ' selected ';
                    }
                    string += '>'+ result[i].name +'</option>';
                }
                $('#district').removeClass('hidden');
                $('#district').html(string);
                $('#ward').addClass('hidden');
                $('#ward').html('');
            }
        }
    })
    
}

function getward(source){
    var district = parseInt($(source).val());
    var wardid =  $('#ward').data('ward');
    console.log(district);
    // ẩn tất cả select box quận huyện 
    $('#ward').addClass('hidden');
    $('#ward').html('');
    // get info 
    $.ajax({
        url: base_url() + 'users/ajaxgetward',
        type: 'POST',
        dataType: 'json',
        data: {district: district},
        success : function(result){
            
            if( result.length > 0){
                var string = '<option disabled selected>Chọn Xã/Thị Trấn</option>';
                for (var i = 0; i < result.length; i++) {
                    string +=  '<option value="'+ result[i].wardid +'"';
                    if((district === result[i].wardid) && (wardid > 0) ){
                        string += ' selected ';
                    }
                    string += '>'+ result[i].name +'</option>';
                }
                $('#ward').removeClass('hidden');
                $('#ward').html(string);
               
            }
        }
    })
    
}

$(document).ready(function() {
   $('.menu_main_prod').hover(function(){
        //$(this).children('.over').removeClass('hidden');
        var LiShow = $(this).parent().find(".over");
        LiShow.removeClass('hidden');
        $('#jsMenuMarkLayer').addClass('showfog');
    },function(){
        //$(this).children('.over').addClass('hidden'); 
        var LiShow = $(this).parent().find(".over");
        LiShow.addClass('hidden');
        $('#jsMenuMarkLayer').removeClass('showfog');
    });
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
    return str;
};