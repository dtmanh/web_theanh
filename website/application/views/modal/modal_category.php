<!-- The Modal -->
<div class="modal fade" id="myModal_category">
  <div class="modal-dialog modal-dialog-centered mar-top-5">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        
        <h4 class="modal-title">Chọn danh mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <?php if (count($cattegory)) { ?>
      <div class="modal-body">
        <ul>
          <?php foreach ($cattegory as $key => $cat) { ?>
          <li>
            <a href="javascript:;"  onclick="chon_category(<?=@$cat->id?>,$(this))" class="clearfix"><?=@$cat->name?><span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
     function chon_category(chon, ojb){
       //  $('.modal').remove();
         var id_dis = $('#id_dis').val();
         $.ajax({
          url:base_url() + 'modal/chon_category',
          dataType:"json",
          type:"POST",
          data:{id_category:chon},
          success:function(res){
            window.location=base_url('danh-muc/') + res.cat_alias+'.html?location='+id_dis;
          }
      });
    }
 

</script>
