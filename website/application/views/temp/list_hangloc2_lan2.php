<?php if(isset($tt_color)) : ?>
  <?php foreach($tt_color as $color) : ?> 
  <div class="choose-rv cat-lis">             
      <h3 style="margin-top: 0px;font-size: 12px;font-weight: 600;"> <?=@$color->name?></h3>
      <input type="hidden" name="cha[]" id="cha_<?=@$color->id;?>" value="<?=@$color->id;?>">
      <select name="id_cat_phu[]" id="id_cat_phu_<?=@$color->id;?>" class="form-control" style="width:95%;margin-left:20px">
         <option value="">Chưa lọc</option>
         <?php if(count($color->ttp_color)) : ?>
        <?php foreach($color->ttp_color as $ttpcolor) : ?>
        <option value="<?=@$ttpcolor->id;?>" ><?=@$ttpcolor->name;?></option>
      <?php endforeach;?>
      <?php endif;?>
      </select>
  </div>
  <?php endforeach;?>
  <?php endif;?>