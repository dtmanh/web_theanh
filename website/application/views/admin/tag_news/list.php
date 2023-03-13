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
        <li class="active"><a href="<?= base_url('techadmin/tag/listnew')?>">Danh sách thẻ tag tin tức</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-8">
              <h4><i class="fa fa-list"></i> &nbsp;  Danh sách thẻ tag tin tức</h4>
              <input type="hidden" id="autocomplete2" value="<?= $auto_name?>">
				<form action="" method="get">
					<div class="form-group">
						<div class="col-sm-8">
							<input name="name" type="search" id="getautocomplete2" value="<?=$this->input->get('name');?>"
								   placeholder="Tên thẻ tag..."
								   class="form-control input-sm">
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
            <div class="col-md-4 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/tag/addtagnew')?>" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm mới
                </a>
                <a onclick="ActionDelete('formbk')" class="btn btn-danger">
                <i class="fa fa-times"></i> Xóa
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
			 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<form name="formbk" method="post" action="<?=base_url('techadmin/tag/deletestagnew')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
							<th width="3%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
							<th width="5%" class="no-sort">Stt</th>
							<th >Tên thẻ tag</th>
							<th width="30%">alias</th>
							<th width="30%">nổi bật</th>
							<th width="8%" class="no-sort text-center">Chức năng</th>
                        </tr>
                    </thead>
					<tbody>
						 <?php if (isset($list)) {
                            $stt=1;
                            foreach ($list as $v) {
                                ?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?= $stt++; ?></td>
							<td class="todo-list"><a href="<?= base_url('techadmin/tag/edittagnew/' . $v->id) ?>" title="Sửa thẻ tag">
                                <?= @$v->name ?>
                                </a>
							</td>
							<td><?= @$v->alias ?></td>
                            <td>
                                <div data-toggle="tooltip" data-placement="tags_news" title="Nổi bật"
                                     data-value="<?= $v->id; ?>" data-view="home"
                                     class='view_color ' style="border: 1px solid #45c9dd;<?php if($v->home == 1){ echo'background-color:#45c9dd'; }else{ echo''; } ?>"></div>
                            </td>
							<td class="text-center">
								<a class="btn btn-xs btn-default"
								   href="<?= base_url('techadmin/tag/edittagnew/' . $v->id) ?>"><i
										class="fa fa-pencil"></i> </a>
								<a class="btn btn-xs btn-danger"
								   href="<?= base_url('techadmin/tag/deletetagnew/' . $v->id) ?>" title="Xóa"
								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
										class="fa fa-times"></i> </a>
							</td>
							
						</tr>
						<?php }  } ?>
					</tbody>
				</table>
				<?php
				echo $this->pagination->create_links(); // tạo link phân trang
				?>				
			</form>	      
		</div>
	</div>
</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
	// xóa danh mục đã chọn
	function ActionDelete(formName)
	{
		var $check = false;
		jQuery("input[name='checkone[]']").each(function(){
			if($(this).is(':checked')){
				$check = true;
			}
		});
		if($check == false){
			alert('Bạn chưa chọn mục nào để xóa');
		}
		else{
			if(confirm('Bạn có chắc chắn muốn xóa không ?')){
				eval('document.' + formName + '.submit();');
			}
		}
	}
	// click hien thị và không hiện thị
	$('.view_color').click(function(){
		var color = $( this ).css( "border-color" );
		var background = $( this ).css( "background-color" );

		var form_data = {
			id: $( this ).attr('data-value'),view:$( this ).attr('data-view'),table:$( this ).attr('data-placement')
		};
		$.ajax({
			url: base_url() + 'ajax/ajax/update_fill',
			type: 'POST',
			dataType: 'json',
			data: form_data,
			success: function (rs) {

			}
		});
		if(color!=background){
			$( this ).css( "background-color",color ) ;
		}else{
			$( this ).css( "background-color",'#fff' ) ;
		}
	});
	// cap nhat trường sap xep cho table
	function update_sort(s) {
		var form_data = {
			id: s.attr('data-item'), sort: s.val(), table:s.attr('data-placement')
		};
		$.ajax({
			url: base_url() + "ajax/ajax/update_sort",
			type: 'POST',
			dataType: 'json',
			data: form_data,
			success: function (rs) {
			}
		});
	}
</script>
<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>
<script type="text/javascript">
   $(function(){
		var namefor  = $('#autocomplete2').val() ;
		var namefor = namefor.split(",");
		$('#getautocomplete2').autocomplete({
           lookup: namefor,
        });
   }); 
</script>
<style>
.todo-list .tools {
	position: relative;
	width: 100%;
    float: right;
    color: #dd4b39;
	z-index:-1;
}
.todo-list:hover .tools {
    z-index:100;
    width: 100%;
	top:3px;
    text-align: right;
}
.todo-list:hover .tools a{padding-right:10px;}
</style>