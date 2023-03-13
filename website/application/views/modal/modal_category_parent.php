<!-- The Modal -->
<div class="modal fade" id="myModal_category_parent">
  <div class="modal-dialog modal-dialog-centered mar-top-5">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <div class="pull-left" onclick="get_modalcategory()"><i class="fa fa-arrow-left"></i></div>
        <h4 class="modal-title">Chọn danh mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <?php if (count($cattegory_parent)) { ?>
      <div class="modal-body">
        <ul>
          <?php foreach ($cattegory_parent as $key => $cat) { ?>
          <li>
            <a href="javascript:;"  onclick="chon_cat_parent(<?=@$cat->id?>,$(this))" class="clearfix"><?=@$cat->name?><span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
          </li>
          <?php } ?>
          <li>
            <a href="javascript:;"  onclick="get_modalcategory()" class="clearfix">Về lại danh mục <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
          </li>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
function chon_cat_parent(chon, ojb){
  var id_dis = $('#id_dis').val();
  $.ajax({
      url:base_url() + 'modal/direct_cat',
      dataType:"json",
      type:"POST",
      data:{cat_id:chon},
      success:function(res){
        window.location=base_url('danh-muc/') + res.cat_alias+'.html?location='+id_dis;
       // window.location='?cat_id='+chon+'&khuvuc='+id_dis;
      }
  });
}
</script>
