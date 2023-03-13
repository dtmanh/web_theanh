
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>

<section class="container">
    <div class="fix-list"></div>
    <div class="menu-detail" style="margin-top: 50px;">
        <section class="cate-danh-muc">
            <a href="#">
                <p>Đăng tin</p>
            </a>
        </section>
    </div><!---menu-detail--->
    <div class="clearfix"></div>

    <section class="col-xs-12">
        <div class="row">
            <section class="col-md-3  col-sm-12 col-xs-12">
                <div class="row">
                    <section class="sidebar">
                        <section class="sidebar_title">TRANG CÁ NHÂN</section>
                        <ul style="background: #ffffff">
                            <li>
                                <a href="<?= base_url('san-pham-quan-tam') ?>">
                                    <i class="fa fa-check"></i>
                                    Sản phẩm quan tâm
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('trang-ca-nhan') ?>">
                                    <i class="fa fa-check"></i>
                                    Tin rao vặt đã đăng
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('thong-tin-dat-hang') ?>">
                                    <i class="fa fa-check"></i>
                                    Danh sách đặt hàng
                                </a>
                            </li>
                        </ul>
                    </section>
                </div><!--end row-->
            </section>
            <!---End .sidebar_box_1--->
            <section class="col-md-9 col-sm-12 col-xs-12" >
                <div class="sidebar_title" style="text-align: left !important;margin-top: 10px;">
                    <span style="margin-left: 20px !important;">Danh sách đặt hàng</span>
                </div>
                <div id="loginbox" style="padding-top: 10px">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th width="15%">Chức năng</th>
                        </tr>
                        <?php if (isset($orderlist)) {
                            $s=1;
                            $stt = 1;
                            foreach (@$orderlist as $v) {
                                $j=$stt++;
                                $id_tr='id_tr'.$j;
                                ?>
                                <tr>
                                    <td width="5%"><?=$s++; ?></td>
                                    <td>
                                        <div data-items="<?=$id_tr;?>"     onclick="show_detail($(this).attr('data-items'),<?=$v->id?>,'<?=$id_tr.'1';?>',<?=$v->show?>)">
                                            <a style="cursor: pointer" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
                                                <i class="fa fa-caret-down" style="font-size: 11px"></i> <?= @$v->code ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td width="15%"
                                        style="font-size: 12px"><?= date('d-m-Y H:i',$v->time); ?>
                                    </td>
                                    <td>
                                        <?php if(@$v->status == 0){
                                            ?>
                                            <!-- Small modal -->
                                            <a style="cursor: pointer;color:red"  data-toggle="modal" data-target=".bs-example-modal-sm-notactive">
                                                <i class="fa fa-envelope-o"></i>&nbsp;Không được duyệt
                                            </a>

                                            <div class="modal fade bs-example-modal-sm-notactive" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="gridSystemModalLabel">Thông báo từ giare24h.vn</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <?php if($v->admin_note) : ?>
                                                                        <?php else:?>
                                                                            <span>
                                                                                Xin lỗi bạn.Đơn hàng này chưa được duyệt vì
                                                                                Lỗi điền thông tin cá nhân
                                                                            </span>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        <?php
                                        }?>
                                        <!-----Da duyet-------->
                                        <?php if((@$v->status == 1)||(@$v->status==3)){
                                            ?>
                                            <!-- Small modal -->
                                            <a style="cursor: pointer;color:blue"  data-toggle="modal" data-target=".bs-example-modal-sm-active">
                                                <i class="fa fa-envelope-o"></i>&nbsp;Đã duyệt
                                            </a>

                                            <div class="modal fade bs-example-modal-sm-active" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="gridSystemModalLabel" style="color:blue">Thông báo từ giare24h.vn</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <?php if($v->admin_note) : ?>
                                                                            <span><?=@$v->admin_note?></span>
                                                                        <?php else:?>
                                                                            <span>
                                                                                Đơn hàng của bạn đã được duyệt,
                                                                                Chúng tôi sẽ chuyển hàng tới bạn trong thời gian sớm nhất
                                                                            </span>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        <?php
                                        }?>
                                        <?php
                                            if(@$v->status == 2){echo "<span>Chưa duyệt</span>";}
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-xs">
                                            <a href="<?= base_url('huy-dat-hang/' . @$v->id) ?>" title="Xóa"
                                               class="btn btn-xs btn-danger" style="color: #fff"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-times"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none" id="<?=$id_tr;?>" data-value="1">
                                    <td colspan="8">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Tên hàng</th>
                                                    <th>Số lượng</th>
                                                    <th>Màu</th>
                                                    <th>Size</th>
                                                    <th>Đơn giá(?)</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                <?php
                                                $tootle=0;
                                                $sub_total=0;
                                                foreach($detail as $d){
                                                    if($d->order_id==$v->id){
                                                        $sub_total = $d->price*$d->count;
                                                        $tootle+=$sub_total;
                                                        ?>
                                                        <tr>
                                                            <td><?=$d->name;?></td>
                                                            <td><?=$d->count;?></td>
                                                            <td>
                                                                <?= ($d->color=='0'||$d->color=='')?'':'<div style="padding: 0px 5px ; float: left">Màu:</div> <div style="background:'.$d->color.';width: 20px; height:20px;float:left "></div> ';?>
                                                            </td>
                                                            <td>
                                                                <?= ($d->size=='0'||$d->size=='')?'':'<div style="padding: 0px 5px ; float: left">Size:</div> <div style="">'.$d->size.'</div> ';?>
                                                            </td>
                                                            <td><?=number_format($d->price);?>&nbsp;VND</td>
                                                            <td><?=number_format($sub_total);?>&nbsp;VND</td>
                                                        </tr>

                                                    <?php }
                                                }

                                                ?>
                                                <tr>
                                                    <td colspan="6" class="text-right">Tổng giá trị đơn hàng: <?=number_format($tootle);?>&nbsp;VND</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        } ?>
                    </table>
                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links(); // tạo link phân trang
                        ?>
                    </div>

                </div><!-- .loginbox-->
            </section>
            <!---End Left------->
        </div><!--end row-->
    </section>
</section>
<input type="hidden" id="baseurl" value="<?=base_url();?>">
<script>
    function show_detail(id_tr,id_order,status,show){
        if($('#'+id_tr).attr('data-value')=='1'){
            $('#'+id_tr).show();
            $('#'+id_tr).attr('data-value','2');
        }else{
            $('#'+id_tr).hide();
            $('#'+id_tr).attr('data-value','1');
        }
        if(show==0){
            var baseurl = $('#baseurl').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: baseurl + 'admin/order/update_show',
                data: {order:id_order},
                success: function (rs) {
                    $('#'+status).removeClass('red').addClass('blue');
                }
            })
        }
    }
    function mark(id_order, mark, div) {

        var baseurl = $('#baseurl').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: baseurl + 'admin/order/update_show',
            data: {id_order: id_order},
            success: function (rs) {
                if(rs==1){
                    $('#' + div).removeClass('fa-square-o').addClass('fa-check-square-o');
                }
                if(rs==0){
                    $('#' + div).removeClass('fa-check-square-o').addClass('fa-square-o');
                }

            }
        })
    }


    function add_admin_note(id,note){
        var baseurl = $('#baseurl').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + 'admin/order/update_admin_note',
            data: {id:id,note:$('#'+note).val()},
            success: function (result) {

                if(result.status==true){

                    var t2='<div class=" alert-ml col-xs-12 alert alert-info alert-dismissible" role="alert" style="opacity: 1 !important;  ">\
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        +result.mess+
                        '</div>';
                    $('#show_mss').html(t2);

                    setTimeout(function(){
                        $('#show_mss').empty();
                    }, 5000)
                }
            }
        })
    }

    function messs () {
        setTimeout(show_mss, 2000)
    }

</script>


