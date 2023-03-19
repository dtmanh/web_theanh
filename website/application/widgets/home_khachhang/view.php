<?php if(count($menu_root)) : ?>
<div class="container">
	<div class="bgr-color">
		<div class="container">
			<div class="advance">
				<div class="section-title">
					<h2>
					<?=$menu_root->description;?>                    
					</h2>
				</div>
				<?php if(!empty($menu_root->menu_sub)): ?>
				<div class="banner">
					<div class="col-banner-left">
						<div class="list-advance">
							<?php $i=0; foreach($menu_root->menu_sub as $menu_sub) : $i++; ?>
							<div class="box-item">
								<div class="content">
									<a href="<?=base_url($menu_sub->url);?>">
										<div class="title">
										<?=@$menu_sub->name;?>                                              
										</div>
									</a>
									<div class="detail">
									<?=@$menu_sub->description;?>                                               
									</div>
								</div>
								<div class="icon">
									<img src="" data-lazy-src="<?=base_url($menu_sub->image);?>">
									<noscript><img src="<?=base_url($menu_sub->image);?>"></noscript>
								</div>
							</div>
							<?php endforeach;?>
						</div>
					</div>
					<div class="col-banner-right">
						<div class="image-banner">
						<img width="548" height="367" src="<?=base_url($menu_root->image);?>" data-lazy-src="<?=base_url($menu_root->image);?>">
						<noscript><img width="548" height="367" src="h<?=base_url($menu_root->image);?>"></noscript>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>