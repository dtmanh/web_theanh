<article>
  <div class="clearfix"></div>
  <!-- begin left_content -->
  <div class="container">
    <div class="row_pc">
      <div class="row">
        <div class=" col-md-3 col-sm-3 hidden-xs">
          <div class="root_left">
            <?=@$home_left;?>
          </div>
        </div>
        <div class=" col-md-9 col-sm-9">
          <!-- end left_content --><!-- begin mid_content -->
          <div class="root_content">
            <div class="tech_content_home">
              <h2 class="title_home"><a href="">Sản phẩm</a></h2>
              <div class="clearfix-15"></div>
              <?php foreach($lists as $pro) : ?>
              <!-- begin tem pro home --><!-- end tem pro home -->
              <?php endforeach;?>
            </div>
            <div class="clearfix"></div>
            <div class="phantrang_prod">
              <?php echo $this->pagination->create_links();?>
            </div>
          </div>
          <!-- end mid_content --><!-- begin right_content -->
        </div>
      </div>
    </div>
  </div>  
  <!-- end right_content -->
  <div class="clearfix"></div>
</article>