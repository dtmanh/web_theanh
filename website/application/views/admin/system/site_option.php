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

        Cấu hình hệ thống

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/site_option')?>">Cấu hình</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

	<!-- Page Heading -->

	<div class="row">

		<form class="validate form-horizontal" role="form" id="form1" method="POST" action=""

			enctype="multipart/form-data">

			<input type="hidden" name="edit" value="<?= @$row->id; ?>">

			<div class="col-md-9" style="font-size: 12px">

				<div class="panel panel-default">

					<div class="panel-heading">

						<h3 class="panel-title pull-left">Thông tin chung</h3>

						<div class="pull-right">

							<button type="submit" class="btn btn-success btn-xs" name="addnews"><i

								class="fa fa-check"></i> Cập nhật

							</button>

						</div>

						<div class="clearfix"></div>

					</div>

					<div class="panel-body">
						<?php if(@$config_home->site_title==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->site_title;?></label>

							<div class="col-sm-12">

								<input name="site_title" type="text" class="form-control input-sm"

									value="<?=@$row->site_title;?>" placeholder="">

							</div>

						</div><?php } ?>
						<?php if(@$config_home->site_name==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->site_name;?></label>

							<div class="col-sm-12">

								<input name="site_name" type="text" class="validate[required] form-control input-sm"

									value="<?=@$row->site_name;?>" placeholder="">

							</div>

						</div><?php } ?>
						<?php if(@$config_home->timeopen==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->timeopen;?></label>

							<div class="col-sm-12">

								<input name="timeopen" type="text" class="form-control input-sm"

									value="<?=@$row->timeopen;?>" placeholder="">

							</div>

						</div><?php } ?>
<?php if(@$config_home->slogan==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->slogan;?></label>

							<div class="col-sm-12">

								<input name="slogan" type="text" class="form-control input-sm"

									value="<?=@$row->slogan;?>" placeholder="">

							</div>

						</div><?php } ?>
<?php if(@$config_home->site_video==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->site_video;?></label>

							

							<div class="col-sm-12">

								<input name="site_video" type="text" class="form-control input-sm"

									   value="<?=$row->site_video==''?'':'https://www.youtube.com/watch?v='.$row->site_video;?>"

									   placeholder="Vd:https://www.youtube.com/watch?v=XXXXXX">

							</div>

						</div><?php } ?>
<?php if(@$config_home->map_iframe==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->map_iframe;?></label>

							

							<div class="col-sm-12">

								<input name="map_iframe" type="text" class="form-control input-sm"

									   value='<?=$row->map_iframe?>'

									   placeholder="Mã nhúng">

								

							</div>

						</div><?php } ?>
<?php if(@$config_home->address==1){ ?>
						<div class="form-group">

							<label class="col-sm-12  "><?=@$config_text->address;?></label>

							<div class="col-sm-12">

								<input name="address" class="form-control input-sm input-sm" value="<?=@$row->address;?>"/>

							</div>

						</div><?php } ?>
<?php if(@$config_home->shipping==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->shipping;?></label>

							<div class="col-sm-12">

								<textarea name="shipping" class="form-control" placeholder=""

									id="ckeditor_description" rows="8"><?= @$row->shipping ?></textarea>

							</div>

						</div><?php } ?>
<?php if(@$config_home->chat==1){ ?>

						<div class="form-group">

							<label class="col-sm-12"><?=@$config_text->chat;?></label>

							<div class="col-sm-12">

								<textarea name="chat" rows="6" class="form-control input-sm input-sm" id="chat"><?=@$row->chat;?></textarea>

							</div>

						</div><?php } ?>
<?php if(@$config_home->map_footer==1){ ?>
						<div class="form-group">

							<label class="col-sm-12"><?=@$config_text->map_footer;?></label>

							<div class="col-sm-12">

								<textarea name="map_footer" rows="6" class="form-control input-sm input-sm" id="ckeditor_map"><?=@$row->map_footer;?></textarea>

							</div>

						</div><?php } ?>
						<div class="form-group">

							<label  class="col-sm-12">Keyword Seo</label>

							<div class="col-sm-12">

								<input name="site_keyword" type="text" class="form-control input-sm"

									value="<?=@$row->site_keyword;?>" placeholder="">

							</div>

						</div>

						<div class="form-group">

							<label  class="col-sm-12">Description Seo</label>

							<div class="col-sm-12">

								<textarea rows="7" name="site_description" class="form-control input-sm"><?=@$row->site_description;?></textarea>

							</div>

						</div>
<?php if(@$config_home->coppy_right==1){ ?>
						<div class="form-group">

							<label class="col-sm-12  "><?=@$config_text->coppy_right;?></label>

							<div class="col-sm-12">

								<input name="coppy_right" class="form-control input-sm input-sm" value="<?=@$row->coppy_right;?>"/>

							</div>

						</div>
						<?php } ?>
<?php if(@$config_home->domain==1){ ?>
						<div class="form-group">

							<label class="col-sm-12  "><?=@$config_text->domain;?></label>

							<div class="col-sm-12">

								<input name="domain" class="form-control input-sm input-sm" value="<?=@$row->domain;?>"/>

							</div>

						</div><?php } ?>

						<div class="text-right" style="padding-bottom: 15px">

							<button type="submit" class="btn btn-success btn-xs" name="addnews"><i

								class="fa fa-check"></i> Cập nhật

							</button>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-3" style="font-size: 12px">

				<div class="panel panel-default">

					<div class="panel-heading">

						<h3 class="panel-title pull-left">Tùy chọn</h3>

						<div class="clearfix"></div>

					</div>

					<div class="panel-body">

						<div class="form-group">

							<label class="col-sm-12 ">Logo Công ty</label>

							<div class="col-sm-12">

								<input type="file" name="userfile" id="input_img" onchange="handleFiles()" />

								<?php

									if(file_exists(@$row->site_logo)){

										echo '<img src="'.base_url($row->site_logo).'" id="image_review">';

									}else{

										echo '<img src="" id="image_review">';

									}

									?>

							</div>

						</div>
<?php if(@$config_home->site_logo_footer==1){ ?>
						<div class="form-group">

							<label class="col-sm-12 "><?=@$config_text->site_logo_footer;?></label>



							<div class="col-sm-12">

								<input type="file" name="logo_footer" id="input_img" onchange="handleFiles()" />

								<?php

								if(file_exists(@$row->site_logo_footer)){

									echo '<img style="max-width:100% !important; width:auto !important" src="'.base_url($row->site_logo_footer).'" id="image_review">';

								}else{

									echo '<img src="" id="image_review">';

								}

								?>





							</div>

						</div><?php } ?>
						
						<div class="form-group">

							<label class="col-sm-12 ">Favicon</label>



							<div class="col-sm-12">

							   <input type="file" name="userfile2" id="input_img" onchange="handleFiles()" />

								<?php if(file_exists(@$row->favicon)){

									echo '<img style="max-width:100% !important; width:auto !important" src="'.base_url(@$row->favicon).'" id="image_review">';

								}else{

									echo '<img src="" id="image_review">';

								} ?>

							</div>

						</div>
						<?php if(@$config_home->color==1){ ?>
						<div class="form-group">
                       <label  class="col-lg-6 control-label"><?=@$config_text->color;?>:</label>
                        <input type="color" name="color" value="<?= @$row->color; ?>">
                        </div>
                        <?php }?>
                        <?php if(@$config_home->size==1){ ?>
                        <div class="well well-sm">

							<div class="form-group">

								<label  class="col-sm-12"><?=@$config_text->size;?></label>

								<div class="col-sm-12">

									<input name="size" type="text" class="form-control input-sm"

										value="<?=@$row->size;?>" placeholder="h1 cỡ chữ">

								</div>

							</div>
							<?php }?> 
						<div class="form-group">

							<label  class="col-sm-12">Email</label>

							<div class="col-sm-12">

								<input name="site_email" type="text" class="form-control input-sm"

									value="<?=@$row->site_email;?>" placeholder="">

							</div>

						</div>
<?php if(@$config_home->WM_text==1){ ?>
						<div class="well well-sm">

							<div class="form-group">

								<label  class="col-sm-12"><?=@$config_text->WM_text;?></label>

								<div class="col-sm-12">

									<input name="wm_text" type="text" class="form-control input-sm"

										value="<?=@$row->WM_text;?>" placeholder="Chữ Nổi Trên Ảnh">

								</div>

							</div><?php } ?>
<?php if(@$config_home->WM_color==1){ ?>
							<div class="form-group">

								<label  class="col-sm-12"><?=@$config_text->WM_color;?></label>

								<div class="col-sm-12">

									<input name="wm_color" type="text" class="form-control input-sm"

										value="<?=@$row->WM_color;?>" placeholder="Màu Sắc Của Chữ">

								</div>

							</div><?php } ?>
<?php if(@$config_home->WM_size==1){ ?>
							<div class="form-group">

								<label  class="col-sm-12">Kích thước (theo % Ảnh 3->10% ) </label>

								<div class="col-sm-12">

									<input name="wm_size" type="text" class="form-control input-sm"

										value="<?=@$row->WM_size;?>" placeholder="Kích Thước Chữ">

								</div>

							</div><?php } ?>
<?php if(@$config_home->input_text_1==1){ ?>
							<div class="form-group">

								<label  class="col-sm-12"><?=@$config_text->input_text_1;?></label>

								<div class="col-sm-12">

									<input name="input_text_1" type="text" class="form-control input-sm"

										value="<?=@$row->input_text_1;?>" placeholder="Nhập dữ liệu">

								</div>

							</div>

						</div><?php } ?>
<?php if(@$config_home->face_id==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->face_id;?></label>

							<div class="col-sm-12">

								<input name="face_id" type="text" class="form-control input-sm"

									value="<?=@$row->face_id;?>" placeholder="">

							</div>

						</div><?php } ?>
<?php if(@$config_home->site_fanpage==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->site_fanpage;?></label>

							<div class="col-sm-12">

								<input name="site_fanpage" type="text" class="form-control input-sm"

									value="<?=@$row->site_fanpage;?>" placeholder="Link Facebook">

							</div>

						</div><?php } ?>
<?php if(@$config_home->link_gg==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_gg;?></label>

							<div class="col-sm-12">

								<input name="link_gg" type="text" class="form-control input-sm"

									value="<?=@$row->link_gg;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_youtube==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_youtube;?>12</label>

							<div class="col-sm-12">

								<input name="link_youtube" type="text" class="form-control input-sm"

									value="<?=@$row->link_youtube;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_tt==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_tt;?></label>

							<div class="col-sm-12">

								<input name="link_tt" type="text" class="form-control input-sm"

									value="<?=@$row->link_tt;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_sky==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_sky;?> </label>

							<div class="col-sm-12">

								<input name="link_sky" type="text" class="form-control input-sm"

									value="<?=@$row->link_sky;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_instagram==1){ ?>
						

						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_instagram;?></label>

							<div class="col-sm-12">

								<input name="link_instagram" type="text" class="form-control input-sm"

									value="<?=@$row->link_instagram;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_printer==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_printer;?></label>

							<div class="col-sm-12">

								<input name="link_printer" type="text" class="form-control input-sm"

									value="<?=@$row->link_printer;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->link_linkedin==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->link_linkedin;?></label>

							<div class="col-sm-12">

								<input name="link_linkedin" type="text" class="form-control input-sm"

									value="<?=@$row->link_linkedin;?>" placeholder="">

							</div>

						</div>

<?php } ?><?php if(@$config_home->hotline1==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->hotline1;?></label>

							<div class="col-sm-12">

								<input name="hotline1" type="text" class="form-control input-sm"

									value="<?=@$row->hotline1;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->hotline2==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->hotline2;?></label>

							<div class="col-sm-12">

								<input name="hotline2" type="text" class="form-control input-sm"

									value="<?=@$row->hotline2;?>" placeholder="">

							</div>

						</div>
<?php } ?><?php if(@$config_home->hotline3==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->hotline3;?></label>

							<div class="col-sm-12">

								<input name="hotline3" type="text" class="form-control input-sm"

									value="<?=@$row->hotline3;?>" placeholder="">

							</div>

						</div>
						<?php } ?><?php if(@$config_home->site_promo==1){ ?>
						<div class="form-group">

							<label  class="col-sm-12"><?=@$config_text->site_promo;?></label>

							<div class="col-sm-12">

								<textarea rows="10" name="site_promo" class="form-control input-sm"><?=@$row->site_promo;?></textarea>

							</div>

						</div>
<?php } ?>
						<div class="form-group ">
			                <label  class="col-sm-12">Tạo File SiteMap.xml</label>
			                <div class="col-sm-7">
			                    <a href="<?= base_url('admin/admin/sitemap') ?>" class="btn btn-info">Tạo SiteMap</a>
			                </div>
			                <div class="col-sm-5">
			                    <a href="<?= base_url('sitemap.xml') ?>" target="_blank" class="btn btn-info">View</a>
			                </div>
			            </div>
					</div>

				</div>

			</div>

		</form>

	</div>

</section>

<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
<script type="text/javascript">
		url= base_url() +'assets/ckfinder/';
	// ckeditor mo ta không full
	CKEDITOR.replace( 'ckeditor_map', {title:''} );
</script>