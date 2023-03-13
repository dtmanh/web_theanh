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

        <li class="active"><a href="<?= base_url('techadmin/attribute/listColor')?>"><?=@$show_listColor->name?></a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">
		<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp;   <?=@$show_listColor->name?></h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/attribute/addcolor')?>" class="btn btn-success">
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

			<form name="formbk" method="post" action="<?=base_url('techadmin/attribute/deletes_color_category')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>

                            <th width="3%" class="no-sort text-center">Sắp xếp</th>

							<th width="">Tên cấp bậc</th>

							<th width="7%" class="no-sort hidden">Ảnh</th>

							<th width="7%" class="no-sort hidden">Mã màu</th>

                            <th width="7%" class="no-sort text-center">Action</th>



                        </tr>

                    </thead>

					 <tbody>

					 <?php if (isset($list)) {

						$stt = 1;

						foreach ($list as $v) {

							?>

						<tr>

							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>

							<td><input type="number" onchange="update_sort($(this))" id="sort" value="<?= @$v->sort ?>"

								data-placement='product_color'	   data-item='<?= @$v->id; ?>' style="width: 55px"></td>

							<td><?= @$v->name ?></td>

							<td class="hidden">

								 <?php if(file_exists($v->image)){?>

                  <img src="<?= base_url().@$v->image?>" style="max-width: 100px; max-height: 80px">

                  <?php }else{?>

                  <img src="<?= base_url('img/noimage.png')?>" style="max-width: 80px; max-height: 55px">

                  <?php } ?>

							</td>

							<td class="hidden">

                                <?= @$v->color ?>

							</td>

							<td class="text-center">

								<a class="btn btn-xs btn-default"

								   href="<?= base_url('techadmin/attribute/editcolor/' . $v->id) ?>"><i

										class="fa fa-pencil"></i> </a>

								<a class="btn btn-xs btn-danger"

								   href="<?= base_url('techadmin/attribute/deletecolorcategory/' . $v->id) ?>" title="Xóa"

								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i

										class="fa fa-times"></i> </a>

							</td>

						</tr>

						<?php

						} } ?>

					 </tbody>

				</table>

			</form>

		</div>

	</div>

</section>

<style>

    .view_color{width: 10px; height: 10px;margin-top: 5px;cursor: pointer; float: left;margin-right: 5px }

</style>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>

 
// thay doi sap xep cac ban ghi
$("table tbody").sortable({
	update: function (event, ui) {
    $(this).children().each(function (index) {	   
    $(this).find('td #sort').val(index + 1);  
     var sort = index + 1;
     var id = $(this).find('td #sort').attr('data-item');
     var table = $(this).find('td #sort').attr('data-placement');
	  $.ajax({
            type: "POST",
            dataType: "html",
            url: base_url() + 'ajax/ajax/update_sort',
            data: {id:id, sort: sort,table:table},
            success: function (result) {	            	
            }
        });
    });
    var mss ='<div class="alert alert-success alert-dismissible" role="alert">\
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
	            <i class="icon fa fa-success"></i>Bạn đã thay đổi thành công !\
	    	</div>';
    $('#show_success_mss').html(mss);
    $('#show_success_mss').show();
    setTimeout(function(){
        $('#show_success_mss').empty();
    }, 3000)
 } });
</script>

<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
