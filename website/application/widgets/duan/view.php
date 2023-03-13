				
                               
                               
                      <section class="slider_project_home">
    <div class="container">
        <div class="row_pc">

	 <div class="text-center bg_tit_home"><h2 class="txt_name_page_cate"><?=lang('duan');?></h2></div>
                            <div class="clearfix"></div>
                            
                            
            <div class="owl-carousel slider_project">
            
             <?php foreach($news as $n) : ?>    
                <div class="item">
                    <div class="box_project_home">
                        <a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>" class="img_project_home h_616">
                            <img class="w_100" src="<?= base_url($n->image) ?>" alt="<?= ($n->title); ?>"/>
                        </a>
                        <div class="clearfix"></div>
                        <h3 class="name_project_home">
                            <a title="<?= ($n->title); ?>" href="<?= base_url($n->alias.'.html') ?>"><?= ($n->title); ?></a>
                        </h3>
                    </div>
                </div>
                 <?php endforeach;?>
                
              
                
                
            </div>


            <style type="text/css">
                /*========================  style slider project    ===========================*/
                .slider_project .owl-wrapper-outer{
                    margin: 0px -14px;
					margin-bottom:20px;
                }
                .slider_project .owl-controls{
                   display: none !important;
                }
                .box_project_home{
                    margin: 0px 14px;
                    position: relative;
                }
                .name_project_home{
                    padding: 5px 0px;
                    position: absolute;
                    width: 100%;
                    bottom: 0px;
                    margin-top: 0px;
                    margin-bottom: 0px;
                    background: rgba(255, 255, 255, 0.49);
                    text-align: center;
                    font-size: 14px;
                    text-transform: uppercase;
                    font-weight: bold;
                }
                .name_project_home a{
                    color: #000;
					font-size:11px;
                }
                .box_project_home:hover .name_project_home a{
                    color: #ff0000;
                }


            </style>

        </div>
    </div>
</section>
                               
                           <script type="text/javascript">
        /*===================slider=====================*/
        $(document).ready(function() {
            $(".slider_project").owlCarousel({
                navigation : true,
                items : 4,
                itemsCustom : false,
                itemsDesktop : [1199, 4],
                itemsDesktopSmall : [979, 3],
                itemsTablet : [768, 2],
                itemsTabletSmall : false,
                itemsMobile : [479, 1],
                singleItem : false,
                itemsScaleUp : false,

                slideSpeed : 200,
                paginationSpeed : 100,
                rewindSpeed : 1000,
                autoPlay : true
            });
        });



        /*========  Tinh chieu cao cho anh   =========*/


        $( window ).load(function() {
            render_size();
        });
        function render_size(){
            var h_747 = $('.h_747 img').width();
            $('.h_747 img').height( 0.747 * parseInt(h_747));

            var h_750 = $('.h_750 img').width();
            $('.h_750 img').height( 0.750 * parseInt(h_750));

            var h_616 = $('.h_616 img').width();
            $('.h_616 img').height( 0.616 * parseInt(h_616));
        }

    </script>