<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="clearfix"></div>
<section class="container">
    <div class="row">
        <ul class="back_link breadcrumb">
            <li><a href="<?=base_url();?>">Trang chủ</a></li>
            <li><a href="javascript:void(0)">Quản lý tài khoản</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <?php echo $this->load->widget('blkmenu_users');?>
        <section class="col-sm-9 col-md-9 col-right col-lg-9 content-center">
            <header class="page-header">
                <h1 class="page-title">
                    Quản lý tài khoản
                </h1>
            </header>
            <div class="clearfix-20"></div>
            <div class="block block-account">
                <div class="box-account box-info clearfix">
                <div class="infor_acount clearfix  col-md-6  col-sm-6" style="padding-left: 0px">
                    <div class="panel panel-default">
                    <div class="panel-heading">Thông tin tài khoản</div>
                    <div class="clearfix"></div>
                    <div class="panel-body">
                        <form id="change-profile" action="<?=base_url('thong-tin-tai-khoan')?>" method="post" class="validate form-horizontal" enctype="multipart/form-data" role="form">
                        <input type="hidden" name="token" value="profile"/>
                        <div class="123">
                        <div class="form-group">
                            <label class="col-sm-3">Điện thoaị</label>
                            <div class="col-sm-9">
                                <input type="text" disabled class="validate[required] form-control input-sm " name="phone" value="<?=$user_info->phone;?>" placeholder="" id="phonenumber">
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Họ tên</label>
                            <div class="col-sm-9">
                                <input type="text" class="validate[required] form-control" name="last_name" value="<?=@$user_info->fullname?>" />
                            </div>
                        </div>
                       
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Ảnh đại diện</label>
                            <div class="col-sm-9">
                                <input type="file" name="userfile" value="" id="filePhoto" class="btn btn-primary required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                <?php if(!empty($user_info->avatar)): ?>
                                    <img id="previewHolder" src="<?=base_url('upload/img/avatar').'/'.$user_info->avt_dir.'/'.$user_info->avatar?>" alt="Uploaded Image Preview Holder" width="100%" />
                                <?php else: ?>
                                    <img id="previewHolder" style="display: none" alt="Uploaded Image Preview Holder" width="100%" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group hidden">
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" id="user_email" class="validate[required] form-control form-control input-sm " name="email" value="<?=$user_info->email;?>" placeholder="">
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Địa chỉ</label>
                            <div class="col-sm-9">
                                <textarea name="address" placeholder="Ví dụ : 52 đường Lê Quang Đạo, Q.Nam Từ Liêm" class="validate[required] form-control" id="address"><?=$user_info->address;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3">Tỉnh thành</label>
                            <div class="col-md-9">
                                <select name="province" id="provice" class="form-control" onchange="getdistrict(this)" data-district = "<?php echo $user_info->address_province; ?>">
                                    <option disabled selected>Lựa chọn Tỉnh/ Tp </option>
                                    <?php
                                    foreach(@$tinh as $t){?>
                                        <option <?php if($t->provinceid == $user_info->address_province){echo "selected";} ?> value="<?=$t->provinceid;?>"><?=$t->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <br>
                                <select name="district" id="district" class="form-control" onchange="getward(this)" data-district = "<?php echo $user_info->address_district; ?>">
                                    <option disabled selected>Chọn Quận/Huyện</option>

                                    <?php foreach(@$huyen as $t) { ?>
                                        <option <?php if($t->districtid == $user_info->address_district){echo "selected";} ?> value="<?=$t->districtid;?>"><?=$t->name;?></option>
                                    <?php   } ?>

                                </select>
                                <br>
                                <select name="ward" id="ward" class="form-control" data-ward="<?php echo $user_info->address_ward; ?>">
                                    <option disabled selected>Chọn Xã/Thị Trấn</option>
                                    <?php foreach(@$xa as $t) { ?>
                                        <option <?php if($t->wardid == $user_info->address_ward){echo "selected";} ?> value="<?=$t->wardid;?>"><?=$t->name;?></option>
                                    <?php   } ?>
                                </select>

                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group" style="display: none">
                            <label class="col-md-3">Giới tính</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <label class="checkbox-inline" style="text-transform: none">
                                        <input type="radio" value="122" name="cate_tour[]">
                                        Nam
                                    </label>

                                    <label class="checkbox-inline" style="text-transform: none">
                                        <input type="radio" value="122" name="cate_tour[]">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">&nbsp;</label>
                            <div class="col-sm-9">
                                <button name="update_profiler" type="submit" class="btn btn-blue btn-sm pull-right">
                                    <div class="button-green">
                                        <i class="icons icon-basket-2"></i>Cập nhật
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        </div>
                        </form>
                    </div>
                </div>
                </div>

                <div class="infor_acount clearfix col-md-6 col-sm-6" style="padding-right: 0px">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thay đổi mật khẩu</div>
                            <div class="panel-body">
                            <form id="change-pass" action="<?=base_url()?>doi-mat-khau" method="post" class="validate form-horizontal" role="form">
                                <div class="123">
                                    <div class="form-group">
                                        <label class="col-sm-4">Tài khoản</label>
                                        <label class="col-sm-8"><?=@$user_info->phone;?></label>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Mật khẩu cũ</label>
                                        <div class="col-sm-8">
                                            <div id="show_error_pass2"></div>
                                            <input type="password" class="validate[required] form-control" id="old_pass"  name="old_pass" placeholder="Mật khẩu cũ">

                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Mật khẩu mới</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="input-text required-entry validate[required] form-control" id="new_pass" name="new_pass" placeholder="Mật khẩu mới">

                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Xác nhận mật khẩu mới</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="input-text validate[required] form-control" name="id" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4">&nbsp;</label>
                                        <div class="col-sm-8">
                                            <button type="button" id="send-change-pass" name="update_pass" class="btn btn-blue btn-sm pull-right">
                                                <div class="button-green">
                                                    <i class="icons icon-basket-2"></i>Cập nhật mật khẩu
                                                </div>
                                            </button>
                                        </div>
                                        <div class="clearfix-5"></div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </section>
    </div>
</section>
<style type="text/css">
    #filePhoto{padding-right: 0px !important;}
</style>
<script>
    $(document).ready(function(){
        $('#send-change-pass').click(function(){
            $('.old_passformError').remove();
            var old_pass = $('#old_pass').val();
            var new_pass = $('#new_pass').val();
            var phonenumber = $('#phonenumber').val();
            if($('#change-pass').validationEngine('validate')){
                jQuery.ajax({
                    url: base_url() + 'doi-mat-khau',
                    type: "POST",
                    dataType: "json",
                    data: {old_pass:old_pass,new_pass:new_pass,phone:phonenumber},
                    success : function(res){
                        if(res.check == false){
                            //alert('Mật khẩu cũ không chính xác ! Vui lòng thử lại');
                            $('<div class="old_passformError parentFormchange-pass formError" style="opacity: 0.87; position: absolute; top: 0px; left: 208px; margin-top: -50px;"><div class="formErrorContent">* Mật khẩu cũ không chính xác<br></div><div class="formErrorArrow"><div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div></div></div>').insertAfter('#old_pass');
                        }else{
                            alert('Bạn vùa cập nhật mật khẩu thành công !!!');
                        }
                    }
                });
            }
        });

    });
    /*$('#old_pass').on('change',function(){
        $('.old_passformError').remove();
        var val = $(this).val();
        jQuery.ajax({
            url: base_url() + 'users/check_old_pass',
            type: "POST",
            dataType: "json",
            data: {pass:val},
            success : function(res){
                if(res.check == false){
                    $('<div class="old_passformError parentFormchange-pass formError" style="opacity: 0.87; position: absolute; top: 0px; left: 208px; margin-top: -50px;"><div class="formErrorContent">* Mật khẩu cũ không chính xác<br></div><div class="formErrorArrow"><div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div></div></div>').insertAfter('#old_pass');
                }            }
        });
    });*/
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewHolder').show();
                $('#previewHolder').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#filePhoto").change(function() {
        readURL(this);
    });
</script>
