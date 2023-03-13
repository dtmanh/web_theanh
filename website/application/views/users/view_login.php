<div class="clearfix-10"></div>
<main>
   <div class="container">
      <div class="row_pc">
        <div class="formLogin">
               <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <p class="text__title"> <strong>Xin chào! </strong> <br> Để có thể đăng nhập tại raovat.com bạn vui lòng đăng ký tài khoản hoặc đăng nhập bằng goole hoặc face</p>
                        <form id="loginform" role="form" autocomplete="on">
                           <table width="100%">

                              <tr>
                                    <td>
                                       <label for="">Email</label>
                                    </td>
                                    <td>
                                       <input id="login-username" type="text" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" class="id_acc form-control"
                                          class="validate[required,custom[email]]"   name="email" value="" autocomplete="on" placeholder="Email">
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                       <label for="">Mật khẩu</label>
                                    </td>
                                    <td>
                                       <input id="login-password" type="password" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" class="form-control pass_acc"
                                          name="password" placeholder="<?=lang('pass');?>">
                                    </td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><button type="button" onclick="login()">Đăng nhập</button> <button type="button" onclick="getModalForgotPass()" style="background: #d09b19;margin-left: 5px;">Quên mật khẩu</button></td>
                              </tr>
                              <tr>
                                    <td></td>
                                    <td>
                                       <div class="share">
                                          <p>Đăng nhập với tài khoản khác</p>
                                          <div class="share__link">
                                                <a href=""><img src="img/gg.png" alt=""><span>Google</span></a><a href=""><img src="img/fb.png" alt=""><span>Facebook</span></a>
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                           </table>
                        </form>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <p class="text__title"> <strong>Tạo tài khoản</strong> <br> Bạn sẽ nhận được email từ raovat.com để kích hoạt tài khoản vui lòng kiểm tra email mà bạn đã đăng ký kích hoạt trước khi sử dụng</p>
                       <form action="<?=base_url('dang-ky')?>" method="post"
                             name="form_u_register"
                             id="register_user_frm" class="validate">
                          <table width="100%">
                            <input type="hidden" value="<?=$formkey;?>" name="form_key">
                              <tr>
                                    <td>
                                       <label for="">Tên liên hệ</label>
                                    </td>
                                    <td>
                                       <input type="text" class="validate[required]" name="fullname">
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                       <label for="">Email</label>
                                    </td>
                                    <td>
                                       <input type="text" onBlur="check_mail($(this).val())"  id="email"
                                              class="validate[required,custom[email]] form-control" name="email">
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                       <label for="">Điện thoại</label>
                                    </td>
                                    <td>
                                       <input type="text" class="validate[custom[phone,minSize[10]]] form-control" name="phone"
                                       placeholder="<?=lang('phone');?>">
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                       <label for="">Mật khẩu</label>
                                    </td>
                                    <td>
                                       <input type="password" class="validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                              id="password" name="password">
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                       <label for="">Nhập lại</label>
                                    </td>
                                    <td>
                                       <input type="password" class="validate[required,equals[password]] form-control" name="repassword">
                                    </td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><button type="submit">Đăng ký</button></td>
                              </tr>
                          </table>
                       </form>
                     </div>
                  </div>
        </div>
      </div>
   </div>
</main>
