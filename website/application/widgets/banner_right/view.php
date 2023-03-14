<?php if (count($slides)) : ?>
<ul class="img-right">
  <?php foreach ($slides as $item) : ?>
   <a class="link-white" target="_blank" href="<?=$item->url?>"><img class="store-badge" data-src="<?=base_url($item->image)?>" loading="lazy" src="<?=base_url($item->image)?>" alt="<?=$item->title?>"></a>
  <?php endforeach; ?>
</ul>
<?php endif; ?>