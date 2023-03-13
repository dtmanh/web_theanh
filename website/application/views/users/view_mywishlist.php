<section class="container content">
    <div class="row">
        <ul class="back_link">
            <li><a href="<?=base_url();?>">Trang chủ</a></li>
            <li><a href="javascript:void(0)">Sản phẩm yêu thích</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="clearfix clearfix-30"></div>
        <?php echo $this->load->widget('blkmenu_users');?>
        <section class="content-center">
            <div class="block block-account">
                <div class="col-sm-9">
                    <div class="ttl-box-profile">Sản phẩm yêu thích</div>
                    <?php if($this->session->flashdata('seccs')): ?>
                        <div class="alert alert-success">
                            <strong>Thông báo!</strong> <?=$this->session->flashdata('seccs');?>
                        </div>
                    <?php endif; ?>
                    <div class="my-wishlist">
                        <?php if(count(@$lists)) : ?>
                        <?php foreach($lists as $list): ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 box-pro-top">
                            <div class="row">
                                <div class="box_prod_home prod_cate remove_<?=$list->id?> clearfix">
                                    <span data-items="<?=$list->id?>" onclick="remove_wl(this,1)" class="remove-fa">x</span>
                                    <div class="box_img">
                                        <a href="<?=base_url($list->alias)?>.html" class="img_prod_home h_8333">
                                            <img class="w_100" src="<?=base_url('upload/img/products/'.@$list->pro_dir.'/thumbnail_2_'.@$list->pro_img)?>" alt="<?=$list->pro_name?>" >
                                        </a>
                                        <div class="box_go">
                                            <?php if($this->session->userData('userid')): ?>
                                                <?php $user_id = $this->session->userData('userid'); ?>
                                                <a href="javascript:void(0)" onclick="favorite(<?=$list->id?>, <?=$user_id?>)" class="like_home">
                                                    <span class="fa fa-heart-o"><span class="plus_heart">+</span></span>
                                                    <span>Yêu thích</span>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?=base_url('login')?>" class="like_home">
                                                    <span class="fa fa-heart-o"><span class="plus_heart">+</span></span>
                                                    <span>Yêu thích</span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="sub_prod_home">
                                        <h3 class="name_prod_home">
                                            <a href="<?=base_url($list->alias)?>.html" title="<?=$list->pro_name?>"><?=$list->pro_name?></a>
                                        </h3>
                                        <div class="clearfix"></div>
                                        <div class="price_home">
                                            <span class="price_home_new"><?=$list->price_sale?> đ</span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="social_box">
                                            <span class=""><i class="fa fa-tag"></i> <?=$list->bought?></span>
                                            <span class=""><i class="fa fa-eye"></i> <?=$list->view?></span>
                                            <span class=""><i class="fa fa-comments"></i> <?=$list->comment?></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php if(!empty($list->user_name)): ?>
                                        <div class="producer">
                                            <a href="<?=base_url('home/list_product?id=').$list->user_name->id?>"><?=$list->user_name->fullname?></a>
                                            <div class="box_owner_shop">
                                                <div class="logo">
                                                    <a title="Shop" href="" class="icon_home_logo">
                                                        <img alt="Shop" src="<?=base_url()?>assets/css/img/shop_blank-logo-2.jpg" width="60" height="30">
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <a rel="nofollow" title="xem shop" href="">xem shop »</a>
                                                </div>
                                                <div class="sen-point">
                                                    <div class="point"> Điểm: <span>23</span></div>
                                                    <div class="goodrating">
                                                        <b style="color:#f00;">89.66</b>
                                                        <font style="color:#f00;">% </font>phản hồi tích cực
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="producer"><a href="javascript:;">Admin</a></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <div class="emptys">Hiện tại không có sản phẩm nào ! <a href="<?=base_url()?>">Tiếp tục mua hàng</a></div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
    </div>
</section>
<script type="text/javascript">
    function remove_wl(e, r)
    {
        pid = $(e).attr("data-items");
        $.ajax({
            type:"POST",
            url: '<?=base_url()?>users/del',
            dataType: 'json',
            data:{pid:pid},
            beforeSend:function(){
                $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
            },
            complete: function() {
                $('#ajax_loader').remove();
                window.location.reload();
            }
        });
    }
</script>