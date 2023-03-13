<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Công ty techtology 4.0 - Hệ thống quản trị website</title>

  <link href="<?=base_url()?>assets/login/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="<?=base_url()?>assets/login/css/style.css" rel="stylesheet"/>
  <script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-1.11.1.min.js" ></script>
  <script type="text/javascript" src="<?=base_url()?>assets/login/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/login/js/canvas.js" ></script>
  <input type="hidden" id="base_url" value="<?=base_url()?>">
</head>

<body class="dark authPage ">
  <div class="login-wrap">
    <div class="login-html">
        <div action="" >
        <img class="logo" src="<?=base_url()?>assets/login/img/logotech.svg" alt="Công ty techtology 4.0">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập </label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Quên mật khẩu</label>
        <div class="login-form" >

            <form class="sign-in-htm" action="" method="post" class="validate">
                <div class="validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="group">
                    <label for="user" class="label">Tên đăng nhập</label>
                       <input data-val="true" data-val-required="Nhập tên đăng nhập!" id="email" name="username" class="input" tabindex="1" type="text" value="">
                </div>
                <div class="group">
                    <label for="pass" class="label">Mật khẩu</label>
                    <input data-val="true" id="pass" name="pass" tabindex="2" type="password" class="input" data-type="password">
                </div>
                 <div class="group">
                <aside class="ovh remb" style="margin-bottom: 15px;">
                    <label class="txtN mb0 quickaction_chk" style="color: #000;">
                        <input checked="checked" data-val="true" data-val-required="The Ghi nhớ field is required." id="RememberMe" name="RememberMe" tabindex="4" type="checkbox" value="true">
                        <input name="RememberMe" type="hidden" value="false">
                        <span></span>
                        Duy trì đăng nhập
                    </label>
                </aside>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Đăng nhập">
                </div>
                <div class="hr"></div>
            </form>
            <form class="for-pwd-htm" action="<?=base_url('customer-forgotpass-user')?>" method="post" class="validate" id="frmNewsLetter" novalidate="novalidate">
                <div class="group">
                    <label for="user" class="label">Email</label>
                    <input name="email" id="email2" type="text" class="validate[required,custom[email]] input">
                </div>
                 <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="alert_mesage" class="alert alert-danger col-sm-12"></div>
                <div class="group">
                     <div class="button" type="button" onclick="check_email3()" name="forgotpass"  value="Gửi" style="text-align: center;" >Gửi</div>
                    
                </div>
                <div class="hr"></div>
            </form>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 function base_url(){
    return $('#base_url').val();
}
function check_email3(){

    if($('#frmNewsLetter').validationEngine('validate')){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url() + 'users_frontend/check_email_user',
            data: {email:$('#email2').val()},
            success: function (result) {
                if(result.check==false){
                    $('#alert_mesage').html(result.mss);
                    $('#alert_mesage').show();
                }else if(result.check==true){
                    $('#frmNewsLetter').submit();
                }
            }
        });
    }
}
</script>
<div id="show_success_mss" style="position: fixed; top: 40px; right: 20px;z-index:9999;">
    <?php if($this->session->flashdata('mess')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-success"></i><?=$this->session->flashdata('mess'); ?>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('mess_err')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-warning"></i><?=$this->session->flashdata('mess_err'); ?>
    </div>
    <?php endif; ?>
</div>
<link href="<?= base_url()?>assets/plugin/ValidationEngine/css/validationEngine.jquery.css" rel="stylesheet"/>
<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js"
            charset="utf-8"></script>
<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.validate ').validationEngine();
    });
     setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 9000);
</script>
</body>
</html>
