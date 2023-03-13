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
        <li class="active"><a href="<?= base_url('techadmin/news/categories')?>">Danh sách danh mục tin</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách tin</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/news/add')?>" class="btn btn-success">
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
        	<div class="col-sm-12" >
				<input type="hidden" id="autocomplete2" value="<?= $auto_name?>">
				<form action="" method="get">
					<div class="form-group row">
						<div class="col-sm-4">
							<input name="name" type="search" id="getautocomplete2" value="<?=$this->input->get('name');?>"
								   placeholder="Tên tin tức..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-3">
							<select name="cate" class="input-sm form-control">
								<option value="">Danh mục</option>
								<?php show_cate($cate,0,'',@$this->input->get('cate'));?>
							</select>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-sm btn-default">
								<i class="fa fa-search"></i>  Tìm kiếm
							</button>
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
			<form name="formbk" method="post" action="<?=base_url('techadmin/news/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <td>STT</td>
							<th width="">Tên</th>
							<th width="12%">Danh mục</th>
							<th width="7%" class="no-sort">Ảnh</th>
							<th width="5%" class="no-sort">Ngày đăng</th>
							<th width="7%" class="no-sort">Hiển thị</th>
							<th width="7%" class=" no-sort">Trạng thái</th>
                            <th width="8%" class="no-sort text-center">Chức năng</th>
                        </tr>
                    </thead>
					<tbody>
						 <?php if (isset($list)) {
                            $stt=1;
                            foreach ($list as $v) {
                                ?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td class="">
								<input type="number" onchange="update_sort($(this))" value="<?= @$v->sort ?>" id="sort" data-placement='news' data-item='<?= @$v->id; ?>' style="width: 55px">	
							</td>
							<td class="text-center hidden"><?= $stt++;?></td>
							<td><a href="<?= base_url('techadmin/news/edit/' . $v->id) ?>"><?= @$v->title ?></a></td>
							<td><?= @$v->cat_name->name ?></td>
							<td width="10%"><?php if (file_exists(@$v->image)) { ?>
									<img src="<?= base_url(@$v->image) ?>" style="height: 35px">
								<?php } else echo "<img src='".base_url('img/noimage.jpg')."' style='max-width: 35px; max-height: 35px'>" ?>
							</td>
							<td><?=date('d/m/Y',$v->time);?></td>
							<td>
                                 <div data-toggle="tooltip" data-placement="news" title="<?=@$show_home->name ?>"
                                    data-value="<?= $v->id; ?>" data-view="<?= @$show_home->field ?>"
                                    class='view_color <?php if(@$show_home->active ==0){ echo'hidden';} ?>'
                                    style="border: 1px solid #<?= @$show_home->color ?>;<?php if($v->home == 1){ echo'background-color:#'.$show_home->color.''; }else{ echo''; } ?>"></div>
                                <div data-toggle="tooltip" data-placement="news" title="<?=@$show_hot->name ?>"
                                    data-value="<?= $v->id; ?>" data-view="<?= @$show_hot->field ?>"
                                    class='view_color <?php if(@$show_hot->active ==0){ echo'hidden';} ?>'
                                    style="border: 1px solid #<?= @$show_hot->color ?>;<?php if($v->hot == 1){ echo'background-color:#'.$show_hot->color.''; }else{ echo''; } ?>"></div>
                                <div data-toggle="tooltip" data-placement="news" title="<?=@$show_focus->name ?>"
                                    data-value="<?= $v->id; ?>" data-view="<?= @$show_focus->field ?>"
                                    class='view_color <?php if(@$show_focus->active ==0){ echo'hidden';} ?>'
                                    style="border: 1px solid #<?= @$show_focus->color ?>;<?php if($v->focus == 1){ echo'background-color:#'.$show_focus->color.''; }else{ echo''; } ?>"></div>
                                <div data-toggle="tooltip"  data-placement="news" title="<?=@$show_chuy->name ?>"
                                     data-value="<?= $v->id; ?>" data-view="<?= @$show_chuy->field ?>"
                                     class='view_color <?php if(@$show_chuy->active ==0){ echo'hidden';} ?>'
                                     style="border: 1px solid #<?= @$show_chuy->color ?>;<?php if($v->button_1 == 1){ echo'background-color:#'.$show_chuy->color.''; }else{ echo''; } ?>"></div>
							</td>
							<td class="text-center ">
								<input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v->id;?>" id="cb_<?=$v->id;?>" <?=$v->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v->id;?>" data-placement="news" data-view="active">
								<label class="tgl-btn " for="cb_<?=$v->id;?>" ></label>

								 
							</td>
							<td class="text-center">
								<a href="<?=base_url('new/'.$v->alias.'.html')?>" class="btn btn-xs btn-default" target="_blank" title="Xem trước">
                                <i class="fa fa-eye"></i>
                                </a>
								<a class="btn btn-xs btn-default"
								   href="<?= base_url('techadmin/news/edit/' . $v->id) ?>"><i
										class="fa fa-pencil"></i> </a>
								<a class="btn btn-xs btn-danger"
								   href="<?= base_url('techadmin/news/delete/' . $v->id) ?>" title="Xóa"
								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
										class="fa fa-times"></i> </a>
							</td>
						</tr>
						<?php }  } ?>
					</tbody>
				</table>
				<?php
				echo $this->pagination->create_links(); // tạo link phân trang
				?>
			</form>	      
		</div>
	</div>
</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>


<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>
<script type="text/javascript">
   $(function(){

		var namefor  = $('#autocomplete2').val() ;
		var namefor = namefor.split(",");
		$('#getautocomplete2').autocomplete({
           lookup: namefor,
        });
   });
   // thay doi sap xep cac ban ghi
$("table tbody").sortable({
	update: function (event, ui) {
    $(this).children().each(function (index) {	   
    $(this).find('td #sort').val(index + 1);  
     var sort = index + 1;
     var id = $(this).find('td #sort').attr('data-item');
     var table = $(this).find('td #sort').attr('data-placement');
	  $.ajax({
            type: "POST",
            dataType: "html",
            url: base_url() + 'ajax/ajax/update_sort',
            data: {id:id, sort: sort,table:table},
            success: function (result) {	            	
            }
        });
    });
    var mss ='<div class="alert alert-success alert-dismissible" role="alert">\
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
	            <i class="icon fa fa-success"></i>Bạn đã thay đổi thành công !\
	    	</div>';
    $('#show_success_mss').html(mss);
    $('#show_success_mss').show();
    setTimeout(function(){
        $('#show_success_mss').empty();
    }, 3000)
 } });
</script>
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