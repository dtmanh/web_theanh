<div class="danhmuc5">
  <div class="sidebar">
    <div class="block_title">
       <h2 class="title_sidebar">DANH MỤC SẢN PHẨM</h2>
    </div>
    <ul class="menu-aside">
      <?php foreach($cate_all as $cat):?>
      <li class="<?php if($cat->cat_sub){?>has-dropdown <?php } ?>"><a href="<?=@base_url('danh-muc')?>/<?=@$cat->alias?>.html" title="<?=@$cat->name?>"><i class="icofont-simple-right"></i> <span><?=@$cat->name?></span></a>
        <?php if($cat->cat_sub){?>
        <ul class="nav-dropdown">
          <?php foreach($cat->cat_sub as $catsub):?>
            <li><a href="<?=@base_url('danh-muc')?>/<?=@$catsub->alias?>.html" title="<?=@$catsub->name?>"><i class="icofont-double-right"></i><?=@$catsub->name?></a></li>
           <?php endforeach;?>
        </ul>
        <?php } ?>
      </li>
    <?php endforeach;?>
    </ul>
  </div>
  <!-- /menu dọc -->
</div>