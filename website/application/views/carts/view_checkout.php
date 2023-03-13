 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="<?=base_url()?>assets/plugin/cart/css/main.min.css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/init.js"></script>

 <div class="container">
    <div class="row row-7" id="cart-content">
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
              <span><?=number_format($total_cart);?> <?=lang('price_locale');?></span>
            </div>
            <span class="text-muted">Đã bao gồm VAT</span>
            <a href="<?=site_url('cart-login')?>" class="btn btn-danger btn-block">Tiến hành thanh toán <i class="icofont-arrow-right"></i></a>
          </div>
           <input type="hidden" id="sub_total" value="<?=$this->cart->total();?>" name="subtotal"/>
            <input type="hidden" name="coupon" id="value_coupone" value="0">
            <input type="hidden" name="price_shipping" id="price_shipping" value="0">
        </div>
        <?php }else{ ?>
         <div class="button_send">
            <div class="clearfix-20"></div>
            <a href="<?=base_url()?>" class="cart_width w_100 btn  button-3d-green" ><?=lang('muathem');?></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    // counter number
    $(document).on('click', '.cart__number--count a', function(e) {
      e.preventDefault();
      var btn = $(this),
        oldValue = btn.closest('.cart__number--count').find('input').val().trim(),
        newVal = 0;
      if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
      } else {
        if (oldValue > 1) {
          newVal = parseInt(oldValue) - 1;
        } else {
          newVal = 1;
        }
      }
      btn.closest('.cart__number--count').find('input').val(newVal);
    });
  </script>

 