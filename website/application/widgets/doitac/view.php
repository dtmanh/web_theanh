<?php if($doitacs){?>
<section class="doi-tac">
            <section class="container">
               <section class="doi-tac-head">
                  <section class="doi-tac-title tf">
                     <span>Đối tác phát triển dự án</span>
                  </section>
                  <!-- end .doi-tac-title -->
<section class="doi-tac-des">
  <?=@$this->option->shipping?>
</section>
                  <!-- end .doi-tac-des -->
                  <section class="doi-tac-content">
                     <section class="doi-tac-btn doi-tac-btn-prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                     </section>
                     <!-- end .doi-tac-btn -->
                     <section class="doi-tac-btn doi-tac-btn-next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </section>
                     <!-- end .doi-tac-btn -->
                     <section class="doi-tac-wrap">
                        <ul>
                          <?php foreach($doitacs as $value):?>
                           <!-- end .doi-tac-item -->
                           <li class="doi-tac-item fleft">
                              <section class="doi-tac-item-thumb">
                                 <img src="<?=base_url($value->image)?>" alt="<?=$value->title?>"/>
                              </section>
                              <!-- end .doi-tac-item-thumb -->
                              <section class="doi-tac-item-title">
                                <?=$value->title?>                     
                              </section>
                              <!-- end .doi-tac-item-title -->
                           </li>
                           <!-- end .doi-tac-item -->
                            <?php endforeach;?>
                        </ul>
                     </section>
                     <!-- end .doi-tac-wrap -->
                     <script type="text/javascript">
                        $(document).ready(function() {
                            var owl_doi_tac = $(".doi-tac-wrap ul");
                            owl_doi_tac.owlCarousel({
                                autoPlay: true,
                                items : 6,
                                itemsDesktop : [1366,6],
                                itemsDesktopSmall : [1190,5],
                                itemsTablet: [870,3],
                                itemsTabletSmall: false,
                                itemsMobile : [540,2],
                                singleItem : false,
                            });
                            $(".doi-tac-btn-prev").click(function(){
                                owl_doi_tac.trigger('owl.prev');
                            });
                            $(".doi-tac-btn-next").click(function(){
                                owl_doi_tac.trigger('owl.next');
                                item: 1
                            });
                        });
                     </script>
                  </section>
                  <!-- end .doi-tac-content -->
               </section>
               <!-- end .doi-tac-head -->
            </section>
            <!-- end .container -->
         </section>
<?php } ?>
