	<div class="modal fade bs-example-modal-sm-up"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

			<div class="modal-dialog modal-md">

				<div class="modal-content">

					<div class="panel panel-success" >

						<div class="panel-heading">

							<div class="panel-title"  > Sửa ảnh</div>

						</div>
						<form action="<?= base_url('techadmin/product/images_add') ?>" method="post"

									class="validate"

									accept-charset="utf-8" enctype="multipart/form-data">
						<div style="padding-top:30px" class="panel-body" id="getmodal">

							<div class="row">
									<input type="hidden" name="edit" id="id_edit" value="<?= @$detail->id; ?>">
									<input type="hidden" name="id_pro" id="id_pro" value="<?=@$id; ?>">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label class="col-sm-12 form-text">Tiêu đề :</label>
											<div class="col-xs-12" style="margin-bottom: 10px">
												<input name="title" type="text" placeholder="Tiêu đề"

													class="" value="<?=@$detail->name?>" form-control input-sm"/>
											</div>
										</div>
										<div class="col-sm-6">
											<label class="col-sm-12 form-text">Sắp xếp :</label>
											<div class="col-xs-12" style="margin-bottom: 10px">
												<input name="sort" type="text" placeholder="Sắp xếp"
													class="" value="<?=@$detail->sort?>" form-control input-sm"/>
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group">
									<div class="col-md-12">
										<input type="file" name="userfile" id="input_img" />
									</div>		
								</div>		
								<div class="form-group">
									<div class="col-md-5">
									<?php
										if(!empty(@$detail->image)){ ?>
											<img src="<?=base_url(''.@$detail->image)?>" id="image_review" width="300px">
										<?php }else{
											echo '<br /><img src="'.base_url('img/noimage.png').'" id="image_review" width="100px">';
										}
										?>
									</div>	
								</div>	
									<br />
								

								<!---->

							</div>

						</div>
						<div class="modal-footer">
							<?php if(!empty(@$detail->image)){ ?>
								
								<div class="text-left col-xs-6">
									<button  type="button" onclick="delete_image($(this))" data-view="" data-placement="p_images" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>
								</div>	
							<?php } ?>	
							<div class="text-right col-xs-6">
				                <input name ="Upload"  type="submit" value="Cập nhật" class="btn btn-success btn-xs"/>
				            </div>
			            </div></form>
					</div>

				</div>

			</div>

		</div>
