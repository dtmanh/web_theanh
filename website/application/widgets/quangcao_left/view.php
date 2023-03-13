
	<?php foreach($slides as $slide) :  ?>
	<div class="box-banner-left">
		<a href="<?=base_url(@$slide->url)?>"><img class="w_100" src="<?=base_url(@$slide->image)?>" alt="<?=$slide->title?>"/></a>
		<div class="clearfix clearfix-20"></div>
	</div>
	<?php endforeach;?>  