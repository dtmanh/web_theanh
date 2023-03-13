<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<?php if(isset($key)){ ?>
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/admin/edit_thuoctinh/' . $key . '') ?>" enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?= @$key; ?>">
		<?php }else{ ?>
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/admin/add_attpro/') ?>" enctype="multipart/form-data">
		 <?php } ?>
			<input type="hidden" name="content" id="content" value="">
		<div class="modal-content">
			<div class="modal-header">

				<button type="bottom" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

				<h4 class="modal-title" id="myLargeModalLabel">Tổng quan thuộc tính sản phẩm </h4>

			</div>

			<div class="modal-body" id="printable">

				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">

						<label class="col-sm-12 form-text">Tên thuộc tính :</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm" id="name" name="name"
								   value="<?=@$item[@$key]->name; ?>" placeholder=""/>

						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">loại thuộc tính :</label>
						<div class="col-sm-12">
							<select class="form-control input-sm" name="type">
								<option value="text"  <?php if(@$item[@$key]->type =='text'){ echo'selected'; }?> > Text </option>
								<option value="textarea" <?php if(@$item[@$key]->type =='textarea'){ echo'selected'; }?>>Textarea</option>
								<option value="int" <?php if(@$item[@$key]->type =='int'){ echo'selected'; }?>>Int</option>
								<option value="time" <?php if(@$item[@$key]->type =='time'){ echo'selected'; }?>>Date time</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Thứ tự:</label>
						<div class="col-lg-12">
							<input type="number" name="sort" class="form-control input-sm" value="<?=@$item[@$key]->sort; ?>" />
						</div>
					</div>
				</div>
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

