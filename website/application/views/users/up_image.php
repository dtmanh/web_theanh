<div id="images_u" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm ảnh sản phẩm</h4>
            </div>
            <div class="modal-body">
                <h2>Danh sách Ảnh</h2>
                <button type="button" class="btn btn-primary" id="showr">Thêm Ảnh</button>
                <button type="button" class="btn btn-danger" id="hidr">Ẩn</button>
                <div class="clearfix-10"></div>
                <div id="new_box">
                    <form action="<?=base_url('users/up_image')?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="email">File ảnh:</label>
                            <input type="hidden" name="pid" value="<?=$pro->id;?>" />
                            <input type="file" class="form-control" accept="image/*" id="exampleInputFile" name="userfile[]" onchange="preview(this)" multiple="multiple">
                            <div class="box-imgss img-responsive row" id="previewImg" ></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="Upload" class="btn btn-success pull-left">Thêm mới</button>
                        </div>
                    </form>
                </div>
                <div class="clearfix-10"></div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $imges = explode(',', $pro->multi_image); ?>
                    <?php if(!empty($imges[0])): ?>
                    <?php $stt=1; ?>
                    <?php foreach($imges as $row): ?>
                    <tr>
                        <td><?=$stt;?></td>
                        <td><img src="<?=base_url('upload/img/products').'/'.$pro->img_dir.'/'.$row?>" alt="Ảnh chi tiết sản phẩm" width="50" height="50"></td>
                        <td class="text-center"><a href="<?=base_url('users/del_img?pid='.$pro->id.'&img='.$row)?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php $stt++; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <strong>Warning!</strong> Hiện tại chưa có ảnh nào.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>

    </div>
</div>
<style>
    #new_box {
        padding: 5px;
    }
    .box-imgss {
        width: 100px;
        height: auto;
    }
    .box-imgss img {
        width: 100%;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#new_box" ).hide();
    });
    $( "#showr" ).click(function() {
        $( "#new_box" ).show("fast");
    });

    $( "#hidr" ).click(function() {
        $( "#new_box" ).hide(200);
    });

    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<img class='thumb img-thumbnail' style='float:left;' src='" + e.target.result + "'>");
                }
            });
        }
    }
</script>