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

        <?=$btn_name;?> video

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/video/categories')?>">Danh mục video</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="row">

		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="" enctype="multipart/form-data">

			<input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">

			<input type="hidden" name="addnews" value="1">

			<input type="hidden" id="catcheck" value="video">

			<div class="col-md-9" style="font-size: 12px">

				<div class="panel panel-default">

					<div class="alert alert-dismissible" style="display:none;"></div>

                    <div class="panel-heading">

                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#home">Tổng quan</a></li>
                            <li class=""><a data-toggle="tab" href="#menu1">Ảnh</a></li>

                        <div class="pull-right">

							<button type="button" <?php if (isset ($edit)) { ?> onclick="editItem()" <?php }else{ ?> onclick="createItem()" <?php } ?> class="btn btn-success btn-xs" name="add_news"><i

								class="fa fa-check"></i> <?= @$btn_name; ?>

							</button>

                        </div>
                    </ul>
                        <div class="clearfix"></div>

                    </div>

					<div class="panel-body">

						<div class="tab-content">

							<div id="home" class="tab-pane fade in active">

								<div class="form-group">

									<label class="col-sm-12 form-text">Tên video :</label>

									<div class="col-sm-12">

										<input type="text" oninput="createAlias(this)" class="validate[required] form-control input-sm " name="name"

											   value="<?= @$edit->name; ?>" placeholder=""/>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12 form-text">Alias :</label>

									<div class="col-sm-12" id="error-alias">

										<input type="text" onchange="createAlias(this)" class="form-control input-sm validate[required]" name="alias"

											   value="<?= @$edit->alias; ?>" id="alias" placeholder=""/>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12">link video:</label>

									<div class="col-sm-12">
											<input name="link_video" type="text" class="validate[required] form-control input-sm"

									   value="<?=@$edit->link_video==''?'':'https://www.youtube.com/watch?v='.@$edit->link_video;?>"

									   placeholder="Vd:https://www.youtube.com/watch?v=XXXXXX">
										 

									</div>

								</div>

								<div class="form-group hidden">

									<label  class="col-sm-12">Mô tả</label>

									<div class="col-sm-12">

										<textarea name="description" class="form-control input-sm" placeholder=""

											id="ckeditor_description" rows="4"><?=@$edit->description;?></textarea>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12 form-text">Title SEO</label>



									<div class="col-sm-12">

										<input type="text" name="title_seo" placeholder=""

											   value="<?= @$edit->title_seo; ?>" class="form-control input-sm"/>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12 form-text">Key word SEO</label>

									<div class="col-sm-12">

										<input type="text" name="keyword_seo" placeholder=""

											   value="<?= @$edit->keyword_seo; ?>" class="form-control input-sm"/>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12 form-text">Description SEO:</label>

									<div class="col-sm-12">

										<textarea name="description_seo" placeholder="" rows="5" class="form-control input-sm"><?= @$edit->description_seo; ?></textarea>

									</div>

								</div>

							</div>

							<div id="menu1" class="tab-pane fade">
                                <!--  <link rel="stylesheet" type="text/css" href="http://fiddle.jshell.net/css/result-light.css">-->
                                <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/cropper/cropper.css">
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
                                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.css">
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.js"></script>
                                <script type="text/javascript" src="<?= base_url()?>assets/cropper/cropper_style.js"></script>
                                <style id="compiled-css" type="text/css">
                                </style>
                                <div class="row">
                                  <div class="col-md-12">
                                    <!-- <h3>Demo:</h3> -->
                                    <div class="" id="actions">
                                      <div class="docs-buttons">
                                        <!-- <h3>Toolbar:</h3> -->
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.setDragMode(&quot;move&quot;)">
                                            <span class="fa fa-arrows"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.setDragMode(&quot;crop&quot;)">
                                            <span class="fa fa-crop"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.zoom(0.1)">
                                            <span class="fa fa-search-plus"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.zoom(-0.1)">
                                            <span class="fa fa-search-minus"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.move(-10, 0)">
                                            <span class="fa fa-arrow-left"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.move(10, 0)">
                                            <span class="fa fa-arrow-right"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.move(0, -10)">
                                            <span class="fa fa-arrow-up"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.move(0, 10)">
                                            <span class="fa fa-arrow-down"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.rotate(-45)">
                                            <span class="fa fa-rotate-left"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.rotate(45)">
                                            <span class="fa fa-rotate-right"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.scaleX(-1)">
                                            <span class="fa fa-arrows-h"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.scaleY(-1)">
                                            <span class="fa fa-arrows-v"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.crop()">
                                            <span class="fa fa-check"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.clear()">
                                            <span class="fa fa-remove"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.disable()">
                                            <span class="fa fa-lock"></span>
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.enable()">
                                            <span class="fa fa-unlock"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group btn-group-crop hidden">
                                          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
                                            Get Cropped Canvas
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.getCroppedCanvas({ width: 160, height: 90 })">
                                            160×90
                                          </span>
                                          </button>
                                          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.getCroppedCanvas({ width: 320, height: 180 })">
                                            320×180
                                          </span>
                                          </button>
                                        </div>
                                        <div class="btn-group d-flex flex-nowrap docs-toggles" data-toggle="buttons">
                                          <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
                                              16:9
                                            </span>
                                          </label>
                                          <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
                                              4:3
                                            </span>
                                          </label>
                                          <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
                                              1:1
                                            </span>
                                          </label>
                                          <label class="btn btn-primary active">
                                            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
                                              2:3
                                            </span>
                                          </label>
                                          <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
                                              Free
                                            </span>
                                          </label>
                                        </div>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.reset()">
                                            <span class="fa fa-refresh"></span>
                                          </span>
                                          </button>
                                          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                            <input type="file" class="sr-only" id="inputImage" name="userfile" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Import image with Blob URLs">
                                              <span class="fa fa-upload"></span>
                                            </span>
                                          </label>
                                          <button type="button" class="btn btn-primary hidden" data-method="destroy" title="Destroy">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.destroy()">
                                            <span class="fa fa-power-off"></span>
                                          </span>
                                          </button>
                                        </div>
                                        <!-- Show the cropped image in modal -->
                                        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                              </div>
                                              <div class="modal-body"></div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- /.modal -->
                                      </div>
                                  </div>
                                  <div class="img-container">
                                    <img src="" alt="Picture" class="cropper-hidden">
                                    <div class="cropper-container cropper-bg">
                                      <div class="cropper-wrap-box">
                                        <div class="cropper-canvas"><img crossorigin="anonymous" src=""></div>
                                      </div>
                                      <div class="cropper-drag-box cropper-modal cropper-crop" data-action="crop"></div>
                                      <div class="cropper-crop-box">
                                        <span class="cropper-view-box"><img crossorigin="anonymous" src=""></span>
                                        <span class="cropper-dashed dashed-h"></span>
                                        <span class="cropper-dashed dashed-v"></span>
                                        <span class="cropper-center"></span>
                                        <span class="cropper-face cropper-move" data-action="all"></span>
                                        <span class="cropper-line line-e" data-action="e"></span>
                                        <span class="cropper-line line-n" data-action="n"></span>
                                        <span class="cropper-line line-w" data-action="w"></span>
                                        <span class="cropper-line line-s" data-action="s"></span>
                                        <span class="cropper-point point-e" data-action="e"></span>
                                        <span class="cropper-point point-n" data-action="n"></span>
                                        <span class="cropper-point point-w" data-action="w"></span>
                                        <span class="cropper-point point-s" data-action="s"></span>
                                        <span class="cropper-point point-ne" data-action="ne"></span>
                                        <span class="cropper-point point-nw" data-action="nw"></span>
                                        <span class="cropper-point point-sw" data-action="sw"></span>
                                        <span class="cropper-point point-se" data-action="se"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
						</div>

					</div>

				</div>

			</div>

			<div class="col-md-3 " style="font-size: 12px">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title pull-left">Tùy chọn</h3>

                        <div class="clearfix"></div>

                    </div>

					<div class="panel-body ">

                        <label class="col-sm-12" style="padding-left: 0px">

                        Hiển thị

                        </label>

                        <div class="col-sm-12 view_checkbox" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">

                           <div class="<?php if($show_home->active ==0){ echo'hidden'; } ?>">
                               <label class="checkbox-inline col-sm-6" style="margin-left:0px">
                               <input type="checkbox" value="1" name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
                               <?=@$show_home->name?>
                                </label>
                            </div>
                            <div class="<?php if($show_hot->active ==0){ echo'hidden'; } ?>">
                               <label class="checkbox-inline col-sm-6" style="margin-left:0px">
                               <input type="checkbox" value="1" name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
                               <?=@$show_hot->name?>
                                </label>
                            </div>
                            <div class="<?php if($show_focus->active ==0){ echo'hidden'; } ?>">
                               <label class="checkbox-inline col-sm-6" style="margin-left:0px">
                               <input type="checkbox" value="1" name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>
                               <?=@$show_focus->name?>
                                </label>
                        </div>

                        <div class="clearfix"></div>

                        <br>

						<div class="form-group">

							<label class="col-sm-12">

							Trạng thái

							</label>

							<div class="col-sm-6">

								<select name="active" class="form-control">

									<option <?php if(@$edit->active==1){echo "selected";} ?><?php if (isset ($edit)) { }else{ echo'selected'; } ?> value="1">Bật</option>

									<option <?php if (isset ($edit)) { ?> <?php if(@$edit->active==0){echo "selected";} }?> value="0">Tắt</option>

								</select>

							</div>

						</div>

						<div class="form-group">

							<label class="col-sm-12">Danh mục:</label>

							<div class="col-sm-12">

								<div class=" checklist_cate cat_checklist" style="border: 1px solid #ccc; padding: 5px" >

									<?php if (isset($cate_selected)) $cate_selected = $cate_selected;

										else $cate_selected = null;

								view_cate_checklist_firt($cate, 0, '', @$cate_selected)?>

								<span id="result"></span>

								</div>

							</div>

						</div>

						<div class="form-group">

							<label  class="col-lg-4 control-label">Thứ tự:</label>

							<div class="col-lg-5">

								<input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />

							</div>

						</div>

                        <div class="form-group">

                            <label class="col-sm-12 ">Hình ảnh</label>

                            

							<div class="clearfix"></div>

							<br>

							<div class="col-sm-12" id="view_img">

								 <?php

								if(file_exists(@$edit->image)){ ?>

									<img src="<?=base_url($edit->image)?>" id="image_review" width="100%">

									<label class="col-sm-12 "></label>

									<button  type="button" onclick="delete_image($(this))" data-placement="video_category" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

								<?php }else{

									echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';

								}

								?>

							</div>

                        </div>
                        <br>
                        <div class="form-group">

                            <label class="col-sm-12 ">file video</label>

                             <div class="col-sm-12">

                                <input type="file" name="userfile2" id="input_img" onchange="handleFiles()" />

                            </div>


                              <div class="clearfix"></div>

                              <br>

                              <div class="col-sm-12" id="view_img">

                                 <?php

                                if(file_exists(@$edit->link)){ ?>

                                  <img src="<?=base_url()?>assets/img/specification-25.png" id="image_review" width="50%">

                                  <label class="col-sm-12 "></label>

                                  <button  type="button" onclick="delete_fillter($(this))" data-value="link" data-placement="video" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

                                <?php }else{

                                  echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';

                                }

                                ?>

                              </div>

                        </div>
                        <br>
                      <div class="">
                          <!-- <h3>Preview:</h3> -->
                          <div class="docs-preview clearfix">
                            <div class="img-preview preview-lg" >
                            <img crossorigin="anonymous" src=""></div>
                            <div class="img-preview preview-md"><img crossorigin="anonymous" src=""></div>
                            <div class="img-preview preview-sm"><img crossorigin="anonymous" src="" ></div>
                            <div class="img-preview preview-xs"><img crossorigin="anonymous" src=""></div>
                          </div>
                          <!-- <h3>Data:</h3> -->
                          <div class="docs-data">
                            <div class="input-group input-group-sm">
                              <label class="input-group-addon" for="dataX">X</label>
                              <input type="text" class="form-control" name="x" id="dataX" placeholder="x">
                              <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group input-group-sm">
                              <label class="input-group-addon" for="dataY">Y</label>
                              <input type="text" class="form-control" name="y" id="dataY" placeholder="y">
                              <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group input-group-sm">
                              <label class="input-group-addon" for="dataWidth">Width</label>
                              <input type="text" class="form-control" name="w" id="dataWidth" placeholder="width">
                              <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group input-group-sm">
                              <label class="input-group-addon" for="dataHeight">Height</label>
                              <input type="text" class="form-control" name="h" id="dataHeight" placeholder="height">
                              <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group input-group-sm hidden">
                              <label class="input-group-addon" for="dataRotate">Rotate</label>
                              <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                              <span class="input-group-addon">deg</span>
                            </div>
                            <div class="input-group input-group-sm hidden">
                              <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                              <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                            </div>
                            <div class="input-group input-group-sm hidden">
                              <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                              <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                            </div>
                          </div>
                      </div>

                    </div>

                </div>

            </div>

		</form>

	</div>

</section>

<!-- /.container-fluid -->

<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>

<script type="text/javascript">

	function editItem(){

        $('#error-alias .alert-danger').remove();

        if($('#form-bk').validationEngine('validate')){

            $.ajax({

                type: "POST",

                dataType: "json",

                url: base_url() + 'techadmin/alias/checkEdit',

                data: {id:$('#id_edit').val(),alias:$('#alias').val(),catcheck:$('#catcheck').val()},

                success:function(result){

                    if(result.check == true){

                        $('#form-bk').submit();

                    }else{

                        $('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Vui lòng nhập alias khác</div>');

                    }

                }

            });

        }

    }

	

</script>

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

</script>



