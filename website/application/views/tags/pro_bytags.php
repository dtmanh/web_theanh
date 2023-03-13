<article>
  <div class="clearfix"></div>
    <!-- begin left_content --><div class="col-lg-225 col-md-3 col-sm-3 hidden-xs">
                <div class="row">
                    <div class="root_left">
                    <?=@$home_left;?>
                    </div>
                </div>
            </div><div class="col-lg-775 col-md-9 col-sm-9">
                <div class="row"><!-- end left_content --><!-- begin mid_content -->
                    <div class="root_content">
                        <div class="tech_content_home">
                            
                            <h2 class="title_home">danh sach the tags sanr phaamr</h2>
                        <div class="clearfix-15"></div>
                        <?php if (count($lists)) { foreach ($lists as $key => $pro) { ?>
                        <!-- begin content_category_pro -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-480-12">
                        <div class="row_8">
                            <!-- begin sub temp pro -->
                            <div class="box_prod">
                                <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="img_prod h_8358"><img class="w_100" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt=""/></a>
                                <div class="clearfix"></div>
                                <div class="sub_prod">
                                    <h3 class="name_prod"><a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name?></a></h3>
                                    <div class="clearfix"></div>
                                    <div class="add_view">
                                        <a href="<?= base_url("addCart_now?id=".$pro->id)?>" class="add_prod">Mua ngay</a>
                                        <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="view_prod">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end sub temp pro -->
                        </div>
                    </div>
                    <!-- end content_category_pro -->
                    <?php }}?>
                    </div>
                    <div class="clearfix"></div>
                        <div class="phantrang_prod">
                            <?php echo $this->pagination->create_links();?>
                        </div>
                    </div>
                 <!-- end mid_content --><!-- begin right_content --></div>
            </div><!-- end right_content -->
<div class="clearfix"></div>
</article>