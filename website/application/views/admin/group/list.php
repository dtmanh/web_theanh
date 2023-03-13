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
        <li class="active"><a href="<?= base_url('techadmin/group/listGroup')?>">Danh sách module</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách module</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="javascript:void(0);" onclick="getModal_module()" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm mới
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
			<form name="formbk" method="post" action="<?=base_url('techadmin/group/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
							<th width="2%" class="no-sort">STT</th>
							<th width="15%">Tên module</th>
							<th width="20%">link</th>
							<th width="4%" class="no-sort text-center">icon</th>
							<th width="3%" class="no-sort text-center">Sắp xếp</th>
							<th width="3%" class="no-sort text-center">active</th>
							<th width="5%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
					<tbody>
                    <?php $stt=0; foreach ($cate as $k=>$v) { $stt++;?> 
					<tr>
                     <td><?=$stt?></td>
                     <td><?=@$v->name?></td>
                     <td><?=@$v->alias?></td>
                     <td><i class="fa <?=@$v->icon?>"></i></td>
                     <td><input type="number" onchange="update_sort($(this))" value="<?=@$v->sort?>"
                                data-placement='resources' data-item='<?=@$v->id?>' style="width: 55px">
                    </td>
                    <td class="text-center">
                        <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v->id;?>" id="cb_<?=$v->id;?>" <?=$v->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v->id;?>" data-placement="resources" data-view="active">
                                <label class="tgl-btn " for="cb_<?=$v->id;?>" ></label>
                    </td>
                    <td class='text-center'>
                        <div onclick="getModal_module(<?=@$v->id?>)"
                            class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></div>
                        <a href='<?=base_url('techadmin/group/deletecategory/' . $v->id)?>'
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                           class="btn btn-xs btn-danger"title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>
                    </td>
                </tr>
                
                <?php if (isset($v->catsub)) {
               $j=0; foreach ($v->catsub as $v2) { $j++; ?>
                    <tr>
                     <td><?=$stt?>.<?=@$j?></td>
                     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=@$v2->name?></td>
                     <td><?=@$v2->alias?></td>
                     <td><i class="fa <?=@$v2->icon?>"></i></td>
                     <td><input type="number" onchange="update_sort($(this))" value="<?=@$v2->sort?>"
                                data-placement='resources' data-item='<?=@$v2->id?>' style="width: 55px">
                    </td>
                    <td class="text-center">
                        <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v2->id;?>" id="cb_<?=$v2->id;?>" <?=$v2->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v2->id;?>" data-placement="resources" data-view="active">
                                <label class="tgl-btn " for="cb_<?=$v2->id;?>" ></label>
                    </td>
                    <td class='text-center'>
                        <div onclick="getModal_module(<?=@$v2->id?>)"
                            class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></div>
                        <a href='<?=base_url('techadmin/group/deletecategory/' . $v2->id)?>'
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                           class="btn btn-xs btn-danger"title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>
                    </td>
                </tr>
            <?php } } ?>
            <?php } ?>
					</tbody>
				</table>
			</form>	      
		</div>
	</div>
</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>
<style>
.todo-list .tools {
	position: relative;
	width: 100%;
    float: right;
    color: #dd4b39;
	z-index:-1;
}
.todo-list:hover .tools {
    z-index:100;
    width: 100%;
	top:3px;
    text-align: right;
}
.todo-list:hover .tools a{padding-right:10px;}
</style>