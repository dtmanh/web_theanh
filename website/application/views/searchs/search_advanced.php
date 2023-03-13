<section class="container">
    <article class="row">
        <ul class="back_link">
            <li><a href="<?=base_url()?>">Trang chủ</a></li>
            <li><a href="#">Kết quả tìm kiếm</a></li>
        </ul>
        <div class="clearfix"></div>
        <h3 class="title_blog"><span class="txt_tit_blog">Kết quả tìm kiếm</span></h3>
    </article>
    <article class="row">
        <p>
            <strong>Tìm thấy : <?=@$toal_item;?> Sản phẩm</strong>
        </p>
    </article>
    <!--<article class="row">
        <div class="img_banner_cate1"><a href=""><img class="w_100" src="<?/*=base_url()*/?>assets/css/img/bn_cate1.png" alt=""></a></div>
    </article>-->
    <div class="clearfix-30"></div>
    <article class="row">
        <div class="products-list row" id="test-list">
            <?php if(count($lists)) : ?>
                <?php foreach($lists as $key => $list) : ?>
                    <div class="product-preview new item">
                        <div class="preview animate scale  animated">
                            <a href="<?=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)?>" class="preview-image">
                                <img src="<?=base_url('upload/img/products/'.$list->pro_dir.'/thumbnail_2_'.@$list->pro_image)?>" class="product-retina img-responsive" data-image2x="<?=base_url();?>upload/file/TENBLCOTBLU02_1110PX_1_.JPG" alt="<?=@$list->pro_name;?>">
                            </a>
                            <?php if($list->price > 0 && $list->price_sale > 0) :?>
                                <ul class="product-controls-list left hide-left">
                                    <li><span class="label label-sale">Sale</span></li>
                                    <li><span class="label">-<?=floor(100-($list->price_sale/$list->price)*100)?>%</span></li>
                                </ul>
                            <?php endif;?>
                            <ul class="product-controls-list right hide-right">
                                <li class="top-out"></li>
                                <li>
                                    <?php if(!$this->session->userData('userData')) : ?>
                                        <a class="circle head-login" href="javascript:void(0)" onclick="alert('Vui lòng đăng nhập, để thực hiện chức năng này');">
                                            <span class="fa fa-heart"></span>
                                        </a>
                                    <?php else : ?>
                                        <a class="circle" href="javascript:void(0)" onclick="Wishlist(<?=@$list->pro_id;?>);">
                                            <span class="fa fa-heart"></span>
                                        </a>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                        <h3 class="title">
                            <a href="<?=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)?>" title="<?=@$list->pro_name;?>"><?=@$list->pro_name;?></a>
                        </h3>
                        <div class="price-box">
                            <?php if(!empty($list->price)) : ?>
                                <p class="old-price">
                                    <span class="price-label">Regular Price:</span>
                                                    <span class="price" id="old-price-59753">
                                                        <?=number_format($list->price);?> đ
                                                    </span>
                                </p>
                                <p class="special-price">
                                    <span class="price-label">Special Price</span>
                                                    <span class="price" id="product-price-59753">
                                                       <?=number_format($list->price_sale);?> đ
                                                    </span>
                                </p>
                            <?php else : ?>
                                <span class="regular-price" id="product-price-59762">
                        <span class="price"><?=number_format($list->price_sale);?>đ</span>
                    </span>
                            <?php endif;?>
                        </div>
                        <a class="cart btn-addtocart" href="<?=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)?>">Thêm vào giỏ hàng</a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </article>
</section>
