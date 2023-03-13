<?php if (count($cate_child)) : ?>
  <?php foreach ($cate_child as $cate) : ?>
    <option value="<?=$cate->id?>"><?=$cate->name?></option>
  <?php endforeach; ?>
<?php endif; ?>
