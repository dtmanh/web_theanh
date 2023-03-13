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
        <li class="active"><a href="<?= base_url('techadmin/province/listprovince')?>">Danh sách thành phố</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4><i class="fa fa-list"></i> &nbsp; Danh sách thành phố</h4>
            </div>
            <div class="col-md-6 text-right">
              <div class="btn-group margin-bottom-20"> 
                 <a href="<?= base_url('techadmin/province/add')?>" class="btn btn-success btn-sm hidden">
            <i class="fa fa-plus"></i> Thêm mới
            </a>
            <a onclick="ActionDelete('formbk')" class="btn btn-danger btn-sm hidden">
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
			<form name="formbk" method="post" action="<?=base_url('techadmin/province/deletes_category')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="1%" class="no-sort text-center"></th>
                            <th width="3%" class="no-sort text-center">Sắp xếp</th>
							<th width="">Tên thành phố</th>
							<th width="8%" class="no-sort">Phí vận chuyển</th>
							
                        </tr>
                    </thead>
					 <tbody>
					 <?php if (isset($list)) {
						$stt = 0;
						foreach ($list as $v) { $stt++;
							?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?=$stt;?></td>
							<td><input type="number" onchange="update_sort($(this))" value="<?= @$v->sort ?>"
								data-placement='province' data-item='<?= @$v->id; ?>' style="width: 55px"></td>
							<td><?= @$v->name ?></td>
							<td>
								<input type="text" data-id="<?= $v->id ?>" data-view="price" data-placement="province" class="form-control input-sm provice_price" oninput="update_value($(this))" name="name_image"
											   value="<?= number_format(@$v->price) ?>" placeholder=""/>			   
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
			"iDisplayLength": 20
		} );
	} );
</script>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
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
</script>