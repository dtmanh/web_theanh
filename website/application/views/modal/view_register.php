<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title" style="text-align: center;font-size: 18px;
    font-weight: bold;"><?=lang('register');?> thành viên
                        <button style="color: red;opacity: 0.9" type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>

                <div class="panel-body user-register">
                    <div>
                        <div style="display:none; padding: 5px 10px;position: absolute" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    </div>
                    <form action="<?=base_url('dang-ky')?>" method="post"
                          name="form_u_register"
                          id="register_user_frm" class="validate form-horizontal"
                          role="form">
                        <input type="hidden" value="<?=$formkey;?>" name="form_key">
                        <div class="form-group">
                            <label for="firstname" class="col-md-12 control-label">
                                <?=lang('name');?> (*)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="validate[required] form-control" name="fullname"
                                       placeholder="<?=lang('name');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">
                                <?=lang('email');?> (*)
                            </label>
                            <div class="col-md-12">
                                <div id="show_error"></div>
                                <input type="text" onBlur="check_mail($(this).val())"  id="email"
                                       class="validate[required,custom[email]] form-control" name="email"
                                       placeholder="Email">
                                <input type="hidden" name="status_check" id="status_check" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-12 control-label"><?=lang('phone');?></label>
                            <div class="col-md-12">
                                <input type="text"
                                       class="validate[custom[phone,minSize[10]]] form-control" name="phone"
                                       placeholder="<?=lang('phone');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-12 control-label">Tỉnh thành</label>
                            <div class="col-md-12">

                                <select name="province" id="provice" class="validate[required] form-control">
                                    <option value="">Lựa chọn</option>
                                    <?php
                                    foreach(@$tinh as $t){?>
                                        <option value="<?=$t->id;?>"><?=$t->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class=" col-md-12 control-label">
                                <?=lang('pass')?> (*)
                            </label>
                            <div class="col-md-12">
                                <input type="password" class="validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                       id="password" name="password" placeholder="<?=lang('pass')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12 control-label">
                                <?=lang('re-pass');?> (*)
                            </label>
                            <div class="col-md-12">
                                <input type="password" class="validate[required,equals[password]] form-control" name="repassword" placeholder="<?=lang('re-pass');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12 col-sm-12 control-label"><?=lang('code_catpcha');?></label>
                            <div class="col-md-12 col-sm-12">
                                <div style="position: relative">
                                    <div id="error_captcha" class="text-danger"></div>
                                </div>
                                <input type="text" placeholder="..." class="form-control" name="captcha_user" id="captcha_user">

                            </div>
                            <div class="col-md-12 col-sm-12">
                                 <div id="id_capcha">
                                    <img src="<?php echo base_url().$imageCaptchaPostAds; ?>" width="100%" height="30" />
                                    <input type="hidden" id="captcha_check" value="<?=@$captcha_check;?>">
                                </div>

                            </div>
                              <div  class="pull-left" style="padding: 5px 10px 10px 10px; cursor: pointer">
                                <i class="fa fa-refresh" onclick="refresh_capcha()"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-12 col-md-12">
                                <button name="signups" id="btn-signups"  type="submit" class="btn btn-info">
                                 <?=lang('register');?></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    <?=lang('have_account');?> !
                                    <a onclick="loginModal()" style="cursor: pointer" data-dismiss="modal"  data-toggle="modal" data-target=".bs-example-modal-sm">
                                        <?=lang('login');?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>

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
