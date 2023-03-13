<div class="row">
              <?php foreach($lists as $pro):?>
              <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                <div class="product">
                  <a href="<?=base_url('san-pham/'.$pro->pro_alias.'.html')?>" class="product__img h_15">
                    <img class="product__img1" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_2_'.@$pro->pro_image)?>" alt="<?=$pro->pro_name?>">
                    <?php if(count($pro->p_images)):?>
                    <?php foreach($pro->p_images as $p_images):?>
                    <img class="product__img2"  src="<?=base_url($p_images->image)?>" alt="<?=$pro->pro_name?>">
                  <?php endforeach;?>
                  <?php endif;?>
                    <span>Quickview</span>
                  </a>
                  <h4 class="product__name"><?=$pro->pro_name?></h4>
                  <span class="product__price"><?php if ($pro->price_sale != 0) {
                                      echo number_format($pro->price_sale).' <sup>đ</sup>';
                                      } else {echo "Liên hệ"; } ?></span>
                </div>
              </div>
              <?php endforeach;?>
               
              
               
            </div>
            <nav aria-label="Page navigation example">
                <?=@$phantrang;?>
             
            </nav>
              <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/main.js"></script>
<script type="text/javascript">
    function tieptheo (page) {
        $.ajax({
            url: base_url() + 'search/filter',
            type: "POST",
            dateType: "html",
            data: {
                page:page,
                cat_id: $('#cat_id').val(),
                id_mucgia: $('#id_mucgia').val(),
                id_brand : $('#id_brand').val(),
                id_filter: $('#filter').val()
            },
            success: function (result) {
                $('#result').html(result);
            }
        });
    }
</script>
