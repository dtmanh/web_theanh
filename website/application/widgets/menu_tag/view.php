
<?php if(count($menu_root)) : ?>
    <ul>
    <?php foreach ($menu_root as $key_r => $mr) : ?>
        <li class="khwtht">
            <a href="<?= $mr->url?>" title="<?= $mr->name?>">
            <img src="https://gtvseo.com/wp-content/uploads/2020/10/phone-68-64.png" alt="">
            <span><?= $mr->name?></span></a>
        </li>
            <?php endforeach;?>
    </ul>
<?php endif;?>                   
            