<div id="clearfix">
    <div class="container">
    <div id="data" data-catid="1013" data-tag="dien-may-dien-lanh" data-name="Điện máy - Điện lạnh"></div>
    <div class="row ">
        <ol class="breadcrumb">
            <li class="breadcrum-item"><a href="<?=base_url();?>">Trang chủ</a></li>
            <li class="breadcrum-item"><a href="javascript:void(0)"><?=$cate_curent->name;?></a></li>
        </ol>
    </div>
<div class="clear"></div>
<div class="Page-right row">
    <div id="catalog">
        <div id="ctl00_pageBody_plhCatalog">
            <div class="col block-head box-zone">
                <header class="page-header">
                    <h1 class="page-title">
                        Các sản phẩm của <?=@$cate_curent->name;?>
                    </h1>
                </header>
                <div class="clearfix-20"></div>
                <div class="col title-zone">
                    <span class="col">(Tìm thấy <?=count($lists);?> sản phẩm)</span>
                </div>
            <div class="clearfix-10"></div>
            <div id="_products">
                <div class="Wrap-product-catalog">
                    <div class="col body-product-catalog-grid" id="cat-content">
                        <?php if(count($lists)) : ?>
                            <?php foreach($lists as $list) : ?>
                                <div class="col-lg-200 col-md-3 col-sm-4 col-xs-6">
                                    <div class="row_5">
                                        <div class="box_prod_home prod_cate">
                                            <a href="<?=site_url($list->pro_alias)?>" class="img_prod_home h_8333"><img class="w_100" src="<?=base_url('upload/img/products/'.$list->pro_dir.'/thumbnail_2_'.$list->pro_image)?>" alt="<?php echo $list->pro_name;?>"/></a>
                                            <div class="clearfix"></div>
                                            <div class="sub_prod_home">
                                                <h3 class="name_prod_home">
                                                    <a href="<?=site_url($list->pro_alias)?>" title="<?php echo $list->pro_name;?>">
                                                        <?php echo $list->pro_name;?>
                                                    </a>
                                                </h3>
                                                <div class="clearfix"></div>
                                                <div class="price_home">
                                                    <span class="price_home_new"><?=number_format($list->price_sale);?> đ</span>
                                                    <div class="clearfix"></div>
                                                    <?php if(!empty($list->price)) : ?>
                                                        <span class="price_home_old"><?=number_format($list->price);?> đ</span>
                                                    <?php endif;?>
                                                </div>
                                                <?php if($list->price > 0 && $list->price_sale > 0) :?>
                                                    <span class="sale_prod_home">-<?=floor(100-($list->price_sale/$list->price)*100)?>%</span>
                                                <?php endif;?>
                                                <div class="clearfix"></div>
                                                <div class="social_box">
                                                    <span class=""><i class="fa fa-tag"></i> <?php echo $list->bought;?></span>
                                                    <span class=""><i class="fa fa-eye"></i> <?php echo $list->view;?></span>
                                                    <span class=""><i class="fa fa-comments"></i> <?=$list->comment?></span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="producer"><a href="">Docmobile</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    <div class="col Box-paging">
                        <div class="list-pagination">
                            <?=$this->pagination->create_links();?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>
<span class="hidden"><input class="chk-manf-select" onclick="filter()" id="chk_manf_<?=@$cate_curent->id;?>" checked="checked" type="checkbox" value="<?=@$cate_curent->id;?>" /></span>

<div class="clearfix"></div>
<script type="text/javascript">
    function getListItemFilter(id,thuong_hieu,xuatxu,khoang_gia,$page, $number_per_page) {
        var page = $page;
        var number_per_page = $number_per_page;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>search/filter",
            data: "id=" + id+"&thuong_hieu=" + thuong_hieu+"&xuatxu=" + xuatxu+"&khoang_gia=" + khoang_gia+"&page=" + page+"&number_per_page=" + number_per_page,
            success: function (ketqua) {
                //alert(1);
                $("#cat-content").html(ketqua);
                // $("#timer123").hide();
            }
        })
    }
    function filter()
    {
        var id = $('#cat_id').val();
        var thuong_hieu = [];
        $(".chk-manf-select:checked").each(function() {
            thuong_hieu.push(this.value);
        });
        var khoang_gia = [];
        $(".chk-price-select:checked").each(function() {
            khoang_gia.push(this.value);
        });
        var xuatxu = [];
        $(".chk-specs:checked").each(function() {
            xuatxu.push(this.value);
        });
        getListItemFilter(id,thuong_hieu,xuatxu,khoang_gia,1,20);
    }
</script>