<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/group/add/' . $id) ?>" enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">
			<input type="hidden" name="addnews" value="1">
		<div class="modal-content">
			<div class="modal-header">
				<button type="bottom" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Tổng quan module</h4>
			</div>
			<div class="modal-body" id="printable">
				<div class="col-md-6" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Tên module :</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm " name="name"
								   value="<?= @$edit->name; ?>" placeholder=""/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 form-text">loại module :</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm " name="resource"
								   value="<?= @$edit->resource; ?>" placeholder=""/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 form-text">Đường link :</label>
						<div class="col-sm-12">
							<input type="text" class="validate[required] form-control input-sm " name="alias"
								   value="<?= @$edit->alias; ?>" placeholder=""/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12">
						Trạng thái
						</label>
						<div class="col-sm-12">
							<select name="active" class="form-control">
								<option <?php if(@$edit->active==1){echo "selected";} ?><?php if (isset ($edit)) { }else{ echo'selected'; } ?> value="1">Bật</option>
								<option <?php if (isset ($edit)) { ?> <?php if(@$edit->active==0){echo "selected";} }?> value="0">Tắt</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12">Danh mục Module:</label>
						<div class="col-sm-12">
							<select class="form-control input-sm" name="category">
								<option value="0">Lựa chọn</option>
								 <?php if (isset($cate)) {
								foreach ($cate as $v) {
                                ?>
								<option value="<?= @$v->id; ?>" <?php if($v->id ==@$edit->parent_id ){ echo'selected';} ?> ><?= @$v->name; ?></option>
								
								<?php if (isset($v->catsub)) {
								foreach ($v->catsub as $v_sub) {
                                ?>
                                <option value="<?= @$v_sub->id; ?>" <?php if($v_sub->id ==@$edit->parent_id ){ echo'selected';} ?> >  &nbsp;&nbsp;&nbsp;&nbsp; <?= @$v_sub->name; ?></option>
                                 <?php } } ?>	

								<?php if (isset($v_sub->catchildren)) {
								foreach ($v_sub->catchildren as $catchildren) {
                                ?>
                                <option class="hidden" value="<?= @$catchildren->id; ?>" <?php if($catchildren->id ==@$edit->parent_id ){ echo'selected';} ?> >  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= @$catchildren->name; ?></option>
                                 <?php } } ?>


								 <?php } } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 form-text">Icon FontAwesome: <i>(fa-circle-o)</i></label>
						<div class="col-sm-12">
							<input type="text" class="validate[required] form-control input-sm " name="icon"
								   value="<?= @$edit->icon; ?>" placeholder="fa-circle-o"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-12">Thứ tự:</label>
						<div class="col-lg-12">
							<input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />
						</div>
					</div>
				</div>
				 <div class="clearfix"></div>
				<?php if (@$edit->parent_id!=0) { ?>
				 <?php if (count($parrent)) { ?>
				 <label  class="col-lg-12">Các chức năng đã có:</label>
				 <div class="col-md-12" style="font-size: 12px">
					<?php 
					foreach ($parrent as $p) {
                    ?>
                    <span class="btn btn-success <?=@$p->resource?>" >
                	<?=@$p->name?>
               		 </span>
					 <?php } ?>
				 </div>
				 <div class="clearfix"></div><?php } } ?>
			</div>
			<div class="modal-footer">
				<div class="col-md-12">
					<button type="bottom" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-default btn-success pull-right" name="addnews" style="color:#fff"><?= @$btn_name; ?></button>
				</div>
            </div>
		</div>
		</form>
	</div>
</div>
<script src="<?=base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js')?>"></script>
<script type="text/javascript">
	// check chi lay 1 gia tri trong listbox
	$(document).ready(function(){
		$('.chk').on('change', function() {
		   $('.chk').not(this).prop('checked', false);
		   $('#result').html($(this).data( "id" ));
		   if($(this).is(":checked"))
			$('#result').html($(this).data( "id" ));
		   else
			$('#result').html('Empty...!');
		});
	});
	  $('.cat_checklist').slimScroll({
        height: '300px',
        alwaysVisible: true,
        railVisible: true
    });
</script>
<style>
code, pre, samp {
    font-family: monospace,monospace;
    font-size: 1em;
}
code {
    font-family: "Operator Mono SSm A", "Operator Mono SSm B", 'Source Code Pro', Menlo, Consolas, Monaco, monospace;
}
</style>
