
<?php if(count($menu_root)) : ?>
                    <?php foreach ($menu_root as $key_r => $mr) : ?>
                    <li class="khwtht">
                        <a href="<?= $mr->url?>" title="<?= $mr->name?>"><?= $mr->name?></a>
                    </li>
                        <?php endforeach;?>
                    <?php endif;?>

            