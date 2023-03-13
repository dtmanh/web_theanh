<section class="main-wrap">
   <section class="container">
      <section class="primary fleft">
         <section class="block-tax-item">
            <section class="block-breakcrumb">
               <span><span><a href="<?=base_url()?>">Trang chủ</a> » <span class="breadcrumb_last" aria-current="page">Liên hệ</span></span></span>                
            </section>
            <!-- end .block-breakcrumb -->
            <section class="block-tax-item-content">
               <h1 class="single-title">
                  Liên hệ                    
               </h1>
               <!-- end .single-title -->
               <section class="single-content-wrap single-content">
                  <h2 style="text-align: left;"><span style="color: #ff0000; font-size: 14pt;"><strong><?=@$this->option->site_name?></strong></span></h2>
                  <ul style="list-style-type: square;">
                     <li><strong>Hotline:</strong> <a href="tel://<?=@$this->option->hotline1?>"><strong><?=@$this->option->hotline1?></strong></a></li>
                     <li><strong>Email:</strong>&nbsp;<a href="mailto:<?=@$this->option->site_email?>"><?=@$this->option->site_email?></a></li>
                     <li><strong>Website:</strong> <a href="<?=@$this->option->domain?>"><?=@$this->option->domain?></a></li>
                  </ul>
                  <p style="text-align: justify;">Cần hỗ trợ từ chính chủ đầu tư <strong><?=@$this->option->site_name?></strong>, hãy gửi yêu cầu cho chúng tôi theo Form thông tin bên dưới. Chúng tôi sẽ phản hồi thông tin cho quý khách hàng trong thời gian 1 phút sau.</p>
                  <p style="text-align: center;"><?=@$this->option->map_iframe?></p>
               </section>
               <!-- end .single-content-wrap -->
                     <form action="" method="post" class="wpcf7-form" role="form">
                        <p><span class="wpcf7-form-control-wrap fullname"><input type="text" name="full_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Họ tên" required=""></span><span class="wpcf7-form-control-wrap phone"><input type="tel" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" placeholder="Điện thoại" required=""></span><span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" required="" placeholder="Email"></span><span class="wpcf7-form-control-wrap content"><textarea name="comment" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false">Nhu cầu tư vấn</textarea></span><input type="submit" name="sendcontact" value="GỬI LIÊN HỆ" class="wpcf7-form-control"><span class="ajax-loader"></span></p>
                     </form>
                  </div>
               </section>
               <!-- end .contact-form -->
               <section class="single-share">
               </section>
               <!-- end .single-share -->
               <!-- end .single-comment -->
            </section>
            <!-- end .block-tax-item-content -->
         </section>
         <!-- end .block-tax-item -->
      </section>
      <!-- end .primary -->
      <!-- end .sidebar -->        
      <section class="cboth"></section>
      <!-- end .cboth -->
   </section>
   <!-- end .container --> 
</section>
