<!-- main content -->
<main>
  <div class="container">
    <div class="row_pc">
        <section class="big_content_category">
            <div class="back-link">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>"><?=lang('home')?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký thành công</li>
          </ol>
        </nav>
      </div>
                  <div class="clearfix"></div>

                <div class="title-cat-home clearfix">
                    <h2 class="tit-cat-home tit-hot-home"><i class="fa fa-bars" aria-hidden="true"></i> Đăng ký thành công</h2>
                  </div>
             <div class="row">
                <div class="clearfix clearfix-15"></div>
                <div class="col-xs-4 col-md-4 col-sm-4">
                    <div class="title">
                        <a href="">Thông tin đăng ký!</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                     <div class="root_content">
                        <?php if(isset($_GET['reset'])){?>
                        <p> Chúng tôi đã gửi email lấy lại mật khẩu vào địa chỉ hòm thư <b><a href=""> <?=@$u2->email;?></a></b>, vui lòng kiểm tra hộp thư đến của quý khách.</p>

                        <p>Quý khách lưu ý kiểm tra hòm thư trong tất cả thư mục (bao gồm Inbox và Bulk mail) để tìm thư đến từ địa chỉ
                            <b><a href=""><?=@$this->option->site_email;?></a></b>. Đôi khi do đường truyền mà email có
                            thể đến
                            chậm
                            5-10 phút.</p>

                        <p>  Quý khách chỉ thực sự hoàn tất thủ tục đăng ký thành viên sau khi đã kích hoạt tài khoản
                            được gửi từ mail kích hoạt  <b><a href=""> <?=@$this->option->site_name;?></a></b>. </p>

                        <p>  Khi cần trợ giúp, vui lòng gọi <b><?=@$this->option->site_email;?></b> (Giờ hành chính: 8h15-18h00)</p>

                        <p> Email hỗ trợ kỹ thuật <?=@$this->option->site_email;?> nếu quý khách không nhận được thông tin kích
                            hoạt tài khoản.</p>

                    <?php  }else{
                        if(isset($u)){?>
                            <div class="confirm" >

                                <p>Cảm ơn quý khách đã đăng ký tài khoản! </p>

                                <p> Chúng tôi đã gửi một email vào địa chỉ hòm thư <b><a href=""> <?=@$u->email;?></a></b>, vui lòng kiểm tra và kích hoạt tài khoản của quý khách.</p>

                                <p>Quý khách lưu ý kiểm tra hòm thư trong tất cả thư mục (bao gồm Inbox và Bulk mail) để tìm thư đến từ địa chỉ
                                    <b><a href=""><?=@$this->option->site_email;?></a></b>. Đôi khi do đường truyền mà email có thể đến chậm 5-10 phút.</p>

                                <p>  Quý khách chỉ thực sự hoàn tất thủ tục đăng ký thành viên sau khi đã kích hoạt tài khoản được gửi từ mail kích hoạt  <b><a href=""><?=@$this->option->site_name;?></a></b>. </p>

                                <p>  Khi cần trợ giúp, vui lòng gọi <b><?=@$this->option->hotline1;?></b> hoặc <b><?=@$this->option->hotline2;?></b> (Giờ hành chính: 8h15-18h00)</p>

                                <p> Email hỗ trợ <?=@$this->option->site_email;?> nếu quý khách không nhận được thông tin kích hoạt tài khoản.</p>

                            </div>
                        <?php }else{?>
                            <div class="confirm" >

                                <p>Đăng ký không thành công, đã có lỗi khi gửi mail đến email bạn đăng ký hoặc email của bạn không tồn tại! </p>

                                <p> Email hỗ trợ kỹ thuật <?=@$this->option->site_email;?> nếu quý khách không nhận được
                                    thông
                                    tin kích hoạt tài khoản.</p>

                            </div>
                        <?php }
                    }?>                
                     </div> 
                </div>
             <div class="row">
                <div class="clearfix clearfix-40"></div>
            </section>
      <div class="clearfix"></div>
    </div>
  </div>

</main>



