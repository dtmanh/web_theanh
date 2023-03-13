<article>
    <div class="container">
		<div class="row_pc">
			<?=@$blksearch;?>
			<section class="big_content_category">
				<div class="clearfix clearfix-40"></div>
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="title_big_content">
						<a href="<?=lang('home');?>" title="<?=lang('home');?>"><?=lang('home');?></a>
						<span>//</span>
						<a href="" title="Kích hoạt tài khoản">Kích hoạt tài khoản</a>
					</div>
				</div>
				<div class="clearfix clearfix-15"></div> 
				<div class="col-xs-4 col-md-4 col-sm-4">
					<div class="title_big_content">
						<a href="">Kích hoạt tài khoản thành công!</a>
					</div>
				</div>
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class="confirm" >
                        <p>Tài khoản đã được kích hoạt thành công!</p>

                        <p> Tài khoản đăng ký của quý khách đã được kích hoạt thành công. Quý khách có thể
                            <a href="" style="color: red" data-toggle="modal" data-target=".bs-example-modal-sm">Đăng nhập</a> vào
                            tài khoản hoặc vào Trang chủ <b><?=@$this->option->site_name;?></b> để bắt đầu giao dịch mua hàng.</p>
                    </div>
				</div>
				<div class="clearfix clearfix-40"></div>
            </section>
        </div>
    </div>
</article>