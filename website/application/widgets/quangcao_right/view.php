<ul class="img-right">
<?php foreach($slides as $slide) :  ?>
	 <li>
		<a href="<?=base_url(@$slide->url)?>"><img src="<?=base_url(@$slide->image)?>" alt=""/></a>
	</li>
	<?php endforeach;?>  
</ul>    
               
    
  