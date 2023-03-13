<!-- The Modal -->

<div class="modal fade" id="myModal_loc">
  <div class="modal-dialog modal-dialog-centered mar-top-5">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lọc kết quả</h4>
        <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>                                      
        <button type="button" class="close pull-right" data-dismiss="modal" style="color: #fe9900;opacity: 1;    margin-top: -15px; font-size: 13px;">Bỏ lọc</button> 
      </div>
      <!-- Modal body -->
       <form name="form_1" id="form_1" method="POST" action="<?=base_url();?>ajax/ajax/fiil_loc3">
      <div class="modal-body" style="overflow: auto;max-height: 500px;">
        <input type="hidden" class="base_url" value="<?=base_url();?>" name="">
      <input type="hidden" name="location" value="<?=@$location?>">
        <div class="choose-rv cat-lis">
              <select name="cat_loc2" id="cat_loc2" class="form-control" style="width:95%;margin-left:20px">
                <?php if(count($cat)) : ?>
                <?php foreach($cat as $ca) : ?>
                        <option value="<?=@$ca->id;?>" <?php if($ca->id==$cat_loc_curent->id){ echo' selected'; }?>><?=@$ca->name;?></option>
                        <?php endforeach;?>
                <?php endif;?>
              </select>
        </div>
        <div id="thuoctinh1">
        <?php if(isset($hang_list_loc2)) : ?>
          <div class="choose-rv cat-lis">
              <select name="id_hang_loc2" id="id_hang_loc2" class="form-control" style="width:95%;margin-left:20px">
                 <option value="0">Tất cả các hãng</option>
                <?php foreach($hang_list_loc2 as $hang) : ?>
                <option value="<?=@$hang->id;?>" <?php if(@$hang->id==@$brand_id){ echo'selected';}?>><?=@$hang->name;?></option>
              <?php endforeach;?>
              </select>
          </div>
          <?php endif;?>
        </div>
        <div id="thuoctinh2">
            <?php if(isset($dstt)) : ?>
             <div class="choose-rv cat-lis">
              <select name="id_hang_loc2" id="id_hang_loc2" class="form-control" style="width:95%;margin-left:20px">
                 <option value="0">Tất cả các hãng</option>
                <?php foreach($dstt as $ttp) : ?>
                <option value="<?=@$ttp->id;?>" <?php if(@$ttp->id==@$thuoctinh_id){ echo'selected';}?>><?=@$ttp->name;?></option>
              <?php endforeach;?>
              </select>
          </div>
         <?php endif;?>
        </div>
        <div id="thuoctinh3">
          <?php if(isset($tt_color)) : ?>
          <?php $i=0; foreach($tt_color as $color) : ?> 
          <div class="choose-rv cat-lis">             
              <h3 style="margin-top: 0px;font-size: 12px;font-weight: 600;"> <?=@$color->name?></h3>
              <input type="hidden" name="cha[]" id="cha_<?=@$color->id;?>" value="<?=@$color->id;?>">
              <select name="id_cat_phu[]" id="id_cat_phu_<?=@$color->id;?>" class="form-control" style="width:95%;margin-left:20px">
                 <option value="0">Chưa lọc</option>
                 <?php if(count($color->ttp_color)) : ?>
                <?php  foreach($color->ttp_color as $ttpcolor) : ?>
                <option value="<?=@$ttpcolor->id;?>" <?php if(@$mang_thuoctinh[$i]==@$ttpcolor->id){?> selected <?php } ?>><?=@$ttpcolor->name;?></option>

              <?php endforeach;?>
              <?php endif;?>
              </select>
          </div>
          <?php $i++; endforeach;?>
          <?php endif;?>

        </div>
        <h3>Sắp xếp theo</h3>
        <div class="radioGroup">
          <div class="radioButton">
            <div class="radio-but">
              <input type="radio" name="sap_xep" id="sap_xep" <?php if(@$chon_sort=='id'){ echo'checked=""'; } ?> value="id">
               <span class="checkmark"></span>
            </div>
              <label for="">Tin mới trước</label>
          </div>
           <div class="radioButton">
             <div class="radio-but">
               <input type="radio" name="sap_xep" id="sap_xep" <?php if(@$chon_sort=='price'){ echo'checked=""'; } ?>  value="price">
                <span class="checkmark"></span>
             </div>
                <label for="">Giá thấp trước</label>
           </div>
        </div>
        <h3>Đăng bởi</h3>
        <div class="radioGroup">
          <div class="radioButton">
            <div class="radio-but">
              <input type="checkbox" id="type_loc2" name="type_loc2[]" <?php if(@$canhan==1){ echo'checked'; } ?> value="1">
               <span class="checkmark check-mark"></span>
            </div>
              <label for="">Cá nhân</label>
          </div>
           <div class="radioButton">
             <div class="radio-but">
               <input type="checkbox" id="type_loc2" name="type_loc2[]" <?php if(@$cuahang==2){ echo'checked'; } ?> value="2">
                <span class="checkmark check-mark"></span>
             </div>
                <label for="">Cửa hàng</label>
           </div>
        </div>
        <h3>Loại tin rao</h3>
        <div class="radioGroup">
          <div class="radioButton">
            <div class="radio-but">
              <input type="checkbox" id="loaitin_loc2" name="loaitin_loc2[]" <?php if(@$canban==0){ echo'checked'; } ?> value="0">
               <span class="checkmark check-mark"></span>
            </div>
              <label for="">Cần bán</label>
          </div>
           <div class="radioButton">
             <div class="radio-but">
               <input type="checkbox" id="loaitin_loc2" name="loaitin_loc2[]" <?php if(@$canmua==1){ echo'checked'; } ?> value="1">
                <span class="checkmark check-mark"></span>
             </div>
                <label for="">Cần mua</label>
           </div>
        </div>
      </div>
      <div class="modal-foote text-center">
         <button class="btnFilter" onclick="fill_loc3()">Áp dụng</button> 
      <!--  <a class="btn btn-primary btn-sm"  onclick="fill_loc3()"><i class="fa fa-search"></i>Áp dụng</a>-->
      </div>
       </form>
    </div>
  </div>
</div>

<script type="text/javascript">  
   $('#cat_loc2').change(function(){
        var catid = $(this).val();
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/hang_loc2',
            data: {id:catid},
            success: function (res){
                $('#thuoctinh1').html(res);
                $('#thuoctinh2').html('');
            }
        });
        $.ajax({
            type: "POST",
            dataType: "html",
            url: baseurl + 'ajax/ajax/hang_loc2_1',
            data: {id:catid},
            success: function (res){
               $('#thuoctinh3').html(res);
            }
        });
    });
   $('#id_hang_loc2').change(function(){
        var baseurl = '<?php echo base_url();?>';
        var localeid = $('#id_hang_loc2').val();
         $.ajax({
             type: "POST",
             dataType: "html",
             url: baseurl + 'ajax/ajax/thuoctinh_hangloc2',
             data: {loid:localeid},
             success: function (res){
                 $('#thuoctinh2').html(res);
             }
         });
    });
// 
function fill_loc3(){
   var formData = $('#form_1').serialize();
       var duongdan = $('#form_1').attr('action');
       $.ajax({
       // dataType:"json",
        type: "POST",
         url: duongdan,
        data: formData,
        success: function (kq) {
       }
     })
}
   
</script>
<style type="text/css">
  .modal-footer{padding:0px;
  }
  .btnFilter{margin-top: 0px;}
</style>