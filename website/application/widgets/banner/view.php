<!-- begin banner -->
<?php if($slides){?>
<div class="section-full-width">
    <div class="banner-full-width">
        <div class="container">
        <div class="banner">
            <div class="col-banner-left">
                <div class="sub-title-banner">
                    <h3><?=@$slides->title?></h3>
                </div>
                <div class="title-banner">
                    <h1><?=@$slides->name?></h1>
                </div>
                <div class="description-banner">
                    <?=@$slides->content?>                      
                </div>
                <div class="button-banner">
                    <a href="javascript:void(0)" id="btn-registration">
                    DÙNG THỬ MIỄN PHÍ NGAY
                    <span>
                        <img src="<?=base_url()?>assets/css/images/Vector.svg" data-lazy-src="<?=base_url()?>assets/css/images/Vector.svg">
                        <noscript><img src="<?=base_url()?>assets/css/images/Vector.svg"></noscript>
                    </span>
                    </a>
                </div>
            </div>
            <div class="col-banner-right">
                <div class="image-banner">
                    <img width="554" height="404" src="<?=base_url(@$slides->image)?>" data-lazy-src="<?=base_url(@$slides->image)?>" />
                    <noscript><img width="554" height="404" src="<?=base_url(@$slides->image)?>" /></noscript>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
 <?php } ?>
<!-- end banner -->