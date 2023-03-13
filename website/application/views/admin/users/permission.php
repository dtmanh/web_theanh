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
	Phân quyền tài khoản
	<small></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
		<li class="active"><a href="<?= base_url('techadmin/admin/permission')?>">Danh sách tài khoản</a></li>
		<li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
	</ol>
</section>
<section class="content">
	<!-- Page Heading -->
	<div class="box">
		<form method="post" action="" class="validate form-horizontal " id="form_add" role="form"
			enctype="multipart/form-data">
			<input type="hidden" name="edit" value="<?= @$edit->id; ?>">
			<div id="panel-tablesorter" class="panel panel-default">
				<div class="panel-heading bg-white">
					
					<!-- /panel-actions -->
					<h3 class="panel-title">Phân quyền</h3>
				</div>
				<!-- /panel-heading -->
				<div class="panel-body">
					<table id="example" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="15%">Tên tài khoản</th>
								<th width="15%">Email</th>
								<th width="7%" class="no-sort">Điện thoại</th>
								<th width="9%" class="no-sort">Ngày Đăng ký</th>
								<th width="9%" class="no-sort text-center">Đăng nhập</th>
							</tr>
						</thead>
						<tbody>
							<?php if($this->session->userdata('sessionGroupAdmin')>=3){?>
							<tr>
								<td class="todo-list">Quản trị cấp cao</td>
								<td>kythuattechtology@gmail.com</td>
								<td>0977160408</td>
								<td class="text-center">01/07/2017
								</td>
								<td class="text-center">
									01/07/2017
								</td>
							</tr>
							<?php }else{ ?>
							<tr>
								<td class="todo-list"><?= @$user->fullname; ?></td>
								<td><?= @$user->email ?></td>
								<td><?= @$user->phone ?></td>
								<td class="text-center"><?= date('Y-m-d',@$user->use_regisdate);?>
								</td>
								<td class="text-center">
									<?= date('Y-m-d',@$user->lastest_login);?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php
					function check_permission($perm, $access_controller = null, $access_action = null, $access_action2 = null)
					{
						if ($access_action == null) {
						foreach ($perm as $k => $v) {
						if ($k == $access_controller) {
						echo 'checked';
						}
						}
						}
						if ($access_action != null) {
							foreach ($perm as $k => $v) {
								if(!empty($v)){
									foreach ($v as $k2 => $v2) {
										if ($k == $access_controller && $v2 == $access_action) {
											echo 'checked';
										}
									}
								}
							}
						}
					}
					?>
					<br>

					<div class="all_perm btn btn-xs btn-primary" data-value="all_perm">Chọn tất cả
						<input type="checkbox" id="all_perm" style="display: none;">
					</div>
					<?php if($this->session->userdata('sessionGroupAdmin')>=3){?>
					<div class="all_perm btn btn-xs btn-primary" onclick="reset(<?=$id?>)" id="reset" data-value="all_perm">Reset mật khẩu
					</div>
					<?php } ?>
					<div class="clearfix"></div>
					<br>
					<div class="row ">
						<?php
						$i=1;
						foreach ($resources as $k => $v) {
								$j=$i++;
						?>
						<div class="col-md-3 col-sm-4 col-xs-12 resource">
							<div style="width: 100%; padding: 10px 10px; background: #ddd">
								<div class="nice-checkbox text-primary">
									<input type="checkbox" checked name="controller[]"
									class="selecctall" data-items="<?=$v->id;?>"
									value="<?= $v->resource; ?>" id="<?=$v->id;?>"
									<?php check_permission($u_access, $v->resource); ?>>
									<label for="<?=$v->id;?>"><span class="text-inverse"><?= $v->name; ?></span></label>
								</div>
							</div>
							<div style="border: 1px #ddd solid; padding: 10px;" class="actionbox">
								<?php foreach ($v->cat_sub as $k2 => $v2) { ?>
								<div style="padding-left: 25px;margin-bottom: 10px">
									<div class="nice-checkbox text-primary">
										<input type="checkbox" name="action[]"
										class="<?=$v->id;?> check subselect" id="<?=$v2->id;?>" data-items="<?=$v2->id;?>" data-value='<?=$v->id;?>'
										value="<?= $v->resource . ';' . $v2->resource; ?>"
										<?php check_permission($u_access, $v->resource, $v2->resource); ?>
										>
										<label for="<?=$v2->id;?>"><span class="text-inverse"><?= $v2->name; ?></span></label>
									</div>
								</div>
								<?php foreach ($v2->catchildren as $k3 => $v3) { ?>
								<div style="padding-left: 50px;margin-bottom: 10px">
									<div class="nice-checkbox text-primary">
										<input type="checkbox" name="sub_action[]"
										class="<?=$v2->id;?> check" id="<?=$v3->id;?>" data-value='<?=$v2->id;?>'
										value="<?= $v->resource . ';' . $v3->resource; ?>"
										<?php check_permission($u_access, $v->resource, $v3->resource); ?>
										>
										<label for="<?=$v3->id;?>"><span class="text-inverse"><?= $v3->name; ?></span></label>
									</div>
								</div>
								<?php unset($v2->catchildren[$k3]); }?>
								<?php unset($v->cat_sub[$k2]); }?>
							</div>
						</div>
						<?php
						unset($resources[$k]);
						if($j%4==0&&$j!=12) echo '<div class="clearfix"></div>';
						}?>
					</div>
					<div class="clearfix"></div>
					<div class="form-group" style="padding-top: 30px">
						<div class="col-sm-12 text-center">
							<button type="submit" name="submit" class="btn btn-primary btn-sm">Cập nhật</button>
							<button type="reset" class="btn btn-default btn-sm">Hủy</button>
						</div>
					</div>
				</div>
				<!--/panel-body-->
			</div>
			<!--/panel-tablesorter-->
		</form>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>

<script>	

$(document).ready(function() {
$('.selecctall').click(function(event) {  //on click
var cl=$(this).attr('data-items');
if(this.checked) { // check select status
$('.'+cl).each(function() { //loop through each checkbox
this.checked = true;  //select all checkboxes with class "checkbox1"
	var cl2=$(this).attr('data-items');
	$('.'+cl2).each(function() { //loop through each checkbox
	this.checked = true;  //select all checkboxes with class "checkbox1"
	});
});
}else{
$('.'+cl).each(function() { //loop through each checkbox
this.checked = false; //deselect all checkboxes with class "checkbox1"
var cl2=$(this).attr('data-items');
	$('.'+cl2).each(function() { //loop through each checkbox
	this.checked = false;  //select all checkboxes with class "checkbox1"
	});
});
}
});

/// sub select khi chon
$('.subselect').click(function(event) {  //on click
var cl=$(this).attr('data-items');
if(this.checked) { // check select status
$('.'+cl).each(function() { //loop through each checkbox
this.checked = true;  //select all checkboxes with class "checkbox1"
});
}else{
$('.'+cl).each(function() { //loop through each checkbox
this.checked = false; //deselect all checkboxes with class "checkbox1"
});
}
});


$('.all_perm').click(function(event) {  //on click
if($(this).hasClass('checked1')){
$(this).removeClass('checked1');
$('input[type=checkbox]').each(function() { //loop through each checkbox
this.checked = false;  //select all checkboxes with class "checkbox1"
});
}else{
$(this).addClass('checked1');
$('input[type=checkbox]').each(function() { //loop through each checkbox
this.checked = true; //deselect all checkboxes with class "checkbox1"
});
}
});
});
</script>

<style>
.resource label{
cursor: pointer;
}
.text-primary{color: #666}
.resource{margin-bottom: 15px}
.nice-checkbox>label:before {
font-size: 14px !important;
}
.nice-checkbox {
padding-top: 0px !important;
min-height: 10px;
}
.nice-checkbox>[type=checkbox]:not(:checked)+label, .nice-checkbox>[type=checkbox]:checked+label {
font-size: 12px;
}

input[type=checkbox], input[type=radio] {
       line-height: normal;
    box-sizing: border-box;
    padding: 0;
    margin: 0px;
    padding: 0px;
    height: 15px;
    width: 15px;
    vertical-align: middle;
}
.icheckbox_minimal-blue.checked {
    background-position: -40px 0;
}


.nice-checkbox {
  width: 210px;
  position: relative;
}
.nice-checkbox label {
  width: 16px;
  height: 16px;
  cursor: pointer;
  position: absolute;
  top: 5px;
  left: 0;
  background: #66c0ff;
  border-radius: 4px;
}
.nice-checkbox label:after {
  content: '';
  width: 10px;
  height: 5px;
  position: absolute;
  top: 4px;
  left: 3px;
  border: 2px solid #fff;
  border-top: none;
  border-right: none;
  background: transparent;
  opacity: 0;
  transform: rotate(-45deg);
}
.nice-checkbox label:hover::after {
  opacity: 0.3;
}
.nice-checkbox span {
  position: absolute;
  width: 300px;
  left: 25px;
}
.nice-checkbox input[type=checkbox] {
  visibility: hidden;
}
.nice-checkbox input[type=checkbox]:checked + label {
  background: #0096FF;
}
.nice-checkbox input[type=checkbox]:checked + label:after {
  opacity: 1;
}
.actionbox{
	height: 150px;
	overflow-y: auto;
    overflow-x: hidden;
}
/* width */
.actionbox::-webkit-scrollbar {
  width: 7px;
}

/* Track */
.actionbox::-webkit-scrollbar-track {
  background: #f1f1f1; 
}

/* Handle */
.actionbox::-webkit-scrollbar-thumb {
  background: #ccc; 
}

/* Handle on hover */
.actionbox::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
<script type="text/javascript">
function reset(id)
{
$.ajax({
type: "POST",
dataType: "json",
url: base_url() + 'ajax/ajax/reset_pass',
data: {id:id},
success:function(result){
alert('Đổi mật khẩu thành công');
// location.reload();
}
});
}
</script>