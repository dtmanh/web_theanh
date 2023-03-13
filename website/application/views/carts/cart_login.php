 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="<?=base_url()?>assets/plugin/cart/css/main.min.css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/init.js"></script>
 <div class="bg-cartStep">
    <div class="container">
      <ul class="cartStep">
        <li><a href="#"><span>3</span>Thanh toán</a></li>
        <li><a href="#"><span>2</span>Nhận hàng</a></li>
        <li class="active"><a href=""><span>1</span>Đăng nhập</a></li>
      </ul>
    </div>
  </div>

  <div class="container">

    <div class="row row-7">
      <div class="col-lg-8 col-12 pdd-7">
        <div class="checkout">
           <?php if ($this->session->userData('userData')) :
              $user = $this->session->userData('userData');?>
            <h3 class="title-checkout display-4">Xin chào bạn: <?= $user['fullname']?></h3>
          <?php else:?>
            <h3 class="title-checkout display-4">Vui lòng nhập Email để tiếp tục thanh toán</h3>
           <?php endif;?>
          <form id="loginform" action="<?=base_url('cart/order')?>" method="post" class="checkout__form">
             <?php if ($this->session->userData('userData')) :
                               $user = $this->session->userData('userData');
                               ?>
                               <a href="<?=base_url('shipping')?>" class="btn btn-danger btn-block"> Tiếp tục mua hàng</a>
            <?php else:?>
              <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="login-alert" class="alert alert-danger col-sm-12"></div>
              <div class="form-group1">
            <input type="text" class="validate[required,custom[email]] form-control" placeholder="Email của bạn" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" id="login-username" name="email" value="" autocomplete="on" placeholder="" required="required" >
          </div>
          <div class="form-group">
           <div class="form-group2">
            <input type="text" class="validate[required,custom[email]] form-control" name="email2" placeholder="Email của bạn">
           </div>
           </div>
            <div class="custom-control custom-radio has-acc">
              <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
              <label class="custom-control-label" for="customRadio">Tôi đã có tài khoản</label>
            </div>
            <div class="custom-control custom-radio no-acc">
              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
              <label class="custom-control-label" for="customRadio2">Tôi là khách hàng mới</label>
            </div>
            <div class="form-group">
              <div class="form-group1">
                <input type="password" class="form-control" placeholder="Mật khẩu" id="login-password" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" name="password" required="required">
                <a href="" class="forgot-pass" data-toggle="modal" data-target="#myModal">Quên mật khẩu</a>
                <div class="btn btn-danger btn-block"  onclick="login()" style="cursor: pointer;">Đăng nhập để mua hàng</div>
              </div>
              <div class="form-group2">

                <button class="btn btn-danger btn-block" type="submit"  name="button">Tiếp tục mua hàng</button>
              </div>
            </div>
           <?php endif;?>

            <div class="divider" style="display: none;">
              <span>Hoặc đăng nhập bằng</span>
            </div>
            <div class="row row-7 " style="display: none;">
              <div class="col-6 pdd-7">
                <a href="" class="btn-fb"><i class="icofont-facebook"></i>Facebook</a>
              </div>
              <div class="col-6 pdd-7">
                <a href="" class="btn-gg"><img src="<?=base_url()?>assets/plugin/cart/img/icon-google2.png" alt="">Google</a>
              </div>
            </div>
            <a href="<?=base_url('gio-hang')?>" class="back-cart"><i class="icofont-simple-left"></i>Quay lại giỏ hàng</a>

          </form>
        </div>
      </div>
      <div class="col-lg-4 col-12 pdd-7">
        <h3 class="title-cart-right">Đơn hàng <span><?=$this->cart->total_items();?> <?=lang('product')?></span></h3>
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
              <strong><?=number_format($total_cart);?> <?=lang('price_locale');?></strong>
            </li>
            <li>
              <span>Tổng phí vận chuyển</span>
              <b>Miễn phí</b>
            </li>
            <li>
              <span>Tổng tiền đơn hàng</span>
              <strong><?=number_format($total_cart);?> <?=lang('price_locale');?></strong>
            </li>
            <li>
              <span>Số tiền cần trả</span>
              <strong><?=number_format($total_cart);?> <?=lang('price_locale');?></strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-body bg-modal d-flex">
          <div class="auth-wrapper">
              <div class="auth-content">
                  <h3>Quên mật khẩu tài khoản</h3>
                  <p>Để lấy lại mật khẩu bạn vui lòng nhập địa chỉ Email của mình vào đây</p>

                  <form action="<?=base_url('customer-forgotpass')?>" method="POST" role="form" class="validate form-horizontal" id="frmNewsLetter" novalidate="novalidate">
                      <div class="form-group">
                          <label for="">Email của bạn</label>
                          <input name="email" id="email" class="validate[required,custom[email]] form-control" maxlength="255" required="required" placeholder="Email của bạn">
                         <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="alert_mesage" class="alert alert-danger col-sm-12"></div>
                      </div>
                      <button type="button" onclick="check_mail()" class="btn btn-danger btn-block" name="forgotpass"  value="Gửi">Cấp lại mật khẩu</button>
                  </form>
              </div>
          </div>
          <div class="auth-benefit">
            <h3>Quyền lợi khi đăng ký thành viên</h3>
            <ul class="list-unstyled">
                <li>Hưởng chính sách giá đặc biệt cho thành viên</li>
                <li>Mua hàng nhanh chỉ với 1 nhấp chuột</li>
                <li>Sản phẩm đa dạng</li>
                <li>Đổi trả dễ dàng</li>
            </ul>
          </div>
      </div>

    </div>
  </div>
</div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.has-acc').click(function() {
      $('.form-group1').show();
      $('.form-group2').hide();
    });
    $('.no-acc').click(function() {
      $('.form-group2').show();
      $('.form-group1').hide();
    });
  });


  </script>