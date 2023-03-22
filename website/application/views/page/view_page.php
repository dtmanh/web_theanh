<section id="body-page">
    <div class="support-page">
    <?=@$this->load->widget('banner');?>   	
   <div class="section-full-width">
      <div class="bgr-banner" style="background: #f7f9fa;">
         <div class="container">
               <div class="body-support">
                  <div class="bread-crumb">
                     <ul>
                           <li>
                              <a href="<?=base_url()?>">Trang chủ <span>›</span></a>
                           </li>
                           <li>
                              <a class="active" href="<?=base_url($page->alias.'.html')?>"><?= $page->name?></a>
                           </li>
                     </ul>
                  </div>
                 <div class="main-content" style="width: 100%;">
                    <article id="post-support">
                        <h1 class="title-post"><?= $page->name?></h1>
                        <div class="excerpt-post"><?= $page->description?> </div>
                        <div class="content">
                        <?= $page->content?>
                        </div>
                    </article>
                  </div>
               </div>
            </div>
         </div>
      </div>   
   </div>
</section>