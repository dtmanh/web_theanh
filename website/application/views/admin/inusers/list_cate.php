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
        <li class="active"><a href="<?= base_url('techadmin/inuser/inuserlist')?>"> Danh mục ý kiến khách hàng</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp;  Danh mục ý kiến khách hàng</h4>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group margin-bottom-20"> 
          	<a href="<?= base_url('techadmin/inuser/cate_add')?>" class="btn btn-success">
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
			<div class="col-sm-12 hidden">
				<div class="form-group row">
					<div class="col-sm-4" data-column="3">
						<input type="search" id="col3_filter" placeholder="Tiêu đề ..." class="column_filter form-control input-sm">
					</div>
					<div class="col-sm-4" data-column="4">
						<input type="search" id="col4_filter" placeholder="Tên danh mục ..." class="column_filter form-control input-sm">
					</div>
					<div class="col-sm-4" data-column="5">
						<input type="search" id="col4_filter" placeholder="Vị trí ..." class="column_filter form-control input-sm">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<form name="formbk" method="post" action="<?=base_url('techadmin/inuser/deletes_category')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="3%" class="no-sort text-center">Sắp xếp</th>
							<th width="">Tên</th>
							<th width="7%" class="no-sort">Ảnh</th>
							<th width="7%" class="no-sort">Hiển thị</th>
                            <th width="7%" class="no-sort text-center">Chức năng</th>
							
                        </tr>
                    </thead>
					 <tbody>
					 <?php if (isset($list_cate)) {
						$stt = 1;
						foreach ($list_cate as $v) {
							?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td class="sort"><input type="number" id="sort" onchange="update_sort($(this))" value="<?= @$v->sort ?>"
								data-placement='inuser_category' data-item='<?= @$v->id; ?>' style="width: 55px"></td>
							<td><?= @$v->name ?></td>
							<td>
								 <?php if(file_exists($v->image)){?>
                                <img src="<?= base_url().@$v->image?>" style="max-width: 100px; max-height: 80px">
                                <?php }else{?>
                                <img src="<?= base_url('img/noimage.png')?>" style="max-width: 80px; max-height: 55px">
                                <?php } ?>
							</td>
							<td>
                                <div data-toggle="tooltip" data-placement="inuser_category" title="Trang chủ"
                                    data-value="<?= $v->id; ?>" data-view="home"
                                    class='view_color'
                                    style='border: 1px solid #000088; <?= ($v->home == 1) ? 'background:#000088' : ''; ?>'></div>
                                <div data-toggle="tooltip" data-placement="inuser_category" title="Nổi bật"
                                    data-value="<?= $v->id; ?>" data-view="focus"
                                    class='view_color hidden'
                                    style='border: 1px solid #008855; <?= ($v->focus == 1) ? 'background:#008855' : ''; ?>'>
                                </div>
							</td>
							<td class="text-center">
								<a class="btn btn-warning btn-xs mr5"
								   href="<?= base_url('techadmin/inuser/cat_edit/' . $v->id) ?>"><i
										class="fa fa-edit"></i> </a>
								<a class="btn btn-danger btn-xs" href="<?= base_url('techadmin/inuser/deletecategory/' . $v->id) ?>"
								   title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
										class="fa fa-remove"></i> </a>
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
	.content-header h1{height:40px;}table.dataTable thead .sorting_asc:after {display: none !important;}
    .view_color{width: 10px; height: 10px;margin-top: 5px;cursor: pointer; float: left;margin-right: 5px }
</style>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"columnDefs": [ {
					"targets":  [0],
					"orderable": false,
					  } ],
			//"order": [[ 2, "desc" ]],
			"initComplete": function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
	 
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );
	} );
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
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>