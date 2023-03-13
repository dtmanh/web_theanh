<div class="clearfix"></div>
    <!-- begin left_content --><div class="row"><div class="col-lg-3 col-12">
                                    <?=@$home_left;?>
                            </div><div class="col-lg-9 col-12"><!-- end left_content --><!-- begin mid_content -->
                     <input type="hidden" name="ctl00$cphBody$__VIEWxSTATE" id="__VIEWxSTATE" value="MTE5MDsyOzI1" />
                            <script src="<?= base_url()?>/assets/js/front_end/modernizr.custom.js" type="text/javascript"></script>
                            <link href="<?= base_url()?>/assets/css/front_end/glasscase.minf195.css" rel="stylesheet" />

                            <ul id='girlstop1' class='gc-start'>
                                <?php if (count($news_bycate)) {
                                    foreach ($news_bycate as $key => $p_image) {  ?>
                                         <li><img src="<?=base_url($p_image->image)?>"></li>
                                    <?php        }
                                } ?>
                            </ul>
                        <script src="<?= base_url()?>/assets/js/front_end/jquery.glasscase.minf195.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function (event) {
                                $('.pInstructions').hide();
                                //ZOOM
                                $("#girlstop1").glassCase({
                                    'widthDisplay': 802, 'heightDisplay': 472, 'isSlowZoom': true, 'isSlowLens': true, 'capZType': 'in',
                                    'thumbsPosition': 'bottom','nrThumbsPerRow':3, 'isHoverShowThumbs': true, 'colorIcons': '#F15129', 'colorActiveThumb': '#F15129',
                                    'mouseEnterDisplayCB': function () { $('.pInstructions').text('Click to open expanded view'); },
                                    'mouseLeaveDisplayCB': function () { $('.pInstructions').text('Roll over image to zoom in'); }
                                });
                                setTimeout(function () {
                                    $('.pInstructions').css({ 'width': $('.gc-display-area').outerWidth(), 'left': parseFloat($('.gc-display-area').css('left')) });
                                    $('.pInstructions').fadeIn();
                                }, 1000);

                                $('#btnFeatures').on('click', function () {
                                    $('html, body').animate({
                                        scrollTop: $('.tc-all-features').offset().top - 50 + 'px'
                                    }, 800);
                                });
                            });
                        </script>
                <!-- end mid_content --><!-- begin right_content --></div></div><!-- end right_content -->
<div class="clearfix"></div>
