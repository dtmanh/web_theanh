<div id='av_section_2' class='avia-section main_color avia-section-default avia-no-shadow  avia-builder-el-30  el_after_av_section  avia-builder-el-last  container_wrap fullsize'   >
	<div class='container'>
		<div class='template-page content  twelve alpha units'>
			<div class='post-entry post-entry-type-page post-entry-734'>
				<div class='entry-content clearfix'>
					<div class='avia_textblock'>
						<h3><strong>Thương hiệu chúng tôi</strong></h3>
					</div>
					<?php $i=0; foreach($slides as $slide) : $i++; ?>
					<div class="flex_column av_one_third <?php if($i==1){ echo'first'; }?>  avia-builder-el-32  el_after_av_textblock  column-top-margin">
						<p>
						<div class='avia_textblock'>
							<p><a style="font-size: 1.17em;" href="<?=base_url(@$slide->alias)?>" title="<?=@$slide->name;?>"><img class="size-medium wp-image-1749 alignleft" alt="<?=@$slide->name;?>" src="<?=base_url(@$slide->image)?>" <?php if($i==1){?>width="300" <?php }else{?>width="200" <?php }?> height="83" /></a></p>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<!--end builder template-->		 <!-- close default .container_wrap element -->
</div>