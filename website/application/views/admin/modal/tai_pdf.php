<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='Content-Type' content='text/html'/>
        <title><?=@$item->code?></title>
    </head>
    <style>
    body { font-family: DejaVu Sans, sans-serif; }
    p {
    margin: 0px;
    }
    a {
    text-decoration: none;
    color: #333333;
    }
    a:hover,
    a:focus {
    text-decoration: none;
    }
    a,
    button,
    input {
    -webkit-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
    }
    * {
    margin: 0px;
    padding: 0px;
    }
    ul,
    ol {
    padding: 0;
    margin: 0;
    }
    li {
    list-style: none;
    }
    body {
    background: #f6f6f6;
    color: #000;
    width: 100%;
    height: 100%;
    font-size: 1.4rem;
    line-height: 1.6;
    padding-left:20px;
    padding-right:20px;
    }
    del {
    font-size: 12px;
    color: #999;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
    margin: 0;
    font-weight: 500;
    }
    img {
    vertical-align: middle;
    }
    .clearfix:before,
    .clearfix:after {
    display: table;
    content: " ";
    clear: both;
    }
    b, strong {
    font-weight: 700;
	}
	p {
	    margin: 0 0 10px;
	}
	p{
		size: 10px;
	}
	    .table-bordered {
	    border: 1px solid #f4f4f4;
	}
	table.table-bordered tbody th, table.table-bordered tbody td {
	    border-left-width: 0;
	    border-bottom-width: 0;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	    padding: 8px;
	    line-height: 1.42857143;
	    vertical-align: top;
	    border-top: 1px solid #ddd;
	}
	th {
	    text-align: left;
	}
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	    border: 1px solid #ddd;
	}
	.table-sanpham>th{
 	border-top: 1px solid #ddd;
	}
   table.table-bordered th:last-child, table.table-bordered td:last-child {
    border-right-width: 0;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
.text-right {
	float: right;
	}
 </style>

<body>
<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Thông tin chi tiết đơn hàng</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td colspan="4">
								<p style="font-size: 12px;"><b>Mã đơn hàng:</b> <?= @$detail->code ?> </p>
								<p style="font-size: 12px;"><b>Ngày tạo:</b> <?= date('d-m-Y H:i',@$detail->time) ?></p>
								<p style="font-size: 12px;"><b>Tên khách hàng:</b>  <?= @$detail->fullname ?></p>
								<p style="font-size: 12px;"><b>Phone:</b> <?= @$detail->phone ?>&nbsp;&nbsp;&nbsp;  <?= @$detail->mobile ?></p>
								<p style="font-size: 12px;"><b>Địa chỉ khách hàng:</b> <?= @$detail->address ?></p>
								<p style="font-size: 12px;"><b>Nội dung:</b> <?=  @$detail->note; ?></p>
								<p style="font-size: 12px;"><b>Hình thức thanh toán:</b> <?=  @$detail->startplaces; ?></p>
								<p style="font-size: 12px;"><b>Thông tin địa chỉ nhận hàng khác:</b> <?=  @$detail->address2; ?></p>
								<p style="font-size: 12px;"><b>Ghi chú của khách hàng:</b> <?=  @$detail->note; ?></p>
							</td>
							<td colspan="2" style="text-align: center;margin: auto;">
								<img src="<?=base_url($this->option->site_logo)?>" style="width: 10%;">
							</td>
						</tr>
						<tr class="table-sanpham">
							<th style="font-size: 12px;">Ảnh</th>
							<th style="font-size: 12px;">Tên hàng</th>
							<th style="font-size: 12px;">Số lượng</th>
							<th style="font-size: 12px;">Đơn giá(đ)</th>
							<th colspan="2" style="font-size: 12px;" >Thành tiền(đ)</th>
						</tr>
						<?php
							$tootle=0;
						foreach($detail_order as $d){
							$tootle+=$d->price_sale*$d->count;
							?>
						<tr class="table-sanpham">
							<td><?php if (!empty(@$d->image)) { ?>
								<img src="<?= base_url('upload/img/products/'.$d->pro_dir.'/'.@$d->image) ?>" style="height: 35px">
							<?php } else echo "<img src='".base_url('img/noimage.jpg')."' style='max-width: 35px; max-height: 35px'>" ?></td>
							<td style="font-size: 12px;"><a target="_blank" href="<?=base_url('san-pham/'.$d->alias.'.html')?>"><?=$d->name;?></a></td>
							<td style="font-size: 12px;"><?=$d->count;?></td>
							<td style="font-size: 12px;"><?=number_format($d->price_sale);?></td>
							<td colspan="2" style="font-size: 12px;"><?=number_format($d->price_sale*$d->count);?></td>
						</tr>
						<?php } ?>
						<tr>

							<td colspan="6" class="text-right "  >
							<p style="font-size: 12px; float: right;clear: both;">Tổng giá trị đơn hàng: <?=number_format(@$detail->total_price)?> đ</p>
							<span style="clear: both;"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>