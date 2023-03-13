<?php

 <!-- end .doi-tac -->
         <footer class="footer">
            <section class="container">
               <section class="footer-content-left fleft">
                  <section class="footer-title tf">
                    <?=@$this->option->slogan;?>
                  </section>
                  <!-- end .footer-title -->
                  <section class="footer-address">
                     <p style="padding-left: 30px"><a href="<?=base_url()?>"><img class="aligncenter size-full wp-image-692" src="<?=@base_url($this->option->site_logo_footer)?>" alt="<?=@$this->option->site_title?>" width="300" height="137" /></a><strong>Hotline Tư Vấn 24/7: <span style="color: #01BDC8"><a style="color: #01BDC8" href="tel://<?=@$this->option->hotline1;?>"><?=@$this->option->hotline1;?></a></span></strong></p>
                     <p style="text-align: left;padding-left: 30px"><strong>Email: <a href="mailto:<?=@$this->option->site_email;?>"><span style="color: #01BDC8"><?=@$this->option->site_email;?></span></a></strong></p>
                     <p style="text-align: left;padding-left: 30px"><strong>Website: <span style="color: #01BDC8"><a style="color: #01BDC8" href="index.html" target="_blank" rel="noopener"><?=@$this->option->domain;?></a></span></strong></p>
                  </section>
                  <!-- end .footer-address -->
               </section>
               <!-- end .footer-content -->
               <section class="footer-content-right fright">
                <?=$this->load->widget('fanpage');?>
                  <!-- end .footer-fanpage -->
               </section>
               <!-- end .footer-content-right -->
               <section class="cboth"></section>
               <!-- end .cboth -->
            </section>
            <!-- end .container -->
         </footer>
         <!-- end .footer -->
      </section>
      <!-- end .wrapper -->
      <div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
         <a href="tel:<?=@$this->option->hotline1;?>" class="info topopup btn">
            <div class="quick-alo-ph-circle"></div>
            <div class="quick-alo-ph-circle-fill"></div>
            <div class="quick-alo-ph-img-circle"></div>
         </a>
         <section class="call-hotline">
          <?=@$this->option->hotline1;?>
         </section>
         <!-- end .box-support -->
      </div>

      <script type='text/javascript'>
    /* <![CDATA[ */
    var fixedtocOption = {"showAdminbar":"","inOutEffect":"zoom","isNestedList":"1","isColExpList":"1","showColExpIcon":"1","isAccordionList":"","isQuickMin":"1","isEscMin":"1","isEnterMax":"1","fixedMenu":"","scrollOffset":"10","fixedOffsetX":"10","fixedOffsetY":"0","fixedPosition":"middle-right","contentsFixedHeight":"","inPost":"1","contentsFloatInPost":"right","contentsWidthInPost":"250","contentsHeightInPost":"","inWidget":"","fixedWidget":"","triggerBorder":"thin","contentsBorder":"medium","triggerSize":"50","debug":"0","contentsColexpInit":""};
    /* ]]> */
 </script>
      <script type='text/javascript' src='<?=base_url()?>assets/js/front_end/scripts.js'></script>
      <script type='text/javascript' src='<?=base_url()?>assets/js/front_end/ftoc.min.js'></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/owl.carousel.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/fixed.js"></script>




   </body>
</html>
<!-- end footer -->
<?php if($this->option->status==1):?>
<style type="text/css">
  body{
    <?php if($this->option->mamau==1):?>
    <?php if($this->option->color!=''):?>
    background: <?=$this->option->color?>;
  <?php endif;?>
  <?php endif;?>
  <?php if($this->option->fontchu!=''):?>
    font-family: <?=$this->option->fontchu?>;
    <?php endif;?>
  }
  h1{
    <?php if($this->option->h1fchu!=''):?>
    font-family: <?=$this->option->h1fchu?>;
    <?php endif;?>
     <?php if($this->option->h1size!=''):?>
    font-size: <?=$this->option->h1size?>;
    <?php endif;?>
  }
</style>
<?php endif;?>
<?php if($this->config_hotline){?>
<?=$this->load->view('temp/hotline');?><?php } ?>
<?php if(is_array($this->config_chatfanpage)){?>
<?=$this->load->view('temp/chat_fanpage');?><?php } ?>
<div id="show_success_mss" style="position: fixed; top: 40px; right: 20px;z-index:9999;">
    <?php if($this->session->flashdata('message')): ?>
    <div class="alert alert-<?=$this->session->flashdata('message')['type'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-<?=$this->session->flashdata('message')['type'] ?>"></i><?=$this->session->flashdata('message')['msg']?>
    </div>
    <?php endif; ?>
</div>
<link href="<?= base_url()?>assets/plugin/ValidationEngine/css/validationEngine.jquery.css" rel="stylesheet"/>


<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine.js"></script>
<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js"
            charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.validate ').validationEngine();
    });
     setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 9000);
</script>
</body>
</html>
