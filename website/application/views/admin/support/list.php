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
      
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/support/listSuport')?>">hỗ trợ trực tuyến</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp;  Hỗ trợ trực tuyến</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/support/add')?>" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm mới
                </a>
                <a onclick="ActionDelete('formbk')" class="btn btn-danger">
                <i class="fa fa-times"></i> Xóa
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
           
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form name="formbk" method="post" action="<?=base_url('techadmin/support/deletes')?>">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="2%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="3%" class="text-center">STT</th>
                            <th width="8%" class="no-sort hidden">Avatar</th>
							<th width='15%'>Họ tên</th>
							<th width="10%" class="no-sort">Phone</th>
							<th width='15%' class="no-sort">zalo</th>
							<th width='15%' class="no-sort">Skype</th>
							<th class="no-sort hidden">Chức vụ</th>
                            <th width="7%" class="no-sort">Hiển thị</th>
                            <th width="10%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($list)){
                            $i=1;
                            foreach($list as $v){?>
                        <tr>
                            <td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
                            <td class="text-center"><?= $i++;?></td>
                            <td class="hidden">
                                <?php if(file_exists($v->image)){?>
                                <img src="<?= base_url().@$v->image?>" style="max-width: 100px; max-height: 80px">
                                <?php }else{?>
                                <img src="<?= base_url('img/noimage.png')?>" style="max-width: 80px; max-height: 55px">
                                <?php } ?>
                            </td>
                            <td><a href="<?= base_url('techadmin/support/edit/'.$v->id)?>"><?= @$v->name?></a></td>
                            <td><?=@$v->phone;?></td>
							<td><?= $v->yahoo;?></td>
							<td><?= $v->skype;?></td>
							<td class="hidden">
								<?php if($v->type==0){echo "Kinh doanh";} ?>
								<?php if($v->type==1){echo "Kỹ thuật";} ?>
								<?php if($v->type==2){echo "Hotline";} ?>
							</td>
							<td  class="text-center">
                                <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v->id;?>" id="cb_<?=$v->id;?>" <?=$v->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v->id;?>" data-placement="support_online" data-view="active">
                                <label class="tgl-btn " for="cb_<?=$v->id;?>" ></label>

							</td>
                            <td class="text-center">
                                <a href="<?= base_url('techadmin/support/edit/'.$v->id)?>" class="btn btn-xs btn-default">
                                <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?= base_url('techadmin/support/delete/'.$v->id)?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </form>
        </div>
        <!-- /.box-body -->
        <!-- /.box -->
    </div>
</section>
<!-- /.content-wrapper -->
<style>
    .view_color{background-color:transparent !important; margin-top: 5px;cursor: pointer; }
</style>
<!-- DataTables -->
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>

<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>