<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12">
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i> <a href="<?= base_url('techadmin') ?>">Admin</a>
        </li>
        <li class="active">
            <i class="fa fa-table"></i> Cấu hình chung
        </li>
        <li >
            <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
        </li>
    </ol>
</div>
    <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
          enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                    class="fa fa-check"></i> Cập nhật
            </button>
        </div>
    </div>
<input type="hidden" name="edit" value="<?= @$row->id; ?>">
<div class="col-md-12" style="font-size: 12px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Hiển thị trang chủ</h3>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="col-sm-6">
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề cửa hàng nổi bật :</label>
                    <div class="col-sm-8">
                        <input name="store_focus" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$store_focus;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề Top danh mục :</label>
                    <div class="col-sm-8">
                        <input name="top_cat" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$top_cat;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Danh sách thương hiệu :</label>
                    <div class="col-sm-8">
                        <input name="list_brand" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$list_brand;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Danh sách danh mục :</label>
                    <div class="col-sm-8">
                        <input name="list_cate" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$list_cate;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Deal hot :</label>
                    <div class="col-sm-8">
                        <input name="deal_hot" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$deal_hot;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề mạng xã hội :</label>
                    <div class="col-sm-8">
                        <input name="social_title" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$social_title;?>" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề hỗ trợ:</label>
                    <div class="col-sm-8">
                        <input name="hotline_support" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$hotline_support;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề đăng ký nhận Email:</label>
                    <div class="col-sm-8">
                        <input name="tile_get_mail" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$tile_get_mail;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Tiêu đề thương hiệu nổi bật:</label>
                    <div class="col-sm-8">
                        <input name="top_brand" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$top_brand;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Sản phẩm bán chạy:</label>
                    <div class="col-sm-8">
                        <input name="title_pro_sale" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$title_pro_sale;?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 text-right">Coypyright:</label>
                    <div class="col-sm-8">
                        <input name="copy_right" type="text" class="validate[required] form-control input-sm"
                               value="<?=@$copy_right;?>" placeholder="">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="text-right" style="padding-bottom: 15px">
                <input type="hidden" value="1" name="form-config">
                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                        class="fa fa-check"></i> Cập nhật
                </button>
            </div>
        </div>
    </div>
</div>
</form>




</div>
<!-- /.row -->


<!-- /.row -->


<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>

