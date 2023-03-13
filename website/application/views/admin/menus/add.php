

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-sm-12">
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i> <a href="<?=base_url('techadmin')?>">Dashboard</a>
        </li>
        <li>
            <a href="<?= base_url('techadmin/menu/menulist') ?>">Menus</a>
        </li>
        <?php if (isset ($error)) { ?>
            <li class="">
                <span style="color: red"> <?= $error; ?></span>
            </li>
        <?php } ?>
    </ol>
</div>
<div class="col-md-12">
<div class="body collapse in" id="div1">
<div class="alert alert-dismissible" style="display:none;"></div>
<form class="form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="edit_id" id="id_edit" value="<?=@$id_edit;?>">
<input type="hidden" value="<?=@$langguage;?>" id="lang" >
<div class="col-md-8" style="font-size: 12px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Tổng quan</h3>

            <div class="pull-right">
                <button type="submit" class="btn btn-success btn-sm" name="addmenu"><i class="fa fa-save"></i> Lưu
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body" style="min-height: 530px">
            <div class="form-group">
                <label for="inputEmail1" class="col-sm-2 control-label">Tên menu:</label>

                <div class="col-sm-7">
                    <input type="text" class="form-control input-sm " name="title"
                           value="<?=@$edit->name;?>" placeholder="Tên menu"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Alias:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control input-sm <?php if($this->language == 'ja'){echo "validate[required]";}?>" name="alias"
                           value="<?= @$edit->alias; ?>" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Vị trí:</label>

                <div class="col-sm-5">
                    <select name="position" class="form-control input-sm"
                            onchange="select_lang($('#lang').val(),$(this).val())" id="position">

                        <option value="main"<?=(@$edit->position=='main'||@$position=='main')?'selected':''?>>Menu Main</option>

                        <?php $stt=0; foreach ($config_menu as $key=>$m) { $stt++; ?>
                        <option value="<?=@$m->type;?>"<?=(@$edit->position==$m->type ||@$position==$m->type)?'selected':''?>><?=@$m->name?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-sm-2 control-label">Menu cha:</label>

                <div class="col-sm-5">
                    <select name="parent" class="form-control input-sm" id="parent_menu">
                        <option value="0">Lựa chọn</option>
                        <?php show_menu_select($menu,0,'',@$edit->parent_id);?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Module:</label>

                <div class="col-sm-5">
                    <!--<option value="news" /*<?/*= @$edit->module=='news'?'selected':''*/?>*/ >Tin tức</option>-->
                    <select name="module" id="sc_get" class="form-control input-sm">
                        <option value="0">Chọn module</option>
                        <?php if(isset($module_news)){ ?>
                        <option value="news" <?=@$edit->module=='news'?'selected':''?> >Tin bài</option><?php } ?> 
                        <?php if(isset($module_pro)){ ?>
                        <option value="products" <?=@$edit->module=='products'?'selected':''?> >Menu sản phẩm</option><?php } ?> 
                        <?php if(isset($module_media)){ ?>
                        <option value="media" <?=@$edit->module=='media'?'selected':''?> >Menu media</option><?php } ?> 
                        <?php if(isset($module_page)){ ?>
                        <option value="pages" <?=@$edit->module=='pages'?'selected':''?> >Trang nội dung</option><?php } ?> 
                        <?php if(isset($module_video)){ ?>
                        <option value="video" <?=@$edit->module=='video'?'selected':''?> class="hidden">Menu video</option><?php } ?> 
                         <?php if(isset($module_brand)){ ?>
                        <option value="brand" <?=@$edit->module=='brand'?'selected':''?> >Menu thương hiệu</option>
                         <?php } ?>
                        <?php if(isset($module_xuatxu)){ ?>
                        <option value="locale" <?=@$edit->module=='locale'?'selected':''?> >Menu xuất xứ</option>
                        <?php } ?>
                        <?php if(isset($module_raovat)){ ?>
                        <option value="raovat" <?=@$edit->module=='raovat'?'selected':''?> >Menu tin rao</option><?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Trỏ đến:</label>
                <div class="col-sm-5">
                    <select name="subcat" id="sc_show" class="form-control input-sm">						 <?php show_cate_menu2($cate_edit,0,'',@$edit->alias2)?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">URL:</label>

                <div class="col-md-9">
                    <input name="url" type="text" id="url_menu" class="form-control input-sm" value="<?=@$edit->url;?>">
                    <span class="label label-info">(Link URL Khác trang) <input type="checkbox" name="seturl" value="1" <?= (@$edit->seturl == 1)?'checked':'' ?> class="checkbox checkbox-inline" id="seturl"></span>


                    <input type="hidden" id="products" value="<?=$module_link['products'];?>">
                    <input type="hidden" id="brand" value="<?=$module_link['brand'];?>">
                    <input type="hidden" id="news" value="<?=$module_link['news'];?>">
                    <input type="hidden" id="pages" value="<?=$module_link['page'];?>">
                    <input type="hidden" id="media" value="<?=$module_link['media'];?>">
                    <input type="hidden" id="raovat" value="<?=$module_link['raovat'];?>">
                    <input type="hidden" id="locale" value="<?=$module_link['locale'];?>">
                    <input type="hidden" id="video" value="<?=$module_link['video'];?>">
					<input type="hidden" name="id" id="id" value="<?=@$edit->id_cat;?>">

                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-sm-2 control-label">Mô Tả:</label>

                <div class="col-sm-9">
                    <textarea name="description" rows="6"
                            id="ckeditor_description"  class="form-control input-sm" placeholder="Mô tả" ><?=@$edit->description;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-sm-2 control-label "> </label>

                <div class="col-sm-5">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm" name="addmenu"><i class="fa fa-save"></i> Lưu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!---endleft--->
<div class="col-md-4" style="font-size: 12px;padding:0px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Tùy chọn</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Target:</label>

                <div class="col-md-5">

                    <label class="radio-inline">
                        <input type="radio" name="target" value="" <?=(!isset($edit->target)||$edit->target=='')?'checked':'';?> />Tab hiện tại
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="target" value="_blank" <?=(@$edit->target=='_blank')?'checked':'';?>> Tab mới
                    </label>
                </div>
            </div>
            <input type="hidden" id="baseurl" value="<?=base_url();?>">

            <div class="form-group">
				<label class="col-sm-12 ">Hình ảnh icon</label>
				<div class="col-sm-12">
					<input type="file" name="userfile" id="input_img" onchange="handleFiles()" />
				</div>
				<div class="clearfix"></div>
				<br>
				<div class="col-sm-12">
					<div class="col-sm-12" id="view_img" style="background:#ddd;padding:15px;">
						<?php
						if(!empty($edit->image)){ ?>
							<img src="<?=base_url(''.$edit->image)?>" id="image_review" style="max-width:100%">
							<div class="clearfix"></div>
							<br />
							<button  type="button" onclick="delete_image($(this))" data-placement="menu" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>
						<?php }else{
							echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';
						}
						?>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>

</div>
<!-- /.row -->


<!-- /.row -->


<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>

<script src="<?= base_url('assets/js_admin/admin_menu.js')?>"></script>
<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
