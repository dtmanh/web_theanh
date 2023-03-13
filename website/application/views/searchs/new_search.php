<main>
  <div class="container">
    <div class="row_pc">
      <ul class="back_link">
        <li><a href="<?=base_url()?>">Trang chủ </a></li>
        <li class="active"><a href="">Kết quả tìm kiếm</a></li>
      </ul>
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <h1 class="title-page"><span>Kết quả tìm kiếm</span></h1>
          <div class="newsBlock__list">
            <?php if (count($lists)) {
        foreach ($lists as $key => $new) { ?>
            <div class="newsBlock__item clearfix">
              <a href="<?= base_url('new/'.$new->alias.'.html')?>" class="newsBlock__img"><img src="<?= base_url($new->image)?>" alt="<?= $new->title?>"></a>
              <div class="newsBlock__text">
                <h3 class="newsBlock__name"><a href="<?= base_url('new/'.$new->alias.'.html')?>"><?= $new->title?></a></h3>
                <div class="newsBlock__des">
                   <?= LimitString(strip_tags($new->description), 150, '...'); ?>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="newsBlock__icon">
                <span><i class="fa fa-calendar"></i><?=date('d/m/Y', $new->time)?></span>
                <span><i class="fa fa-user"></i>By <a href="">admin</a></span>
              </div>
            </div>
            <?php    }
        } ?>
          </div>
          <div class="phantrang_prod">
              <?php echo $this->pagination->create_links();?>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <!-- side bar -->
           <?=@$this->load->widget('home_right')?>
          <!-- /side bar -->
        </div>
      </div>

    </div>
  </div>
</main>

