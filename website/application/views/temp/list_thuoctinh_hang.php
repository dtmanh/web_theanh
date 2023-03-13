<?php if(count($dstt)) : ?>
    <?php foreach($dstt as $tt) : ?>
        <option value="<?=@$tt->id;?>" rel="<?=@$tt->name;?>"><?=@$tt->name;?></option>
    <?php endforeach;?>
<?php endif;?>