<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://techtology4.0.com
#
# * @Copyright: 2019 - 2021              #
#****************************************#
?>
<section class="content-header">
    <h1>
    
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/product/categories')?>">Danh mục sản phẩm</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp;  Danh mục sản phẩm</h4>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group margin-bottom-20">
                        <a href="<?= base_url('techadmin/product/cat_add')?>" class="btn btn-success">
                            <i class="fa fa-plus"></i> Thêm mới
                        </a>
                        <a onclick="ActionDelete('formbk')" class="btn btn-danger">
                            <i class="fa fa-times"></i> Xóa
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
            
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form name="formbk" method="post" action="<?=base_url('techadmin/product/deletes_category')?>">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="35px" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                            <th width="3%" class="no-sort text-center">Sắp xếp</th>
                            <th width="">Tên</th>
                            <?php if(@$show_image->active!=0 ){?>
                            <th width="7%" class="no-sort">Ảnh</th><?php } ?>
                            <?php if($show_home->active!=0 || $show_hot->active!=0 || $show_focus->active!=0 || $show_coupon->active!=0 ){?>
                            <th width="7%" class="no-sort">Hiển thị</th><?php } ?>
                            <th width="7%" class="no-sort text-center">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            view_product_cate_table($cate,0,'',$show_home,$show_hot,$show_focus,$show_coupon,$show_image);
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
                                                $('#example').DataTable( {           "language": {              "search": "Tìm kiếm"            },
            "columnDefs": [ {
                    "targets": 'no-sort',
                    "orderable": false,
                    } ],
            //"order": [[ 2, "desc" ]],
            "iDisplayLength": 20
        } );
    } );
$("table tbody").sortable({
update: function (event, ui) {
$(this).children().each(function (index) {
$(this).find('td #sort').val(index + 1);
var sort = index + 1;
var id = $(this).find('td #sort').attr('data-item');
var table = $(this).find('td #sort').attr('data-placement');
$.ajax({
type: "POST",
dataType: "html",
url: base_url() + 'ajax/ajax/update_sort',
data: {id:id, sort: sort,table:table},
success: function (result) {
}
});
});
var mss ='<div class="alert alert-success alert-dismissible" role="alert">\
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
    <i class="icon fa fa-success"></i>Bạn đã thay đổi thành công !\
</div>';
$('#show_success_mss').html(mss);
$('#show_success_mss').show();
setTimeout(function(){
$('#show_success_mss').empty();
}, 3000)
} });

</script>
<style>
    .stickytooltip{
box-shadow: 5px 5px 8px #ccc; /*shadow for CSS3 capable browsers.*/
-webkit-box-shadow: 5px 5px 8px #ccc;
-moz-box-shadow: 5px 5px 8px #ccc;
display:none;
position:absolute;
display:none;
border:1px solid #ccc; /*Border around tooltip*/
background:white;
z-index:3000;
}


.stickytooltip .stickystatus{ /*Style for footer bar within tooltip*/
background:#ccc;
color:white;
padding-top:5px;
text-align:center;
font:bold 11px Arial;
}
</style>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>