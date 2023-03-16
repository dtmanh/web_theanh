<section id="body-page">
    <div class="support-page" id="feature-page">
        <div class="section-full-width">
            <div class="bgr-banner" style="background: url('<?=base_url()?>assets/css/img/bg-banner-blog.jpg')center center no-repeat; background-size: cover; padding: 50px 0;">
                <div class="container">
                <div class="search-banner">
                    <p class="description">
                        Tổng đài hỗ trợ
                        <span class="line">
                        -
                        </span>
                        <br class="d-block d-lg-none"/>
                        <a href="tel:<?=@$this->option->hotline1?>">
                        <?=@$this->option->hotline1?>
                        </a>
                        <br class="d-block d-sm-none"/>
                        <span>
                        <?=@$this->option->hotline1?>
                        </span>
                    </p>
                </div>
                <form action="<?=base_url('tim-kiem')?>" class="search-form" id="banner-search-form">
                    <input type="search" name="s" class="input-search" value="" placeholder="Nhập từ khóa tìm kiếm...">
                    <button type="submit" class="icon-search">
                    <span>Tìm kiếm</span>
                    </button>
                </form>
                </div>
            </div>
        </div>
        
        <div class="section-full-width">
            <div class="bgr-banner" style="background: #FAFAFA;">
                <div class="container">
                    <div class="option-page">
                        <?=@$this->load->widget('menu_huongdan');?>
                        <?=@$this->load->widget('question_support');?>
                        <?=@$this->load->widget('video');?>
                    </div>
                </div>
            </div>
        </div>
        <?=@$this->load->widget('menu_kenh_pupport');?>
    </div>
 </section>