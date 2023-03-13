
 <!-- sc tab home -->
  <?php if (isset($cate_all)) : ?>
      <?php $i=0; foreach($cate_all as $cat): $i++; ?>
      <div class="klwcn-grid clearfix type1 r<?=@$i?>">
          <div class="klwcng-catmenu clearfix">
              <h2 class="klwcngc-name">
                  <a href="<?= base_url('danh-muc-tin/'.$cat->alias.'.html') ?>" title="<?=$cat->name?>"><?=$cat->name?></a>
              </h2>
              <!-- submenu -->
              <ul class="list-klwcngc">
              </ul>
          </div>
            <?php if (isset($cat->news)) : ?>
          <?php $j=0; foreach ($cat->news as $n) : $j++; ?>
          <div class="klwcng-left" style="height: 387px;">
              <a href="<?= base_url($n->alias.'.html') ?>" type="0" class="klwcngl-thumb" title="<?=$n->title?>" rel="" init-sapo-type="" init-sapo-value="">
                  <img src="<?= base_url($n->image) ?>" alt="<?=$n->title?>" class="" data-original="<?= base_url($n->image) ?>" style="display: block;">
              </a>
              <h3 class="klwcngl-title">
                  <a href="<?= base_url($n->alias.'.html') ?>" title="<?=$n->title?>">
                      <?=$n->title?>
                  </a>
              </h3>
              <p class="klwcngl-sapo"><?= strip_tags(LimitString($n->description, 600, '...')); ?></p>
          </div>
          <?php if($j==1){ break; } endforeach;?>
          <div class="clearfix mt-20">
              <ul class="list-klwcngrn">
            <?php $j=0; foreach ($cat->news as $n) : $j++; ?>
                <?php if($j>1){?>
                  <li class="klwcngrn clearfix">
                      <h4 class="klwcngrn-title">
                          <a href="<?= base_url($n->alias.'.html') ?>" title="<?=$n->title?>"><?= strip_tags(LimitString($n->title, 100, '...')); ?></a>
                      </h4>
                  </li>
                <?php } endforeach;?>
              </ul>
          </div>
         <?php endif; ?>
      </div>
      <!-- End .klwcn-grid -->
      <?php if($i==2){ $i=0;} endforeach;?>
  <style>
     .list-klwcngrn .klwcngrn{
         height: auto;
         padding: 6px 0px;
     }
     .klwcngrn-title a{
         font-weight: bold;
     }
     .klw-category-news{
         padding:25px 0px;
     }
  </style>
  <?php endif; ?>