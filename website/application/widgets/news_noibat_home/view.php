<div class="clearfix" data-marked-zoneid="kenh14_home_b1">
    <?php $i=0;  foreach($news as $n) : $i++;?>
    <div class="klwfn-left fl" rel="wrapt-newstype">
        <a href="<?= base_url($n->alias.'.html') ?>"
           title="<?= ($n->title); ?>"
           type="25" class="klwfnl-thumb pos-rlt" rel="" init-sapo-type=""
           init-sapo-value="">
            <img src="<?= base_url($n->image) ?>"
                 alt="<?= ($n->title); ?>">
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
            <a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>"><?= ($n->title); ?></a>
        </h2>
    </div>
    <?php  break; } endforeach;?>
</div>

<div class="klwfn-slide-wrapper swiper-container-horizontal" data-marked-zoneid="kenh14_home_b2">
      <ul class="list-klwfnswn swiper-wrapper clearfix">
        <?php $i=0;  foreach($news as $n) : $i++;?>
       <?php if($i>=3){?>
          <li class="klwfnswn swiper-slide swiper-slide-active" rel="wrapt-newstype">
              <a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>"
                 type="25" class="klwfnswn-thumb pos-rlt" rel="newstype  "
                 init-sapo-type="2" init-sapo-value="">
                  <img src="<?= base_url($n->image) ?>" alt="<?= ($n->title); ?>">
              </a>
              <h4 class="klwfnswn-title">
                  <a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>"><?= ($n->title); ?></a>
              </h4>
          </li>
        <?php  } endforeach;?>
      </ul>

      <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
          <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span
              class="swiper-pagination-bullet"></span><span
              class="swiper-pagination-bullet"></span><span
              class="swiper-pagination-bullet"></span></div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev swiper-button-disabled"></div>
  </div>

                            

                     