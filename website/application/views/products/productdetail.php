<article>
<div class="container">
<div class="row_pc">

<div class="content_detail">

<div class="clearfix"></div>

<ul class="back_link">
    <li><a href="<?=base_url()?>" title="<?=@$this->option->site_name;?>">Trang chủ12 </a></li>
    <?=creat_break_crum('products',$cate,$cate_curent->id)?>
</ul>
<div class="clearfix"></div>
<div class="container_detail">

<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="row">
        <div class="detail_left">
            <div class="clearfix-30"></div>
            <div class="col-sm-6 col-xs-12 col-480-12">
                <div class="row">
                    <div id="product-gallery-281403" class="product__gallery gallery " data-max-thumbs="5">
                        <div class="gallery__image media-gallery">
                            <a href="#" class="">
                                <img width="450" height="330" itemprop="image" style="max-width: 100%;" src="<?=base_url('upload/img/products/'.$item->pro_dir.'/thumbnail_2_'.$item->image)?>" alt="<?=@$item->name;?>"/>
                            </a>
                            <?php $images = explode(',',trim($item->multi_image)); ?>
                            <?php if(count($images)) : ?>
                                <?php foreach($images as $km => $image) : ?>
                                    <?php if($image !='' && !empty($image)) : ?>
                                        <a href="#" class="">
                                            <img width="100%" itemprop="image" style="max-width: 100%;" src="<?=base_url('upload/img/products/'.$item->img_dir.'/thumbnail_1_'.$image)?>" alt="<?=@$km.'product'?>"/>
                                        </a>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endif;?>
                        </div>
                        <?php if(count($images) > 1) : ?>
                            <div class="gallery__thumbnails">
                                <?php foreach($images as $km => $image) : ?>
                                    <?php if($image !='' && !empty($image)) : ?>
                                        <a href="#" class="">
                                            <img width="100%" itemprop="image" style="max-width: 100%;" src="<?=base_url('upload/img/products/'.$item->img_dir.'/thumbnail_1_'.$image)?>" alt="<?=@$km.'product'?>"/>
                                        </a>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-480-12">
                <div class="row">
                    <div class="overview">
                        <h1 class="name_prod_detail"><?=@$item->name;?></h1>
                        <div class="but_fb">
                            <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=http%3A%2F%2Fwww.addthis.com&pubid=ra-56af2d3608fa491b&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=http%3A%2F%2Fwww.addthis.com&pubid=ra-56af2d3608fa491b&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url=http%3A%2F%2Fwww.addthis.com&pubid=ra-56af2d3608fa491b&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
                            <a href="https://www.addthis.com/bookmark.php?source=tbx32nj-1.0&v=300&url=http%3A%2F%2Fwww.addthis.com&pubid=ra-56af2d3608fa491b&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/addthis.png" border="0" alt="Addthis"/></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/blogger/offer?url=http%3A%2F%2Fwww.addthis.com&pubid=ra-56af2d3608fa491b&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/blogger.png" border="0" alt="Blogger"/></a>
                        </div>
                        <?php if(!$this->session->userData('userData')) : ?>
                            <a href="javascript:void(0)" onclick="getModalLogin()" class="add_prod_lo">Thêm vào yêu thích</a>
                        <?php else :?>
                            <a href="javascript:void(0)" onclick="Wishlist(<?=@$item->id;?>);" class="add_prod_lo">Thêm vào yêu thích</a>
                        <?php endif;?>
                        <div class="clearfix"></div>
                        <div class="txt_pr_de">Giá Online: <span style="color:#e00"><?php if(!empty($item->price_sale)) :  ?> <?=number_format(@$item->price_sale)?> đ <?php else : ?>Liên hệ <?php endif;?></span></div>
                        <p>Bảo hành: <?php if(!empty($item->quaranty)) : ?> <?=@$item->quaranty;?><?php else : ?> 12 <?php endif ;?> Tháng</p>
                        <p>Thương hiệu: VANTECH</p>
                        <div id="button_buy">
                            <form action="<?=base_url('add-to-cart')?>" method="post">
                                <input type="hidden" name="form_key" value="<?=@$form_key;?>">
                                <input type="hidden" name="product" value="<?=@$item->id;?>">
                                <button style="margin-left:0" href="javascript:addToShoppingCart('pro','800','1','0')" class="btn_large_red">
                                    <span>Đặt hàng</span>Xem miễn phí, không thích không mua
                                </button>
                                <button type="submit" class=" btn_large_cyan">
                                    <span>Cho vào giỏ</span> Tiếp tục mua sắm
                                </button>
                            </form>
                        </div>
                        <div class="txt_phone_prod" style="">
                            <img valign="middle" src="<?=base_url()?>assets/css/img/icon_hotline.png" alt="support"> Gọi ngay
                        </div>
                        <div class="clearfix"></div>
                        <div class="list_phone_pr">
                            <li>- <b>Hà Nội</b>: 0936.255.369<br></li>
                            <li>- <b>HCM - Bình Tân</b>: 0903.636.613<br> </li>
                            <li>- <b>Đà Nẵng</b>: 0936.426.485<br></li>
                            <li>- <b>HCM - Quận 1</b>: 0905.458.548<br></li>
                            <li>- <b>Quảng Nam</b>: 0914.083.068<br></li>
                            <li>- <b>Đồng Nai</b>: 0909.477.494<br></li>
                            <li>- <b>Đăk Lăk</b>: 0943.650.808<br></li>
                            <li>- <b>Bình Dương</b>: 0972.894.894<br></li>
                        </div>

                    </div>
                </div>
            </div>

            <div class="clearfix-30"></div>
            <ul class="nav nav-tabs menu_tab_detail">
                <li class="active"><a data-toggle="tab" href="#thontin_chitiet">Thông tin chi tiết</a></li>
                <li><a data-toggle="tab" href="#binhluan">Bình luận</a></li>
            </ul>

            <div class="tab-content">
                <div id="thontin_chitiet" class="tab-pane fade in active ct_menu_pr">
                    <?php if(!empty($item->detail)) : ?>
                        <?=@$item->detail;?>
                    <?php else : ?>
                        Thông tin sản phẩm đang được cập nhật...
                    <?php endif;?>
                </div>
                <div id="binhluan" class="tab-pane fade ct_menu_pr">
                    <p>Hiện tại chưa có ý kiến đánh giá nào về sản phẩm. Hãy là người đầu tiên chia sẻ cảm nhận của bạn.</p>
                    <div class="h_title" style="font-weight:bold; margin:10px 0;">Viết đánh giá của bạn</div>
                    <?=@$view_comment;?>
                </div>
            </div>

            <div class="clearfix"></div>
            <?php if(count($pros)) : ?>
                <div class="title_prod_hot">
                    <h2 class="text_prod_hot"><a href="">Sản phẩm liên quan</a></h2>
                    <ul class="list_mn_prohome">
                    </ul>
                </div>
                <div class="list_prod_lq">
                    <?php foreach($pros as $pro) :  ?>
                        <div class="col-lg-200 col-md-3 col-sm-6 col-xs-6 col-480-12 box_prod">
                            <div class="row">
                                <div class="imghvr-slide-down">
                                    <a href="<?=base_url(@$pro->pro_alias.'.html')?>" class="h_880 img_prod">
                                        <img class="w_100" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->pro_image)?>" alt="<?=@$pro->product_name?>">
                                        <div class="clearfix"></div>
                                        <?php if($pro->price > 0 && $pro->price_sale > 0) :?>
                                            <div class="icon_priceoff"><span>Giảm</span><b><?=floor(100-($pro->price_sale/$pro->price)*100)?>%</b></div>
                                            <span class="p_old_price"><?=number_format($pro->price);?> đ</span>
                                            <img src="<?=base_url()?>assets/css/img/icon_km.png" alt="km" class="icon_km">
                                        <?php endif;?>
                                    </a>
                                    </a>
                                    <div class="clearfix"></div>
                                    <span class="p_brand"><?=@$pro->brand_name;?></span>
                                    <span class="p_price"><?=number_format(@$pro->price_sale)?> đ</span>
                                    <div class="clearfix"></div>
                                    <a href="<?=base_url(@$pro->pro_alias.'.html')?>" class="p_name"><?=@$pro->product_name?></a>
                                    <div class="p_hover">
                                        <h3 class="p_hover_name"><a href="<?=base_url(@$pro->pro_alias.'.html')?>"><?=@$pro->product_name?></a></h3>
                                        <span class="p_hover_price"><?=number_format(@$pro->price_sale)?>đ</span>
                                        <div class="clearfix"></div>
                                                    <span class="p_hover_summary">
                                                        <?=@$pro->description;?>
                                                    </span>
                                        <a href="<?=base_url(@$pro->pro_alias.'.html')?>" class="p_hover_view">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="row">
        <div class="detail_right">
            <a href="" class="link_right_prod">hướng dẫn lắp đặt camera</a>
            <?php if(count($review_pro)) : ?>
                <h2 class="title_right_pr">sản phẩm vừa xem</h2>
                <div class="clearfix"></div>
                <ul class="content_box_right">
                    <?php foreach($review_pro as $pview) : ?>
                        <li>
                            <a href="<?=@$pview->url.'.hmt';?>" class="img"><img src="<?=base_url('upload/img/products/'.@$pview['pro_dir'].'/thumbnail_3_'.@$pview['image'])?>" alt="<?=@$pview['name'];?>"> </a>
                            <a href="<?=@$pview->url.'.hmt';?>" class="name"><?=@$pview['name'];?></a>
                            <?php if(!empty($pview['price_sale']) || $pview['price_sale'] !=0) : ?>
                                <?php if(!empty($pview['price'])) : ?>
                                    <span class="old-price"><?=number_format($pview['price']);?>đ</span>
                                <?php endif ;?>
                                <span class="price"><?=number_format($pview['price_sale'])?>đ</span>
                            <?php else : ?>
                                <span class="price">Liên hệ</span>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="clearfix"></div>
            <?php endif;?>
            <?php if(count($procats)) : ?>
                <h2 class="title_right_pr">sản phẩm cùng danh mục</h2>
                <div class="clearfix"></div>
                <ul class="content_box_right">
                    <?php foreach($procats as $pcat) : ?>
                        <li>
                            <a href="<?=base_url(@$pcat->pro_alias.'.html');?>" class="img"><img src="<?=base_url('upload/img/products/'.$pcat->pro_dir.'/thumbnail_3_'.$pcat->pro_image)?>" alt="<?=@$pcat->pro_name;?>"> </a>
                            <a href="<?=base_url(@$pcat->pro_alias.'.html');?>" class="name" title="<?=@$pcat->pro_name;?>"><?=@$pcat->pro_name;?></a>
                            <?php if(!empty($pcat->price_sale) || $pcat->price_sale !=0) : ?>
                                <?php if(!empty($pcat->price)) : ?>
                                    <span class="old-price"><?=number_format($pcat->price);?>đ</span>
                                <?php endif;?>
                                <span class="price"><?=number_format($pcat->price_sale)?>đ</span>
                            <?php else : ?>
                                <span class="price">Liên hệ</span>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="clearfix"></div>
            <?php endif;?>
        </div>
    </div>
</div>

</div>

</div>

</div>
</div>
</article>
<link href="<?=base_url()?>assets/css/front_end/app-3.4.0.min.css" rel="stylesheet"/><!--slider detail-->
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/base-2.8.0.min.js"></script><!--slider detail-->
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/app-3.4.0.min.js"></script><!--slider detail-->
<script>
    $(document).ready(function(){
        loadComment(1,9);
    });
</script>