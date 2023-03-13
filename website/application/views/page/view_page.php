<section class="main-wrap">
   <section class="container">
      <section class="primary fleft">
         <section class="block-tax-item">
            <section class="block-breakcrumb">
               <span><span><a href="<?=base_url()?>">Trang chủ</a> » <span><span class="breadcrumb_last" aria-current="page"><?= $page->name?></span></span></span></span>                
            </section>
            <!-- end .block-breakcrumb -->
            <section class="block-tax-item-content">
               <h1 class="single-title">
                 <?= $page->name?>      
               </h1>
               <!-- end .single-title -->
               <section class="single-content-wrap single-content">
                  <?= $page->content?>
               </section>
               <!-- end .single-content-wrap -->
               <section class="single-share">
                  
               </section>
               <!-- end .single-share -->
              
               <!-- end .single-tag -->
               <?=@$this->load->widget('content');?>              
               <!-- end .single-comment -->
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