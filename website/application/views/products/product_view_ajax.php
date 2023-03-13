<?php if(count($pros)):
                            foreach ($pros as $key => $pro):?>
                    <!-- begin tem pro home -->
                    <?php if ($key%2==0): ?>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="row_7">
                            <div class="full_box_sp">
                                <div class="row_8">
                    <?php endif; ?>
                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                       <div class="row_7">
                                        <!-- begin sub temp pro -->
                                           <div class="box_sp">
                                               <div class="content_box_sp">
                                                   <div class="img_box_sp h_7251">
                                                       <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><img src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" class="w_100" alt="<?= $pro->name?>"/></a>
                                                   </div>
                                                   <div class="text_tt_sp">
                                                       <h3 class="name_sp">
                                                           <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name?></a>
                                                       </h3>
                                                       <p class="gia"><?= number_format($pro->price_sale)?> VND</p>
                                                       <ul class="ul_click_me">
                                                           <li>
                                                               <a href="<?= base_url("addCart_now?id=".$pro->id)?>" class="car_style"><i class="fa fa-shopping-cart"></i></a>
                                                               <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="click_link">Chi tiết</a>
                                                           </li>
                                                       </ul>
                                                   </div>
                                               </div>
                                           </div>
                                        <!-- end sub temp pro -->
                                       </div>
                                   </div>
                    <?php if ($key%2!=0): ?>
                                </div>
                              </div>
                          </div>
                      </div>
                    <?php endif; ?>
                    <!-- end tem pro home -->
                  <?php endforeach;endif; ?>