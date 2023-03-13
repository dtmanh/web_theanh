<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/admin/popupdata_pagination/' . @$item->id . '') ?>" enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?=@$item->id; ?>">
			<input type="hidden" name="addnews" value="1">
		<div class="modal-content">
			<div class="modal-header">
				<button type="bottom" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Thêm mới pagination</h4>
			</div>

			<div class="modal-body" id="printable">
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Tên mô tả:</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm" id="name" name="name"
								   value="<?=@$item->name; ?>" placeholder=""/>
						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Tên table:</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm" id="name_table" name="name_table"
								   value="<?=@$item->name_table; ?>" placeholder=""/>
						</div>
					</div>
				</div>
				<div class="col-lg-4 hidden" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Loại (phân trang/ cắt ảnh):</label>
						<div class="col-sm-12">
							<select class="form-control" name="type">
								<option value="1" <?php if(@$item->type==1){ echo'selected';}?>>Phân trang</option>
								<option value="2" <?php if(@$item->type==2){ echo'selected';}?>>Crop ảnh</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Số phân trang  :</label>
						<div class="col-sm-12">
							<input type="text"  class="form-control input-sm" id="pagination" name="pagination"
								   value="<?=@$item->pagination; ?>" placeholder=""/>
						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Độ rộng (px)):</label>
						<div class="col-lg-12">
							<input type="text" name="width" class="form-control input-sm" value="<?=@$item->width; ?>" />
						</div>
					</div>
				</div>
				<div class="col-lg-4" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Chiều cao (px):</label>
						<div class="col-lg-12">
							<input type="text" name="height" class="form-control input-sm" value="<?=@$item->height; ?>" />
						</div>
					</div>
				</div>
				<div class="col-lg-3" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Hoạt động:</label>
						<div class="col-lg-12">
							<select name="active" class="form-control">
			                     <option <?php if(@$item->active==1){echo "selected";} ?><?php if (isset ($item)) { }else{ echo'selected'; } ?> value="1">Bật</option>
			                     <option <?php if (isset ($item)) { ?> <?php if(@$item->active==0){echo "selected";} }?> value="0">Tắt</option>
			                </select>
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

