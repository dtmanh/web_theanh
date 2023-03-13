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

        <?=$btn_name;?> nhãn hiệu

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/attribute/listBrand')?>">Danh mục nhãn hiệu</a></li>

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

			<input type="hidden" id="catcheck" value="brand">

            <div class="col-md-9" style="font-size: 12px">

                <div class="panel panel-default">

					<div class="alert alert-dismissible" style="display:none;"></div>

                    <div class="panel-heading">

                        <h3 class="panel-title pull-left">Tổng quan</h3>

                        <div class="pull-right">

							<button type="button" <?php if (isset ($edit)) { ?> onclick="editItem()" <?php }else{ ?> onclick="createItem()" <?php } ?> class="btn btn-success btn-xs" name="add_news"><i

                                class="fa fa-check"></i> <?= @$btn_name; ?>

                            </button>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <div class="form-group">

                            <label  class="col-sm-12">Tên nhãn hiệu</label>

                            <div class="col-sm-12">

								<input type="text" oninput="createAlias(this)" class="form-control input-sm validate[required]" name="name"

                                    value="<?=@$edit->name;?>" placeholder="Tên"/>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-12 ">Alias :</label>

                            <div class="col-sm-12" id="error-alias">

                                <input type="text" onchange="createAlias(this)" id="alias" class="form-control input-sm validate[required]" name="alias"

                                    value="<?= @$edit->alias; ?>" placeholder=""/>

                            </div>

							<div id="error-alias"></div>

                        </div>

                        <div class="form-group hidden">

                            <label  class="col-sm-12">Mô tả</label>

                            <div class="col-sm-12">

                                <textarea name="description" class="form-control input-sm" placeholder=""

                                    id="ckeditor_description"   rows="4"><?=@$edit->description;?></textarea>

                                

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="keyword" class="col-sm-12">Title SEO</label>

                            <div class="col-sm-12">

                                <input type="text" name="title_seo" class="form-control input-sm" value="<?=@$edit->title_seo;?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label   class="col-sm-12" value="<?=@$edit->keyword_seo;?>">Từ khóa SEO</label>

                            <div class="col-sm-12">

                                <input type="text" name="keyword_seo" class="form-control input-sm" value="<?=@$edit->keyword_seo?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-12">Description SEO</label>

                            <div class="col-sm-12">

                                <textarea name="description_seo" class="form-control input-sm" id="ckeditor_seo" placeholder=""

                                    rows="4"><?=@$edit->description_seo?></textarea>

                            </div>

                        </div>

                        <div class="text-right" style="padding-bottom: 15px">

							<button type="button" <?php if (isset ($edit)) { ?> onclick="editItem()" <?php }else{ ?> onclick="createItem()" <?php } ?> class="btn btn-success btn-xs" name="add_news"><i

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

                        <label class="col-sm-12 hidden" style="padding-left: 0px">

                        Hiển thị

                        </label>

                        <div class="col-sm-12 view_checkbox hidden" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">

                            <label class="checkbox-inline">

                            <input type="checkbox" value="1"

                                name="men" <?= @$edit->men == 1 ? 'checked' : '' ?>>

                            Trang chủ

                            </label>

                            <label class="checkbox-inline" >

                            <input type="checkbox" value="1"

                                name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>

                            Nổi bật

                            </label>

                        </div>

                        <div class="clearfix"></div>
 

						<div class="form-group">

							<label  class="col-lg-4 control-label">Thứ tự:</label>

							<div class="col-lg-4">

								<input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />

							</div>

						</div>

                        <div class="form-group hidden">

                            <label class="col-sm-12 ">Hình ảnh</label>

                            <div class="col-sm-12">

                                <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />

                            </div>

							<div class="clearfix"></div>

							<br>

							<div class="col-sm-12" id="view_img">

								 <?php

								if(file_exists(@$edit->image)){ ?>

									<img src="<?=base_url($edit->image)?>" id="image_review" width="100%">

									<label class="col-sm-12 "></label>

									<button  type="button" onclick="delete_image($(this))" data-placement="product_brand" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

								<?php }else{

									echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';

								}

								?>

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

                url: base_url() + 'techadmin/alias/checkEdit',

                data: {id:$('#id_edit').val(),alias:$('#alias').val(),catcheck:$('#catcheck').val()},

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

</script>

