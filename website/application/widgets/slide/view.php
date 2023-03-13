<!-- begin banner -->
<?php if(count($slide_home)) : ?>
<section class="featured">
  <section class="owl-slider">
    <section class="featured-btn featured-btn-prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
    </section>
    <!-- end .featured-btn -->
    <section class="featured-btn featured-btn-next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
    </section>
    <!-- end .featured-btn -->
    <ul>
      <?php foreach($slide_home as $slide) {?>
      <li class="featured-home-item thumb-full"> <a href="<?=@$slide->url;?>"><img src="<?=base_url(@$slide->image);?>"  alt="<?=@$slide->name?>"/></a>
    </li>
    
    <?php } ?>
    
  </ul>
</section>
<!-- end .owl-slider -->
</section>
<!-- end .featured -->
<script type="text/javascript">
$(document).ready(function() {
var owl_slider = $(".owl-slider ul");
owl_slider.owlCarousel({
autoPlay: 3000,
navigation : true,
singleItem : true,
transitionStyle : "fade"
});
$(".featured-btn-prev").click(function(){
owl_slider.trigger('owl.prev');
});
$(".featured-btn-next").click(function(){
owl_slider.trigger('owl.next');
item: 1
});
});
</script>
<?php endif;?>
<!-- end banner -->