 <section class="block-home-contact">
     <div role="form" class="wpcf7" id="wpcf7-f4-o1" lang="vi" dir="ltr">
        <div class="screen-reader-response"></div>
        <form action="<?=base_url()?>contact/dang_ky" method="post" class="wpcf7-form">
           
           <section class="single-contact">
             <?=@$this->option->map_footer;?>
              <section class="single-contact-form">
                 <section class="single-contact-form-left single-contact-form-col fleft">
                    <span class="wpcf7-form-control-wrap fullname"><input type="text" name="full_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Họ tên" required="" /></span><span class="wpcf7-form-control-wrap phone"><input type="tel" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" required="" placeholder="Điện thoại" /></span><span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" required="" placeholder="Email" /></span>
                    <span class="wpcf7-form-control-wrap duan">
                       <select name="cat_name" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
                          <option value="0">BĐS quan tâm</option>
                           <?php foreach($cate_all as $cat):?>
                           	<option value="<?=@$cat->name?>"><?=@$cat->name?></option>
	     					 <?php endforeach;?>
                       </select>
                    </span>
                    <br />
                 </section>
                 <section class="single-contact-form-right single-contact-form-col fright">
                    <span class="wpcf7-form-control-wrap content"><textarea name="comment" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Nhu cầu khách hàng"></textarea></span><input type="submit" value="GỬI ĐI" name="dang-ky" class="wpcf7-form-control" /><br />
                 </section>
                 <section class="cboth"></section>
              </section>
           </section>
           <div class="wpcf7-response-output wpcf7-display-none"></div>
        </form>
     </div>
  </section>