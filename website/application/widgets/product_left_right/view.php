<div class="timely">
                <div class="title-group"><h2>Khuyến mãi</h2></div>
                <div class="owl-carousel slider-km">
                  <div class="item">
                      <a href="" class="pro_img">
                        <img src="img/21_large.jpg" alt="">
                      </a>
                      <script>
                        $(document).ready(function(){
                          var endDate_2019 = "2019-07-20T00:00:00";
                          $('.show-count-down').countdown({
                            date: endDate_2019,
                            render: function(data) {
                              $(this.el).html('<div class="day box-time-date"><span class="time-num time-day">' + this.leadingZeros(data.days, 2) + '</span>Ngày</div><div class="hour box-time-date"><span class="time-num">' + this.leadingZeros(data.hours, 2) + '</span>Giờ</div><div class="min box-time-date"><span class="time-num">' + this.leadingZeros(data.min, 2) + '</span>Phút</div><div class="sec box-time-date"><span class="time-num">' + this.leadingZeros(data.sec, 2) + '</span>Giây</div>');
                            }   
                          });
                        })
                      </script>
                      <div class="box-timer">
                        <div class="countbox_1 show-count-down">
                        </div>
                      </div>
                   
                      <h2 class="pro_name">
                        <a href="" class="title">Điện thoại Lenovo A7000 Plus1</a>
                      </h2>
                      <div class="price">
                        <span class="price-sale">3,900,000₫</span>
                        <span class="price-old">4,200,000₫</span>
                      </div>
                  </div>
                  <div class="item">
                      <a href="" class="pro_img">
                        <img src="img/21_large.jpg" alt="">
                      </a>
                      <script>
                        $(document).ready(function(){
                          var endDate_2012 = "2019-07-20T00:00:00";
                          $('.show-count-down').countdown({
                            date: endDate_2012,
                            render: function(data) {
                              $(this.el).html('<div class="day box-time-date"><span class="time-num time-day">' + this.leadingZeros(data.days, 2) + '</span>Ngày</div><div class="hour box-time-date"><span class="time-num">' + this.leadingZeros(data.hours, 2) + '</span>Giờ</div><div class="min box-time-date"><span class="time-num">' + this.leadingZeros(data.min, 2) + '</span>Phút</div><div class="sec box-time-date"><span class="time-num">' + this.leadingZeros(data.sec, 2) + '</span>Giây</div>');
                            }   
                          });
                        })
                      </script>
                      <div class="box-timer">
                        <div class="countbox_1 show-count-down">
                        </div>
                      </div>
                   
                      <h2 class="pro_name">
                        <a href="" class="title">Điện thoại Lenovo A7000 Plus</a>
                      </h2>
                      <div class="price">
                        <span class="price-sale">3,900,000₫</span>
                        <span class="price-old">4,200,000₫</span>
                      </div>
                  </div>
                   
                </div>
                
              </div>
              <div class="time_le">
                <div class="title-group2"><h2>Sản phẩm hot</h2></div>
                <div class="spmoi">
                  <div class="owl-carousel slider-km">
                  <div class="item">
                    <div class="first_botom">
                           <a href="" class="por_img">
                             <img src="img/21_large.jpg" alt="">
                           </a>
                         <div class="desc-contei">
                           <h3 class="pro_name">
                             <a href="">Điện thoại Lenovo A7000 Plus</a>
                           </h3>
                           <div class="price">
                            <span class="price_sale">3,900,000₫</span>
                             <del class="price_old">4,200,000₫</del>
                           </div>
                         </div>
                      </div>
                  </div>
                  <div class="item">
                    <div class="first_botom">
                           <a href="" class="por_img">
                             <img src="img/21_large.jpg" alt="">
                           </a>
                         <div class="desc-contei">
                           <h3 class="pro_name">
                             <a href="">Điện thoại Lenovo A7000 Plus</a>
                           </h3>
                           <div class="price">
                            <span class="price_sale">3,900,000₫</span>
                             <del class="price_old">4,200,000₫</del>
                           </div>
                         </div>
                      </div>
                  </div>
                </div>
                </div>
              </div>
              <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.countdown.min.js"></script>
              <script>
                $(function() {
                  $(".slider-km").owlCarousel({
                      items: 1,
                      responsive: {
                          1200: { item: 1, },// breakpoint from 1200 up
                          992: { items: 1, },
                          768: { items: 3, },
                          480: { items: 2, },
                          0: { items: 1, }
                      },
                      rewind: false,
                      autoplay: true,
                      autoplayHoverPause: true,
                      autoplayTimeout: 5000,
                      smartSpeed: 1000, //slide speed smooth
                      dots: false,
                      dotsEach: false,
                      loop: true,
                      nav: true,
                      navText: ['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
                      margin: 30,
                      animateOut: false, // default: false
                      animateIn: false, // default: false
                      center: false,
                  });
                 });
              </script>