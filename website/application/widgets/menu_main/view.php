<?php if(count($menu_root)) : ?>
<ul class="main-menu">
<?php foreach ($menu_root as $key_r => $mr) : ?>
    <li class="item-menu <?php if(!empty($mr->menu_sub)): ?>has-sub-menu<?php endif;?>">
        <a href="<?=base_url($mr->url);?>"><?=@$mr->name;?></a>
        <?php if(!empty($mr->menu_sub)): ?>
        <img class="active-arrow" src="<?=base_url()?>assets/css/img/arrow.svg" data-lazy-src="<?=base_url()?>assets/css/img/arrow.svg"/>
        <ul id="sub-main-menu" class="active-submenu">
        <?php $j=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
            <li>
                <a href="<?=base_url($menu_sub->url);?>"><?=@$menu_sub->name;?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <?php endif;?>
    </li>
    <?php endforeach;?>
</ul>
<?php endif;?>