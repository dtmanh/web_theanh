<section class="content-header">
    <h1>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/news/categories')?>">Danh sách danh mục tin</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Cấu hình các thông số</h4>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group margin-bottom-20">
                        <a onclick="getModal_pagination_show()" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm mới 
                                </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="box-header">
    </div>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="2%" class="text-center no-sort">STT</th>
                <th width="15%">Tên mô tả</th>
                <th width="5%">Tên table</th>
                <th width="4%" class="no-sort ">Số phân trang</th>
                <th width="4%" class="no-sort text-center"> Độ rộng (px)</th>
                <th width="4%" class="no-sort text-center">Chiều cao (px)</th>
                <th width="3%" class="no-sort text-center hidden"> Active</th>
                <th width="4%" class="no-sort text-center"> Hoạt động </th>
            </tr>
        </thead>
        <tbody>
             <?php if (isset($config_pagination)) {
            $stt=0;
            foreach ($config_pagination as $key=>$bn) { $stt++;
                ?>
            <tr>
                <td class="text-center"><?=@$stt?></td>
                <td class=""><?=@$bn->name?></td>
                <td class=""><?=@$bn->name_table?></td>
                <td><?php if(@$bn->type=1){?><input type="number" oninput="update_value($(this))" value="<?=@$bn->pagination?>" data-view="pagination" data-placement="config_pagination" data-id="<?=@$bn->id ?>" style="width: 55px"><?php } ?></td>             
                <td class="text-center">  
                <?php if(@$bn->type=2){?><input type="number" oninput="update_value($(this))" value="<?=@$bn->width?>" data-view="width" data-placement="config_pagination" data-id="<?=@$bn->id ?>" style="width: 55px"><?php } ?>              
                </td>
                <td class="text-center">  
                 <?php if(@$bn->type=2){?><input type="number" oninput="update_value($(this))" value="<?=@$bn->height?>" data-view="height" data-placement="config_pagination" data-id="<?=@$bn->id ?>" style="width: 55px"><?php } ?>              
                </td>
                <td class="text-center hidden">
                   <label class="view_color view_active" data-value="<?=@$bn->id;?>" data-placement="config_pagination" data-view="active">
                        <input type="checkbox" checked  data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
                <td class="text-center">
                   <div class="btn-group">
                        <a onclick="getModal_pagination_edit(<?=@$bn->id?>)"
                    class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                      <a href="<?= base_url('techadmin/admin/xoa_config_pagination/' .$bn->id) ?>"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-danger" title="Sửa"><i class="fa fa-times"></i></a> 
                    </div>
                </td>
            </tr>
           <?php } } ?>
        </tbody>
    </table>
</section>
<script>
// them nút hiện thị
    function getModal_pagination_show() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_pagination',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    function getModal_pagination_edit(id) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_pagination',
            data: "id=" + id,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    function update_value(s) {
        var str = $(s).val();
        var id = $(s).data('id');
        $.ajax({
            url: base_url() +"ajax/ajax/update_value",
            type: 'POST',
            dataType: 'json',
            data: {id:id,table:s.attr('data-placement'),value:str,fill:s.attr('data-view')},
            success:function (result) {
            }
        })
    }
</script>