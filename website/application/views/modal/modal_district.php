        <div class="modal fade" id="myModal_district">
          <div class="modal-dialog modal-dialog-centered mar-top-5">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <div class="pull-left" onclick="get_modalcity()"><i class="fa fa-arrow-left"></i></div>
                <h4 class="modal-title">Chọn khu vực</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">                                        
                <?php if (count($dis)) { ?>
                <ul>
                  <?php foreach ($dis as $key => $di) { ?>
                  <li>
                    <a href="javascript:;"  onclick="chon_dis(<?=@$di->id?>,$(this))" class="clearfix"><?=@$di->name?><span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span></a>
                  </li>
                  <?php } ?>
                </ul>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
        
        <script type="text/javascript">
            function chon_dis(chon,ojb){
               window.location='?&location='+chon;
            }
        </script>