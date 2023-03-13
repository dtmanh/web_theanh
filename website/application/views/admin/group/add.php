<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Thêm modules
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
            <form class="form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data" >
                <input type="hidden" name="edit" value="<?=@$edit->gro_id;?>">
                <div class="form-group clearfix">
                    <label class="col-md-2">Tên nhóm <span>(*)</span></label>
                    <div class="col-md-5">
                        <input type="text" value="<?=@$edit->gro_name;?>" name="name_group" id="name_group"
                               maxlength="100" class="input-sm form-control"/>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-2">Mô tả <span>(*)</span></label>
                    <div class="col-md-5">
                        <input type="text" value="<?=@$edit->gro_descr?>" name="descr_group" id="descr_group"
                               maxlength="100" class="form-control input-sm" />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-2">Vị trí </label>
                    <div class="col-md-1">
                        <input type="text" value="<?php if(@$edit->gro_order != ''){echo @$edit->gro_order;}else{echo '1';} ?>"
                               name="order_group" id="order_group" maxlength="4" class="form-control input-sm"  />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-2">Phân quyền <span>(Quản trị)</span> </label>
                    <div class="col-md-4">
                        <select name="permission_group[]" class="form-control selectper_formpost" multiple="multiple">
                            <option value="none" style="color:#F00;" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'none')){echo 'selected="selected"';}?>>Không phân quyền quản trị</option>
                            <option value="config_system" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'config_system')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Cấu hình hệ thống</option>
                            <optgroup label="Quản lý tin tức">
                                <option value="new_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Danh sách tin</option>
                                <option value="new_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Thêm tin</option>
                                <option value="new_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Sửa tin</option>
                                <option value="new_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Xóa</option>
                                <option value="new_cat_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_cat_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Danh mục tin</option>
                                <option value="new_cat_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_cat_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Thêm danh mục tin</option>
                                <option value="new_cat_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_cat_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Sửa danh mục tin</option>
                                <option value="new_cat_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'new_cat_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Tin tức : Xóa danh mục tin</option>
                            </optgroup>
                            <optgroup label="Quản lý sản phẩm">
                                <option value="pro_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Danh sách sản phẩm</option>
                                <option value="pro_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Thêm sản phẩm</option>
                                <option value="pro_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Sửa sản phẩm</option>
                                <option value="pro_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Xóa sản phẩm</option>
                                <option value="pro_cat_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_cat_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Danh mục sản phẩm</option>
                                <option value="pro_cat_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_cat_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Thêm danh mục sản phẩm</option>
                                <option value="pro_cat_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_cat_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Sửa danh mục sản phẩm</option>
                                <option value="pro_cat_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'pro_cat_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Sản phẩm : Xóa danh mục sản phẩm</option>

                                <optgroup label="Quản lý menu">
                                    <option value="menu_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xem danh sách menu</option>
                                    <option value="menu_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Thêm menu</option>
                                    <option value="menu_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Sửa menu</option>
                                    <option value="menu_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xóa menu</option>
                                </optgroup>
                                <optgroup label="Quản lý nội dung">
                                    <option value="page_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xem danh sách menu</option>
                                    <option value="page_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Thêm menu</option>
                                    <option value="page_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Sửa menu</option>
                                    <option value="page_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xóa menu</option>
                                </optgroup>
                                <optgroup label="Quản lý banner">
                                    <option value="banner_view" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_view')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xem danh sách menu</option>
                                    <option value="banner_add" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_add')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Thêm menu</option>
                                    <option value="banner_edit" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_edit')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Sửa menu</option>
                                    <option value="banner_delete" <?php if(@$edit->gro_permission != '' && stristr(@$edit->gro_permission,'menu_delete')){echo 'selected="selected"';}elseif(@$edit->gro_permission == ''){echo 'selected="selected"';} ?>>Menu : Xóa menu</option>
                                </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-2">Kích hoạt</label>
                    <div class="col-md-2">
                        <input type="checkbox" name="active_group" id="active_group" value="1" <?php if(@$edit->gro_status == '1'){echo 'checked="checked"';} ?> />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-offset-2 text-center col-md-4">
                        <button type="submit" class="btn btn-success btn-xs" name="addgroup"><i class="fa fa-check"></i> Lưu </button>
                    </div>
                </div>
            </form>
        </div>
</div>

</div>
<!-- /.container-fluid -->

</div>

