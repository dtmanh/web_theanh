<?php if (count($slides)) : ?>
<ul class="img-right">
  <?php foreach ($slides as $item) : ?>
    <li><a href="<?=$item->url?>"><img src="<?=base_url($item->image)?>" alt="<?=$item->title?>"></a></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>
