<article id="body_home">
<section class="content_home">
    <div class="container">
        <div class="row_pc">
            <div class="row row_10">
                <div class="col-md-3 col-480-12 hidden-xs hidden-sm hidden-480  pdd_10">
                    <?=@$this->load->widget('home_left')?>
                </div>
                <div class="col-md-6 col-480-12 col-xs-12 pdd_10">
                   <div class="tit_mid clearfix">
                     <div class="pull-left">
                         <h2><a href=""><?= $cate_curent->name?></a></h2>
                     </div>
                    </div>
                    <div class="row row_7 imgRow">
          <?php if (count($lists)) : ?>
          <?php foreach ($lists as $pro) : ?>
           <div class="col-md-4 col-xs-6 col-480-12 pdd_7 ">
              <?=$this->load->views('temp/product',array('pro' => $pro)); ?>
           </div>
           <?php endforeach; ?>
           <?php endif; ?>
       </div>
                   <div class="clearfix"></div>
                      <div class="phantrang_prod">
                         <?php echo $this->pagination->create_links();?>
                      </div>
                </div>
                <div class="col-md-3  col-480-12 col-xs-12 pdd_10">
                    <?=@$this->load->widget('home_right')?>
                </div>
            </div>
            <div class="row visible-xs visible-sm visible-480">
                <div class="col-md-3  col-480-12   pdd_10">
                    <div class="content_left">
                       <?=@$this->load->widget('thuonghieu')?>
                       <?=@$this->load->widget('product_noibat')?>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
</article>

