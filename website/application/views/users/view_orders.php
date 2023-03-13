<section class="container content">
    <div class="row">
        <ul class="back_link breadcrumb">
            <li><a href="<?=base_url();?>">Trang chủ</a></li>
            <li><a href="javascript:void(0)">Danh sách đơn hàng</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <section class="content-center">
            <div class="block block-account">
                <?php echo $this->load->widget('blkmenu_users');?>
                <div class="col-md-9 col-right col-sm-9 col-xs-12">
                    <header class="page-header">
                        <h1 class="page-title">
                            Danh sách đơn hàng
                        </h1>
                    </header>
                    <div class="clearfix-20"></div>
                    <div class="my-wishlist">
                        <fieldset>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Sản phẩm</td>
                                        <td width="15%">Ngày đặt</td>
                                        <td width="10%">Đơn giá</td>
                                        <td width="10%">Số lượng</td>
                                        <td width="15%">Thành tiền</td>
                                        <td width="10%">Trạng thái</td>
                                    </tr>
                                    <tbody>
                                    <?php if(count($lists)) : ?>
                                        <?php foreach($lists as $list) : ?>
                                            <tr id="item_3164" class="first last odd">
                                                <td>
                                                    <a class="product-image" href="<?=base_url('san-pham/'.$list->pro_alias.'-'.$list->id)?>" title="<?=@$list->name;?>">
                                                        <img src="<?=base_url('upload/img/products/'.@$list->pro_dir.'/thumbnail_2_'.@$list->pro_img)?>" width="85" height="85" alt="">
                                                    </a>
                                                    <h3 class="product-name">
                                                        <a href="<?=base_url('san-pham/'.$list->pro_alias.'-'.$list->id)?>" title="<?=@$list->name;?>">Giày thể thao</a></h3>
                                                    <br>
                                                    size : <?=@$list->size;?>
                                                </td>
                                                <td>
                                                    <?=date('H:s d-m-Y',@$list->time);?>
                                                </td>
                                                <td>
                                                    <div class="cart-cell">
                                                        <div class="price-box">
                                                                                <span class="regular-price" id="product-price-129425">
                                                            <span class="price"><?=number_format($list->price_sale);?>đ</span>                                    </span>
                                                            <input type="hidden" name="product" value="<?=@$list->id;?>"/>
                                                            <input type="hidden" name="size" value=""/>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?=@$list->count;?>
                                                </td>
                                                <td><?=number_format($list->price_sale * $list->count)?> đ</td>
                                                <td class="last">
                                                    <button type="button" class="btn btn-success">
                                                        <?php if($list->status == 0){echo "Đang chờ phê duyệt";}  ?>
                                                        <?php if($list->status == 1){echo "Hoàn thành;";}  ?>
                                                        <?php if($list->status == 2){echo "Đã hủy;";}  ?>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Phí vận chuyển</td>
                                                <td><?=number_format(@$list->price_ship)?>đ</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Tổng tiền thanh toán</td>
                                                <td><?=number_format(($list->price_sale * $list->count) + @$list->price_ship)?>đ</td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php else : ?>
                                        <span>Hiện tại không có sản phẩm nào !</span>
                                    <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
        </section>
    </div>
</section>
