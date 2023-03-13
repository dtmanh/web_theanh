<div class="clearfix-30"></div>
<!-- main content -->
<main>
   <div class="container">
      <div class="row_pc">
         <div class="form__regis">
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="addnews" value="1">
              <?php $user = $this->session->userData('userData'); ?>
              <input type="hidden" name="user_id" value="<?=$user['oauth_uid']?>">
               <table>
                  <tr>
                     <td><label for="">Chọn danh mục đăng tin</label></td>
                     <td>
                        <select name="" id="pro_category">
                           <option value="">Chọn danh mục</option>
                           <?php if (count($cate_home)) : ?>
                             <?php foreach ($cate_home as $cate) : ?>
                               <option value="<?=$cate->id?>"><?=$cate->name?></option>
                             <?php endforeach; ?>
                           <?php endif; ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Chọn chuyên mục</label></td>
                     <td>
                        <select name="" id="pro_child_category">
                           <option value=""></option>
                           <option value="">Chọn danh mục</option>
                        </select>
                     </td>
                  </tr>

                  <tr>
                     <td>
                        <label for="">Nhu cầu</label>
                     </td>
                     <td class="radioGroup">
                        <div class="radioButton">
                           <input type="radio"  name="quaranty" checked> <span class="checkmark"></span><label for="">Cần bán</label>
                        </div>
                        <div class="radioButton">
                           <input type="radio" name="quaranty"> <span class="checkmark"></span><label for="">Cần mua</label>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <label for="">Bạn là</label>
                     </td>
                     <td class="radioGroup">
                        <div class="radioButton">
                           <input type="radio"  name="dangboi" checked> <span class="checkmark"></span><label for="">Cá nhân</label>
                        </div>
                        <div class="radioButton">
                           <input type="radio" name="dangboi"> <span class="checkmark"></span><label for="">Cửa hàng</label>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Tỉnh thành</label></td>
                     <td>
                        <select name="province" id="province">
                          <option value="">Khu vực</option>
                          <?php
                              foreach(@$city as $t){?>
                           <option value="<?=$t->id;?>" <?php if(@$t->id == @$edit->province){echo'selected';} ?>><?=@$t->name;?></option>
                           <?php
                              }
                              ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Quận/huyện</label></td>
                     <td>
                       <div class="form-group">

                             <select name="district" id="district">
                                <option value="" class="" rel="" >Quận/Huyện </option>
                                <?php foreach(@$district as $dis){?>
                                <option value="<?=$dis->id;?>" <?php if($dis->id == @$edit->district){echo'selected';} ?> ><?=$dis->name;?></option>
                                <?php  } ?>
                             </select>

                       </div>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Tiêu đề đăng tin</label></td>
                     <td>
                        <input type="text" name="name" oninput="createAlias(this)" >

                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Alias</label></td>
                     <td>
                        <input type="text" onchange="createAlias(this)" class="" name="alias"
                           value="" id="alias" placeholder=""/>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Hình ảnh</label></td>
                     <td class="inputImg">
                        <img src="<?=base_url()?>img/load.png"/>
                        <input type="file" name="userfile" />
                     </td>
                  </tr>
                  <tr class="clearfix-10"></tr>
                  <tr>

                     <td><label for="">Giá</label></td>
                     <td>
                        <input type="text" name="price_sale" id="product_price_sale" data-v-max="9999999999999" data-v-min="0" class="auto" value="" placeholder="">
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Mô tả</label></td>
                     <td>
                        <textarea name="description" placeholder="Nên mô tả tiếng việt có dấu
                           Tình trạng xe
                           Thời gian sử dụng xe
                           Bảo trì xe: bao lâu/ lần.
                           Tại hãng hay không?
                           Tình trạng giấy tờ">
                        </textarea>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Danh mục hãng</label></td>
                     <td>
                       <select class="" name="brand" id="brand">
                          <option value="">Lựa chọn</option>
                          <?php show_cate(@$cat_brand, 0, '', @$edit->brand); ?>
                       </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Danh sách hãng</label></td>
                     <td>
                       <select class="" name="locale" id="locale">
                          <option value="">Lựa chọn</option>
                          <?php foreach(@$cat_locales as $locales){?>
                          <option value="<?=$locales->id;?>" <?php if($locales->id == @$edit->locale){echo'selected';} ?> ><?=$locales->name;?></option>
                          <?php } ?>
                       </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Thuộc tính hãng</label></td>
                     <td>
                       <select class="" name="thuoctinhhang" id="thuoctinhhang">
                          <option value="">Lựa chọn</option>
                          <?php foreach(@$sizes as $size){?>
                          <option value="<?=$size->id;?>" <?php if($size->id == @$edit->thuoctinhhang){echo'selected';} ?> ><?=$size->name;?></option>
                          <?php  } ?>
                       </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Danh mục thuộc tính phụ</label></td>
                     <td>
                       <select class="" name="color" id="color">
                          <option value="">Lựa chọn</option>
                          <?php show_cate(@$color, 0, '', @$edit->color); ?>
                       </select>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Danh sách thuộc tính phụ</label></td>
                     <td>
                       <select name="thuoctinhphu" id="thuoctinhphu" class="">
                          <option value="" class="" rel="" >Lựa chọn</option>
                          <?php
                             foreach(@$productprice as $pro_price){?>
                          <option value="<?=$pro_price->id;?>" <?php if($pro_price->id == @$edit->thuoctinhphu){echo'selected';} ?> ><?=$pro_price->name;?></option>
                          <?php } ?>
                       </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <label for="">Tình trạng</label>
                     </td>
                     <td class="radioGroup">
                        <div class="radioButton">
                           <input type="radio"  name="tinhtrang" value="0" checked> <span class="checkmark"></span><label for="">Mới</label>
                        </div>
                        <div class="radioButton">
                           <input type="radio" name="tinhtrang" value="1"> <span class="checkmark"></span><label for="">Đã qua sử dụng</label>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td><label for="">Năm đăng ký</label></td>
                     <td>
                        <input type="text" name="namdangky">
                     </td>
                  </tr>

                  <tr>
                     <td><label for="">Số km đã dùng</label></td>
                     <td>
                        <input type="number" name="sokm">
                     </td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>
                        <button type="submit" >Đăng tin</button>
                     </td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>
</main>

<script type="text/javascript">

$(document).ready(function() {

  var base_url = $('#base_url').val();

  $('#pro_category').change(function () {
    var id = $(this).val();
    $.ajax({
      url: base_url + 'products/getChildCategory',
      type: 'POST',
      dataType: 'html',
      data: {id: id},
      success: function (respon) {
        $('#pro_child_category').html(respon);
      }
    });
  });
});

   // thay doi khu vuc
   $('#province').change(function(){
        var provinceid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/district',
            data: {id:provinceid},
            success: function (res){
                $('#district').html(res);
            }
        });
    });
   // thay doi hang
    $('#brand').change(function(){
        var brandid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/hang',
            data: {id:brandid},
            success: function (res){
                $('#locale').html(res);

                 var localeid = $('#locale').val();
                 $.ajax ({
                     type: "POST",
                     dataType: "html",
                     url: baseurl + 'ajax/ajax/thuoctinh_hang',
                     data: {loid:localeid},
                     success: function (res){
                         $('#thuoctinhhang').html(res);
                     }
                 });
            }
        });
    });
    $('#locale').change(function(){
        var localeid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/thuoctinh_hang',
            data: {loid:localeid},
            success: function (res){
                $('#thuoctinhhang').html(res);
            }
        });
    });

     $('#color').change(function(){
        var colorid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/thuoctinhphu',
            data: {colorid:colorid},
            success: function (res){
                $('#thuoctinhphu').html(res);
            }
        });
    });

    function base_url(){
        return '<?php echo base_url();?>';
    }


</script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>

<!-- lây giau phẩy trong giá tiền và chỉ nhập số -->
<script src="<?=base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js')?>"></script>
<script src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>

<script>
$('#product_price,#product_price_sale').autoNumeric(0);
</script>
