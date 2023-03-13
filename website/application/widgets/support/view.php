<div class="danhmuc5"> 
    <div class="clearfix clearfix-30"></div>
    <div class="sidebar"> 
        <div class="content_right">
            <div class="block_title">
               <h2 class="title_sidebar">HỖ TRỢ TRỰC TUYẾN</h2>
            </div>
            <div class="content-online-support clearfix">
                <img src="http://localhost/demo/demo_hang/assets/css/img/icon_hotline.png"width="40" alt="">
                <div class="hotline_grroup">
                    <div class="hotline-sp">
                        <a href="" title=""><?= $this->option->hotline1;?></a>
                    </div>
                    <div class="hotline-sp">
                        <a href="" title=""><?= $this->option->hotline2;?></a>
                    </div>
                </div>
            </div>
            <ul class="box-online-support">
                <li><i class="icofont-envelope"></i> <?=$this->option->site_email;?></li>
                <?php if (count($supports)) {
                foreach ($supports as $key => $support) { ?>
                <li>
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="name-sp">
                                <i class="icofont-envelope"></i> <?= $support->name;?>
                            </div>
                            <div class="phone-number">
                                <a href="tel:0166.7272.072" title=""><?= $support->phone;?></a>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <a href="" title=""><img class="" src="<?= base_url('assets/css/img/icon_skype_sb.png')?>" alt=""/></a>
                            <a href="" title=""><img class="" src="<?= base_url('assets/css/img/icon_zalo_sb.png')?>" alt=""/></a>
                        </div>
                    </div>
                </li>
                <?php } } ?>

            </ul>
        </div>
    </div>
</div>
