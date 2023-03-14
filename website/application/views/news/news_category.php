<section id="body-page">
   <div class="category-page" id="blog-page">
      <div class="section-full-width">
         <div class="body-category-page">
            <div class="container">
               <div class="section-title">
                  <h2><?=@$cate_current->name?></h2>
               </div>
               <div class="section-sub-title">
                  <h3>Chuyên mục blog tổng hợp đầy đủ các kiến thức, kinh nghiệm, kỹ năng giúp bạn nâng cao khả năng SEO tổng thể cũng như thực hiện hiệu quả các chiến lược Marketing trực tuyến của mình. </h3>
               </div>
               <section class="block-breakcrumb">
                  <span><span><a href="<?=base_url()?>">Home</a> » <span class="breadcrumb_last" aria-current="page"><?=@$cate_current->name?></span></span></span>
               </section>
               <?=@$this->load->widget('news_feature');?>
               
               <div class="list-all-post">
                  <div class="section-list-col-3 section-list-col-4">
                  <?php if (count($list)) {
                  foreach ($list as $key => $new) { ?>
                     <?=@$this->load->views('temp/news', $new);?>
                     <?php } } ?>                          
                  </div>
                  <div class="text-center" id="pagination">
                     <?php echo $this->pagination->create_links();?>   
                  </div>
               </div>
               <div class="row-blog-page">
                  <div class="col-left custom-col-full">
                  <?=@$this->load->widget('news_nb');?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>