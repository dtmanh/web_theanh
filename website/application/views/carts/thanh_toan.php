 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="<?=base_url()?>assets/plugin/cart/css/main.min.css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/init.js"></script> 

  <div class="bg-cartStep">
    <div class="container">
      <ul class="cartStep">
        <li class="active"><a href=""><span>3</span>Thanh toán</a></li>
        <li><a href="#"><span>2</span>Nhận hàng</a></li>
        <li><a href="#"><span>1</span>Đăng nhập</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row row-7">

      <div class="col-lg-8 col-12 pdd-7">
         <form action="<?=base_url('cart/thanhtoandathang')?>" class="validate" method="post">
        <h2 class="title-check-main">Phương thúc thanh toán</h2>
        <div class="blockCartAdd">
        
           <ul class="list-paycart">
             <li>
               <div class="custom-control custom-radio">
                  <input type="radio" class="validate[required] custom-control-input" id="nhanhang" name="example1" value="customEx">
                  <label class="custom-control-label" for="nhanhang" style="">
                    <span>
                      <img src="<?=base_url()?>assets/plugin/cart/img/15730089820190.png" alt="">
                    </span>
                    <h4>Thanh toán khi nhận hàng</h4>
                    <p>Quý khách sẽ thanh toán bằng tiền mặt chúng tôi giao hàng cho quý khách.</p>
                  </label>
                </div>
             </li>
            <!--  <li style="display: none;">
               <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="momo" name="example1" value="customEx">
                  <label class="custom-control-label" for="momo">
                    <span>
                      <img src="<?=base_url()?>assets/plugin/cart/img/16242428346398.jpg" alt="">
                    </span>
                    <h4>Thanh toán bằng ví MoMo</h4>
                    <p>Quý khách vui lòng cài app MoMo trước khi chọn hình thức này để thuận tiện cho việc thanh toán.</p>
                  </label>
                </div>
             </li> -->
             <!-- <li style="display: none;">
               <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="atm" name="example1" value="customEx">
                  <label class="custom-control-label" for="atm">
                    <span>
                      <img src="<?=base_url()?>assets/plugin/cart/img/12712875360286.png" alt="">
                    </span>
                    <h4>Thanh toán bằng thẻ ATM</h4>
                    <p>Quý khách sẽ được chuyển tới Napas để thanh toán.</p>
                  </label>
                </div>
             </li> -->

           <!--   <li style="display: none;">
               <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="tragop" name="example1" value="customEx">
                  <label class="custom-control-label" for="tragop">
                    <span>
                      <img src="<?=base_url()?>assets/plugin/cart/img/12712875556894.png" alt="">
                    </span>
                    <h4>Thanh toán trả góp</h4>
                    <p>Bạn sẽ được chuyển sang Onepay để thanh toán.</p>
                  </label>
                </div>
             </li> -->


           </ul>
         
        </div>
        <!-- <div class="blockCartAdd code-promo " style="display: none;">
        <h2 class="title-cart-toggle "><span></span>SỬ DỤNG MÃ KHUYẾN MẠI</h2>
         
           <div class="input-group form-promo-code">
              <input type="text" class="form-control" placeholder="Nhập mã khuyến mại" >
              <div class="input-group-append">
                <button class="btn btn-danger" type="button">Áp dụng</button>
              </div>
            </div>
            <p class="note-form text-muted">Sau khi áp dụng, mã khuyến mại có thể không dùng được trong vòng 15 phút<i class="icofont-info-circle"></i></p>
         
        </div> -->
        <div class="cart-footer text-right">
          <div class="text-center">
            <a href="<?=base_url('shipping')?>"><i class="icofont-edit"></i>Chỉnh sửa thông tin giao hàng</a>
            <div class="custom-control custom-checkbox custom-control-inline" style="display: none;">
              <input type="checkbox" class="validate[required] custom-control-input" id="accept" name="example1">
              <label class="custom-control-label" for="accept">Tôi đông ý với các <a href="">điều khoản & điều kiện</a> giao dịch</label>
            </div>
          </div>
          <button type="submit" class="btn btn-danger">Thanh toán</button>
        </div>
        </form>
      </div>
      
      <div class="col-lg-4 col-12 pdd-7">
        <h3 class="title-cart-right">Đơn hàng <span>2 sản phẩm</span></h3>
        <div class="checkout-right">
           <?php if(count($items)) : $total=0; ?>
                <?php foreach($items as $item) : $total += $item['price']; ?>
          <div class="cart__product row row-7">
            <div class="col-3 pdd-7">
              <a href="<?=base_url('san-pham/'.$item['alias'].'.html')?>" class="cart__product--img"><img src="<?=base_url('upload/img/products/'.$item['pro_dir'].'/thumbnail_2_'.$item['image']);?>" alt="<?=@$item['name'];?>"></a>
            </div>
            <div class="col-6 pdd-7">
              <div class="cart__product--text">
                <p><?=@$item['name'];?></p>
                <span><?=$item['color_name']?></span>
                   <span>Size: <?=$item['size_name']?></span>
              </div>
            </div>
            <div class="col-3 pdd-7 text-right ">
              <p class="cart__product--price"><?=number_format($item['price'])?> <?=lang('price_locale');?></p>
              <p class="cart__product--quantity">x <?=$item['qty']?></p>
              <p class="cart__product--toatal"><?=number_format($item['subtotal'])?> <?=lang('price_locale');?></p>
            </div>
          </div>
           <?php endforeach; endif;?> 
          
         <ul class="cart__oder">
            <li>
              <span>Tổng tiền sản phẩm</span>
              <strong><?=number_format($this->cart->total());?> <?=lang('price_locale');?></strong>
            </li>
            <li>
              <span>Tổng phí vận chuyển</span>
              <b>Miễn phí</b>
            </li>
            <li>
              <span>Tổng tiền đơn hàng</span>
              <strong><?=number_format($this->cart->total());?> <?=lang('price_locale');?></strong>
            </li>
            <li>
              <span>Số tiền cần trả</span>
              <strong><?=number_format($this->cart->total());?> <?=lang('price_locale');?></strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.title-cart-toggle').click(function() {
        $(this).toggleClass('open');;
        $(this).next().slideToggle();
      });
    });
  </script>
