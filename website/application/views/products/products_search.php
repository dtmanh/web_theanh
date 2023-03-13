
<div class="container">
    <div class="row">
        <div class="col-main-left col-md-9">


            <div class="block-nav">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>">Trang chủ</a></li>
                    <li><a href="#">Tìm kiếm</a></li>
                </ol>
            </div>
            <div class="block-pro row product_brand">
                <?php
                foreach($list as $product){?>
                    <div class="item item-col col-md-3 col-sm-3">
                        <div class="item-flow">
                            <div class="image">
                                <a href="<?= base_url($product->cate_alias.'/'.$product->pro_alias.'-c'.$product->cate_id.'p'.$product->pro_id) ?>" title="<?$product->pro_name;?>">
                                    <img src="<?=base_url($product->pro_img)?>" alt="<?=$product->pro_name;?>">
                                </a>
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    <a href="<?= base_url($product->cate_alias.'/'.$product->pro_alias.'-c'.$product->cate_id.'p'.$product->pro_id) ?>" title="<?$product->pro_name;?>">
                                        <?=$product->pro_name;?>
                                    </a>
                                </div>
                                <div class="item-brand">Thương hiệu : <?=$product->fullname;?></div>
                                <div class="item-quantity">Số lượng : 10</div>
                            </div>
                        </div>
                        <div class="add-cart">
                            <a href="#" title="Đặt hàng"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Đặt hàng</a>
                        </div>
                    </div>
                <?php  }
                ?>



            </div>
            <?php
            echo $this->pagination->create_links(); // tạo link phân trang
            ?>
        </div>
        <div class="col-right col-md-3">
            <?php if(!empty($cate)){?>
            <div>
                <div class="brand_cat_name">
                    Danh mục
                </div>
                <ul class="brand_cat_right">
                    <?php

                    foreach($cate as $k=>$cat){
                        if($cat->parent_id==0){

                            ?>
                            <li>
                                <a href="<?=base_url($cat->alias.'-pc'.$cat->id)?>"><?=$cat->name;?></a>
                                <ul>
                                    <?php
                                    foreach($cate as $k2=>$cat2){
                                        if($cat->id==$cat2->parent_id){
                                            ?>
                                            <li><a href="<?=base_url($cat2->alias.'-pc'.$cat2->id)?>" title="<?=$cat2->name;?>"><?=$cat2->name;?></a> </li>
                                            <?php unset($cate[$k2]);
                                        }
                                    }?>
                                </ul>
                            </li>
                            <?php unset($cate[$k]);
                        }
                    }?>

                </ul>
            </div>
            <?php }?>

            <div class="promotion">
                <ul>
                    <li><a href="#"><img src="<?=base_url('assets/css/img/qc09.jpg')?>"></a> </li>
                    <li><a href="#"><img src="<?=base_url('assets/css/img/sp1.png')?>"></a> </li>
                    <li><a href="#"><img src="<?=base_url('assets/css/img/qc1.jpg')?>"></a> </li>
                    <li><a href="#"><img src="<?=base_url('assets/css/img/qc09.jpg')?>"></a> </li>
                    <li><a href="#"><img src="<?=base_url('assets/css/img/qccf.jpg')?>"></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>