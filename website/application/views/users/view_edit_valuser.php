<div id="user_editv" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa thuộc tính: <?=$lists->name?></h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?=base_url('users/user_edit')?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="v_id" value="<?=$lists->description_id?>"/>
                        <input type="hidden" name="pro_dir" value="<?=$lists->pro_dir?>" />
                        <label for="name_val">Tên thuộc tính:</label>
                        <input type="text" name="name_val" class="form-control" value="<?=$lists->name?>" id="name_val">
                    </div>
                    <div class="form-group">
                        <label for="t_color">Màu sắc:</label>
                        <input type="text" class="form-control" name="t_color" id="t_color" value="<?=$lists->color?>" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1">Up ảnh: </label>
                        <input  type="file" id="images" name="userfile" class="form-control" />
                        <?php if(!empty($lists->image)): ?>
                        <img style="max-height: 120px;max-width: 100%" src="<?=base_url('upload/img/products').'/'.$lists->pro_dir.'/'.$lists->image?>" alt="<?=$lists->name?>" />
                        <?php endif; ?>
                    </div> 
                    <button type="submit" class="btn btn-default">Sửa</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
