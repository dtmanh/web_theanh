<?php if(count($dshang)) : ?>
    <?php $i=0; foreach($dshang as $ha) : $i++;?>
        <option <?php if($i==1){ echo'seleted'; } ?> value="<?=@$ha->id;?>" rel="<?=@$ha->name;?>"><?=@$ha->name;?></option>
    <?php endforeach;?>
<?php endif;?>