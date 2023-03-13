<section class="clearfix">
    <div class="container">
        <div class="row">
            <div>
                <ul class="breadcrumb">
                    <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                    <li><a href="javascript:void(0)">Gửi thông tin lấy lại mật khẩu</a> </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="block-content">
                <section class="content_about" >
                    <header class="page-header">
                        <h1 class="page-title">
                            Gửi thông tin lấy lại mật khẩu !
                        </h1>
                    </header>
                    <div class="clearfix-20"></div>
                    <div style="line-height: 25px">
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
                            ?>
                                <div class="confirm" >

                                    <p>link không tồn tại ! mã tài khoản không đúng  </p>

                                    <p> Email hỗ trợ kỹ thuật <?=@$this->option->site_email;?> nếu quý khách không nhận được
                                        thông
                                        tin kích hoạt tài khoản.</p>

                                </div>
                            <?php } ?>

                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<div class="clearfix-20"></div>



