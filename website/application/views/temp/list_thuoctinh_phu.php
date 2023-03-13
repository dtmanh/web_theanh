<?php if(count($dsttphu)) : ?>
    <?php foreach($dsttphu as $dsp) :?>
        <option  value="<?=@$dsp->id;?>" rel="<?=@$dsp->name;?>"><?=@$dsp->name;?></option>
    <?php endforeach;?>
<?php endif;?>