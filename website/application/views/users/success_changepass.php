    <div class="clearfix"></div>
    <div class="banner">
        <div class="banner_cate">
            <div class="container">
                <div class="row_pc">
                    <div class="sub_bn_cate">
                        <div class="tit_bn_cate pull-left"><h1><?=lang('user-mana');?></h1></div>
                        <div class="back_link pull-right">
                            <ul>
                                <li><a href="<?=base_url()?>"><?=lang('home');?></a></li>
                                <li><a href=""><?=lang('user-mana');?></a></li>

                            </ul>
                        </div>
                        <div class="clearfix clearfix-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearix clearfix-30"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-775 col-lg-push-225 col-md-9 col-sm-12 col-xs-12">
                <h2 class="tit_thuongmai"><span>Thay đổi mật khẩu thành công</span></h2>
                            <div class="clearix clearfix-30"></div>
                <div class="trong trong_product" style="padding:10px">

                    <p> Chúng tôi đã gửi email lấy lại mật khẩu vào địa chỉ hòm thư <b><a href=""> <?=@$u->email;?></a></b>, vui lòng kiểm tra hộp thư đến của quý khách.</p>

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

                </div>
            </div>
            <div class="col-lg-225 col-lg-pull-775 col-md-3 col-sm-12 col-xs-12">
                <?=$this->load->view('users/view_left');?>
            </div>
        </div>
    </div>
