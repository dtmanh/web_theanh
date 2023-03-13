<div class="container">
    <form action="http://www.fashos.com/customer/account/loginPost/" method="post" id="login-form">
        <input name="form_key" type="hidden" value="K128f19Vx35OdY9N">

        <div class="row">
            <div class="account-login">
                <div class="page-title"><h1>
                        <button type="button" class="button login_btn">Đăng nhập</button>
                        <button type="button" title="Register" class="button" onclick="window.location = 'http://www.fashos.com/customer/account/create/';">Register</button></h1></div>
                <h2 class="page-heading">Đăng nhập tài khoản</h2>
                <section class="col-sm-6 col-md-6 col-lg-6 login_left">
                    <section class="container-with-large-icon login-form">
                        <div class="wrap">
                            <div id="form-returning">
                                <div class="form-group">
                                    <input type="text" name="login[username]" placeholder="Địa chỉ email" value="" id="email" class="form-control required-entry validate-email" title="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="login[password]" placeholder="Mật khẩu" class="form-control required-entry validate-password" id="pass" title="Password">
                                </div>
                                <div class="form-link">
                                    <button type="submit" class="btn btn-mega" title="Login" name="send" id="send2"><span><span>Đăng nhập</span></span></button>
                                    <a class="forgot_pass" href="http://www.fashos.com/customer/account/forgotpassword/">Quên mật khẩu</a>
                                </div>

                            </div>
                        </div>
                    </section>
                </section>
                <div class="middle_or_section col-sm-1 col-md-1 col-lg-1">Hoặc</div>
                <section class="col-sm-4 col-md-4 col-lg-4 login_right">
                    <section class="container-with-large-icon login-form">
                        <div class="wrap">
                            <div class="w3-socialconnect-social">
                                <div class="w3-social-button-login">
                                    <button data-retina="true" class="ico-go w3-icon-social" title="Connect with Google" onclick="showw3SocialPopup('http://www.fashos.com/w3_sociallogin/google/request/mainw_protocol/http/', 700, 500);"></button>
                                </div>
                            </div>
                            <a href="#" onclick="return fblogin();">
                                <img src="http://d1hpppl6timtc9.cloudfront.net/media/facebookfree/default/fb_login.jpg" alt="Connect with Facebook">
                            </a>
                            <br>
                        </div>
                    </section>
                </section>
            </div>
        </div>

    </form>
    <script type="text/javascript">
        //<![CDATA[
        var dataForm = new VarienForm('login-form', true);
        //]]>
    </script>

</div>