<?php if(count($lists)) : ?>
    <ul class="dropdown-menu autosearch">
        <?php foreach($lists as $list) : ?>
            <li data-value="<?=@$list->pro_id;?>" style="margin-top: 7px; ">
                <a href="<?=site_url($list->pro_alias)?>" target="_self" style="width: 100%; display: inline-block">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="row12">
                            <img class="auto-sear-img" style="" src="<?=base_url('upload/img/products/'.$list->pro_dir.'/thumbnail_3_'.@$list->pro_image)?>" alt="<?=@$list->pro_name;?>">
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="row123">
                            <span><?=@$list->pro_name;?></span>
                            <div class="media-body">
                                <?php if(!empty($list->price_sale)) : ?>
                                    <span class="list-product-meta-price"><?=str_replace(',','.',number_format($list->price_sale));?> đ</span>
                                <?php else : ?>
                                <span class="list-product-meta-price">
                            Giá : Liên hệ
                            </div>
                            <?php endif;?>
                            <?php if(!empty($list->price)) : ?>
                                <span class="price-old">
                            <del><?=str_replace(',','.',number_format($list->price));?> đ</del>
                        </span>
                            <?php endif;?>
                        </div>

                    </div>

                    </div>
                </a>
            </li>
            <li class="clearfix"></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<style>
    .row12 {
        margin-left: -20px;
        margin-rigth: -15px;
    }

    .row123 {
        margin-left: -35px;
    }

</style>
