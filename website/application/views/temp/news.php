<div class="box-post">
    <div class="post-thumb">
        <a href="<?= base_url('new/'.$n->alias.'.html') ?>" class="img-thumb">
            <img width="2560" height="1440" src="<?= base_url($n->image) ?>" class="img-responsive responsive--full wp-post-image" alt="<?=($n->title); ?>" decoding="async" title="<?=($n->title); ?>" loading="lazy" data-lazy-srcset="<?= base_url($n->image) ?> 2560w, <?= base_url($n->image) ?> 300w, <?= base_url($n->image) ?> 1024w" data-lazy-sizes="(max-width: 2560px) 100vw, 2560px" data-lazy-src="<?= base_url($n->image) ?>" />
            <noscript><img width="2560" height="1440" src="" class="img-responsive responsive--full wp-post-image" alt="<?=($n->title); ?>" decoding="async" title="<?=($n->title); ?>" loading="lazy" srcset="<?= base_url($n->image) ?> 2560w, <?= base_url($n->image) ?> 300w, <?= base_url($n->image) ?> 1024w" sizes="(max-width: 2560px) 100vw, 2560px" /></noscript>
        </a>
        <div class="name-cate">
            <a href="category/bao-chi-va-su-kien.html">
            Báo chí &amp; Sự kiện													</a>
        </div>
    </div>
    <div class="post-infor">
        <div class="post-date">
            <img src="<?=base_url()?>assets/css/img/clock-2.svg" data-lazy-src="<?=base_url()?>assets/css/img/clock-2.svg" />
            <noscript><img src="h<?=base_url()?>assets/css/img/clock-2.svg" /></noscript>
            <?=date("d/m/Y",$n->time);?>
        </div>
        <div class="post-views">
            <img src="<?=base_url()?>assets/css/img/eye-2.svg" data-lazy-src="<?=base_url()?>assets/css/img/eye-2.svg" />
            <noscript><img src="<?=base_url()?>assets/css/img/eye-2.svg" /></noscript>
            <?= ($n->view); ?>
        </div>
    </div>
    <div class="title">
        <a href="<?= base_url('new/'.$n->alias.'.html') ?>"><?=($n->title); ?></a>
    </div>
    <div class="excerpt">
        <p><?=strip_tags(LimitString($n->description, 350, '...')); ?></p>
    </div>
</div>
