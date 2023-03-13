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

       Cấu hình sản phẩm

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/admin/setup_product')?>">Cấu hình thuộc tính sản phẩm</a></li>

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
                 <li class="active"><a data-toggle="tab" href="#home">Thuộc tính </a></li>
                 <li><a data-toggle="tab" href="#menu1">Các nút tích</a></li>
                 <li><a data-toggle="tab" href="#menu2">Các trường trong cấu hình</a></li>
                 <li><a data-toggle="tab" href="#menu3">Cấu hình menu</a></li>
                 <li><a data-toggle="tab" href="#menu4">Cấu hình banner</a></li>
                 <li><a data-toggle="tab" href="#menu5">Cấu hình ngôn ngữ</a></li>
                 <li><a data-toggle="tab" href="#menu6">Cấu hình hotline</a></li>
                
              </ul>
           </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="box box-body">
                            <div class="col-md-6">
                              <h4><i class="fa fa-list"></i> &nbsp; Thuộc tính</h4>
                            </div>
                            <div class="col-md-6 text-right">
                              <div class="btn-group margin-bottom-20"> 
                                <a onclick="getModal_attpro()" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm mới
                                </a>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    <div class="box-header">
                       
                    </div>
                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="2%" class="no-sort">STT</th>

                                    <th width="15%">Tên thuộc tính</th>
                                    <th width="4%" class="no-sort text-center">Loại</th>

                                    <th width="3%" class="no-sort text-center">Sắp xếp</th>

                                    <th width="5%" class="no-sort text-center">Action</th>

                                </tr>

                            </thead>

                            <tbody>
                                 <?php if (isset($thuoctinh)) {
                                    $stt=0;
                                    foreach ($thuoctinh as $key=>$v) { $stt++;
                                        ?>
                                <tr>
                                     <td><?=$stt;?></td>
                                     <td><?=@$v->name?></td>
                                    <td class="text-center"><?=@$v->type?></td>
                                    <td class="text-center"><?=@$v->sort?>
                                    </td>
                                    <td class="text-center">
                                       <div class="btn-group">
                                            <a onclick="getModal_edit_attpro(<?=$key?>)"
                                        class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                          <a href="<?= base_url('techadmin/admin/xoa_thuoctinh/' . $key) ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                                <?php }  } ?>
                            </tbody>

                        </table>
                    </form>    
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="box box-body">
                            <div class="col-md-6">
                              <h4><i class="fa fa-list"></i> &nbsp; Các nút tích</h4>
                            </div>
                            <div class="col-md-6 text-right">
                              <div class="btn-group margin-bottom-20"> 
                                <a onclick="getModal_button_show()" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm mới nút
                                </a>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                    <div class="box-header">
                       
                    </div>
                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="2%" class="no-sort">STT</th>
                                    <th width="15%">Tên check box</th>
                                    <th width="7%" class="no-sort text-center">module áp dụng</th>
                                    <th width="4%" class="no-sort text-center">Tên trường</th>
                                    <th width="3%" class="no-sort text-center"> Mã màu</th>
                                    <th width="3%" class="no-sort text-center"> Hiện thị </th>
                                    <th width="5%" class="no-sort text-center"> Hoạt động </th>
                                </tr>

                            </thead>

                            <tbody>
                                 <?php if (isset($show_button)) {
                                    $stt=0;
                                    foreach ($show_button as $key=>$v) { $stt++;
                                        ?>
                                <tr>
                                    <td class="text-center"><?=$stt;?></td>
                                     <td><?=@$v->name?></td>
                                     <td class="text-center"><?=@$v->type?></td>
                                    <td class="text-center"><?=@$v->field?></td>
                                    <td class="text-center"><?=@$v->color?>
                                    </td>
                                    <td class="text-center">
                                        <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v->id;?>" id="cb_<?=$v->id;?>" <?=$v->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v->id;?>" data-placement="config_checkpro" data-view="active">
                                <label class="tgl-btn " for="cb_<?=$v->id;?>" ></label> 

                                        
                                    </td>
                                    <td class="text-center">
                                       <div class="btn-group">
                                            <a onclick="getModal_edit_showbut(<?=@$v->id?>)"
                                        class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                          <a href="<?= base_url('techadmin/admin/xoa_showbut/' .$v->id) ?>"
                                         onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                                <?php }  } ?>
                            </tbody>

                        </table>
                    </form> 
                </div>
                 <div id="menu2" class="tab-pane fade">
                    <?= $this->load->views('admin/system/setup_option'); ?>
                 </div>
                 <div id="menu3" class="tab-pane fade">
                 <?= $this->load->views('admin/system/setup_menu'); ?>
                </div>
                <div id="menu4" class="tab-pane fade">
                 <?= $this->load->views('admin/system/setup_banner'); ?>
                </div>
                <div id="menu5" class="tab-pane fade">
                 <?= $this->load->views('admin/system/setup_language'); ?>
                </div>
                <div id="menu6" class="tab-pane fade">
                  <?= $this->load->views('admin/system/setup_hotline'); ?>
                </div>
                 
            </div>
        </div>

    </div>

</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">

<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?=base_url('assets/js_admin/system_config.js')?>"></script>

<script>
    // them thuoc tính sản phẩm
    function getModal_attpro() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_attpro',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // sưa thuoc tính sản phẩm
    function getModal_edit_attpro(key) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_attpro',
            data: "key=" + key,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // them nút hiện thị 
    function getModal_button_show() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_butshow',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // sưa button
    function getModal_edit_showbut(id) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'techadmin/admin/popupdata_butshow',
            data: "id=" + id,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }

</script>
