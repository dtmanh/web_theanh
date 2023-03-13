<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 col-480-12">
    <div class="box_prod_home">
         <a href="<?= base_url('san-pham/'.$pro->alias.'.html') ?>" class="img_prod h_1"><img class="w_100" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt="<?= $pro->name; ?>"></a>
        <div class="sub_prod">
            <h3 class="name_prod"><a href="<?= base_url('san-pham/'.$pro->alias.'.html') ?>"><?= $pro->name; ?></a></h3>
            <div class="price"><?php if(!empty($pro->price_sale)) : ?>
            <?=number_format($pro->price_sale);?>  VNĐ
            <?php else : ?><?=lang('contact');?>
            <?php endif;?>
            </div>
            <div class="buy">
				<input name="txtQty" autofocus="autofocus" id="txtQty" autocomplete="off" type="hidden" min="1" max="9999" class="inpt-qty" required="" value="1">
                <a href="javascript:;" data-toggle="modal" onclick="add_To_Cart(<?=$pro->id; ?>)" class="hvr-overline-from-center"><img src="<?= base_url('assets/css/img/gio.png')?>" alt="">ĐẶT HÀNG</a>
            </div>
        </div>
    </div>
</div>
