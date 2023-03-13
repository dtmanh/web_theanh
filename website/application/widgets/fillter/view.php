 <div class="sideBar">
            <script type="text/javascript">
              $(document).ready(function(){
                $(".btn-filter").click(function(){
                  $(".sideBar__form").slideToggle();
                });
              });
            </script>
            <h2 class="btn btn-filter btn-block btn-outline-secondary"><i class="icofont-search-2"></i>Tìm sản phẩm</h2>
            <form action="" class="sideBar__form">
              <div class="form-group">
                <select class="form-control">
                  <option value="">Sort</option>
                  <option value="">Name(A-Z)</option>
                  <option value="">Name(Z-A)</option>
                  <option value="">Price Low to High</option>
                  <option value="">Price High to Low</option>
                  <option  value="">Popular</option>
                </select>
              </div>
              <div class="card">
                <div class="card-header">
                  Size
                </div>
                <div class="card-body">
                	<?php foreach($size as $si):?>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck<?=$si->id?>" >
                    <label class="custom-control-label" for="customCheck1" value="<?=$si->id?>"><?=$si->name?></label>
                  </div>
               <?php endforeach;?>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  PRICE
                </div>
                <div class="card-body">
                	<?php foreach($khoanggia as $khoang):?>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadio<?=$khoang->id?>" name="example" value="<?=$khoang->from_price?>-<?=$khoang->to_price?>">
                    <label class="custom-control-label" for="customRadio1"><?=$khoang->name?></label>
                  </div>
                   <?php endforeach;?>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  Brand
                </div>
                <div class="card-body">
                	<?php foreach($brands as $brand):?>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Brand<?=$brand->id?>"  value="<?=$brand->id?>">
                    <label class="custom-control-label" for="Brand<?=$brand->id?>"><?=$brand->name?></label>
                  </div>
                 <?php endforeach;?>
                </div>
              </div>
            </form>
          </div>
          <input type="hidden" name="cat_id" id="cat_id" value="<?= @$cat_hotel; ?>" />


<script src="<?=base_url()?>assets/js/front_end/advanced_search2.js"></script> 