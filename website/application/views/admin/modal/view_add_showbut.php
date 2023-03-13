<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<?php if(isset($item)){ ?>
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/admin/edit_showbut/' . $item->id . '') ?>" enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?=@$item->id; ?>">
		<?php }else{ ?>
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="<?= base_url('techadmin/admin/add_showbut/') ?>" enctype="multipart/form-data">
			
		 <?php } ?>
		<div class="modal-content">
			<div class="modal-header">

				<button type="bottom" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

				<h4 class="modal-title" id="myLargeModalLabel">Tên check box </h4>

			</div>

			<div class="modal-body" id="printable">

				<div class="col-lg-3" style="font-size: 12px">
					<div class="form-group">

						<label class="col-sm-12 form-text">Tên điều kiện :</label>
						<div class="col-sm-12">
							<input type="text"  class="validate[required] form-control input-sm" id="name" name="name"
								   value="<?=@$item->name; ?>" placeholder=""/>
						</div>
					</div>
				</div>
				<div class="col-lg-3" style="font-size: 12px">
					<div class="form-group">
						<label class="col-sm-12 form-text">Module áp dụng :</label>
						<div class="col-sm-12">
							<select class="form-control input-sm" name="type">
								<option value="news"  <?php if(@$item->type =='news'){ echo'selected'; }?> > Danh sách tin tức</option>
								<option value="news_category" <?php if(@$item->type =='news_category'){ echo'selected'; }?>>Danh mục tin tức</option>
								<option value="product" <?php if(@$item->type =='product'){ echo'selected'; }?>>Danh sách sản phẩm</option>
								<option value="product_category" <?php if(@$item->type =='product_category'){ echo'selected'; }?>>Danh mục sản phẩm</option>
								<option value="media"  <?php if(@$item->type =='media'){ echo'selected'; }?> > Danh sách media</option>
								<option value="media_category" <?php if(@$item->type =='media_category'){ echo'selected'; }?>>Danh mục media</option>
								<option value="video"  <?php if(@$item->type =='video'){ echo'selected'; }?> > Danh sách video</option>
								<option value="video_category" <?php if(@$item->type =='video_category'){ echo'selected'; }?>>Danh mục video</option>
								<option value="raovat"  <?php if(@$item->type =='raovat'){ echo'selected'; }?> > Danh sách rao vặt</option>
								<option value="raovat_category" <?php if(@$item->type =='raovat_category'){ echo'selected'; }?>>Danh mục rao vặt</option>
								<option value="inuser_category"  <?php if(@$item->type =='inuser_category'){ echo'selected'; }?> > Ý kiến khách hàng</option>
								<option value="staticpage"  <?php if(@$item->type =='staticpage'){ echo'selected'; }?> >Trang nội dung</option>
								
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-2" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Tên trường:</label>
						<div class="col-lg-12">
							<input type="text" name="field" class="form-control input-sm" value="<?=@$item->field; ?>" />
						</div>
					</div>
				</div>
				<div class="col-lg-2" style="font-size: 12px">
					<div class="form-group">
						<label  class="col-lg-12">Màu sắc:</label>
						<div class="col-lg-12">
							<input type="text" name="color" class="form-control input-sm" value="<?=@$item->color; ?>" />
						</div>
					</div>
				</div>
				<div class="col-lg-2" style="font-size: 12px">
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

