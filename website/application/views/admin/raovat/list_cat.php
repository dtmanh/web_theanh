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

        <li class="active"><a href="<?= base_url('techadmin/raovat/categories')?>">Danh mục rao vặt</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh mục rao vặt</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/raovat/cat_add')?>" class="btn btn-success">
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

			<form name="formbk" method="post" action="<?=base_url('techadmin/raovat/deletes_category')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>

                            <th width="3%" class="no-sort text-center">Sắp xếp</th>

							<th width="">Tên</th>

							<th width="7%" class="no-sort">Ảnh</th>

							<th width="7%" class="no-sort">Hiển thị</th>

                            <th width="7%" class="no-sort text-center">Action</th>

							

                        </tr>

                    </thead>

					<tbody>

						<?php

							view_raovat_cate_table($cate,0,'',$show_home,$show_hot,$show_focus);

						?>

					 </tbody>

				</table>

			</form>	      

		</div>

	</div>

</section>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>

	$(document).ready(function() {

		$('#example').DataTable( {

			"columnDefs": [ {

					"targets": 'no-sort',

					"orderable": false,

					  } ],

			//"order": [[ 2, "desc" ]],

			"iDisplayLength": 20

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

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>

