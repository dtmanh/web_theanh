<section class="container" style="margin-top: 20px">
        <section class="col-md-3 col-sm-12 col-xs-12">
            <div class="row">
                <?php foreach($widgets as $widget){
                    echo $widget;
                }?>
            </div>
        </section>
        <!---End .sidebar_box_1--->
        <section class="col-md-9 col-sm-12 col-xs-12" >
            <div class="title-right">
                Sửa thông tin tài khoản
            </div>
            <div class="form-register-aisle">
                <div class="aisle-content">
                    <form action="<?= base_url('users_frontend/updateProfile') ?>" method="post" class="validate
                    form-horizontal" enctype="multipart/form-data" name="changprofile" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Tên:</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?=@$user_item->fullname;?>" class="validate[required] form-control"
                                       name="fullname" id="fnullname" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Tên đăng nhập:</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?=@$user_item->username;?>" class="form-control"
                                       name="username" id="username"
                                       placeholder="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    value="<?=@$user_item->email;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Số điện thoại:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder=""
                                       value="<?=@$user_item->phone;?>" >
                            </div>
                        </div>
                        <br>
                        <hr>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-3" for="email">Tên cửa hàng:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder=""
                                       value="<?/*=@$user_item->shop_name;*/?>" >
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Địa chỉ</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address"><?=@$user_item->address;?></textarea>
                                <!--<input type="text" class="form-control" name="address" placeholder="Địa chỉ">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Logo:</label>
                            <div class="col-sm-9">
                                <div class="user_logo">
                                    <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />
                                    <img src="<?=base_url(@$user_item->logo);?>" id="image_review">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="ckeditor"><?=@$user_item->description?></textarea>
                                <?php echo display_ckeditor($ckeditor); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="update_profiler" id="btn-changepass" type="submit" class="btn btn-default pull-right">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div><!-- .loginbox-->
        </section>
        <!---End Left------->
</section>
<script>
    $(document).ready(function(){
        $(".validate").validationEngine();
    });
</script>
<script src="<?=base_url('assets/js/admin/main_site.js')?>"></script>