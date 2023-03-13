<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://techtology4.0.com
             #
# * @Copyright: 2017 - 2018              #
#****************************************#
?>
<style>.view_checkbox input[type=checkbox]{margin-top:2px }</style>
<section class="content-header">
    <h1>
        Gửi mail khuyến mãi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/email/emails')?>">Danh sách email</a></li>
        <li class="active"><a href="">Gửi mail khuyến mãi</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <div class="row">
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action=""
            enctype="multipart/form-data">
            <div class="col-md-12" style="font-size: 12px">
                <div class="panel panel-default">
					<div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-xs" name="send"><i
								class="fa fa-check"></i> Gửi mail
							</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Tiêu Đề <span
									style="color: red">* </span>:</label>

							<div class="col-lg-8">
								<input type="text" class="form-control " name="subject" placeholder="Tiêu đề"/>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Người nhận:</label>

							<div class="col-lg-8">
								<input type="text" class="form-control " name="mailto" style="font-size: 11px"
									   value="<?=@$_SESSION['email']?>" placeholder="Người nhận"/>
							</div>
						</div>
						<div class="form-group">
							<label for="inputcontent" class="col-lg-2 control-label">Nội dung:</label>

							<div class="col-lg-8">
								<textarea name="message" class="form-control input-sm" id="ckeditor_description"></textarea>
							</div>
						</div>
						<div class="text-center" style="padding-bottom: 15px">
							<button type="submit" class="btn btn-success btn-sm" name="send"><i
									class="fa fa-check"></i> Gửi mail
							</button>
						</div>
                    </div>
                </div>
            </div>
        </form>
	</div>
</section>
<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
