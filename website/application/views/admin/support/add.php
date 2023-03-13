<?php

    /**

     * Created by JetBrains PhpStorm.

     * User: Tran Manh

     * Date: 05/08/2017

     * Time: 2:01 PM

     * To change this template use File | Settings | File Templates.

     */

    ?>



<section class="content-header">

    <h1>

        Hỗ trợ trực tuyến

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/support/listSuport')?>">Hỗ trợ trực tuyến</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="row">

        <form class="validate form-horizontal" role="form" id="form-bk" method="POST" action=""

            enctype="multipart/form-data">

            <input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">

			<input type="hidden" name="addnews" value="1">

            <div class="col-md-9" style="font-size: 12px">

                <div class="panel panel-default">

					<div class="alert alert-dismissible" style="display:none;"></div>

                    <div class="panel-heading">

                        <h3 class="panel-title pull-left">Tổng quan</h3>

                        <div class="pull-right">

                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i

                                class="fa fa-check"></i> <?= @$btn_name; ?>

                            </button>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <div class="form-group">

                            <label  class="col-sm-12">Họ tên</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm validate[required]" name="name"

                                    value="<?=@$edit->name;?>" placeholder=""/>

                            </div>

                        </div>

						<div class="form-group">

                            <label  class="col-sm-12">Điện thoại</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm validate[required]" name="phone"

                                    value="<?=@$edit->phone;?>" placeholder=""/>

                            </div>

                        </div>

                        <div class="form-group hidden">

                            <label  class="col-sm-12">Địa chỉ</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm validate[required]" name="address"

                                    value="<?=@$edit->address;?>" placeholder=""/>

                            </div>

                        </div>

						<div class="form-group hidden">

                            <label  class="col-sm-12">Email</label>

                            <div class="col-sm-12">

                                <input type="email" class="form-control input-sm validate[required]" name="email"

                                    value="<?=@$edit->email;?>" placeholder=""/>

                            </div>

                        </div>

						<div class="form-group">

                            <label  class="col-sm-12">Skype</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm" name="skype"

                                    value="<?=@$edit->skype;?>" placeholder=""/>

                            </div>

                        </div>

						<div class="form-group ">

                            <label  class="col-sm-12">Zalo</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm" name="yahoo"

                                    value="<?=@$edit->yahoo;?>" placeholder=""/>

                            </div>

                        </div>

                        <div class="text-right" style="padding-bottom: 15px">

                            <input type="hidden" name="addnews" value="1">

                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i

                                class="fa fa-check"></i> <?= @$btn_name; ?>

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

                        <label class="col-sm-12" style="padding-left: 0px">

                        Hiển thị

                        </label>

                        <div class="col-sm-12 view_checkbox" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">

                            <label class="radio-inline">

								<input type="radio" name="active" id="inlineRadio1" value="1"

									<?php if(!isset($edit)) echo 'checked'; else?>

									<?=@$edit->active==1?'checked':''?>

									> Có

							</label>

							<label class="radio-inline">

								<input type="radio" name="active" id="inlineRadio2" value="0"

									<?php if(isset($edit) &&@$edit->active==0) echo 'checked'; else?>

									> Không

							</label>

                        </div>

                        <div class="clearfix"></div>

                        <br>

						<label class="col-sm-12 hidden" style="padding-left: 0px">

                        Nhân viên

                        </label>

                        <div class="col-sm-12 view_checkbox hidden" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">

                            <label class="radio-inline">

								<input type="radio" name="type" id="inlineRadio4" value="2"

									<?php if(isset($edit) &&@$edit->type==2) echo 'checked'; else?>

									> Hotline

							</label><br />

							<label class="radio-inline">

								<input type="radio" name="type" id="inlineRadio3" value="1"

									<?php if(!isset($edit)) echo 'checked'; else?>

									<?=@$edit->type==1?'checked':''?>

									> Kỹ thuật

							</label><br />

							<label class="radio-inline">

								<input type="radio" name="type" id="inlineRadio4" value="0"

									<?php if(isset($edit) &&@$edit->type==0) echo 'checked'; else?>

									> Kinh doanh

							</label>

                        </div>

                        <div class="clearfix"></div>

                        <br>

                        <div class="form-group hidden">

                            <label class="col-sm-12 ">Hình ảnh</label>

                            <div class="col-sm-12">

                                <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />

                            </div>

							<div class="clearfix"></div>

							<br>

							<div class="col-sm-12" id="view_img">

								 <?php

								if(file_exists(@$edit->image)){ ?>

									<img src="<?=base_url($edit->image)?>" id="image_review">

									<button  type="button"  onclick="delete_image($(this))" data-placement="support_online" class="btn btn-success btn-xs"><i class="fa fa-times"></i> </button>

								<?php }else{

									echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';

								}

								?>

							</div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

<!-- /.container-fluid -->

<style>.view_checkbox input[type=checkbox]{margin-top:2px }</style>

