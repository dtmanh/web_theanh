        <div class="modal fade" id="myModal_city">
        <div class="modal-dialog modal-dialog-centered mar-top-5">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chọn khu vực</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">                                        
              <?php if (count($city)) { ?>
              <ul>
                <?php foreach ($city as $key => $ci) { ?>
                <li>
                  <a href="javascript:;"  onclick="chon_city(<?=@$ci->id?>,$(this))" href="" class="clearfix"><?=@$ci->name?><span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
                </li>
                <?php } ?>
              </ul>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
        <script type="text/javascript">
               function chon_city(chon, ojb){
                 //  $('.modal').remove();
                   $.ajax({
                    url:base_url() + 'modal/chon_city',
                    dataType:"html",
                    type:"POST",
                    data:{id_city:chon},
                     beforeSend:function(){
                      $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
                  },
                    success:function(res){
                        $('body').append(res);
                        $("#myModal_district").modal();
                    }
                });
              }
                    
        </script>