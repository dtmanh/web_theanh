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
       Danh sách hướng dẫn
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/admin/listDoc')?>">Danh sách hướng dẫn</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
            <a href="<?= base_url('techadmin/admin/cat_add_doc')?>" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Thêm mới
            </a>
            <a onclick="ActionDelete('formbk')" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Xóa
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<form name="formbk" method="post" action="<?=base_url('techadmin/admin/deletes_categorydoc')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="3%" class="no-sort text-center">Sắp xếp</th>
							<th width="">Tên</th>
                            <th width="7%" class="no-sort text-center">Action</th>

                        </tr>
                    </thead>
					<tbody>
						<?php
						view_doc_cate_table($cate,0,'');
						?>
					 </tbody>
				</table>
			</form>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"columnDefs": [ {
				"targets": 'no-sort',
				"orderable": false,
				  } ],
			"order": [[ 2, "desc" ]],
			"iDisplayLength": 20,
		} );
	} );
</script>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<style>
.no-hidden select{display:none;}
table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td{padding:5px;}
</style>