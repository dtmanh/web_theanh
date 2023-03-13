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
        <li class="active"><a href="<?= base_url('techadmin/province/listdistrict')?>">Danh sách quận huyện</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách quận huyện</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
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
			<div class="col-sm-12">
				<input type="hidden" id="autocomplete1" value="<?=@$auto_name;?>">
				<form action="" method="get">
				<div class="form-group row">
					<div class="col-sm-4" data-column="3">
						<input name="name" type="search" id="getautocomplete1" value="<?=$this->input->get('name');?>"
								   placeholder="Tên ..."
								   class="form-control input-sm">
					</div>
					<div class="col-sm-4" data-column="4">
						<select name="cate" class="input-sm form-control">
							<option value="">thành phố</option>
							<?php $stt = 1;
						foreach ($city as $c) { $stt++;
							?>
							<option value="<?=@$c->id;?>" <?php if(@$c->id ==$this->input->get('name')){?>selected="selected" <?php } ?> ><?=@$c->name;?></option>
						<?php } ?>
						</select>
					</div>
					<div class="col-sm-4" data-column="5">
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-sm btn-default">
							<i class="fa fa-search"></i>  Tìm kiếm
						</button>
					</div>
					<div class="clearfix"></div>
				</div>
				</form>
			</div>
			<form name="formbk" method="post" action="<?=base_url('techadmin/province/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="1%" class="no-sort text-center">Stt</th>
							<th width="10%">Tên Quận huyện</th>
							<th width="10%" class="no-sort">Tên Thành phố</th>
                        </tr>
                    </thead>
					 <tbody>
					 <?php if (isset($list)) {
						$stt = 1;
						foreach ($list as $v) { $stt++;
							?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?=$stt;?></td>
							<td>
							<input type="text" data-id="<?= $v->id ?>" data-view="name" data-placement="district" class="form-control input-sm provice_price" oninput="update_value($(this))" name="name_image"
											   value="<?= @$v->name ?>" placeholder=""/>			   
							</td>
							<td><?= @$v->cat_name->name ?></td>
						</tr>
						<?php
						} } ?>
					 </tbody>
				</table>
				<?php
					echo $this->pagination->create_links(); // tạo link phân trang
				?>	
			</form>	      
		</div>
	</div>
</section>
<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>

<!-- cap nhat gia tien -->
<script src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>
<script type="text/javascript">
	function update_value(s) {
		var str = $(s).val();
		var id = $(s).data('id');
		$.ajax({
			url: base_url() +"ajax/ajax/update_value",
			type: 'POST',
			dataType: 'json',
			data: {id:id,table:s.attr('data-placement'),value:str,fill:s.attr('data-view')},
			success:function (result) {
			}
		})
	}
	$(function(){
         // cài đặt autocomplete với ô code
        var codefor  = $('#autocomplete1').val() ;
        var codefor = codefor.split(",");
        $('#getautocomplete1').autocomplete({
           lookup: codefor,
        });
		
   }); 
</script>