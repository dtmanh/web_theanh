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

        <?=$btn_name;?> <?=@$show_listColor->name?>

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/attribute/listColor')?>"><?=@$show_listColor->name?></a></li>

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

							<button type="submit"   class="btn btn-success btn-xs" name="add_news"><i

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

                        <div class="form-group ">

                            <label class="col-sm-12 ">mã màu :</label>

                            <div class="col-sm-12" id="error-alias">

                                <input type="text" id="color" class="form-control input-sm" name="color"

                                    value="<?= @$edit->color; ?>" placeholder=""/>

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

                        <div class="text-right hidden" style="padding-bottom: 15px">

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
                        <div class="form-group">
                       <label  class="col-lg-4 control-label">Chọn màu:</label>
                        <input type="color" name="color" value="<?= @$edit->color; ?>">
                        </div>
                        <div class="form-group hidden">

                            <label class="col-sm-12">Danh mục:</label>

                            <div class="col-sm-12">

                                <div class="clearfix" style="border: 1px solid #ccc;padding: 5px">

                                    <div class=" checklist_cate cat_checklist">

                                        <?php if (isset($cate_selected)) $cate_selected = $cate_selected;

                                        else $cate_selected = null;

                                        view_cate_color_checklist($procat, 0, '', @$cate_selected)?>

                                    </div>

                                </div>

                            </div>

                        </div>

						<div class="form-group">

							<label  class="col-lg-4 control-label">Thứ tự:</label>

							<div class="col-lg-5">

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

									<button  type="button" onclick="delete_image($(this))" data-view="" data-placement="product_color" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

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
