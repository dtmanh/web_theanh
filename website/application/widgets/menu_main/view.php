<li class="kmli home"><a href="<?=base_url();?>">TRANG CHỦ</a></li>                  
  <?php if(count($menu_root)) : ?>
  <?php foreach ($menu_root as $key_r => $mr) : ?>
  
  <li class="kmli">
    <a href="<?=base_url($mr->url);?>"><?=@$mr->name;?></a>
  </li>
  <?php endforeach;?>
  <?php endif;?>
<li class="kmli expand-icon">
    <a href="javascript:void(0);" rel="nofollow">
        <span class="eiline ei-line1"></span>
        <span class="eiline ei-line2"></span>
        <span class="eiline ei-line3"></span>
    </a>
    <div class="kmli-menu-expand-wrapper">
        <div class="w1040">
            <ul class="list-other-cat-col clearfix">

                <li class="occ r1">
                    <h4 class="occ-name">
                        <a href="/doi-song.chn" title="Đời sống">Đời sống</a>
                    </h4>
                    <ul class="list-occs">
                        <li class="occs">
                            <a href="/doi-song/nhan-vat.chn" title="Nhân Vật">Nhân Vật</a>
                        </li>
                        <li class="occs">
                            <a href="/xem-an-choi.chn" title="Xem-Ăn-Chơi">Xem-Ăn-Chơi</a>
                        </li>

                        <li class="occs">
                            <a href="/doi-song/tram-yeu.chn" title="Trạm yêu">Trạm yêu</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <!-- End .list-other-cat-col -->
            <div class="kmew-topics-wrapper">
                <div class="kmewtw-label">Nhóm chủ đề</div>
                <ul class="list-kmewt clearfix">

                    <li class="kmewt">
                        <a href="/nhom-chu-de/kham-pha.chn" title="Khám phá">
                            <img src="https://kenh14cdn.com/zoom/190_70/2019/12/30/vincentiu-solomon-ln5drpvimi-unsplash-15777000478702070877108.jpg"
                                 alt="Khám phá">
                            <span>Khám phá</span>
                        </a>
                    </li>


                </ul>
            </div>
            <div class="kmew-other-links clearfix">
                <div class="kmewol-group clearfix">
                    <h4 class="kmewolg-label">Tải app</h4>
                    <ul class="list-kmewolgi">
                        <li class="kmewolgi">
                            <a href="https://itunes.apple.com/us/app/kenh-14/id670518264?ls=1&amp;mt=8"
                               target="_blank" rel="nofollow"
                               title="Tải về từ App Store">iOS</a>
                        </li>
                        <li class="kmewolgi">
                            <a href="https://play.google.com/store/apps/details?id=vcc.mobilenewsreader.kenh14"
                               target="_blank" rel="nofollow"
                               title="Tải về từ Google Play">Android</a>
                        </li>
                    </ul>
                </div>
                <div class="kmewol-group clearfix">
                    <h4 class="kmewolg-label"><a href="https://www.facebook.com/K14vn"
                                                 title="Fanpage" target="_blank" rel="nofollow">Fanpage</a>
                    </h4>
                </div>
                <div class="kmewol-group clearfix">
                    <h4 class="kmewolg-label"><a id="lnkContact" href="/#kenh14-footer-wrapper">Liên
                        hệ</a></h4>
                    <ul class="list-kmewolgi">

                        <li class="kmewolgi">
                            <a rel="nofollow" href="/adv.chn" title="Liên hệ quảng cáo"
                               target="_blank">Quảng cáo</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</li>