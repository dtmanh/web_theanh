<section id="body-page">
   <div class="single-layout" id="single-post">
      <article class="post-8914 post type-post status-publish format-standard has-post-thumbnail hentry " id="post-id-<?= $page->id?>">
         <?=@$this->load->widget('banner');?>   
         <div class="container">
            <div class="breadcrumb">
               <a href="<?=base_url()?>">Trang chủ</a> » 
              <?= $page->name?>
            </div>
            <div class="content">
               <div class="post">
                  <div class="infor-post">
                     <div class="created-date"><?=date("d/m/Y",$page->time);?></div>
                     <h1 style="margin: 0;" class="title-post"><?= $page->name?></h1>
                  </div>
                  <main id="main-post">
                     <div class="detail-content">
                        <?= $page->content?>
                     </div>
                  </main>
               </div>
               
            </div>
         </div>
      </article>
   </div>
</section>
