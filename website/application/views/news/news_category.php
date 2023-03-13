<section class="main-wrap">
   <section class="container">
      <section class="primary fleft">
         <section class="block-tax-item">
            <section class="block-breakcrumb">
               <span><span><a href="<?=base_url()?>">Home</a> » <span class="breadcrumb_last" aria-current="page"><?=@$cate_current->name?></span></span></span>
            </section>
            <!-- end .block-breakcrumb -->
            <section class="doi-tac-title tf">
            </section>
             <h1 class="single-title hidden"><?=@$cate_current->name?> </h1>
            <section class="block-tax-item-content">
             <?php if (count($list)) {
        foreach ($list as $key => $new) { ?>
               <section class="du-an-item fleft ">
                  <a class="du-an-item-thumb thumb-full item-thumbnail" href="<?= base_url('new/'.$new->alias.'.html')?>">
                     <img src="<?= base_url($new->image)?>" class="attachment-full size-full wp-post-image" alt="<?= $new->title?>" title="<?= $new->title?>">    
                     <div class="thumbnail-hoverlay main-color-1-bg"></div>
                     <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                  </a>
                  <!-- end .du-an-item-thumb -->
                  <section class="du-an-item-info">
                     <h2 class="du-an-item-title">
                        <a href="<?= base_url('new/'.$new->alias.'.html')?>" title="<?= $new->title?>"><?= $new->title?></a>
                     </h2>
                     <!-- end .du-an-item-title -->
                  </section>
                  <!-- end .du-an-item-info -->
               </section>
               <!-- end .du-an-item -->                
               <?php    }
        } ?>                             
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
