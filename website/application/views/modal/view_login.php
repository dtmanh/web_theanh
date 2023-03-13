 
 <style type="text/css">
   #loginModal{
    padding-right: 0 !important;
   }
 </style>
<div class="modal fade" id="loginModal" >
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="form-animate">
          <div class="card"></div>
          <div class="card">
            <h2 class="title"><?=lang('login');?></h2>
            <form id="loginform" class="form-horizontal" role="form" autocomplete="on">
                <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="login-alert" class="alert alert-danger col-sm-12"></div>
              <div class="input-container">
                <input type="text" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" id="login-username" class="validate[required,custom[email]]" name="email" value="" autocomplete="on" placeholder="" required="required"/>
                <label for="Username">Email</label>
                <div class="bar"></div>
              </div>
              <div class="input-container">
                <input type="password" id="login-password" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" name="password" required="required"/>
                <label for="Password"><?=lang('pass');?></label>
                <div class="bar"></div>
                
              </div>

              <div class="button-container">
                <div class="go-btn"  onclick="login()">Đăng nhập</div>
              </div>
              <div class="footer"><a href="javascript:void(0)" data-toggle="modal" data-target="#password" >Quên mật khẩu</a></div>
             
            </form>
             <div class="modal fade" id="password">
                <div class="modal-dialog" style="max-width: 400px">
                  <div class="modal-content">
                    <div class="modal-body">
                        <form action="<?=base_url('customer-forgotpass')?>" method="post" class="validate form-horizontal" role="form" id="frmNewsLetter" novalidate="novalidate">
                      <div class="input-container">
                         <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="alert_mesage" class="alert alert-danger col-sm-12"></div>
                        <input name="email" id="email" type="text" placeholder="" class="validate[required,custom[email]]" maxlength="255" required="required"/>
                        <label for="Username">Nhập email của bạn</label>
                        <div class="bar"></div>
                        </div>
                       <div class="go-btn" type="button" id="forgotpass" onclick="check_mail()" name="forgotpass"  value="Gửi" >Gửi</div>
                     </form>
                    </div>
                  </div>
                </div>
              </div>
               <style type="text/css">
                #password .modal-content{
                      -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
                      box-shadow: 0 3px 9px rgba(0,0,0,.5);
                }
                #password .modal-content .input-container{
                  margin: 0 20px 20px;
                }
              </style>
          </div>
     
          <div class="card alt">
            <div class="toggle"></div>
            <h2 class="title"><?=lang('register');?> thành viên
              <div class="close"></div>
            </h2>
            <form action="<?=base_url('dang-ky')?>" method="post" name="form_u_register" id="register_user_frm" class="validate form-horizontal" role="form">
                <input type="hidden" value="<?=$formkey;?>" name="form_key">
              <div class="input-container">
                <div id="show_error"></div>
                <input type="text" onBlur="check_mail($(this).val())"  id="email"
                                       class="validate[required,custom[email]]" name="email" required="required"/>
                                       <input type="hidden" name="status_check" id="status_check" value="0">
                <label for="Username">Email</label>
                <div class="bar"></div>
              </div>
              <div class="input-container">
                <input type="password" class="validate[required,custom[onlyLetterNumber,minSize[6]]]"
                                       id="password" name="password" required="required"/>
                <label for="Password"><?=lang('pass')?></label>
                <div class="bar"></div>
              </div>
              <div class="input-container">
                <input type="password" class="validate[required,equals[password]]" name="repassword" required="required"/>
                <label for="Repeat Password"><?=lang('re-pass');?></label>
                <div class="bar"></div>
              </div>
                <div class="input-container">
                <input type="text" class="validate[required]" id="name" name="fullname"
                                       placeholder="" required="required">
                <label for="name"><?=lang('name');?></label>
                <div class="bar"></div>
              </div>
              <div class="input-container">
               <input type="text" class="validate[custom[phone,minSize[10]]]" id="phone" name="phone"
                                       placeholder="" required="required">
                <label for="phone"><?=lang('phone');?></label>
                <div class="bar"></div>
              </div>
               <div class="input-container">
                  <div id="error_captcha" class="text-danger"></div>
                     
                  <input type="text" class="validate[custom]" placeholder="..." name="captcha_user" id="captcha_user" required="required">
                   <label for="captcha_user" ><?=lang('code_catpcha');?></label>
                    <div class="bar"></div>
                     
              </div>
              <div class="input-container">
                 
                   <div id="id_capcha">
                      <img src="<?php echo base_url().$imageCaptchaPostAds; ?>" width="100%" height="30" />
                      <input type="hidden" id="captcha_check" value="<?=@$captcha_check;?>">
                  </div>
                
              </div>
                           
              <div class="button-container">
                <button name="signups" id="btn-signups"  type="submit"><span>Đăng ký</span></button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
 
<style type="text/css">
  #loginModal > .modal-dialog > .modal-content{
      border: 0;
      border-radius: none;
      background: transparent;
  }
  .go-btn{
     max-width: 240px;
     margin: auto;
     border: 1px solid #ccc;
     padding: 15px 0;
     cursor: pointer;
     text-align: center;
  }
  .go-btn:hover{
     color: #fff;
     border-color: #323232;
     background: #323232;
  }
  .form-animate {
    position: relative;
    max-width: 460px;
    width: 100%;
    margin:  10px auto;
  }
  .form-animate.active .card:first-child {
    background: #f2f2f2;
    margin: 0 15px;
  }
  .form-animate.active .card:nth-child(2) {
    background: #fafafa;
    margin: 0 10px;
  }
  .form-animate.active .card.alt {
    top: 20px;
    right: 0;
    width: 100%;
    min-width: 100%;
    height: auto;
    border-radius: 5px;
    padding: 60px 0 40px;
    overflow: hidden;
  }
  .form-animate.active .card.alt .toggle {
    position: absolute;
    top: 40px;
    right: -70px;
    box-shadow: none;
    -webkit-transform: scale(14);
    transform: scale(15);
    -webkit-transition: -webkit-transform .5s ease;
    transition: -webkit-transform .5s ease;
    transition: transform .5s ease;
    transition: transform .5s ease, -webkit-transform .5s ease;
  }
  .form-animate.active .card.alt .toggle:before {
    content: '';
  }
  .form-animate.active .card.alt .title,
  .form-animate.active .card.alt .input-container,
  .form-animate.active .card.alt .button-container {
    left: 0;
    opacity: 1;
    visibility: visible;
    -webkit-transition: .3s ease;
    transition: .3s ease;
  }
  .form-animate.active .card.alt .title {
    -webkit-transition-delay: .3s;
            transition-delay: .3s;
  }
  .form-animate.active .card.alt .input-container {
    -webkit-transition-delay: .4s;
            transition-delay: .4s;
  }
  .form-animate.active .card.alt .input-container:nth-child(2) {
    -webkit-transition-delay: .5s;
            transition-delay: .5s;
  }
  .form-animate.active .card.alt .input-container:nth-child(3) {
    -webkit-transition-delay: .6s;
            transition-delay: .6s;
  }
  .form-animate.active .card.alt .input-container:nth-child(4) {
    -webkit-transition-delay: .7s;
            transition-delay: .7s;
  }
  .form-animate.active .card.alt .input-container:nth-child(5) {
    -webkit-transition-delay: .8s;
            transition-delay: .8s;
  }
  .form-animate.active .card.alt .input-container:nth-child(6) {
    -webkit-transition-delay: .9s;
            transition-delay: .9s;
  }
  .form-animate.active .card.alt .input-container:nth-child(7) {
    -webkit-transition-delay: 1s;
            transition-delay: 1s;
  }
  
  .form-animate.active .card.alt .button-container {
    -webkit-transition-delay: .7s;
            transition-delay: .7s;
  }

  /* Card */
  .card {
    position: relative;
    background: #ffffff;
    border-radius: 5px;
    padding: 20px 0 20px 0;
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    -webkit-transition: .3s ease;
    transition: .3s ease;
    /* Title */
    /* Inputs */
    /* Button */
    /* Footer */
    /* Alt Card */
  }
  .card:first-child {
    background: #fafafa;
    height: 10px;
    border-radius: 5px 5px 0 0;
    margin: 0 10px;
    padding: 0;
  }
  .card .title {
    position: relative;
    z-index: 1;
    border-left: 5px solid #333232;
    margin: 0 0 20px;
    padding: 10px 0 10px 50px;
    color:#333232;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
  }
  @media(max-width: 576px){
      .card .title {
          padding-left: 10px;
      }
  }
  .card .input-container {
    position: relative;
    margin: 0 60px 40px;
  }
  @media(max-width: 576px){
      .card .input-container{
          margin: 0 10px 20px;
      }
  }
  .card .input-container input {
    outline: none;
    z-index: 1;
    position: relative;
    background: none;
    width: 100%;
    height: 54px;
    border: 0;
    color: #212121;
    font-size: 20px;
    font-weight: 400;
  }
  .card .input-container input:focus ~ label {
    color: #9d9d9d;
    -webkit-transform: translate(-12%, -50%) scale(0.75);
            transform: translate(-12%, -50%) scale(0.75);
  }
  .card .input-container input:focus ~ .bar:before, .card .input-container input:focus ~ .bar:after {
    width: 50%;
  }
  .card .input-container input:valid ~ label {
    color: #9d9d9d;
    -webkit-transform: translate(-12%, -50%) scale(0.75);
            transform: translate(-12%, -50%) scale(0.75);
  }
  .card .input-container label {
    position: absolute;
    top: 0;
    left: 0;
    color: #757575;
    font-size: 24px;
    font-weight: 300;
    line-height: 60px;
    -webkit-transition: 0.2s ease;
    transition: 0.2s ease;
  }
  .card .input-container .bar {
    position: absolute;
    left: 0;
    bottom: 0;
    background: #757575;
    width: 100%;
    height: 1px;
  }
  .card .input-container .bar:before, .card .input-container .bar:after {
    content: '';
    position: absolute;
    background: #ec2652;
    width: 0;
    height: 2px;
    -webkit-transition: .2s ease;
    transition: .2s ease;
  }
  .card .input-container .bar:before {
    left: 50%;
  }
  .card .input-container .bar:after {
    right: 50%;
  }
  .card .button-container {
    margin: 0 60px;
    text-align: center;
  }
  @media(max-width: 576px){
      .card .button-container{
          margin: 0 10px;
      }
  }
  .card .button-container button {
    outline: 0;
    cursor: pointer;
    position: relative;
    display: inline-block;
    background: 0;
    width: 240px;
    border: 2px solid #e3e3e3;
    padding: 20px 0;
    font-size: 24px;
    font-weight: 600;
    line-height: 1;
    text-transform: uppercase;
    overflow: hidden;
    -webkit-transition: .3s ease;
    transition: .3s ease;
  }
  .card .button-container button span {
    position: relative;
    z-index: 1;
    color: #ddd;
    -webkit-transition: .3s ease;
    transition: .3s ease;
  }
  .card .button-container button:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    display: block;
    background: #ec2652;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    -webkit-transition: .3s ease;
    transition: .3s ease;
  }
  .card .button-container button:hover, .card .button-container button:active, .card .button-container button:focus {
    border-color: #333232;
  }
  .card .button-container button:hover span, .card .button-container button:active span, .card .button-container button:focus span {
    color: #333232;
  }
  .card .button-container button:active span, .card .button-container button:focus span {
    color: #ffffff;
  }
  .card .button-container button:active:before, .card .button-container button:focus:before {
    opacity: 1;
    -webkit-transform: scale(10);
    transform: scale(10);
  }
  .card .footer {
    margin: 40px 0 0;
    color: #d3d3d3;
    font-size: 24px;
    font-weight: 300;
    text-align: center;
  }
  .card .footer a {
    color: inherit;
    text-decoration: none;
    -webkit-transition: .3s ease;
    transition: .3s ease;
  }
  .card .footer a:hover {
    color: #bababa;
  }
  .card.alt {
    position: absolute;
    top: 40px;
    right: -70px;
    z-index: 10;
    width: 100px;
    height: 100px;
    background: none;
    border-radius: 100%;
    box-shadow: none;
    padding: 0;
    -webkit-transition: .3s ease;
    transition: .3s ease;
    /* Toggle */
    /* Title */
    /* Input */
    /* Button */
  }
  @media(max-width: 576px){
      .card.alt {
          right: 0;
          top: 0;
      }
  }
  .card.alt .toggle {
    position: relative;
    background: #333232;
    width: 100px;
    height: 130px;
    border-radius: 100%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    color: #ffffff;
    font-size: 42px;
    line-height: 93px;
    text-align: center;
    cursor: pointer;
  }
  .card.alt .toggle:before {
    content: '\efc2';
    display: inline-block;
    font-family: 'IcoFont';
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  .card.alt .title,
  .card.alt .input-container,
  .card.alt .button-container {
    left: 100px;
    opacity: 0;
    visibility: hidden;
  }
  .card.alt .title {
    position: relative;
    border-color: #ffffff;
    color: #ffffff;
  }
  .card.alt .title .close {
    cursor: pointer;
    position: absolute;
    top: -13px;
    right: 60px;
    display: inline;
    color: #ffffff;
    font-size: 58px;
    font-weight: 400;
  }
  .card.alt .title .close:before {
    content: '\00d7';
  }
  .card.alt .input-container input {
    color: #ffffff;
  }
  .card.alt .input-container input:focus ~ label {
    color: #ffffff;
  }
  .card.alt .input-container input:focus ~ .bar:before, .card.alt .input-container input:focus ~ .bar:after {
    background: #ffffff;
  }
  .card.alt .input-container input:valid ~ label {
    color: #ffffff;
  }
  .card.alt .input-container label {
    color: rgba(255, 255, 255, 0.8);
  }
  .card.alt .input-container .bar {
    background: rgba(255, 255, 255, 0.8);
  }
  .card.alt .button-container button {
    width: 100%;
    background: #ffffff;
    border-color: #ffffff;
  }
  .card.alt .button-container button span {
    color: #333232;
  }
  .card.alt .button-container button:hover {
    background: rgba(255, 255, 255, 0.9);
  }
  .card.alt .button-container button:active:before, .card.alt .button-container button:focus:before {
    display: none;
  }

  /* Keyframes */
  @-webkit-keyframes buttonFadeInUp {
    0% {
      bottom: 30px;
      opacity: 0;
    }
  }
  @keyframes buttonFadeInUp {
    0% {
      bottom: 30px;
      opacity: 0;
    }
  }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.toggle').on('click', function() {
          $('.form-animate').stop().addClass('active');
        });

        $('.close').on('click', function() {
          $('.form-animate').stop().removeClass('active');
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-signups').click(function(event ){
            event.preventDefault();
            $('#error_captcha').empty();
            jQuery('#register_user_frm').validationEngine({ focusFirstField: true });
            var valid = jQuery("#register_user_frm").validationEngine('validate');
            if(valid){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: base_url() + 'captchacode/checkCaptchaUser',
                    data: {code_captcha:$('#captcha_user').val(),captcha_check:$('#captcha_check').val()},
                    success: function (result) {
                        if(result.check==true){
                            document.form_u_register.submit();
                        }else{
                            $('#error_captcha').html(result.ms);
                        }
                    }
                })
            }
        });
    })
</script>