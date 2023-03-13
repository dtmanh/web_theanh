<script type="text/javascript" src="<?=site_url()?>assets/js/front_end/pro_by_brand.js"></script>
<section class="container">
    <div class="mb-breadcrumbs col-xs-12">
        <div class="breadcrumbs">
            <ul>
                <li class="home">
                    <a href="<?=base_url()?>" title="<?=@$this->option->site_name;?>">Trang chủ</a>
                    <span>/ </span>
                </li>
                <li class="category161">
                    Thương hiệu
                    <span>/ </span>
                </li>
                <li>
                    <?=@$cate_curent->name;?>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="container content">
<div class="row">
<!--Content -->
<section class="col-sm-12 col-md-12 col-lg-12 content-center">
<div class="mb-content"><div class="mb-category-products">

<section class="container">
<!--<div class="page-title category-title">
    </h1>
</div>-->

<p class="category-image"><img src="<?=base_url();?>upload/file/women.jpg" alt="Women" title="Women"></p>

<div class="block block-layered-nav m-topmenu mb-top-layered-navigation m-wide m-expanded"
     data-m-block="Mana/LayeredNavigation/Top/MenuBlock" data-behavior="initially-collapsed"
     data-duration="500" data-hide-sidebars="1" data-one-column="768" data-title="L?c"
     data-column-filters="move" data-min-width="180" data-max-width="250">
<div class="block-content">
<div class="clearfix"></div>
<div id="narrow-by-list">
<dl class="m-shop-by">
    <dt class="block-subtitle hidden odd m-expanded">
    <div class="m-subtitle-actions">
        <div class="m-expand-collapse">
            <div class="btn-expand-collapse"></div>
        </div>
    </div>
    <strong><span>Shop By</span></strong>
    </dt>
    <dd class="hidden odd"></dd>
</dl>
    <div class="block-filters">
        <?php if(count($types)) : ?>
            <dl class="m-css_checkboxes">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Kiểu dáng
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($types as $type) : ?>
                            <li>
                                <input <?php if(in_array($type->alias,$kieudang)){echo "checked";} ?> class="kieudang" onclick="Bo_loc()" type="checkbox" name="type[]" value="<?=@$type->alias;?>">
                                <span><?=$type->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($brands)) : ?>
            <dl class="m-css_checkboxes filter-price">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Thương hiệu
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($brands as $brand) : ?>
                            <li>
                                <input <?php if(in_array($brand->alias,$thuonghieu)){echo "checked";} ?> class="brand" onclick="Bo_loc()" type="checkbox" name="brand[]" value="<?=@$brand->alias;?>">
                                <span><?=@$brand->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($prices)) : ?>
            <dl class="m-css_checkboxes filter-price">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Giá bán
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($prices as $price) : ?>
                            <li>
                                <input <?php if(in_array($price->from_price.'-'.$price->to_price,$price_select)){echo "checked";}?> class="khoang_gia" onclick="Bo_loc()" type="checkbox" name="price[]" value="<?=@$price->from_price.'-'.$price->to_price;?>">
                                <span><?=@$price->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($colors)) : ?>
            <dl class="m-css_checkboxes">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Màu sắc
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($colors as $color) : ?>
                            <li>
                                <input  <?php if(in_array($color->id,$color_select)){echo "checked";}?> class="color" onclick="Bo_loc()" type="checkbox" name="color[]" value="<?=@$color->id;?>">
                                <span><?=$color->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($genders)) : ?>
            <dl class="m-css_checkboxes">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Giới tính
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($genders as $key => $gender) : ?>
                            <li>
                                <input <?php if(in_array($gender,$gender_select)){echo "checked";}?>  class="gender" onclick="Bo_loc()" type="checkbox" name="gender[]" value="<?=@$gender;?>">
                                <span><?=$key;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($sizes)) : ?>
            <dl class="m-css_checkboxes">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Kích cỡ
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($sizes as $key => $size) : ?>
                            <li>
                                <input <?php if(in_array($size->name,$size_select)){echo "checked";}?> class="item_size" onclick="Bo_loc()" type="checkbox" name="size[]" value="<?=@$size->name;?>">
                                <span><?=$size->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
        <?php if(count($heights)) : ?>
            <dl class="m-css_checkboxes">
                <dt class="m-ln even m-expanded" data-id="m_above_products_size_filter">
                    Chiều cao gót
                </dt>
                <dd class="hidden m-ln even" style="">
                    <ol class="m-filter-css-checkboxes">
                        <?php foreach($heights as $key => $height) : ?>
                            <li>
                                <input <?php if(in_array($height->id,$height_select)){echo "checked";}?> class="itemhight" onclick="Bo_loc()" type="checkbox" name="height[]" value="<?=@$height->id;?>">
                                <span><?=$height->name;?></span>
                            </li>
                        <?php endforeach;?>
                    </ol>

                </dd>
            </dl>
        <?php endif;?>
    </div>
</div>
<script type="text/javascript">decorateDataList('narrow-by-list')</script>
</div>
</div>
<!-- <span id='qqqqq' class="hide">
    </span> -->
<div class="category-products">
<div class="toolbar">

    <div class="pager" style="display: none;">
        <p class="amount">
            Items 1 to 12 of 87 total
        </p>
        <div class="limiter">
            <label>Show</label>
            <select onchange="setLocation(this.value)">
                <option value="" selected="selected">
                    12
                </option>
                <option value="">
                    24
                </option>
                <option value="">
                    36
                </option>
            </select> per page
        </div>
        <div class="pages">
            <strong>Page:</strong>
            <ol>
                <li class="current">1</li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li>
                    <a class="next i-next" href="" title="Next">
                        <img src="<?=base_url();?>upload/file/pager_arrow_right.gif" alt="Next" class="v-middle">
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="sorter">
        <p class="view-mode">
        </p>
        <div class="sort-by" style="float:left">
            <strong>Có : <span id="total_item"><?=@$total;?></span> Sản phẩm</strong>
        </div>
        <div class="sort-by">
            <label>Sắp xếp theo : </label>
            <select onchange="Bo_loc()"  id="order_item" name="order_item">
                <option value="new" data-href="desc" selected>
                    Mới nhất
                </option>
                <option value="price-asc" data-href="asc">
                    Giá tăng dần
                </option>
                <option value="price-desc" data-href="desc">
                    Giá giảm dần
                </option>
            </select>
        </div>
    </div>
</div>
    <div class="products-list row" id="test-list">
        <?php /*if(count($lists)) : */?><!--
            <?php /*foreach($lists as $key => $list) : */?>
                <div class="product-preview new item">
                    <div class="preview animate scale  animated">
                        <a href="<?/*=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)*/?>" class="preview-image">
                            <img src="<?/*=base_url('upload/img/products/'.$list->pro_dir.'/thumbnail_2_'.@$list->pro_image)*/?>" class="product-retina img-responsive" data-image2x="<?/*=base_url();*/?>upload/file/TENBLCOTBLU02_1110PX_1_.JPG" alt="<?/*=@$list->pro_name;*/?>">
                        </a>
                        <ul class="product-controls-list left hide-left">
                            <li><span class="label label-sale">Sale</span></li>
                            <li><span class="label">-33%</span></li>
                        </ul>
                        <ul class="product-controls-list right hide-right">
                            <li class="top-out"></li>
                            <li>
                                <a class="circle" href="#" onclick="ajaxWishlist('',59753);return false;">
                                    <span class="icon-heart"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="title">
                        <a href="<?/*=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)*/?>" title="<?/*=@$list->pro_name;*/?>"><?/*=@$list->pro_name;*/?></a>
                    </h3>
                    <div class="price-box">
                        <p class="old-price">
                            <span class="price-label">Regular Price:</span>
                                                <span class="price" id="old-price-59753">
                                                    899.000 đ
                                                </span>
                        </p>
                        <p class="special-price">
                            <span class="price-label">Special Price</span>
                                                <span class="price" id="product-price-59753">
                                                   599.000 đ
                                                </span>
                        </p>
                    </div>
                    <a class="cart btn-addtocart" href="<?/*=base_url('san-pham/'.$list->pro_alias.'-'.$list->pro_id)*/?>">Thêm vào giỏ hàng</a>
                </div>
            <?php /*endforeach;*/?>
        <?php /*else : */?>
            Đang cập nhật sản phẩm ...
        --><?php /*endif;*/?>
    <div class="clearfix"></div>

    </div>
</section></div>
<div class="category-description std">
    <div class="static_content_fashos">
        <?=@$cate_curent->description;?>
    </div>
</div>
</div>
</section>
</div>

</section>
<input type="hidden" id="id_lay" value="<?=@$cate_curent->id;?>">
<input type="hidden" id="alias" value="<?=@$cate_curent->alias;?>">