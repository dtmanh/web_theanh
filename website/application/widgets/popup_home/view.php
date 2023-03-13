<!-- popup load trang -->
	<link rel="stylesheet" href="<?=site_url()?>assets/css/popup.css">	
	<script type="text/javascript" src="<?=site_url()?>assets/js/jquery.popup.js"></script>	
	
	<div id="myModal" class="linhnguyen-modal">
		<div class="noidung_popup">
			  <?php $stt=0; foreach($popup as $apopup) : $stt++;?>
				<a href="<?=base_url(@$apopup->url)?>">
					<img src="<?=base_url(@$apopup->link)?>"  style="max-width: 100%;"/>
				</a>
			<?php if($stt>=1){break; } endforeach;?>
			<a class="close-linhnguyen-modal">X</a>
		</div>
	</div>	
	<script type="text/javascript" >
		$(window).load(function() {
		  $('#myModal').linhnguyen($('#myModal').data());
		});
	</script>	