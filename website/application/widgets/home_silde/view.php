<div class="slider-main-top">
	<?php if(count($slide_home)) : ?>
	<?php
	$a=0;
	foreach($slide_home as $slide) { $a++;?>
	<div class="item">
		<a href="<?=@$slide->url;?>" title="<?=@$slide->title;?>">
		<img src="<?=base_url(@$slide->link);?>" alt="<?=@$slide->title;?>">
		</a>
	</div>
	<?php }?>
	<?php endif;?>
</div>