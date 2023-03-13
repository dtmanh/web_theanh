<div class="modal fade bs-example-modal-lg popup1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Thông tin chi tiết đơn hàng</h4>
			</div>
			<div class="modal-body" id="printable">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td colspan="4">
								<p><b>Mã đơn hàng:</b> <?= @$detail->code ?> </p>
								<p><b>Ngày tạo:</b> <?= date('d-m-Y H:i',@$detail->time) ?></p>
								<p><b>Tên khách hàng:</b>  <?= @$detail->fullname ?></p>
								<p><b>Phone:</b> <?= @$detail->phone ?>&nbsp;&nbsp;&nbsp;  <?= @$detail->mobile ?></p>
								<p><b>Địa chỉ khách hàng:</b><?=@$province->name?>,<?=@$district->name?>, <?= @$detail->address ?></p>
								<p><b>Nội dung:</b> <?=  @$detail->note; ?></p>
								<p><b>Hình thức thanh toán:</b> <?=  @$detail->startplaces; ?></p>
								
								<p><b>Ghi chú của khách hàng:</b> <?=  @$detail->note; ?></p>
							</td>
							<td colspan="2">
								<p><b>Admin ghi chú:</b></p>
								<textarea class="form-control" rows="7"  data-id="<?= $detail->id ?>" data-view="admin_note" data-placement="order" oninput="update_value($(this))"><?=@$detail->admin_note;?></textarea>
							</td>
						</tr>
						<tr>
							<th>Ảnh</th>
							<th>Tên hàng</th>
							<th>Màu sắc</th>
							<th>Kích thước</th>
							<th>Số lượng</th>
							<th>Đơn giá(đ)</th>
							<th colspan="2">Thành tiền(đ)</th>
						</tr>
						<?php
							$tootle=0;
						foreach($detail_order as $d){
							$tootle+=$d->price_sale*$d->count;
							?>
						<tr>
							<td><?php if (!empty(@$d->image)) { ?>
								<img src="<?= base_url('upload/img/products/'.$d->pro_dir.'/'.@$d->image) ?>" style="height: 35px">
							<?php } else echo "<img src='".base_url('img/noimage.jpg')."' style='max-width: 35px; max-height: 35px'>" ?></td>
							<td><a target="_blank" href="<?=base_url('san-pham/'.$d->alias.'.html')?>"><?=$d->name;?></a></td>
							<td><?=$d->color;?></td>
							<td><?=$d->size;?></td>
							<td><?=$d->count;?></td>
							<td><?=number_format($d->price_sale);?></td>
							<td colspan="2"><?=number_format($d->price_sale*$d->count);?></td>
						</tr>
						<?php } ?>
						<tr>

							<td colspan="6" class="text-right">
						<!-- 	<p>Số tiên được giảm:  <?//=  @$detail->code_sale; ?>%</p>
							<p>Phí vận chuyển ship: <?//=  number_format(@$detail->price_ship); ?> &nbsp;đ</p> -->
							<p>Tổng giá trị đơn hàng: <?=number_format(@$tootle);?>&nbsp;đ</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" onclick="taihoso(<?=@$detail->id?>)" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</button>
                 <button type="button" onclick="In_Content('printable')" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> In</button>
                
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
	function taihoso(id)
                  {
                    var baseurl = '<?php echo base_url(); ?>';
                    $.ajax({
                          url:baseurl + 'admin/order/taihoso',
                          dataType:"html",
                          type:"POST",
                          data:{id:id},
                          success: function (result) {  
                          }
                      });
                  }
</script>

