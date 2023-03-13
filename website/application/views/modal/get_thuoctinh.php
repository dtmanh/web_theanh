<div class="item-sub-app-rv clearfix">
    <div class="sub-app-rv">
      <img src="<?= base_url()?><?=@$hang->image?>" alt="">
      <p><?=@$hang->name?></p>
      <input type="hidden" id="hang_id" name="hang_id" value="<?=@$hang->id?>">
    </div>
    <div class="list-app-rv">
      <h4>Dòng <?=@$hang->name?> phổ biến</h4>
      <ul>
        <?php if (count($thuoctinh)) { foreach ($thuoctinh as $key => $tt) { ?>
        <li><a onclick="chon_thuoctinh(<?=@$tt->id?>,$(this))" href="javascript:;"><?=@$tt->name?></a></li>
        <?php }} ?>
      </ul>
    </div>
  </div>
<script type="text/javascript">
  function chon_thuoctinh(chon, ojb){
   var cat_id = $('#cat_id').val();
   var id_dis = $('#id_dis').val();
   var hang_id = $('#hang_id').val();
  window.location='?cat_id='+cat_id+'&khuvuc='+id_dis+'&hang_id='+hang_id+'&thuoctinh='+chon;
 }
</script>