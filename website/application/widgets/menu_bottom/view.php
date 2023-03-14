	<?php if(count($menu_bottom)) : ?>
	<?php $i=0; foreach ($menu_bottom as $key_r => $mr) :  $i++;?>
	<div class="list-menu">
		<div class="menu-top">
			<div class="footer-title"> <?=$mr->name;?></div>
			<?php if(!empty($mr->menu_sub)): ?>
			<ul>
				<?php $i=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
				<li class="page_item page-item-<?=$i;?>">
					<a href="<?=base_url($menu_sub->url);?>"><?=@$menu_sub->name;?></a>
				</li>
				<?php endforeach;?>
			</ul>
			<?php endif;?>
		</div>
	</div>
	<?php endforeach;?>
	<?php endif;?>



