<link rel='stylesheet' id='fixedtoc-style-css'  href='<?=base_url()?>assets/css/front_end/ftoc.min.css' type='text/css' media='all' />
<section class="main-wrap">
                     <section class="container">
                        <section class="primary fleft">
                           <section class="block-tax-item">
                              <section class="block-breakcrumb">
                                <span><span><a href="<?=base_url()?>">Trang chủ</a> » <span><a href="<?=base_url('danh-muc/'.$cate_current->alias.'.html')?>"><?=$cate_current->name?></a> » <span class="breadcrumb_last" aria-current="page"><?=$item->name?></span></span></span></span>       
                              </section>
                              <!-- end .block-breakcrumb -->
                              <section class="block-tax-item-content">
                                 <h1 class="single-title">
                                   <?=$item->name?>    
                                 </h1>
                                 <!-- end .single-title -->
                                 <section class="single-content-wrap single-content">
                                    <div id="ftwp-container-outer" class="ftwp-in-post ftwp-float-right">
                                       <div id="ftwp-container" class="ftwp-wrap ftwp-hidden-state ftwp-minimize ftwp-middle-right">
                                          <button type="button" id="ftwp-trigger" class="ftwp-shape-circle ftwp-border-thin" title="click To Maximize The Table Of Contents"><span class="ftwp-trigger-icon ftwp-icon-number"></span></button>
                                          <nav id="ftwp-contents" class="ftwp-shape-square ftwp-border-medium">
                                             <header id="ftwp-header">
                                                <span id="ftwp-header-control" class="ftwp-icon-number"></span><button type="button" id="ftwp-header-minimize" aria-labelledby="ftwp-header-title"></button>
                                                <h3 id="ftwp-header-title">DANH MỤC DỰ ÁN</h3>
                                             </header>
                                             <ol id="ftwp-list" class="ftwp-liststyle-decimal ftwp-effect-bounce-to-right ftwp-list-nest ftwp-strong-first ftwp-colexp ftwp-colexp-icon">
                                                <li class="ftwp-item ftwp-has-sub ftwp-collapse">
                                                  <button type="button" class="ftwp-icon-collapse"></button><a class="ftwp-anchor" href="#ftoc-heading-1"><span class="ftwp-text">// TỔNG QUAN <?=$item->name?></span></a>
                                                  <ol class="ftwp-sub">
                                                     <?php if ($thuoctinh) :
                                                $i=0; foreach ($thuoctinh as $val) :
                                                if(!empty($val->content)){ ?>
                                                      <?PHP  if ($val->name == 'VỊ TRÍ') : $i++; ?>
                                                      <li class="ftwp-item ftwp-has-sub ftwp-collapse">
                                                        <button type="button" class="ftwp-icon-collapse"></button><a class="ftwp-anchor" href="#ftoc-heading-2"><span class="ftwp-text">// VỊ TRÍ <?=$item->name?></span></a>
                                                      </li>
                                                      <?php endif;  ?>
                                                      <?PHP  if ($val->name == 'TIỆN ÍCH') : $i++; ?>
                                                      <li class="ftwp-item ftwp-has-sub ftwp-collapse">
                                                        <button type="button" class="ftwp-icon-collapse"></button><a class="ftwp-anchor" href="#ftoc-heading-3"><span class="ftwp-text">// TIỆN ÍCH <?=$item->name?></span></a>
                                                      </li>
                                                      <?php endif;  ?>
                                                      <?PHP  if ($val->name == 'MẶT BẰNG THIẾT KẾ') : $i++; ?>
                                                      <li class="ftwp-item ftwp-has-sub ftwp-collapse">
                                                        <button type="button" class="ftwp-icon-collapse"></button><a class="ftwp-anchor" href="#ftoc-heading-4"><span class="ftwp-text">// MẶT BẰNG THIẾT KẾ <?=$item->name?></span></a>
                                                      </li>
                                                      <?php endif;  ?>
                                                      <?PHP  if ($val->name == 'HÌNH ẢNH THỰC TẾ TIẾN ĐỘ THI CÔNG') : $i++; ?>
                                                      <li class="ftwp-item ftwp-has-sub ftwp-collapse">
                                                        <button type="button" class="ftwp-icon-collapse"></button><a class="ftwp-anchor" href="#ftoc-heading-5"><span class="ftwp-text">// HÌNH ẢNH THỰC TẾ TIẾN ĐỘ THI CÔNG <?=$item->name?></span></a>
                                                      </li>
                                                      <?php endif;  ?>
                                                      <?php }
                                                endforeach;
                                                endif; ?>
                                                  </ol>
                                                </li>
                                             </ol>
                                          </nav>
                                       </div>
                                    </div>
                                    <div id="ftwp-postcontent">   
                                      <?=$item->description?>                                   
                                      <?php if ($thuoctinh) : 
                                       $i=0; foreach ($thuoctinh as $val) :
                                          if(!empty($val->content)){ ?>
                                            <?PHP  if ($val->name == 'TỔNG QUAN') : $i++; ?>
                                      <h2 id="ftoc-heading-1" class="ftwp-heading" style="text-align: justify;"><span style="font-size: 18pt; color: #ff9900;"><strong>// TỔNG QUAN <?=$item->name?></strong></span></h2>
                                        <?=$val->content?>
                                        <?php endif;  ?>
                                          <?PHP  if ($val->name == 'VỊ TRÍ') : $i++; ?>
                                      <h3 id="ftoc-heading-2" class="ftwp-heading" style="text-align: justify;"><span style="font-size: 18pt; color: #ff9900;"><strong>// VỊ TRÍ <?=$item->name?></strong></span></h3>
                                        <?=$val->content?>
                                        <?php endif;  ?>
                                        <?PHP  if ($val->name == 'TIỆN ÍCH') : $i++; ?>
                                      <h4 id="ftoc-heading-3" class="ftwp-heading" style="text-align: justify;"><span style="font-size: 18pt; color: #ff9900;"><strong>// TIỆN ÍCH</strong> <strong><?=$item->name?></strong></span></h4>
                                        <?=$val->content?>
                                        <?php endif;  ?>
                                        <?PHP  if ($val->name == 'MẶT BẰNG THIẾT KẾ') : $i++; ?>
                                      <h5 id="ftoc-heading-4" class="ftwp-heading" style="text-align: justify;"><span style="font-size: 18pt; color: #ff9900;"><strong>// MẶT BẰNG THIẾT KẾ</strong> <strong><?=$item->name?></strong></span></h5>
                                        <?=$val->content?>
                                        <?php endif;  ?>
                                          <?PHP  if ($val->name == 'HÌNH ẢNH THỰC TẾ TIẾN ĐỘ THI CÔNG') : $i++; ?>
                                      <h6 id="ftoc-heading-5" class="ftwp-heading" style="text-align: justify;"><span style="font-size: 18pt; color: #ff9900;"><strong>// HÌNH ẢNH THỰC TẾ TIẾN ĐỘ THI CÔNG</strong> <strong><?=$item->name?></strong></span></h6>
                                        <?=$val->content?>
                                        <?php endif;  ?>
                                       <?php }
                                        endforeach; 
                                       endif; ?> 
                                    </div>
                                 </section>
                                 <!-- end .single-content-wrap -->
                                 <section class="single-share">
                                    <div class="addthis_inline_share_toolbox_f3xx"></div>
                                 </section>
                                 <!-- end .single-share -->
                                 <section class="single-tag">
                                    <section class="single-tag-left fleft">
                                       <i class="fa fa-tags" aria-hidden="true"></i>Tags:
                                    </section>
                                    <!-- end .single-tag-left -->
                                    <section class="single-tag-right fright">
                                    </section>
                                    <!-- end .single-tag-right -->
                                    <section class="cboth"></section>
                                    <!-- end .cboth -->
                                 </section>
                                 <!-- end .single-tag -->
                                  <?=@$this->load->widget('content');?>
                                 <section class="single-comment">
                                    <section class="single-head tf">
                                       <span>Bình luận</span>
                                    </section>
                                    <!-- end .single-head -->
                                    <section class="single-comment-content">
                                       <div class="fb-comments" data-href="https://danhkhoireal.vn/west-gate-park/" data-width="100%" data-numposts="5"></div>
                                    </section>
                                    <!-- end .single-comment-content -->
                                 </section>
                                 <!-- end .single-comment -->
                                 <section class="single-related">
                                    <section class="single-head tf">
                                       <span>Dự án liên quan</span>
                                    </section>
                                    <!-- end .single-head -->
                                    <section class="single-related-content block-tax-item-content">
                                      <?php foreach ($list_item as $key => $pro):?>   
                                       <section class="du-an-item fleft">
                                          <a class="du-an-item-thumb thumb-full item-thumbnail" href="<?= base_url('san-pham/'.$pro->alias.'.html') ?>">
                                             <img src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" class="attachment-full size-full wp-post-image" alt="<?= $pro->name; ?>" title="<?= $pro->name; ?>" />   
                                             <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                             <div class='thumbnail-hoverlay-icon'><i class="fa fa-search"></i></div>
                                          </a>
                                          <!-- end .du-an-item-thumb -->
                                          <section class="du-an-item-info">
                                             <h2 class="du-an-item-title">
                                                <a href="<?= base_url('san-pham/'.$pro->alias.'.html') ?>"><?= $pro->name; ?></a>
                                             </h2>
                                             <!-- end .du-an-item-title -->
                                          </section>
                                          <!-- end .du-an-item-info -->
                                       </section>
                                        <?php endforeach; ?>                                                     
                                    </section>
                                    <!-- end .single-related-content -->
                                 </section>
                                 <!-- end .single-related -->
                              </section>
                              <!-- end .block-tax-item-content -->
                           </section>
                           <!-- end .block-tax-item -->
                        </section>
                        <!-- end .primary -->
                        <section class="sidebar fright">
                           <section class="sidebar-fix">
                           </section>
                           <!-- end .sidebar-fix -->
                        </section>
                        <!-- end .sidebar -->        
                        <section class="cboth"></section>
                        <!-- end .cboth -->
                     </section>
                     <!-- end .container --> 
                  </section>
<?=@$this->load->widget('doitac');?>


  