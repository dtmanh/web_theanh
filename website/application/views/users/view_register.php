
<div class="container">
    <div class="row_pc">
        <ul class="back_link breadcrumb">
            <li><a href="<?=base_url();?>" title="Trang chủ">Trang chủ</a></li>
            <li><span>Login</span></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<div class="page_notify">
    <div class="box_login">
        <form  action="<?=base_url('register-success')?>" method="post" name="form_u_register" id="form_register" class="validate"/>
        <div class="hd_log">ĐĂNG KÝ</div>
        <div class="content_log">

            <span class="form_log1">
                            <span class="txt_log1">
                                * Họ và tên
                            </span>
                <input type="text" name="fullname" class="validate[required] form-control input_log1">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1 hidden">
                            <span class="txt_log1">
                               * Tài Khoản
                            </span>
                <input type="text" name="username" id="username" class="validate[required] form-control input_log1" value="taikhoan">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1">
                            <span class="txt_log1">
                               * Số điện thoại (đăng Nhập)
                            </span>
                <input type="text" name="phone" id="phone" class="validate[required,custom[phone]] form-control input_log1">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1">
                            <span class="txt_log1">
                               * Email
                            </span>
                <input type="text" id="email" name="email" class="validate[required,custom[email]] form-control input_log1">
                <input type="hidden" name="status_check" id="status_check" value="1">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1">
                            <span class="txt_log1">
                              * Mật khẩu
                            </span>
                <input type="password" name="pass" class="form-control validate[required] input_log1">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1">
                            <span class="txt_log1">
                             * Nhập lại mật khẩu
                            </span>
                <input type="password" name="repass" id="repass" class="validate[required] form-control input_log1">
            </span>
            <div class="clearfix"></div>
            <span class="form_log1 pull-left">
                            <span class="txt_log1">
                             * Mã bảo vệ
                            </span>
                <div class="clearfix"></div>
                <div style="position: relative">
                    <div id="error_captcha"></div>
                </div>
                <div class="clearfix"></div>
                <input type="text" name="check_captcha" id="captcha_user" class="validate[required] form-control input_log1">

            </span>
            <div class="pull-right code_dk_acc">
                <span class="captcha_value">1x2y3z</span>
                <span><i class="fa fa-refresh" aria-hidden="true" onclick="load_captcha()"></i></span>
                <input type="hidden" id="captcha_check" value="">
            </div>

            <div class="clearfix"></div>


            <div class="text-center"><div onClick="check_captcha_user()" id="btn_register" class="but_dktkm">Đăng ký</div></div>
        </form>
        </div>
    </div>

    <div class="clearfix clearfix-10"></div>
</div><input hidden type="text" id="base_url" value="<?=base_url()?>">
<link href="<?=base_url()?>assets/plugin/ValidationEngine/css/validationEngine.jquery.css" rel="stylesheet"/>

<script type="text/javascript" src="<?=base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/user.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.validate').validationEngine();
    });
</script>