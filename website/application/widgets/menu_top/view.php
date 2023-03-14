<?php if(count($menu_root)) : ?>           
<div id="menu-mobile">
    <div class="close-menu">
        <div id="close-menu-mobile">
            &times;
        </div>
        </div>
        <div class="menu">
        <ul>
            <?php $i=0; foreach ($menu_root as $key_r => $mr) : ?>
            <li class="has-child-<?=@$i;?>">
                <a class="<?= $mr->name?>"><?= $mr->name?><span>&#43;</span>
                </a>
                <?php if(!empty($mr->menu_sub)): ?>
                <div class="child-2">
                    <ul>
                        <?php $j=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
                        <li>
                            <a href="<?=base_url($menu_sub->url);?>"><?=@$menu_sub->name;?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endif;?>
            </li>
            <?php endforeach;?>
        </ul>
        </div>
        <div class="button-website mobile-button text-center">
        <a href="javascript:void(0)" id="btn-registration">
            Đăng ký dùng thử
            <span>
                <img src="<?=base_url()?>assets/css/images/Vector.svg" data-lazy-src="<?=base_url()?>assets/css/images/Vector.svg" />
                <noscript><img src="<?=base_url()?>assets/css/images/Vector.svg" /></noscript>
            </span>
        </a>
        </div>
    </div>            
    <?php endif;?>
