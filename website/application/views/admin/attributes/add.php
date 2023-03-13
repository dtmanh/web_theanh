<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://techtology4.0.com             #
# * @Copyright: 2017 - 2018              #
#****************************************#
?>
<section class="content-header">
    <h1>
        <?=$btn_name;?> thuộc tính
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/attribute/categories')?>">Danh sách thuộc tính</a></li>
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
            <div class="col-md-9" style="font-size: 12px">
                <div class="panel panel-default">
					<div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label  class="col-sm-12">Tiêu Đề</label>
                            <div class="col-sm-12">
                                <input type="text" oninput="createAlias(this)" class="form-control input-sm validate[required]" name="name"
                                    value="<?=@$edit->name;?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 ">Alias :</label>
                            <div class="col-sm-12" id="error-alias">
                                <input type="text" onchange="createAlias(this)" id="alias" class="form-control input-sm validate[required]" name="alias"
                                    value="<?= @$edit->alias; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-12">Mô tả</label>
                            <div class="col-sm-12">
                                <textarea name="description" class="form-control input-sm" placeholder=""
                                    id="ckeditor_description"   rows="4"><?=@$edit->description;?></textarea>
                                
                            </div>
                        </div>
                        <div class="text-right" style="padding-bottom: 15px">
                            <input type="hidden" name="addnews" value="1">
                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i
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
                        <label class="col-sm-12" style="padding-left: 0px">
                        Hiển thị
                        </label>
                        <div class="col-sm-12 view_checkbox" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">
                            <label class="checkbox-inline">
								<input type="checkbox" value="1"
									name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
								Trang chủ
                            </label>
                        </div>
                        <div class="clearfix"></div>
                        <br>
						<div class="form-group">
							<label  class="col-sm-12 ">Danh mục</label>
							<div class="col-sm-12  " >
								<div class=" checklist_cate cat_checklist" style="border: 1px solid #ccc; padding: 5px" >
									<?php if (isset($cate_selected)) $cate_selected = $cate_selected;
										else $cate_selected = null;
								view_cate_checklist_firt($cate, 0, '', @$cate_selected)?>
								</div>
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
<script type="text/javascript">
	function editItem(){
        $('#error-alias .alert-danger').remove();
        if($('#form-bk').validationEngine('validate')){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: base_url() + 'techadmin/alias/checkNewEdit',
                data: {id:$('#id_edit').val(),alias:$('#alias').val()},
                success:function(result){
                    if(result.check == true){
                        $('#form-bk').submit();
                    }else{
                        $('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Vui lòng nhập alias khác</div>');
                    }
                }
            });
        }
    }
	$(document).ready(function(){
		$('.chk').on('change', function() {
		   $('.chk').not(this).prop('checked', false);
		   $('#result').html($(this).data( "id" ));
		   if($(this).is(":checked"))
			$('#result').html($(this).data( "id" ));
		   else
			$('#result').html('Empty...!');
		});
	}); 
</script>
