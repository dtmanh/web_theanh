<?php if (is_array($news)) { ?>
<div class="most-post">
    <div class="title">
    Bài viết xem nhiều nhất
    </div>
    <div class="slide-most-post">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php 
                  foreach ($news as $key => $new) { ?>
                     <?=@$this->load->views('temp/news', array('n' => $new));?>
                <?php } ?>    
            </div>
            <div class="custom-paginate">
                <div class="swiper-button-next">
                </div>
                <div class="swiper-button-prev">
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>