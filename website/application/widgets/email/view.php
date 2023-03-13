<div class="clearfix clearfix-30"></div>
<div class="email_cate3 ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 d-lg-block d-none">
      </div>
      <div class="col-lg-6 col-md-6 col-xs-12 col-12">
        <div class="fromemail">
          <div class="col_info ">
            <?=$this->option->shipping;?>
          </div>
          <form action="<?=base_url('contact/sendQuestion')?>" method="post" class="form_email">
            <input type="text" name="full_name" aria-required="true" required class="form-control" title="Vui lòng nhập họ tên" placeholder="Họ tên">
            <input type="text" name="email" id="email" dir="auto" aria-required="true" required="" pattern=".*@.*" title="Email không chính xác" class="form-control" placeholder="Email">
            <input type="text" name="phone"  aria-required="true" required="" pattern="^\+?\d{10,10}" title="Số điện thoại không đúng định dạng" id="phone" class="form-control" placeholder="Số điện thoại">
            <center><button class="btn" type="submit">Đăng ký</button></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>