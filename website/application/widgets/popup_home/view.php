<div class="wpcf7 no-js" id="wpcf7-f7420-o1" lang="vi" dir="ltr">
	<div class="screen-reader-response">
	<p role="status" aria-live="polite" aria-atomic="true"></p>
	<ul></ul>
	</div>
	<form action="<?=base_url(); ?>contact/dang_ky" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
	<div id="pop-up-block">
		<div id="lead-form">
			<div class="lead-form">
				<div class="header-form">
				<h2 class="title-form"><br />
					ĐĂNG KÝ NHẬN TƯ VẤN 1OFFICE
				</h2>
				<h3 class="sub-title-form"><br />
					Trải nghiệm để khám phá những tính năng tuyệt vời 1Office mang lại
				</h3>
				<p><button id="close-popup" type="button">X</button>
				</p>
				</div>
				<div class="option-form">
				<div class="group-form">
					<div class="section-input">
						<p><span class="wpcf7-form-control-wrap" data-name="company-name">
							<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Tên công ty" value="" type="text" name="cat_name" /></span>
						</p>
					</div>
				</div>
				<div class="double-input">
					<div class="group-form">
						<div class="section-input">
							<p><span class="wpcf7-form-control-wrap" data-name="your-name">
								<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Họ và tên" value="" type="text" name="full_name" /></span>
							</p>
						</div>
					</div>
					<div class="group-form">
						<div class="section-input">
							<p>
							<span class="wpcf7-form-control-wrap" data-name="menu-261">
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="locale_id">
									<?php
									foreach(@$product_locale as $t){?>
										<option value="<?=$t->id;?>">
											<?=$t->name;?></option>
									<?php }
									?>	
								</select>
							</span>
							</p>
						</div>
					</div>
				</div>
				<div class="double-input">
					<div class="group-form">
						<div class="section-input">
							<p><span class="wpcf7-form-control-wrap" data-name="email">
								<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email" value="" type="email" name="email" /></span>
							</p>
						</div>
					</div>
					<div class="group-form">
						<div class="section-input">
							<p><span class="wpcf7-form-control-wrap" data-name="your-phone">
								<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Số điện thoại" value="" type="tel" name="phone" /></span>
							</p>
						</div>
					</div>
				</div>
				<div class="double-input">
					<div class="group-form">
						<div class="section-input">
							<p>
							<span class="wpcf7-form-control-wrap" data-name="title">
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="title">
									<option value="Dưới 10 nhân viên">Dưới 10 nhân viên</option>
									<option value="10 - 30 nhân viên">10 - 30 nhân viên</option>
									<option value="30 - 100 nhân viên">30 - 100 nhân viên</option>
									<option value="100 - 300 nhân viên">100 - 300 nhân viên</option>
									<option value="Trên 300 nhân viên">Trên 300 nhân viên</option>
								</select>
							</span>
							</p>
						</div>
					</div>
					<div class="group-form">
						<div class="section-input">
							<p>
							<span class="wpcf7-form-control-wrap" data-name="size_id">
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="country">
								<?php
									foreach(@$province as $t){?>
										<option value="<?=$t->id;?>">
											<?=$t->name;?></option>
									<?php }
									?>
									
								</select>
							</span>
							</p>
						</div>
					</div>
				</div>
				<div class="group-form">
					<div class="section-input">
						<p>
							<span class="wpcf7-form-control-wrap" data-name="menu-626">
							<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="size_id">
								
							<?php
									foreach(@$product_size as $t){?>
										<option value="<?=$t->id;?>">
											<?=$t->name;?></option>
									<?php }
									?>	
							</select>
							</span>
						</p>
					</div>
				</div>
				<div class="group-form">
					<div id="submit-form">
						<p><input class="wpcf7-form-control has-spinner wpcf7-submit" name="dang-ky" id="submit" type="submit" value="ĐĂNG KÝ" />
						</p>
					</div>
				</div>
				</div>
				<div id="alert-notifi">
				</div>
			</div>
		</div>
	</div>
	<div class="wpcf7-response-output" aria-hidden="true"></div>
	</form>
</div>