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
        <li class="active"><a href=""><span>2</span>Nhận hàng</a></li>
        <li><a href="#"><span>1</span>Đăng nhập</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row row-7">
      <div class="col-lg-8 col-12 pdd-7">
        <h2 class="title-check-main">Địa chỉ nhận hàng</h2>
        <div class="alert alert-success alert-dismissible fade show alert-cart" role="alert">
          <i class="icofont-info-circle"></i> Thông tin của khách hàng hoàn toàn được bảo mật
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="blockCartAdd">
          <h2 class="title-add-cart">Thông tin địa chỉ giao hàng</h2>
          <form action="<?=base_url('cart/thanhtoan')?>" method="post" class="validate form-cart-add">
            <input type="hidden" name="token" value="<?=$form_key;?>" />
            <p class="font-italic">Để xử lý đơn hàng nhanh hơn, Quý khách vui lòng chọn chính xác địa chỉ cần giao.</p>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Họ và tên <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="validate[required] form-control" name="fullname" value="<?=@$user->fullname;?>"  placeholder="Ví du: NGuyễn Văn A">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Số điện thoại <span>*</span></label>
              <div class="col-sm-9">
                <input type="tel" class="validate[required,custom[phone]] form-control" name="phone" value="<?=@$user->phone;?>"  placeholder="Ví dụ: 098XXXXXXXX">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email<span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="validate[required,custom[email]] form-control" name="email" value="<?php if(@$user->email!=''):?><?=@$user->email;?><?php else:?> <?=@$email_toll?><?php endif;?>"  placeholder="Ví dụ: nguyenvana@gmail.com">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tỉnh/Thành phố <span>*</span></label>
              <div class="col-sm-9">
                <select name="province" id="province" class="form-control">
                     <option>Thành phố</option>
                  <?php
                    foreach(@$ships as $t){?>
                        <option <?php if($t->id == @$user->province){echo "selected";} ?> value="<?=$t->id;?>"><?=$t->name;?></option>
                    <?php
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Quận/ Huyện <span>*</span></label>
              <div class="col-sm-9">
                <select class="form-control" name="district" id="district">
                   
                  
                </select>
              </div>
            </div>
            <div class="form-group row" style="display: none;">
              <label class="col-sm-3 col-form-label">Phường/Xã <span>*</span></label>
              <div class="col-sm-9">
                <select class="form-control">
                  <option>Đại Mỗ</option>
                  <option>Tây Mỗ</option>
                  <option>Hà Đông</option>
                  <option>Hà Tây</option>
                  <option>Đống Đa</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Địa chỉ chi tiết <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class=" form-control" name="address"  placeholder="Nhập Địa chỉ chi tiết tương ứng với Phường/Xã đã chọn">
              </div>
            </div>
            <div class="custom-control custom-checkbox form-group" style="display: none;">
              <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
              <label class="custom-control-label" for="customCheck">Lưu thông tin địa chỉ</label>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Ghi chú: </label>
              <div class="col-sm-9">
                <textarea class="form-control" name="comment" cols="3"></textarea>
              </div>
            </div>
        </div>
        <!-- <h2 class="title-check-main" style="display: none;">Thông tin người mua hàng</h2>
        <div class="blockCartAdd" style="display: none;">
          <h2 class="title-cart-toggle" style="display: none;"><span></span>Thông tin người mua hàng giống như trên</h2>
           

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Họ và tên <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="validate[required] form-control" name="fullname2" value="<?=@$user->fullname;?>"  placeholder="Ví du: NGuyễn Văn A">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Số điện thoại <span>*</span></label>
              <div class="col-sm-9">
                <input type="tel" class="validate[required,custom[phone]] form-control" name="phone2" value="<?=@$user->phone;?>"  placeholder="Ví dụ: 098XXXXXXXX">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email<span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="validate[required,custom[email]] form-control" name="email2" value="<?php if(@$user->email!=''):?><?=@$user->email;?><?php else:?> <?=@$email_toll?><?php endif;?>"  placeholder="Ví dụ: nguyenvana@gmail.com">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tỉnh/Thành phố <span>*</span></label>
              <div class="col-sm-9">
                <select name="provice" id="provice" class="form-control">
                    <option>Tỉnh/Thành phố</option>
                 <?php
                    foreach(@$ships as $t){?>
                        <option <?php if($t->id == @$user->province){echo "selected";} ?> value="<?=$t->id;?>"><?=$t->name;?></option>
                    <?php
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Quận/ Huyện <span>*</span></label>
              <div class="col-sm-9">
                <select name="distict" id="distict" class="form-control">
                </select>
              </div>
            </div>
            <div class="form-group row" style="display: none;">
              <label class="col-sm-3 col-form-label">Phường/Xã <span>*</span></label>
              <div class="col-sm-9">
                <select class="form-control">
                  <option>Đại Mỗ</option>
                  <option>Tây Mỗ</option>
                  <option>Hà Đông</option>
                  <option>Hà Tây</option>
                  <option>Đống Đa</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Địa chỉ chi tiết <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="address" value="<?=@$user->address;?>" placeholder="Nhập Địa chỉ chi tiết tương ứng với Phường/Xã đã chọn">
              </div>
            </div>
        </div> -->
       <!--  <h2 class="title-check-main" style="display: none;">THỜI GIAN GIAO HÀNG DỰ KIẾN</h2>
        <div class="blockCartAdd" style="display: none;">
          <div class="title-cartship"><i class="icofont-truck-alt"></i>Giao hàng cùng miền</div>
          <ul class="cartShip-list">
            <li><p>Phí vận chuyển tiêu chuẩn: <span class="text-success">35.000 đ</span></p></li>
          </ul>
          <div class="ship-time">
            <div class="ship-content">
              <span>Giao hàng lần 1:</span>
              <div class="ship-text">
                <span>Giao trước 12:00 ngày 18/04/2019</span>
                <p>Mì Handy Hảo Hảo chay lẩu nấm thập cẩm thùng 24 ly x 66g</p>
              </div>
            </div>
            <div class="ship-content">
              <span>Giao hàng lần 2:</span>
              <div class="ship-text">
                <span>Giao trước 12:00 ngày 18/04/2019</span>
                <p>Mì Handy Hảo Hảo chay lẩu nấm thập cẩm thùng 24 ly x 66g</p>
              </div>
            </div>

          </div>
        </div> -->
        <!-- <div class="blockCartAdd block-export-cart" style="display: none;">
          <h2 class="title-cart-toggle open"><span></span>XUẤT HOÁ ĐƠN CHO ĐƠN HÀNG</h2>
          

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Mã số thuế <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Vui lòng nhập mã số thuế">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tên công ty <span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Vui lòng nhập tên công ty">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Địa chỉ công ty<span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Vui lòng nhập địa chỉ công ty">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tên người mua hàng<span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Vui lòng nhập tên người mua hàng">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email<span>*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Vui lòng nhập email">
              </div>
            </div>
            <div class="custom-control custom-checkbox form-group">
              <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
              <label class="custom-control-label" for="customCheck2">Lưu thông tin này cho lần đặt hàng sau</label>
            </div>

        </div> -->
        <div class="cart-footer text-right">
            <button  type="submit" class="btn btn-danger">Chọn hình thức thanh toán</button>
        </div>
      </div>
    </form>
      <div class="col-lg-4 col-12 pdd-7">
        <h3 class="title-cart-right">Đơn hàng <span><?=$this->cart->total_items();?> <?=lang('product')?></span></h3>
        <input type="hidden" value="<?=$form_key?>" name="form_tocken">
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
      $('#province').change(function(){
        var provinceid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/district',
            data: {id:provinceid},
            success: function (res){
                $('#district').html(res);
            }
        });
    });
       $('#provice').change(function(){
        var provinceid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/district',
            data: {id:provinceid},
            success: function (res){
                $('#distict').html(res);
            }
        });
    });
  </script>
