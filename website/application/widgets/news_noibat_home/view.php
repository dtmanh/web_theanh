<?php if (is_array($news)) { ?>
<div class="container" id="customer-page">
    <div class="news">
        <div class="section-title">
        <h2>
            Tin tức        
        </h2>
        </div>
        <div class="list-news">
            <div class="parent-tab">
                <div id="post-news">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">  
                        <?php  foreach ($news as $key => $new) { ?>
                            <div class="swiper-slide">
                                <div class="box-news">
                                    <div class="img-news">
                                        <a href="<?= base_url($n->alias.'.html') ?>">
                                        <img width="2400" height="1374" src="<?= base_url($new->image) ?>" data-lazy-src="<?= base_url($new->image) ?>">
                                        <noscript><img width="2400" height="1374" src="<?= base_url($new->image) ?>"></noscript>
                                        </a>
                                    </div>
                                    <div class="date-news">
                                        <?=date("d/m/Y",$new->time);?>                                                             
                                        <div class="name-news">
                                        <a href="<?= base_url($new->cat_name->alias.'.html') ?>"><?=($new->cat_name->name); ?> </a>
                                        </div>
                                    </div>
                                    <div class="title-news">
                                        <a href="<?= base_url($new->alias.'.html') ?>">
                                        <h2>
                                        <?=($new->title); ?>                                                                   
                                        </h2>
                                        </a>
                                    </div>
                                    <div class="excerpt-news">
                                        <?=strip_tags(LimitString($new->description, 350, '...')); ?>
                                    </div>
                                    <div class="more-news">
                                        <a href="<?= base_url($new->alias.'.html') ?>">
                                        Đọc tiếp >
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>    
                        </div>
                        <!-- <div class="swiper-pagination">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="button-website text-center">
            <a href="javascript:void(0)" id="btn-registration">
                ĐĂNG KÝ
                <span>
                    <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector.svg" />
                    <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector.svg" /></noscript>
                </span>
            </a>
        </div> -->
    </div>
</div>
<?php } ?>