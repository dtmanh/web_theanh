<div class="clearfix" data-marked-zoneid="kenh14_home_b1">
    <?php $i=0;  foreach($news as $n) : $i++;?>
    <div class="klwfn-left fl" rel="wrapt-newstype">
        <a href="<?= base_url($n->alias.'.html') ?>"
           title="<?= ($n->title); ?>"
           type="25" class="klwfnl-thumb pos-rlt" rel="" init-sapo-type=""
           init-sapo-value="">
            <img src="<?= base_url($n->image) ?>"
                 alt="<?= ($n->title); ?>">
            <div class="label-news label-bigstory"></div>
        </a>
        <h2 class="klwfnl-title">
            <a href="<?= base_url($n->alias.'.html') ?>"
               title="<?= ($n->title); ?>"><?= ($n->title); ?></a>
        </h2>
        <p class="klwfnl-sapo"><?= LimitString($n->description, 400, '...'); ?></p>
    </div>
    <?php if($i==1){ break; } endforeach;?>
    <?php $i=0;  foreach($news as $n) : $i++;?>
    <?php if($i==2){?>
    <div class="klwfn-right fr" rel="wrapt-newstype">
        <a href="<?= base_url($n->alias.'.html') ?>"
           title="<?= ($n->title); ?>"
           type="0" class="klwfnr-thumb" rel="" init-sapo-type="" init-sapo-value="">
            <img src="<?= base_url($n->image) ?>"
                 alt="<?= ($n->title); ?>">
        </a>
        <h2 class="klwfnr-title">
            <a href="<?= base_url($n->alias.'.html') ?>"
               title="<?= ($n->title); ?>"><?= ($n->title); ?></a>
        </h2>
    </div>
    <?php  break; } endforeach;?>
</div>

                            

                     