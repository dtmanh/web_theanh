<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?=@$item->name?></h4>
                    <p>Giá:<?php if ($item->price_sale != 0) {
                                     echo number_format($item->price_sale).'VNĐ (/bình)';
                                     
                                     } else {echo "Liên hệ ".@$this->option->hotline1; } ?> 
                </div>
                <form action="<?=base_url('cart/sendOnpage2')?>" id="dat_mua" method="post" class="validate form-horizontal" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <input type="text" name="fullname" class="validate[required]" placeholder="Nhập số lượng cần đặt ...">
                  <input type="text" name="email" class="validate[required,custom[email]]" placeholder="Họ và tên người nhận ...">
                  <input type="text" name="qty" class="validate[required]" placeholder="Nhập số lượng cần đặt ...">
                  <input type="text" name="phone" class="validate[required,custom[phone]]" placeholder="Số điện thoại ...">
                  <input type="text" name="address" class="validate[required]" placeholder="Địa chỉ nhận nước ...">
                  <input type="text" name="comment" class="validate[required]" placeholder="Ghi chú khác ...">
                </div>
                <div class="modal-footer">
                  <input type="hidden" value="<?=$form_key?>" name="form_tocken">
                  <input type="hidden" value="<?=$item->price_sale?>" name="subtotal">
                  <input type="hidden" value="<?=$item->id?>" name="id">
                  <button type="submit" class="btn btn-default" >Đặt nước ngay</button>
                </div>
              </form>
            </div>
        </div>
    </div>
 <script type="text/javascript">
 $(document).ready(function(){
        $('.validate ').validationEngine();
    }); 
</script>