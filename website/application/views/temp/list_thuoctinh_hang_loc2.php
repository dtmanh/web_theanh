<div class="choose-rv cat-lis">
	<select name="id_thuoctinh_loc2" id="id_thuoctinh_loc2" class="form-control" style="width:95%;margin-left:20px">
		<option value="0" rel="">Tất cả </option>
		<?php if(count($dstt)) : ?>
		<?php foreach($dstt as $tt) : ?>
		<option value="<?=@$tt->id;?>" rel="<?=@$tt->name;?>"><?=@$tt->name;?></option>
		<?php endforeach;?>
		<?php endif;?>
	</select>
</div>