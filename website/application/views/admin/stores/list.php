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

        <li class="active"><a href="<?= base_url('techadmin/attribute/listLocale')?>">Danh sách cửa hàng</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách cửa hàng</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url('techadmin/store/add')?>" class="btn btn-success">
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

			
			<form name="formbk" method="post" action="<?=base_url('techadmin/attribute/deletes_locale_category')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
              							<th width="">Tên Cửa hàng</th>

                            <th width="30%" class="">Địa chỉ</th>

              							<th width="20%" class="no-sort"> Điện thoại</th>

                            <th width="7%" class="no-sort text-center">Action</th>



                        </tr>

                    </thead>

					 <tbody>

					 <?php if (isset($list)) {
						foreach ($list as $v) {

							?>

						<tr>

							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?= @$v->title ?></td>

              <td class=""><?= @$v->diachi_shop ?></td>

							<td class="">
								 <?= @$v->phone ?>

							</td>

							<td class="text-center">

								<a class="btn btn-xs btn-default"

								   href="<?= base_url('techadmin/store/edit/' . $v->id) ?>"><i

										class="fa fa-pencil"></i> </a>

								<a class="btn btn-xs btn-danger"

								   href="<?= base_url('techadmin/store/delete/' . $v->id) ?>" title="Xóa"

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

<script>

	$(document).ready(function() {

		$('#example').DataTable( {

			"columnDefs": [ {

					"targets": 'no-sort',

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

</script>

<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
