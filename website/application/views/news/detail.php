<section id="body-page">
   <div class="single-layout" id="single-post">
      <article class="post-8914 post type-post status-publish format-standard has-post-thumbnail hentry " id="post-id-<?= $news->id?>">
         <?=@$this->load->widget('banner');?>   
         <div class="container">
            <div class="breadcrumb">
               <a href="<?=base_url()?>">Trang chủ</a> » 
               <span><a href="<?=base_url('danh-muc-tin/'.$cate_current->alias.'.html')?>"><?=$cate_current->name?></a> »
               <span class="breadcrumb_last" aria-current="page"><?= $news->title?>
            </div>
            <div class="content">
               <div class="post">
                  <div class="infor-post">
                     <div class="created-date"><?=date("d/m/Y",$news->time);?></div>
                     <h1 style="margin: 0;" class="title-post"><?= $news->title?></h1>
                  </div>
                  <main id="main-post">
                     <div class="detail-content">
                        <?=$news->description?>
                        <div id="toc_container" class="toc_white no_bullets">
                        </div>

                        <?=$news->content?>
                     </div>
                  </main>
               </div>
               
            </div>
         </div>
      </article>
   </div>

   <div class="category-page" id="list-all-post">
         <div class="body-category-page">
            <div class="container">
            <div class="newest-post">
                        <div class="section-title">
                           <h2>Cùng chuyên mục</h2>
                        </div>                                 
                     </div>
               <div class="list-all-post">
                     <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php if (count($new_same)) : ?>
                        <?php foreach ($new_same as $new) : ?>
                           <div class="swiper-slide">
                           <?=@$this->load->views('temp/news', $new);?>
                           </div>
                           <?php endforeach; ?>
                        <?php endif; ?>  
                        </div> 

                        <div class="custom-paginate">
                           <div class="swiper-button-next">
                           </div>
                           <div class="swiper-button-prev">
                           </div>
                        </div>
                     </div>  
               </div>
            </div>
         </div>
   </div>
</section>
