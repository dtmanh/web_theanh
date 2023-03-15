<?php if(count($menu_root)) : ?>
<div class="container">
  <div class="about-app">
    <?=@$menu_root->description;?>
      <div class="list-about-app">
      <div id="drop-menu">
      <?php if(!empty($menu_root->menu_sub)): ?>
          <div class="row-drop-menu">
          <?php $i=0; foreach($menu_root->menu_sub as $menu_sub) : $i++; ?>
              <div class="col-drop-menu" id="<?=@$menu_sub->name;?>">
                  <div class="header">
                  <a href="<?=@$menu_sub->url;?>" class="name">
                  <?=@$menu_sub->name;?>                                        </a>
                  </div>
                  <?php if(!empty($menu_sub->menu_sub2)): ?>
                  <div class="list-drop">
                  <?php $j=0; foreach($menu_sub->menu_sub2 as $menu_sub2) : $j++; ?>
                  <a href="<?=@$menu_sub2->url;?>" class="drop">
                      <span class="icon">
                          <img src="<?=base_url($menu_sub2->image)?>" data-lazy-src="<?=base_url($menu_sub2->image)?>">
                          <noscript><img src="<?=base_url($menu_sub2->image)?>"></noscript>
                      </span>
                      <span class="name">
                      <?=@$menu_sub2->name;?></span>
                      <span class="infor">
                      <?=strip_tags(@$menu_sub2->description);?></span>
                  </a>
                  <?php endforeach;?>
                  </div>
                  <?php endif;?>
              </div>
              <?php endforeach;?>
             
          </div>
          <?php endif;?>
      </div>
      <div class="button-website text-center">
          <a href="javascript:void(0)" id="btn-registration">
              DÙNG THỬ MIỄN PHÍ NGAY
              <span>
                  <img src="<?=base_url()?>assets/css/images/Vector.svg" data-lazy-src="<?=base_url()?>assets/css/images/Vector.svg" />
                  <noscript><img src="<?=base_url()?>assets/css/images/Vector.svg" /></noscript>
              </span>
          </a>
      </div>
      </div>
  </div>
</div>
<?php endif;?>