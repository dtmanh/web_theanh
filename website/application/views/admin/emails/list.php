<section class="content-header">
    <h1>
      
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/emails/emails')?>"> Danh sách email</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<form name="formbk" class="form-horizontal" role="form" id="mail_list" method="POST" action="<?=base_url('techadmin/email/mail_coupon')?>" enctype="multipart/form-data">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp;  Danh sách email</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
              <button type="submit" name="btn" class="btn btn-success btn-sm" style="margin-bottom: 10px"><i class="fa fa-plus"></i> Gửi mail</button>
              </div>
               <a onclick="xoatatca('formbk')" class="btn btn-danger" style="margin-top: -10px;">
            <i class="fa fa-file-excel-o"></i> Xóa 
            </a>
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
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="1%" class="no-sort"><input type="checkbox" name="check_all" /></th>
						<th width="3%" class="text-center">STT</th>
						<th width="2%" class="no-sort hidden">Tên</th>
						<th width="2%" class="no-sort hidden">Phone</th>
						<th width="2%" class="no-sort">Email</th>
						<th>Ngày đăng ký</th>
						<th width="5%" class="no-sort text-center">Action</th>
					</tr>
				</thead>
				 <tbody>
				 <?php if (isset($list)) {
					$stt = 1;
					foreach ($list as $v) {
						?>
					<tr>
						<td>
						<input name="email[]" type="checkbox" class="idRow" value="<?=@$v->email;?>">
						</td>
						<td><?= $stt++; ?></td>
						<td class="hidden"><?= @$v->name ?></td>
						<td class="hidden"><?= @$v->phone ?></td>
						<td><?= @$v->email ?></td>
						<td><?= date('d-m-Y',@$v->time); ?></td>
						<td class="text-center">
							<a class="btn btn-xs btn-danger"
							   href="<?= base_url('techadmin/email/delete/' . $v->id) ?>" title="Xóa"
							   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
									class="fa fa-times"></i> </a>

						</td>
					</tr>
					<?php
					} } ?>
				 </tbody>
			</table>
		</div>
		</form>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"columnDefs": [ {
					"targets": 'no-sort',
					"orderable": false,
					  } ],
			"order": [[ 1, "desc" ]],
			"iDisplayLength": 15
		} );
		// tim kiem theo ten
	} );
	   function xoatatca(){
	     var check_all = [];
	    jQuery("input[name='email[]']").each(function(){
	        if($(this).is(':checked')){
	            check_all.push(this.value);
	        }
	        
	    });
	    $.ajax({
	         url: base_url() + 'techadmin/email/xoatatca',
	         type:"POST",
	        	data:{check_all:check_all},
	         success:function(res){
	         	location.reload();
	         	alert('bạn đã xóa thành công!');
	         }
	    });
	} 
</script>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<style>
.no-hidden select{display:none;}
table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td{padding:5px;}
</style>
			
<script type="text/javascript">
	$(document).on('click change','input[name="check_all"]',function() {
		var checkboxes = $('.idRow');
		if($(this).is(':checked')) {
			checkboxes.each(function(){
				this.checked = true;
			});
		} else {
			checkboxes.each(function(){
				this.checked = false;
			});
		}
	});
</script>