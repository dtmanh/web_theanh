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
        <li class="active"><a href="<?= base_url('techadmin/comment/questions')?>">Danh sách câu hỏi</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách câu hỏi</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                 
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
		<div class="box-body">
			<div class="modal fade bs-example-modal-lg popup1" id="popup1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myLargeModalLabel">Nội dung hỏi đáp</h4>
						</div>
						<div class="modal-body">
							<form action="" method="post" class="validation">
								<div id="getmodal"style="padding: 0px 0px 50px 0px;"></div>
								<div class="col-md-2">
									<h4 style="font-size: 12px; font-weight: bold">Trả lời :</h4>
								</div>
								<div class="col-md-8">
									<input type="hidden" id="id_cmt" name="parent_id">
									<input type="text" class="form-control validate[require]" placeholder="Trả lời hỏi đáp" name="traloi">
								</div>
								<div class="col-md-2">
									<input type="submit" class="btn btn-success" value="Trả lời" name="ok">
								</div>
							</form>
							<div class="clear" style="clear: both"></div>
						</div>
					</div>
				</div>
			</div>
			<style>
				.red{background:  red}
				.blue{background:  #4cae4c}
			</style>
			<form name="formbk" method="post" action="<?=base_url('techadmin/comment/delete_multi_question')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
							<th width="3%" class="text-center">STT</th>
							<th width="">Người gửi</th>
							<th width="40%">Sản phẩm</th>
							<th width="7%" class="no-sort">Hiển thị</th>
							<th width="15%" class="no-sort">Thời gian gửi</th>
                            <th width="7%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
					<tbody>
						 <?php if (isset($list)) {
                            $stt=0;
                                foreach($list as $v){
                                    $j=$stt++;
                                    $id_tr='id_tr'.$j;
                                ?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?=$stt;?></td>
							<td><?=$v->user_name;?></td>
							<td>
								<a target="_blank" href="<?= base_url($v->pro_alias.'.html')?>"><?=$v->pro_name;?></a>
							</td>
							<td class="text-center">
								<label class="view_color view_active" data-value="<?=$v->id;?>" data-placement="questions" data-view="review">
									<input type="checkbox" <?=$v->review==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
										   data-on="Yes" data-off="No">
								</label>
							</td>
							<td><?=date('d-m-Y',$v->time)?></td>
							
							<td class="text-center">
								<div onclick="getModalQuestion(<?=$v->id;?>,'<?=$id_tr.'1';?>',<?=$v->pro_id;?>)" class="btn btn-xs btn-default" data-toggle="modal" data-target=".popup1" title="Xem nội dung câu hỏi">
                                <i class="fa fa-eye" style=""></i></div>
								<a href="<?= base_url('techadmin/comment/delete_question/'.$v->id)?>"
								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
									<div class="btn btn-xs btn-danger"><i class="fa fa-times-circle" style=""></i></div>
								</a>
							</td>
						</tr>
						<?php }  } ?>
					</tbody>
				</table>
			</form>	   
			<div class="pagination">
				<?php
				echo $this->pagination->create_links(); // tạo link phân trang
				?>
			</div>
		 </div>
    </div>
    <!-- /.container-fluid -->
</section>
<script type="text/javascript">
	function getModalQuestion(id,div,pro_id) {
		$.ajax({
			type: "GET",
			url: base_url() + 'admin/comment/popupdata_question',
			data: "id=" + id + "&pro_id=" + pro_id,
			success: function (ketqua) {
				$('#'+div).removeClass('red').addClass('blue');
				$("#getmodal").html(ketqua);
				$('#id_cmt').val(id);
			}
		})
		$("#num").select();
	}
</script>
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>