<section class="content-header">

    <h1>

        Hình ảnh

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li><a href="<?= base_url('techadmin/product/products')?>">Danh sách sản phẩm</a></li>

		<li class="active"><a href="">Hình ảnh</a> </li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">

		<div class="clear"></div>

		<div class="box-header">

			<button   onclick="images_add(<?=@$id?>)"  class="btn btn-success btn-sm"  data-target=".bs-example-modal-sm-up">

			<i class="fa fa-plus"></i> Thêm ảnh

			</button>

		</div>

		<!-- UPLOAD Small modal -->


		<!-- Page Heading -->

		<br>

	<div class="box-body">

		<div class="col-md-12">

			<table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="text-center">STT</th>

                            <th width="8%" class="no-sort">Ảnh</th>

							<th width="20%">Tiêu đề</th>

							<th width="3%" class="no-sort">Sắp xếp</th>

                            <th width="1%" class="no-sort text-center">Action</th>

                        </tr>

                    </thead>

					<tbody>

				<?php if (isset($pro_image)&& !empty($pro_image)) {

					$s=1;

					foreach ($pro_image as $v1) {

						?>

				<tr>

					<td><?= $s++; ?></td>

					<td>

						<?php if ($v1->image != null) { ?>

						<img src="<?= base_url($v1->image) ?>" style="height: 65px;max-width: 100%">

						<?php } else {

							echo '';

							} ?>

					</td>

					<td><input type="text" data-id="<?= $v1->id ?>" data-view="name" data-placement="p_images" class="form-control input-sm " oninput="update_value($(this))" name="name_image"

											   value="<?= @$v1->name; ?>" placeholder=""/></td>

					<td>

						<input type="number" onchange="update_sort($(this))" value="<?= $v1->sort;?>"

							data-placement='p_images' min="1"  data-item='<?= @$v1->id; ?>' style='width: 45px; padding: 2px;border:1px solid #ddd'>

					</td>

					<td>

						<div class="btn-group btn-group-xs text-center">

							<div onclick="images_edit(<?=$v1->img_id;?>)"
								class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></div>

							<a href="<?= base_url('techadmin/product/delete_images/' . $v1->img_id) ?>"

								onclick="return confirm('Bạn có chắc chắn muốn xóa?')"

								class="btn btn-xs btn-danger" title="Xóa" style="color: #fff">

							<i class="fa fa-times"></i> </a>

						</div>

					</td>

				</tr>

				<?php

					}

					}?>

				</tbody>

			</table>

		</div>

		<div class="pagination">

			<?php

				echo $this->pagination->create_links(); // tạo link phân trang

				?>

		</div>

    </div>

    </div>

</section>

<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>

    <!-- /.container-fluid -->

	

    <input type="hidden" id="baseurl" value="<?=base_url();?>">

    <input type="hidden" id="id_product" value="<?=$id;?>">

    <script type="text/javascript">

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

		// cap nhat 1 trương trong table

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
		// popup xem chi tiet thanh vien
		function images_add(id) {
			$('.modal').remove();
			$.ajax({
				type: "GET",
				dataType:"html",
				url: base_url() + 'admin/product/images_add',
				data: "id=" + id,
				success: function (ketqua) {
					$('body').append(ketqua);
					$("#myModal").modal();
				}
			})
		}
		// popup xem chi tiet thanh vien
		function images_edit(id) {
			$('.modal').remove();
			$.ajax({
				type: "GET",
				dataType:"html",
				url: base_url() + 'admin/product/images_edit',
				data: "id=" + id,
				success: function (ketqua) {
					$('body').append(ketqua);
					$("#myModal").modal();
				}
			})
		}
    </script>

