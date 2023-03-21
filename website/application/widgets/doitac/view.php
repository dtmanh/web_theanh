<?php if($doitacs){?>
   <div class="section-full-width">
      <div class="customer">
            <div class="section-title">
            <h2 class="f700 s42">Tăng trưởng nhanh, phủ sóng mạnh với dịch vụ SEO chuyên nghiệp hàng đầu</h2>
            </div>
            <div class="section-sub-title custom_sub_title">
            <h3>Thay đổi sức mạnh từng giai đoạn. Liên tục cải tiến trên đa phương diện. Chúng tôi đã giúp 200+ doanh nghiệp hoàn thành kế hoạch phát triển mong đợi! </h3>
            </div>
            <div class="list-customer">
            <ul>
            <?php foreach($doitacs as $value):?>
               <li>
                  <img width="1026" height="606" src="<?=base_url($value->image)?>" data-lazy-src="<?=base_url($value->image)?>">
                  <noscript><img width="1026" height="606" src="<?=base_url($value->image)?>"></noscript>
               </li>
               <?php endforeach;?>
            </ul>
            </div>
            <div class="button-website text-center">
            <a href="<?=base_url('khach-hang')?>" id="btn-custom">
            CÂU CHUYỆN KHÁCH HÀNG
            </a>
            </div>
      </div>
   </div>
<?php } ?>
