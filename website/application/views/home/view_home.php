
<!-- Start home page -->
<section id="body-page">
    <div id="home-page">
        <?=@$this->load->widget('banner');?>
        <?=@$this->load->widget('home_1');?>
        <?=@$this->load->widget('doitac');?>
        <?=@$this->load->widget('home_khachhang');?>
        <div class="container">
            <div class="news">
                <div class="section-title">
                <h2>củng trở thành nhà bán hàng tiếp theo, kinh doanh thành công với sapo</h2>
                </div>
                <div class="button-website text-center">
                    <a href="javascript:void(0)" id="btn-registration">
                        Dùng thử miền phí
                        <span>
                            <img src="<?=base_url()?>assets/css/img/Vector.svg" data-lazy-src="<?=base_url()?>assets/css/images/Vector.svg" />
                            <noscript><img src="<?=base_url()?>assets/css/img/Vector.svg" /></noscript>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <?=@$this->load->widget('banner_baochi');?>
        <?=@$this->load->widget('home_banggia');?>
        <?=@$this->load->widget('question');?>
        <?=@$this->load->widget('ykienkhachhang');?>
        <?=@$this->load->widget('news_noibat_home');?>        
    </div>
 </section>
 <?=@$this->load->widget('home_giaiphap');?>
<!-- end home page -->