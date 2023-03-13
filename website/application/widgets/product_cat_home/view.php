<?php foreach($cate_home as $cat):?>
<section class="block-tax-item">
  <section class="block-tax-item-head">
    <h3 class="block-tax-item-title fleft tf"><?=$cat->name?></h3>
    <a class="block-tax-item-morelink fright" href="<?=base_url('danh-muc/'.$cat->alias)?>">Xem thêm</a>
  </section>
  <!-- end .block-tax-item-head -->
  <section class="block-tax-item-content">
    <?php foreach($cat->pro as  $pro):?>
    <section class="du-an-item fleft">
      <a class="du-an-item-thumb thumb-full item-thumbnail" href="<?= base_url('san-pham/'.$pro->alias . '.html') ?>">
        <img src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro->image) ?>" class="attachment-full size-full wp-post-image" alt="Saigon-Sports-City" title="<?= $pro->name; ?>" />
        <div class="thumbnail-hoverlay main-color-1-bg"></div>
        <div class='thumbnail-hoverlay-icon'><i class="fa fa-search"></i></div>
      </a>
      <!-- end .du-an-item-thumb -->
      <section class="du-an-item-info">
        <h2 class="du-an-item-title">
        <a href="<?= base_url('san-pham/'.$pro->alias . '.html') ?>"><?= $pro->name; ?></a>
        </h2>
        <!-- end .du-an-item-title -->
      </section>
      <!-- end .du-an-item-info -->
    </section>
    <!-- end .du-an-item -->
    <?php endforeach;?>
  <section class="cboth"></section>
  <!-- end .cboth -->
</section>
<!-- end .block-tax-item-content -->
</section>
<!-- end .block-tax-item -->
<?php endforeach;?>