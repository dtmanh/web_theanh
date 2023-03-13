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

        <li class="active"><a href="<?= base_url('techadmin/imageupload/banners')?>"> Danh sách Banner</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách Banner</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/imageupload/add')?>" class="btn btn-success">
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

			<div class="col-sm-12" >

				<div class="form-group row">

					<div class="col-sm-4" data-column="3">

						<input type="search" id="col3_filter" placeholder="Tiêu đề ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-4" data-column="4">

						<input type="search" id="col4_filter" placeholder="Tên danh mục ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-4" data-column="5">

						<input type="search" id="col5_filter" placeholder="Vị trí ..." class="column_filter form-control input-sm">

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

			<form name="formbk" method="post" action="<?=base_url('techadmin/imageupload/deletes')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>

                            <th width="3%" class="text-center">STT</th>

                            <th width="2%" class="no-sort">Ảnh</th>

							<th width="10%">Tiêu đề</th>

							<?php if(@$type->active==1){ ?>	
							<th width="10%">Vị trí</th>
							<?php } ?>	

						 

							<th width="2%" class="no-sort">Sắp xếp</th>
 

                            <th width="5%" class="no-sort text-center">Action</th>

                        </tr>

                    </thead>

					 <tbody>

					 <?php if (isset($list)) {

						$stt = 1;

						foreach ($list as $v) {

							?>

						<tr>

							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>

							<td><?= $stt++; ?></td>

							<td>

								<img style="width: 85px;height: 40px"

									 src="<?= base_url(@$v->image); ?>" alt=""/>

							</td>

							<td><?= @$v->title ?></td>

							 

							<?php if(@$type->active==1){ ?>	
							<td><?=@$v->type_name->name;?></td>
							<?php } ?>

							<td>

								<input type="number" onchange="update_sort($(this))" value="<?= @$v->sort ?>"

								data-placement='images'	   data-item='<?= @$v->id; ?>' style="width: 55px">

							</td>

							 



							<td class="text-center">



								<a class="btn btn-xs btn-default"

								   href="<?= base_url('techadmin/imageupload/edit/' . $v->id) ?>"><i

										class="fa fa-pencil"></i> </a>



								<a class="btn btn-xs btn-danger"

								   href="<?= base_url('techadmin/imageupload/delete/' . $v->id) ?>" title="Xóa"

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

<script>

	$(document).ready(function() {

		$('#example').DataTable( {

			"columnDefs": [ {

					"targets": 'no-sort',

					"orderable": false,

					  } ],

			"order": [[ 1, "desc" ]],

			"iDisplayLength": 20

		} );

		// tim kiem theo ten

		$('input.column_filter').on( 'keyup click', function () {

			filterColumn( $(this).parents('').attr('data-column') );

		} );

	} );

	function filterColumn ( i ) {

		$('#example').DataTable().column( i ).search(

			$('#col'+i+'_filter').val()

		).draw();

	}

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