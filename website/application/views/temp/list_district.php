<option value="">Quận/Huyện</option>
<?php if(count($quanhuyen)) : ?>
    <?php foreach($quanhuyen as $dist) : ?>
        <option value="<?=@$dist->id;?>" rel="<?=@$dist->name;?>"><?=@$dist->name;?></option>
    <?php endforeach;?>
<?php endif;?>