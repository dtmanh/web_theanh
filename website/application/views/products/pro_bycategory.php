<section class="main-wrap">
   <section class="container">
      <section class="primary fleft">
         <section class="block-tax-item">
            <section class="block-breakcrumb">
               <span><span><a href="<?=base_url()?>">Home</a> » <span class="breadcrumb_last" aria-current="page"><?=@$cate_curent->name?></span></span></span>
            </section>
            <!-- end .block-breakcrumb -->
            <section class="doi-tac-title tf">
            </section>
             <h1 class="single-title hidden"><?=@$cate_curent->name?> </h1>
            <section class="block-tax-item-content">             
              <?php foreach($lists as  $pro):?>
               <section class="du-an-item fleft ">
                  <a class="du-an-item-thumb thumb-full item-thumbnail" href="<?= base_url('san-pham/'.$pro->alias . '.html') ?>">
                     <img src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro->image) ?>" class="attachment-full size-full wp-post-image" alt="<?= $pro->name; ?>" title="<?= $pro->name; ?>">    
                     <div class="thumbnail-hoverlay main-color-1-bg"></div>
                     <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                  </a>
                  <!-- end .du-an-item-thumb -->
                  <section class="du-an-item-info">
                     <h2 class="du-an-item-title">
                        <a href="<?= base_url('san-pham/'.$pro->alias . '.html') ?>"><?= $pro->name; ?></a>
                     </h2>
                     <!-- end .du-an-item-title -->
                  </section>
                  <!-- end .du-an-item-info -->
               </section>
               <!-- end .du-an-item -->                
               <?php endforeach;?>                                
               <section class="cboth"></section>
               <!-- end .cboth -->
            </section>
            <!-- end .block-tax-item-content -->
         </section>
         <!-- end .block-tax-item -->
         <section class="pagination">
            <?php echo $this->pagination->create_links();?>   
         </section>
         <!-- end .pagination -->
      </section>
      <!-- end .primary -->     
      <section class="cboth"></section>
      <!-- end .cboth -->
   </section>
   <!-- end .container -->
</section>
<?=@$this->load->widget('doitac');?>