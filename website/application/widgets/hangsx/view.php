<h2 class="title_top_1"><span>Hãng máy bơm</span></h2>
	<div class="name_content_top">
		<ul class="ul_name_mbn">
			<?php foreach($hangsx as $dichvu) :  ?>
			<li><a href="<?=base_url(@$dichvu->alias)?>" title=<?=@$dichvu->name;?>"><?=@$dichvu->name;?></a></li>
			 <?php endforeach;?>
		</ul>
	</div>	