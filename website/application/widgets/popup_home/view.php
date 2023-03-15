<div class="wpcf7 no-js" id="wpcf7-f7420-o1" lang="vi" dir="ltr">
	<div class="screen-reader-response">
	<p role="status" aria-live="polite" aria-atomic="true"></p>
	<ul></ul>
	</div>
	<form action="/contact/dang_ky" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
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
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="menu-261">
									<?php
									foreach(@$province as $t){?>
										<option value="<?=$t->provinceid;?>"
											<?=@$edit->tinh_thanh==$t->provinceid?'selected':''?>>
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
							<span class="wpcf7-form-control-wrap" data-name="menu-861">
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="size_id">
									<?php
									foreach(@$province as $t){?>
										<option value="<?=$t->provinceid;?>"
											<?=@$edit->tinh_thanh==$t->provinceid?'selected':''?>>
											<?=$t->name;?></option>
									<?php }
									?>	
								</select>
							</span>
							</p>
						</div>
					</div>
					<div class="group-form">
						<div class="section-input">
							<p>
							<span class="wpcf7-form-control-wrap" data-name="menu-337">
								<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="address">
									<?php
									foreach(@$province as $t){?>
										<option value="<?=$t->provinceid;?>"
											<?=@$edit->tinh_thanh==$t->provinceid?'selected':''?>>
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
							<select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="locale_id">
								<?php
									foreach(@$province as $t){?>
										<option value="<?=$t->provinceid;?>"
											<?=@$edit->tinh_thanh==$t->provinceid?'selected':''?>>
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
						<p><input class="wpcf7-form-control has-spinner wpcf7-submit" id="submit" type="submit" value="ĐĂNG KÝ" />
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