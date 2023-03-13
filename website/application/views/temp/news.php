<div class="item">
    <div class="box_news">
        <a href="<?= base_url('new/'.$n->alias.'.html') ?>" class="img_news h_63" title="<?= ($n->title); ?>"><img src="<?= base_url($n->image) ?>" alt="<?= ($n->title); ?>"/></a>
        <div class="sub_news">
            <h3 class="name_news"><a href="<?= base_url('new/'.$n->alias.'.html') ?>" title="<?= ($n->title); ?>"><?= ($n->title); ?></a></h3>
            <div class="comment">
                <span class="lich"><img src="<?= base_url('assets/css/img/lich.png')?>" alt=""><?=date("d/m/Y",$n->time);?></span>
                <span class="cmt"><img src="<?= base_url('assets/css/img/cmt.png')?>" alt="">0 commneet</span>
            </div>
            <div class="des_news">
                <?= LimitString($n->description, 100, '...'); ?>
                <a href="<?= base_url($n->alias.'.html') ?>">[...]</a>
            </div>
        </div>
    </div>
</div>