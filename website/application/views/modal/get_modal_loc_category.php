<!-- The Modal -->
<div class="modal fade" id="get_modal_loc_category">
  <div class="modal-dialog modal-dialog-centered mar-top-5">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <div class="pull-left" onclick="get_modalcategory()"><i class="fa fa-arrow-left"></i></div>
        <h4 class="modal-title">Chọn danh mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <?php if (count($cat_loc_parent)) { ?>
      <div class="modal-body">
        <ul>
          <?php foreach ($cat_loc_parent as $key => $cat) { ?>
          <li>
            <a href="javascript:;"  onclick="chon_cat_parent(<?=@$cat->parent_id?>,$(this))" class="clearfix"><?=@$cat->name?><span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
</div>