<section class="main-wrap">
   <section class="container">
      <section class="primary fleft">
         <section class="block-tax-item">
            <section class="block-breakcrumb">
               <span><span><a href="<?=base_url()?>">Trang chủ</a> » <span><a href="<?=base_url('danh-muc-tin/'.$cate_current->alias.'.html')?>"><?=$cate_current->name?></a> » <span class="breadcrumb_last" aria-current="page"><?= $news->title?></span></span></span></span>                
            </section>
            <!-- end .block-breakcrumb -->
            <section class="block-tax-item-content">
               <h1 class="single-title">
                 <?= $news->title?>       
               </h1>
               <!-- end .single-title -->
               <section class="single-content-wrap single-content">
                   <?=$news->content?>
               </section>
               <!-- end .single-content-wrap -->
               <section class="single-share">
                  
               </section>
               <!-- end .single-share -->
              
               <!-- end .single-tag -->
               <?=@$this->load->widget('content');?>
               <section class="single-comment">
                  <section class="single-head tf">
                     <span>Bình luận</span>
                  </section>
                  <!-- end .single-head -->
                  <section class="single-comment-content">                
                   <div class="fb-comments" data-href="<?= base_url('new/'.$news->alias.'.html') ?>" data-width="100%"
     data-numposts="10"
     data-colorscheme="light">
</div>
                  </section>
                  <!-- end .single-comment-content -->
               </section>
               <!-- end .single-comment -->
               <section class="single-related">
                  <section class="single-head tf">
                     <span>Bài viết liên quan</span>
                  </section>
                  <!-- end .single-head -->
                  <section class="single-related-content">
                     <ul>
                        <?php if (count($new_same)) : ?>
                        <?php foreach ($new_same as $new) : ?>
                        <li class="post1-item-list">
                           <a href="<?=base_url('new/'.$new->alias.'.html')?>"><i class="fa fa-caret-right" aria-hidden="true"></i><?=$new->title?></a>
                        </li>
                       <?php endforeach; ?>
                        <?php endif; ?>
                     </ul>
                  </section>
                  <!-- end .single-related-content -->
               </section>
               <!-- end .single-related -->
            </section>
            <!-- end .block-tax-item-content -->
         </section>
         <!-- end .block-tax-item -->
      </section>
      <!-- end .primary --> 
      <section class="cboth"></section>
      <!-- end .cboth -->
   </section>
   <!-- end .container --> 
</section>
<?=@$this->load->widget('doitac');?>