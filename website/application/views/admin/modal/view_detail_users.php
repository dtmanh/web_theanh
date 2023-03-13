<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Thông tin chi tiết thành viên</h4>
			</div>
			<div class="modal-body" id="printable">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td colspan="4">
								<p><b>Tên thành viên:</b></p>
								<p><?= @$detail->fullname ?></p>
								<p><b>Email:</b></p>
								<p><?= @$detail->email ?></p>
								<p><b>Phone:</b></p>
								<p><?= @$detail->phone ?></p>
								<p><b>Ngày sinh:</b></p>
								<p><?= @$detail->birthday ?></p>
								<p><b>Địa chỉ thành viên:</b></p>
								<p><?= @$detail->address ?></p>
								<p><b>đăng nhập lần cuối:</b></p>
								<p><?= date('Y-m-d H:i',$detail->lastest_login);?></p>
							</td>
							<td colspan="2">
								<p><b>Ảnh avatar:</b></p>
								<?php if(!empty($detail->avatar)) { ?>
									<img src="<?= base_url('upload/img/avatar/'.$detail->avt_dir.'/'.@$detail->avatar) ?>">
								<?php } else { ?>
									<img src="<?= base_url('upload/img/noimage.jpg') ?>" >
								<?php } ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
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
	// in don hang
	function In_Content(strid) {
		var prtContent = document.getElementById(strid);
		var WinPrint =
			window.open('', '', 'left=0,top=0,width=1300px,height=800px,toolbar=0,scrollbars=1,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	}
</script>

