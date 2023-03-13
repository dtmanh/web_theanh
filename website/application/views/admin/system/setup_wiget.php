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

       Cấu hình widget

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/admin/setup_wiget')?>">Cấu hình widget</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">
        <!-- /.box-header -->
        <div class="panel panel-default">
           <div class="panel-heading">
              <div class="alert alert-dismissible" style="display:none;"></div>
              <ul class="nav nav-tabs">
                 <li class="active"><a data-toggle="tab" href="#menu1">Cấu hình widget</a></li>
              </ul>
           </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active"">
                  <div class="box-header">
                      <a href="javascript:void(0);" onclick="getModal_wiget_show()" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Thêm mới
                      </a> 
                  </div>
                  <table id="example" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="2%" class="text-center no-sort">STT</th>
                              <th width="15">Mô tả widget</th>
                              <th width="9%" class="no-sort text-center">Tên thư mục</th>
                              <th width="6%" class="no-sort text-center"> Hiện thị </th>
                              <th width="7%" class="no-sort text-center"> Hoạt động </th>
                          </tr>
                      </thead>
                      <tbody>
                           <?php if (isset($config_wiget)) {
                              $stt=0;
                              foreach ($config_wiget as $key=>$bn) { $stt++;
                                  ?>
                          <tr>
                              <td class="text-center"><?=$stt;?></td>
                               <td><input type="text" data-id="<?=@$bn->id ?>" data-view="name" data-placement="config_wiget" class="form-control input-sm " oninput="update_value($(this))" name="name"
                              value="<?=@$bn->name;?>" placeholder=""/></td>
                               <td class="text-center"><?=@$bn->field;?></td>
                              <td class="text-center">
                                  <label class="view_color view_active" data-value="<?=@$bn->id;?>" data-placement="config_wiget" data-view="active">
                                      <input type="checkbox" <?=@$bn->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                             data-on="Yes" data-off="No">
                                  </label>
                              </td>
                              <td class="text-center">
                                 <div class="btn-group">
                                      <a onclick="getModal_wiget_edit(<?=@$bn->id?>)"
                                  class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
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
                      function getModal_wiget_show() {
                          $('.modal').remove();
                          $.ajax({
                              type: "GET",
                              dataType:"html",
                              url: base_url() + 'techadmin/admin/popupdata_wiget',
                              data: "",
                              success: function (ketqua) {
                                  $('body').append(ketqua);
                                  $("#myModal").modal();
                              }
                          })
                      }
                      function getModal_wiget_edit(id) {
                          $('.modal').remove();
                          $.ajax({
                              type: "GET",
                              dataType:"html",
                              url: base_url() + 'techadmin/admin/popupdata_wiget',
                              data: "id=" + id,
                              success: function (ketqua) {
                                  $('body').append(ketqua);
                                  $("#myModal").modal();
                              }
                          })
                      }
                  </script>
                </div>
            </div>
        </div>

    </div>

</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">

<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>

