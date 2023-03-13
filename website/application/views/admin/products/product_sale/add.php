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
       <?=$btn_name;?> Mã giảm giá
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/product_sale/listSale')?>">Mã giảm giá</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
	<div class="row">
		<form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
			  enctype="multipart/form-data" >
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
							<label for="inputEmail1" class="col-lg-4 control-label">Tên khuyến mại:</label>
							<div class="col-lg-8">
								<input type="text" class="form-control input-sm validate[required]" name="name"
									   value="<?=@$edit->name;?>" placeholder="Tên khuyến mại"  />
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-4 control-label">Mã giảm giá:</label>
							<div class="col-lg-8">
								<input type="text" class="form-control validate[required] input-sm " name="code"
									   value="<?=@$edit->code;?>" size="6" maxlength="6" placeholder="Mã giảm giá"  />
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-4 control-label">Chiết khẩu (%):</label>
							<div class="col-lg-8">
								<input type="number" id="price" class="form-control validate[required,custom[number]]" name="price"
									   value="<?=@$edit->price;?>" min="1" max="50" placeholder="Chiết khấu (%)"  />
							</div>

						</div>
						<div class="text-right" style="padding-bottom: 15px">
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
					</div>
				</div>
			</div>
		</form>
    </div>
</section>
