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

        <li class="active"><a href="<?= base_url('techadmin/users/listuser_admin')?>">Danh sách thành viên quản trị</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">
	<div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp;Danh sách thành viên quản trị</h4>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group margin-bottom-20"> 
          	<?php if($admin->lever >1){ ?>
          	<a href="<?= base_url('techadmin/users/add_users')?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Thêm mới
            </a>
            <?php } ?>
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

				<input type="hidden" id="autocomplete1" value="<?= $auto_fullname?>">

				<input type="hidden" id="autocomplete2" value="<?= $auto_email?>">

				<input type="hidden" id="autocomplete3" value="<?= $auto_phone?>">

				<form action="" method="get">

					<div class="form-group row">

						<div class="col-sm-2">

							<input name="fullname" type="search" id="getautocomplete1" value="<?=$this->input->get('fullname');?>"

								   placeholder="tên thành viên ..."

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

							<th width="2%" class="no-sort">STT</th>

							<th width="15%">Tên thành viên</th>

							<th width="15%">Email</th>

							<th width="7%" class="no-sort">Điện thoại</th>

							<th width="5%" class="no-sort">active</th>

							<th width="9%" class="no-sort">Ngày Đăng ký</th>

							<th width="9%" class="no-sort text-center">Đăng nhập</th>

							<th width="8%" class="no-sort text-center">Action</th>

                        </tr>

                    </thead>

					<tbody>
						<?php if($this->session->userdata('sessionGroupAdmin')>=3){?>
						<tr>
							<td><input type="checkbox" name="" id="checkone" value="1"></td>
							<td>1</td>
							<td class="todo-list">Supper Admin</td>
							<td>kythuattechtology@gmail.com</td>
							<td>0977160408</td>
							<td class="text-center">
								<input class="tgl tgl-ios tgl_checkbox"  id="cb_00" checked="" type="checkbox">
								<label class="tgl-btn " for="cb_00" ></label>
							</td>
							<td class="text-center">2017-09-01</td>
							<td class="text-center">
                               2018-01-19  </td>
							<td class="text-center">
								
								<a class="btn btn-xs label-success" href="<?= base_url('techadmin/admin/permission/1') ?>" title="cap nhat"><i class="fa fa-gears"></i> </a>

							</td>
						</tr><?php } ?>
						 <?php if (isset($list)) {

                            $stt=1;

                            foreach ($list as $v) {

                                ?>

						<tr>

							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>

							<td class="sort"><input type="number" id="sort" onchange="update_sort($(this))" value="<?= @$v->sort ?>"
								data-placement='users' data-item='<?= @$v->id; ?>' style="width: 55px"></td>

							<td class="todo-list"><?= @$v->fullname ?>

							</td>

							<td><?= @$v->email ?></td>

							<td><?= @$v->phone ?></td>

							<td class="text-center">
								<input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$v->id;?>" id="cb_<?=$v->id;?>" <?=$v->active==1?'checked=""':''?> type="checkbox" data-value="<?=$v->id;?>" data-placement="users" data-view="active">
								<label class="tgl-btn " for="cb_<?=$v->id;?>" ></label>
							</td>

							<td class="text-center"><?= date('Y-m-d',$v->use_regisdate);?>

							</td>

							<td class="text-center">

                               <?= date('Y-m-d H:i',$v->lastest_login);?>

                            </td>

							<td class="text-center">

								<div onclick="getModal_user(<?=$v->id;?>)" class="btn btn-xs btn-default" data-toggle="modal" title="Xem thông tin thành viên">

                                <i class="fa fa-eye" style=""></i></div>

								<a class="btn btn-xs label-success"

								   href="<?= base_url('techadmin/admin/permission/' . $v->id) ?>" title="Xóa"

								   ><i class="fa fa-sliders"></i> </a>
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

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
