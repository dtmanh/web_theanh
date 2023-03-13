<div class="customer10">
           <div class="row">
                <div class="col-12">
                  <div class="section-title clearfix">
                    <h2 class="title_cus">Cảm nhận của khách hàng</h2>

                  </div>
                   
                      <div class="owl-carousel customer_view">
                         <?php foreach($ykcustomer as $cat) : ?>
                        <div class="item ">
                           <div class="testimonial">
                             <div class="desc_tes">
                              <div class="p-color-bg"><span class="ficon icofont-quote-left"></span></div>
                               <p class="text_des"> <?= strip_tags($cat->description,'<p>');?></p>
                             </div>
                             <div class="info_tes">
                                 <img src="<?=base_url($cat->image)?>" class="img-responsive" alt="<?=@$cat->name;?>">
                                
                               <div class="name_title">
                                 <h5><?=@$cat->name;?></h5>
                                 <p><?=@$cat->title;?></p>
                               </div>
                                <ul>
                               <li><i class="icofont-star"></i></li>
                               <li><i class="icofont-star"></i></li>
                               <li><i class="icofont-star"></i></li>
                               <li><i class="icofont-star"></i></li>
                               <li><i class="icofont-star"></i></li>
                            </ul>
                             </div>
                            
                           </div>
                        </div>
                        <?php endforeach;?>
                       
                       
                       
                      </div>
                    </div>
                  </div>
             </div>
        
       <script>
         $(function() {
            $(".customer_view").owlCarousel({
                items: 2,
                responsive: {
                    1200: { item: 2, },// breakpoint from 1200 up
                    992: { items: 2, },
                    768: { items: 2, },
                    480: { items: 1, },
                    0: { items: 1, }
                },
                rewind: false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 4500,
                smartSpeed: 1000, //slide speed smooth
                dots: false,
                dotsEach: false,
                loop: false,
                lazyLoad:false,
                nav: true,
                padding:10,
                navText: ['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
                animateOut: false, // default: false
                animateIn: false, // default: false
                center: false,
            });
        });
       </script>