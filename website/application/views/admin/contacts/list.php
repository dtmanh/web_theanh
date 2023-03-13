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

       Danh sách Liên hệ

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/contact/contacts')?>"> Danh sách liên hệ</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">

        <div class="box-body">

			<div class="col-sm-12" >

				<div class="form-group row">

					<div class="col-sm-4" data-column="1">

						<input type="search" id="col1_filter" placeholder="Tên khách ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-3" data-column="2">

						<input type="search" id="col2_filter" placeholder="Điện thoại ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-3" data-column="3">

						<input type="search" id="col3_filter" placeholder="Email ..." class="column_filter form-control input-sm">

					</div>
					<div class="col-sm-2" data-column="4">
						 <a onclick="ActionDelete('formbk')" class="btn btn-danger" style="    margin-left: 15px;">
                <i class="fa fa-times"></i> Xóa
                </a>
					</div>
					<div class="clearfix"></div>
					
				</div>

			</div>

			<form name="formbk" method="post" action="<?=base_url('techadmin/contact/deletes')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>
                        	<th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="1%" class="text-center">STT</th>

                            <th width="10%" class="no-sort">Tên khách</th>

							<th width="5%">Điện thoại</th>

							<th width="10%">Email</th>

							<th width="10%">Địa chỉ</th>

							<th width="5%" class="no-sort">Thời gian gửi</th>

                            <th width="5%" class="no-sort text-center">Action</th>

                        </tr>

                    </thead>

					 <tbody>

						 <?php if(isset($list)){

                            $stt=1;

                            foreach($list as $v){

                                $j=$stt++;

                                $id_tr='id_tr'.$j;

                                ?>

						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?= $stt++; ?></td>

							<td><?= @$v->full_name?>

								<div id="<?=$id_tr.'1';?>" style="float: right; border-radius: 50%; width: 8px; height: 8px;margin-top: 6px; cursor: help"

									 data-toggle="tooltip" data-placement="right" title="<?=$v->show==0?'Chưa xem':'Đã xem'?>"

									 class="<?=$v->show==0?'red':'blue'?>"></div>

							</td>

							<td><?= @$v->phone?></td>

							<td><?=@$v->email;?></td>

							<td><?= @$v->address?></td>

							<td>

								<?= !empty($v->time)?date('d-m-Y',@$v->time):'';?>

							</td>

							<td class="text-center">

								<div onclick="getModal(<?=$v->id;?>,'<?=$id_tr.'1';?>')"

								   class="btn btn-xs btn-default" data-toggle="modal" data-target=".popup1" title="Xem chi tiết">

										<i class="fa fa-eye" style=""></i></div>



								<a href="<?= base_url('techadmin/contact/delete/'.$v->id)?>"

									onclick="return confirm('Bạn có chắc chắn muốn xóa?')">

									<div class="btn btn-xs btn-danger"><i class="fa fa-times-circle" style=""></i></div>

								</a>

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

	function getModal(id,div) {

		var baseurl = $('#baseurl').val();

		$('.modal').remove();

		$.ajax({

			type: "GET",

			dataType:"html",

			url: base_url() + 'techadmin/contact/popupdata',

			data: "id=" + id,

			success: function (ketqua) {

				$('body').append(ketqua);

				$("#myModal").modal();



			}

		})

	}

	$(document).ready(function() {

		$('#example').DataTable( {

			"columnDefs": [ {

					"targets": 'no-sort',

					"orderable": false,

					  } ],

			"order": [[ 0, "desc" ]],

			"iDisplayLength": 15

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