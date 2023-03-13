<ul class="list-news " >
    <?php foreach ($lists as $pro) : ?>
    <li class="box-cat box-cat-news">
      <div class="box-list-news">
        <a href="<?=base_url($pro->pro_alias.'.html')?>" class="h_7401"><img src="<?=base_url("upload/img/products/".$pro->pro_dir."/".$pro->pro_image)?>" alt="<?=$pro->pro_name?>"></a>
        <div class="hot-news text-cat ">
          <h3><?=$pro->pro_name?></h3>
          <p class="price"><?php if ($pro->price_sale != 0) {echo number_format($pro->price_sale).' đ'; } else {echo 'Liên hệ';}?></p>
          <p class="user"><img src="<?=base_url()?>img/user.png" alt=""> <span>Hoài Anh</span> | <span><?=date('d/m/Y', $pro->time)?></span> | <span>Phường Giang Biên</span></p>
        </div>
      </div>
    </li>
    <?php endforeach ?>
</ul>
<div class="clearfix"></div>
<ul class="pagination phantrang-home">
    <?=@$phantrang?>
</ul>
