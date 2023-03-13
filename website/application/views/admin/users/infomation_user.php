<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://techtology4.0.com
#
# * @Copyright: 2017 - 2018              #
#****************************************#
?>
<section class="content-header">
    <h1>
    
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/users/listuser_admin')?>">Danh sách tài khoản</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Thông tin tài khoản</h4>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group margin-bottom-20">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="row">
        <?php $admin = $this->session->userdata('adminfull'); ?>
        <form class="validate form-horizontal" role="form" id="form-bk" name="frmAddUser" method="POST" action=""
            enctype="multipart/form-data">
            <input type="hidden" name="edit" id="id_edit" value="<?= @$admin->id; ?>">
            <div class="col-md-9" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="box-header">
                    </div>
                    <div class="panel-heading">
                        
                        <h3 class="panel-title pull-left">Tổng quan thông tin</h3>
                        <div class="pull-right">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label  class="col-sm-2 text-right">Tên tài khoản</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?=@$admin->username;?>" name="username_user" id="username_user" maxlength="35" class="form-control input-sm validate[required,minSize[3]]" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 text-right">Họ và tên</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?=@$admin->fullname;?>" name="fullname_user" id="fullname_user" maxlength="50" class="form-control input-sm"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 text-right">Email</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?=@$admin->email;?>" name="email_user" id="email_user" maxlength="50" class="form-control input-sm"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 text-right">Điện thoại</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?=@$admin->phone?>" name="phone" id="phone" maxlength="35" class="form-control input-sm validate[required,minSize[8]]" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 text-right">Giới tính</label>
                            <div class="col-sm-2">
                                <select name="sex_user" id="sex_user" class="form-control select-sm">
                                    <option value="1" <?php if(@$admin->sex == '1'){echo 'selected="selected"';} ?>>Nam</option>
                                    <option value="0" <?php if(@$admin->sex == '0'){echo 'selected="selected"';} ?>>Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="font-size: 12px">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title pull-left">Ảnh đại diện</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    
                    <div class="form-group">
                      <label class="col-sm-12 "></label>                      
                      <div class="clearfix"></div>
                      <br>
                      <div class="col-sm-12" id="view_img">
                        <div class="card hovercard">                    
                            <div class="cardheader"> 
                                <div class="avatar" style="top: 11px;">
                                    <?php if(file_exists(@$edit->image)){ ?>        
                                    <img src="<?=base_url($admin->avatar)?>" alt="<?=@$admin->fullname;?>" title="<?=@$admin->fullname;?>" data-toggle="modal" data-target="#avatar-modal" id="render-avatar" class="circular-fix has-shadow border marg-top10" data-ussuid="MQ==" data-backdrop="static" data-keyboard="false" data-upltype="avatar" style="width:150px; height:150px; max-width: 150px; max-height: 150px;">
                                     <?php }else{
                                          echo '<img src="'.base_url('upload/files/avata.png').'" data-toggle="modal" data-target="#avatar-modal" id="render-avatar" style="width:150px; height:150px; max-width: 150px; max-height: 150px;">';
                                        }
                                        ?>
                                    <i class="fa fa-pencil edit-pen"></i>
                                </div>
                            </div>
                            <div class="card-body info">
                                <div class="title">
                                    <a href="https://techarise.com/demos/codeigniter/profile"><?=@$admin->fullname;?></a>
                                </div>
                                <div class="desc"></div>                                     
                            </div>
                            <div class="card-footer bottom">
                                <a class="btn btn-primary btn-twitter btn-sm" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" rel="publisher" href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" rel="publisher" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>                    
                            </div>
                        </div>
                      </div><br />
                    </div>
                  </div>
                </div>
              </div>
        </form>
    </div>
</section>
<script>
$(document).ready(function () {
$(".validate").validationEngine();
});
</script>
<style type="text/css">
    .card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
        border-top-width: 0;
    border-bottom-width: 2px;
        border-radius: 3px;
            box-shadow: none;
                box-sizing: border-box;
}
.card.hovercard .cardheader {
    background: url(https://techarise.com/demos/codeigniter/assets/images/nature.jpg);
    background-size: cover;
    height: 135px;
}
.card.hovercard .avatar {
    position: relative;
    top: 50px;
    margin-bottom: -50px;
}
.card.hovercard .info {
    padding: 4px 8px 10px;
}
.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}
.card.hovercard .avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}
.card.hovercard .bottom .btn {
    border-radius: 50%;
    width: 32px;
    height: 32px;
    line-height: 18px;
}
.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}
.edit-pen {
    position: absolute;
    color: #01579B;
    background: #fff;
    padding: 5px;
    box-shadow: 1px 1px 1px 1px #eee;
    border-radius: 17px;
        right: 80px;
    bottom: 7px;
    border: 1px solid #f1f1f1;
}
.avatar-wrapper {
    height: 350px;
    width: 100%;
    margin-top: 15px;
    box-shadow: inset 0 0 5px rgba(0,0,0,.25);
    background-color: #fcfcfc;
    overflow: hidden;
}
.avatar-upload {
    overflow: hidden;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.modal-footer .btn+.btn {
    margin-bottom: 0;
    margin-left: 5px;
}
</style>