	<?php if(count($menu_bottom)) : ?>
		 <ul>
	<?php $i=0; foreach ($menu_bottom as $key_r => $mr) :  $i++;?>
	<li><a href="<?=base_url($mr->url);?>"><?=$mr->name;?></a></li>
	<?php endforeach;?>
	  </ul>
	<?php endif;?>



