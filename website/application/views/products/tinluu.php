 <main>
            <div class="container">
              <div class="row_pc">
                <div class="row">
                  <div class="col-md-9 vol-sm-9 col-xs-12 col-480-12">
                    <div class="detail-left">
                      <ul class="panagation-tree clearfix">
                        <li><a href="<?=base_url()?>">Rao vặt</a></li>
                        <li><a href="">Toàn quốc</a></li>
                        <li><a >Tin đã lưu</a></li>
                      </ul>
                      <div class="clearfix"></div>
                      <div class="detail-pro-raovat">
                        <h2>Tin đã lưu</h2>
                        <div class="apple-rv-search">
                           
                           
                          
                       
                           
                          
                          <div class="newsTab">
                           
                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <div class="newsTabContent">
                                  <?php if (count($lists)) { foreach ($lists as $key => $pro) { ?>
                                  <div class="newsItems">
                                    <div class="row row7">
                                      <div class="col-md-4 col-xs-5 col-480-12 pd7">
                                      <a href="<?=base_url('san-pham/'.$pro->alias.'.html')?>"><img class="newsImg" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_2_'.@$pro->image)?>"></a>
                                    </div>
                                    <div class="col-md-7 col-xs-7 col-480-12 pd7">
                                      <h3><a href="<?=base_url('san-pham/'.$pro->alias.'.html')?>"><?=$pro->name?></a></h3>
                                      <p class="price"><?php if ($pro->price_sale != 0) {
                                      echo number_format($pro->price_sale).' <sup>đ</sup>';
                                      } else {echo "Liên hệ"; } ?></p>

                                      <p class="des">
                                        <?php if(@$pro->weight==1){?><img src="<?= base_url()?>assets/css/img/store.png" alt="" width="20"> <span>Cá nhân</span><?php } ?>
                                        <?php if(@$pro->weight==2){?><img src="https://static.chotot.com.vn/storage/adType/common/pro.svg" alt="" width="20"> <span>Bán chuyên</span><?php } ?>
                                        <?php if(@$pro->weight==3){?><img src="https://static.chotot.com.vn/storage/adType/common/shop.svg" alt="" width="20"> <span>Cửa hàng</span><?php } ?>
                                         | <?=date("d/m/Y",$pro->time);?> | <?=@$pro->dis_name->name?></p>
                                    </div>
                                    <div class="col-md-1"> <a href="<?= base_url('users_frontend/delete/' . $pro->wish_id) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-times"></i></a></div>
                                    <div class="clearfix"></div>
                                    </div>
                                   
                                  </div>

                                <?php }} ?>
                                <div class="clearfix">
                                 <?php echo $this->pagination->create_links();?>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 vol-sm-3 col-xs-12 col-480-12">
                    <?=@$this->load->widget('quangcao_right')?>
                  </div>
                </div>
              </div>
            </div>
          </main>

<style>
  .list-app-rv ul li a{
    color:#9b9b9b;
  }
  .list-app-rv ul li a.active{
    color:#000;
  }
</style>