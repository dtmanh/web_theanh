<div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Cấu hình banner</h4>
      </div>
      <div class="col-md-6 text-right">
          <div class="btn-group margin-bottom-20"> 
            <a onclick="getModal_site_option_show()" class="btn btn-success">
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
            <th width="15%">Tên ngôn ngữ</th>
            <th width="4%" class="no-sort text-center">ký hiệu</th>
            <th width="4%" class="no-sort text-center">image</th>
            <th width="1%" class="no-sort text-center"> Hiện thị </th>
            <th width="1%" class="no-sort text-center"> Hoạt động </th>
        </tr>
    </thead>
    <tbody>
         <?php if (isset($config_language)) {
            $stt=0;
            foreach ($config_language as $key=>$bn) { $stt++;
                ?>
        <tr>
            <td class="text-center"><?=$stt;?></td>
             <td><input type="text" data-id="<?=@$bn->id ?>" oninput="update_value($(this))" data-view="name_language" data-placement="site_option" class="form-control input-sm "  
            value="<?=@$bn->name_language;?>" placeholder=""/></td>
            <td class="text-center"><?=@$bn->lang;?></td>
             <td class="text-center">
                 <?php

                if(file_exists(@$bn->icon_language)){

                    echo '<img src="'.base_url($bn->icon_language).'" id="image_review" width="25">';

                }else{

                    echo '<img src="" id="image_review">';

                }

                ?>
             </td>
             <td class="text-center">
                <label class="view_color view_active" data-value="<?=@$bn->id;?>" data-placement="site_option" data-view="active">
                    <input type="checkbox" <?=@$bn->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                           data-on="Yes" data-off="No">
                </label>
            </td>
            <td class="text-center">
               <div class="btn-group">
                    <a onclick="getModal_site_option_edit(<?=$bn->id?>)"
                class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                  <a href="<?= base_url('techadmin/admin/delete_site_option/' .$bn->id) ?>"
                 onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                </div>
            </td>
        </tr>
        <?php }  } ?>   
    </tbody>

</table>
<script>
// them nút hiện thị
    function getModal_site_option_show() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_site_option',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    function getModal_site_option_edit(id) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_site_option',
            data: "id=" + id,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
</script>