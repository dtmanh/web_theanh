<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://techtology4.0.com
             #
# * @Copyright: 2017 - 2018              #
#****************************************#
?>
<?php
//load the database configuration file
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>

<section class="content-header">
    <h1>
       Danh sách ứng viên
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/users/listAll')?>">Danh sách ứng viên</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	 
    <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp;  Danh sách ứng viên</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                  <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();" class="btn btn-info">
            <i class="fa fa-file-excel-o"></i> Import data
            </a>
             <a onclick="export_user_excel('formbk')" class="btn btn-warning">
            <i class="fa fa-file-excel-o"></i> Export data
            </a>
              </div>
               <style type="text/css">
				    .panel-heading a{float: right;}
				    #importFrm{margin-bottom: 20px;display: none;}
				    #importFrm input[type=file] {display: inline;}
				  </style>
            </div>
             <div class="col-md-12">
              	<form action="<?= base_url()?>techadmin/users/save" accept-charset="utf-8" method="post" enctype="multipart/form-data" id="importFrm">
					<p>note (Tên file inport không được viết có dấu)</p>
	                <input class="btn btn-info" type="file" id="userfile" name="userfile" style="    display: inline-flex;" />
	                <input type="submit" class="btn btn-info" name="importfile" value="IMPORT">
	            </form>
	          
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
			 
				<style type="text/css">
				    .panel-heading a{float: right;}
				    #importFrm{margin-bottom: 20px;display: none;}
				    #importFrm input[type=file] {display: inline;}
				  </style>
				<form action="<?= base_url()?>techadmin/users/save" accept-charset="utf-8" method="post" enctype="multipart/form-data" id="importFrm">
					<p>note (Tên file inport không được viết có dấu)</p>
	                <input class="btn btn-info" type="file" id="userfile" name="userfile" />
	                <input type="submit" class="btn btn-info" name="importfile" value="IMPORT">
	            </form>
	              
				<input type="hidden" id="autocomplete1" value="<?= $auto_fullname?>">
				<input type="hidden" id="autocomplete2" value="<?= $auto_email?>">
				<input type="hidden" id="autocomplete3" value="<?= $auto_phone?>">
				<form action="" method="get">
					<div class="form-group row">
						<div class="col-sm-2">
							<input name="fullname" type="search" id="getautocomplete1" value="<?=$this->input->get('fullname');?>"
								   placeholder="tên ứng viên ..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-3">
							<input name="email" type="search" id="getautocomplete2" value="<?=$this->input->get('email');?>"
								   placeholder="email..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-3">
							<input name="phone" type="search" id="getautocomplete3" value="<?=$this->input->get('phone');?>"
								   placeholder="Số điện thoại..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-2">
							<select name="view" class="input-sm form-control" >
								<option value="">trạng thái</option>
								<option class="" value="1" <?=$this->input->get('view')=='active'?'selected':'';?> >kích hoạt</option>
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
			<form name="formbk" method="post" action="<?=base_url('techadmin/users/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
							<th width="2%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
							<th width="1%" class="no-sort">STT</th>
							<th width="10%">Tên ứng viên</th>
							<th width="8%">Email</th>
							<th width="4%" class="no-sort">Điện thoại</th>
							 
							<th width="6%" class="no-sort">Trang thái</th>
							<th width="5%" class="no-sort">Ngày đăng ký</th>
							<th width="7%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
					<tbody>
						 <?php if (isset($list)) {
                            $stt=1;
                            foreach ($list as $v) {
                                ?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?= $stt++; ?></td>
							<td class="todo-list"><?= @$v->fullname ?>
							</td>
							<td><?= @$v->email ?></td>
							<td><?= @$v->phone ?></td>
							<td class="text-center">
								<label class="view_color view_active" data-value="<?=$v->id;?>" data-placement="users" data-view="active">
									<input type="checkbox" <?=$v->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
										   data-on="Yes" data-off="No">
								</label>
							</td>
							<td class="text-center"><?= date('Y-m-d',$v->use_regisdate);?>
							</td>
							 
							<td class="text-center">
								<div onclick="getModal_user(<?=$v->id;?>)" class="btn btn-xs btn-default" data-toggle="modal" title="Xem thông tin thành viên">
                                <i class="fa fa-eye" style=""></i></div>
								<a class="btn btn-xs btn-danger"
								   href="<?= base_url('techadmin/users/delete/' . $v->id) ?>" title="Xóa"
								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-times"></i> </a>

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
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>
<script type="text/javascript">
   $(function(){
         // cài đặt autocomplete với ô code
        var codefor  = $('#autocomplete1').val() ;
        var codefor = codefor.split(",");
        $('#getautocomplete1').autocomplete({
           lookup: codefor,
        });
		
		var namefor  = $('#autocomplete2').val() ;
		var namefor = namefor.split(",");
		$('#getautocomplete2').autocomplete({
           lookup: namefor,
        });
   }); 
   function export_user_excel(){
	     var check_all = [];
	    jQuery("input[name='checkone[]']").each(function(){
	        if($(this).is(':checked')){
	            check_all.push(this.value);
	        }
	        
	    });
	    $.ajax({
	         url: base_url() + 'techadmin/exp_inport/export_user_excel',
	         type:"POST",
	        	data:{check_all:check_all},
	         success:function(res){
	         }
	    });
	} 
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