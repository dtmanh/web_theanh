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
        <?=$btn_name;?> danh mục hướng dẫn
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/admin/listDoc')?>">Danh mục hướng dẫn</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="row">
        <form class="validate form-horizontal" role="form" id="form-bk" method="POST" action=""
            enctype="multipart/form-data">
            <input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">
			<input type="hidden" name="addnews" value="1">
            <input type="hidden" id="catcheck" value="new">
			<div class="col-md-9" style="font-size: 12px">
                <div class="panel panel-default">
					<div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>
                        <div class="pull-right">
							<button type="submit"  class="btn btn-success btn-xs" name="add_news"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label  class="col-sm-12">Tên</label>
                            <div class="col-sm-12">
								<input type="text" class="form-control input-sm validate[required]" name="name"
                                    value="<?=@$edit->name;?>" placeholder="Tên"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-12">Mô tả hướng dẫn</label>
                            <div class="col-sm-12">
                                <textarea name="description" class="form-control input-sm" placeholder=""
                                    id="ckeditor_description"   rows="4"><?=@$edit->description;?></textarea>

                            </div>
                        </div>
                        <div class="text-right" style="padding-bottom: 15px">
							<button type="submit"  class="btn btn-success btn-xs" name="add_news"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tùy chọn</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
						<div class="form-group hidden">
							<label class="col-sm-12">Danh mục:</label>
							<div class="col-sm-12">
								<select name="parent" class="form-control">
									<option value="0">Lựa chọn</option>
									<?php show_cate($category,0,'',@$edit->parent_id,@$edit->id);?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-4 control-label">Thứ tự:</label>
							<div class="col-lg-4">
								<input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />
							</div>
						</div>
                        <div class="form-group">
                            <label class="col-sm-5 form-text">Trạng thái :</label>
                            <div class="col-sm-7">
                                <select name="active" class="form-control">
                                    <option <?php if(@$edit->active==1){echo "selected";} ?><?php if (isset ($edit)) { }else{ echo'selected'; } ?> value="1">Bật</option>
                                    <option <?php if (isset ($edit)) { ?> <?php if(@$edit->active==0){echo "selected";} }?> value="0">Tắt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.container-fluid -->
<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
