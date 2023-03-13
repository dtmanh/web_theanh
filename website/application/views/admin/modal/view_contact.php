<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Liên hệ</h4>
			</div>
			<div class="modal-body">
				<table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
                            <th width="10%" class="no-sort">Họ tên:</th>
                            <th width="10%" class="text-center">Điện thoại</th>
                            <th width="10%" class="no-sort">Email</th>
							<th width="10%">Địa chỉ</th>
							<th width="15%">Nội dung</th>
                        </tr>
                    </thead>
					 <tbody>
						<tr>
							<td><?= @$item->full_name; ?></td>
							<td><?= @$item->phone; ?></td>
							<td><?= @$item->email; ?></td>
							<td><?= @$item->address; ?></td>
							<td><?= @$item->comment; ?></td>
						</tr>
					 </tbody>
				</table>
			</div>
		</div>
	</div>
</div>


