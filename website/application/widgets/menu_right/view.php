<?php if(count($menu_root)) : ?>
<?php foreach ($menu_root as $key_r => $mr) : ?>
<div class="container">
	<div class="bgr-color">
		<div class="container">
			<div class="advance">
				<div class="section-title">
					<h2>
					<?=$mr->name;?>                    
					</h2>
				</div>
				<?php if(!empty($mr->menu_sub)): ?>
				<div class="banner">
					<div class="col-banner-left">
						<div class="list-advance">
							<?php $i=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
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
						<img width="548" height="367" src="<?=base_url($mr->image);?>" data-lazy-src="<?=base_url($mr->image);?>">
						<noscript><img width="548" height="367" src="h<?=base_url($mr->image);?>"></noscript>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php endif;?>