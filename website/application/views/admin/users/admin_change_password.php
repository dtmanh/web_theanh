<section class="content-header">
    <h1>
        Đổi mật khẩu
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/admin/admin_change_password')?>">Đổi mật khẩu</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12" style="font-size: 12px">
            <div class="panel panel-default">
                 <form class="form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data" >
                <div class="panel-heading">
                    <div class="alert alert-dismissible" style="display:none;"></div>
                    <h3 class="panel-title pull-left">Tổng quan</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Mật khẩu cũ:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control " name="old_pass"    />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Mật khẩu mới:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control " name="new_pass"    />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Xác nhận mật khẩu mới:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control " name="re_pass"    />
                        </div>
                    </div>



                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-sm" name="submit" onclick="$('#form1').submit();"><i class="fa fa-check"></i> Hoàn thành</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
