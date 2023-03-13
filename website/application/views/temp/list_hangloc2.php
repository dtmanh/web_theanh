<?php if(count($dshang)) : ?>
  <div class="choose-rv cat-lis">
      <select name="id_hang_loc2" id="id_hang_loc2" class="form-control" style="width:95%;margin-left:20px">
         <option value="">Tất cả các hãng</option>
        <?php foreach($dshang as $hang) : ?>
        <option value="<?=@$hang->id;?>"><?=@$hang->name;?></option>
      <?php endforeach;?>
      </select>
  </div>
  <?php endif;?>
<script type="text/javascript">    
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
</script>