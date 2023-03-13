 
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#caf6ea">
                            <thead>
                            <tr style="background:#92ddc9">
                                <td>Stt</td>
                                <td>Tên sản phẩm</td>
                                <td>Màu sắc</td>
                                <td>Kích thước</td>
                                <td>Số lượng</td>
                                <td>Đơn giá(vnđ)</td>
                                <td>Thành tiền(vnđ)</td>
                            </tr>

                            </thead>

                            <tbody>
                            	<?php $stt=0;$subtotal = 0;
                $totals = 0;
                $tongtien = 0; foreach($carts as $key => $tcat){
                    $stt ++; $subtotal = $tcat['price']*$tcat['qty'];$tongtien += $subtotal;
                    $totals += $subtotal ;?>
                            	<tr><?=$stt?></tr>
                            	<tr><?=$tcat['name']?></tr>
                            	<tr><?=$tcat['color_name']?></tr>
                            	<tr><?=$tcat['size_name']?></tr>
                            	<tr><?=$tcat['qty']?></tr>
                            	<tr><?=number_format($tcat['price'])?></tr>
                            	<tr><?=number_format($tcat['price']*$tcat['qty'])?></tr>
                            <?php }?>
                            <tr><td colspan="5" align="right"><span style="color:red">Tổng tiền đơn hàng:<?=number_format($tongtien)?>&nbsp;vnđ</span></td></tr>
                            <tr><td colspan="5" align="right"><span style="color:red">Tổng tiền thanh toán là:<?=number_format($totals)?>&nbsp;vnđ</span></td></tr>
                            </tbody>
                        </table>

 
