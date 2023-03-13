<div class="row">
                        <div class="col-md-12">
                          <div class="box box-body">
                            <div class="col-md-6">
                              <h4><i class="fa fa-list"></i> &nbsp; Cấu hình banner</h4>
                            </div>
                            <div class="col-md-6 text-right">
                              <div class="btn-group margin-bottom-20"> 
                                <a onclick="getModal_banner_show()" class="btn btn-success">
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
            <th width="15%">Tên hiển thị</th>
            <th width="4%" class="no-sort text-center">Tên trường</th>
            <th width="1%" class="no-sort text-center"> Hiện thị </th>
            <th width="1%" class="no-sort text-center"> Hoạt động </th>
        </tr>
    </thead>
    <tbody>
         <?php if (isset($config_banner)) {
            $stt=0;
            foreach ($config_banner as $key=>$bn) { $stt++;
                ?>
        <tr>
            <td class="text-center"><?=$stt;?></td>
             <td><input type="text" data-id="<?=@$bn->id ?>" data-view="name" data-placement="config_banner" class="form-control input-sm " oninput="update_value($(this))" name="name"
            value="<?=@$bn->name;?>" placeholder=""/></td>
             <td class="text-center"><?=@$bn->field;?></td>
            <td class="text-center">
                <label class="view_color view_active" data-value="<?=@$bn->id;?>" data-placement="config_banner" data-view="active">
                    <input type="checkbox" <?=@$bn->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                           data-on="Yes" data-off="No">
                </label>
            </td>
            <td class="text-center">
               <div class="btn-group">
                    <a onclick="getModal_banner_edit(<?=@$bn->id?>)"
                class="btn btn-xs btn-default hidden" title="Sửa"><i class="fa fa-pencil"></i></a>
                  <a href="<?= base_url('techadmin/admin/xoa_config_banner/' .$bn->id) ?>"
                 onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                </div>
            </td>
        </tr>
        <?php }  } ?>   
    </tbody>

</table>
<script>
// them nút hiện thị
    function getModal_banner_show() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_banner',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    function getModal_banner_edit(id) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_banner',
            data: "id=" + id,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
</script>