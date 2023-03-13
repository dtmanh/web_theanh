<?php if(count($cate_media)) : ?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="col_news">
        <div class="title_col_news_active"><?=$cate_media->name?></div>

        <div class="content_col_album">
            <div class="row_6 imgRow">
                <?php if(count($media)) : ?>
                <?php foreach ($media as $item) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-480-12 pdd_6">
                    <div class="img_album_item reRenderImg hvr-shadow-radial">
                        <a href="<?=base_url('media-detail/'.$item->alias.'.html')?>" title="" rel="">
                            <img src="<?=base_url($item->image)?>" class="w_100" alt="<?=$item->name?>">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>