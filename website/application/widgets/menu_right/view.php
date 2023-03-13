<ul>
	<?php if(count($menu_root)) : ?>
	<?php foreach ($menu_root as $key_r => $mr) : ?>
	<li class="page_item page-item-734 current_page_item">
		<a href="<?=base_url($mr->url);?>"><?=$mr->name;?></a>
		<?php if(!empty($mr->menu_sub)): ?>
		<ul class='children'>
			<?php $i=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
			<li class="page_item page-item-<?=$i;?>">
				<a href="<?=base_url($menu_sub->url);?>"><?=@$menu_sub->name;?></a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</li>
	<?php endforeach;?>
	<?php endif;?>
</ul>
			 