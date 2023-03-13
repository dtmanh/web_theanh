<?php $i=0;  foreach($news as $n) : $i++;?>
    <li class="knswli need-get-value-facebook clearfix  done-get-type done-get-sticker"
        rel="wrapt-newstype">
        <div class="knswli-left fl">
            <a href="<?= base_url($n->alias.'.html') ?>"
               style="background-image:url(<?= base_url($n->image) ?>)"
               class="kscliw-ava" title="" newsid="<?= ($n->id); ?>" newstype="0"
               rel="newstype " init-sapo-type="" init-sapo-value="">
            </a>
        </div>
        <div class="knswli-right">
            <h3 class="knswli-title">
                <a href="<?= base_url($n->alias.'.html') ?>"
                   title="" newsid="<?= ($n->id); ?>" data-sticker=""
                   data-stickerurl="" newstype="0" type="0"
                   rel="<?= base_url($n->alias.'.html') ?>">
                    <?= ($n->title); ?>
                </a>
            </h3>
            <div class="knswli-meta">
                <a href="<?= base_url('danh-muc-tin/'.$n->category_alias.'.html') ?>" class="knswli-category"><?= ($n->category_name); ?></a> -
                <span class="knswli-time" title="<?=date("d/m/Y",$n->time);?>"
                      data-second="<?=date("d/m/Y",$n->time);?>"><?=date("d/m/Y",$n->time);?></span>
            </div>
            <span class="knswli-sapo sapo-need-trim"><?= LimitString($n->description, 400, '...'); ?></span>
        </div>
    </li>
    <?php if($i==10){ break; } endforeach;?>