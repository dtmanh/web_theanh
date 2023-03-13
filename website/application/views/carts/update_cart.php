

 
    <div style="display: none!important">
                <input type="hidden" name="ctl00$pageBody$hdnQty" id="ctl00_pageBody_hdnQty">
                <input type="submit" name="ctl00$pageBody$btnSave" value="" id="ctl00_pageBody_btnSave">
            </div>
      <div class="col-lg-8 col-12 pdd-7">
        <div class="cart">
          <div class="cart-head">
            <h3 class="cart-title">Giỏ hàng của bạn <span><?=$this->cart->total_items();?> <?=lang('product')?></span></h3>
          </div>
           <input type="hidden" value="<?=@$form_key;?>" id="form_key" name="form_key">
          <div class="cart-body" >
               
                <?php if(count($items)) : $total=0; ?>
                <?php foreach($items as $item) : $total += $item['subtotal']; ?>
            <div class="cart-item">
              <a href="<?=base_url('san-pham/'.$item['alias'].'.html')?>" class="cart-img" title=""><img src="<?=base_url('upload/img/products/'.$item['pro_dir'].'/thumbnail_2_'.$item['image']);?>" alt="<?=@$item['name'];?>"></a>
              <div class="cart__info">
                <div class="cart__name"><?=@$item['name'];?></div>
                <div class="cart__price">
                  <p class="cart__price--new"><?=number_format($item['price'])?> <?=lang('price_locale');?></p>
                  <p class="cart__price--old"><del><?=number_format($item['price_old'])?> <?=lang('price_locale');?></del> <span>-<?=floor(100-($item['price']/$item['price_old'])*100)?>%</span></p>
                   <p><?=$item['color_name']?></p>
                   <p>Size: <?=$item['size_name']?></p>
                </div>
                <div class="cart__number">
                  <a href="<?=base_url('cart/deleteone?id='.$item['rowid'])?>" class="cart-delete icofont-ui-delete" title="Xóa"></a>
                  <div class="cart__number--count">
                    <a href="javascript:void(0)" data-bind="<?=$item['rowid']?>" onclick="downcart($(this))" class="number-down" data-dir="dwn"><i class="icofont-minus"></i></a>
                    <input type="text" name="qty[]" id="qty-<?=$item['rowid']?>" data-record="<?=$item['rowid']?>" value="<?=$item['qty']?>" >
                    <a href="javascript:void(0)" data-bind="<?=$item['rowid']?>" onclick="upcart($(this))" class="number-up" data-dir="up"><i class="icofont-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
             <?php endforeach; endif;?> 
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12 pdd-7">
        <?php if (count($items)){ ?>
        <div class="cartPay">
          <div class="cartPay__head">
            <span>Thành tiền</span>
            <strong><?=number_format($total)?> <?=lang('price_locale');?></strong>
          </div>
          <div class="cartPay__body">
            <div class="cartPay__total">
              <strong>Tổng tiền</strong>
              <span id="total_cart"><?=number_format($total_cart);?> <?=lang('price_locale');?></span>
            </div>
            <span class="text-muted">Đã bao gồm VAT</span>
            <a href="<?=site_url('cart-login')?>" class="btn btn-danger btn-block">Tiến hành thanh toán <i class="icofont-arrow-right"></i></a>
          </div>
           <input type="hidden" id="sub_total" value="<?=number_format($total_cart);?>" name="subtotal"/>
           <input hidden="" id="sub_total" value="<?=@$total_cart;?>" name="subtotal"/>
            <input type="hidden" name="coupon" id="value_coupone" value="<?=@$couponcode;?>">
            <input type="hidden" name="price_shipping" id="price_shipping" value="<?=@$shipping?>">
        </div>
        <?php }else{ ?>
         <div class="button_send">
            <div class="clearfix-20"></div>
            <a href="<?=base_url()?>" class="cart_width w_100 btn  button-3d-green" ><?=lang('muathem');?></a>
        </div>
        <?php } ?>
      </div>
     


