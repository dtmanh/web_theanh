<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i>Thuộc tính
                    </li>
                    <?php if(isset ($error)){?>
                        <li class="">
                            <span style="color: red"> <?= $error;?></span>
                        </li>
                    <?php }?>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="body collapse in" id="div1">
                    <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
                          enctype="multipart/form-data">
                        <input type="hidden" name="edit" value="<?=@$edit->id;?>">
                        <div class="admin-content">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-tech">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Thuộc tính</a></li>
                                        <li><a data-toggle="tab" id="gia-tri-khoi-tao" href="#menu2">Giá trị khởi tạo</a></li>
                                        <li><a data-toggle="tab" href="#menu1">Danh mục</a></li>
                                        <li class="pull-right">
                                            <button type="submit" class="btn btn-success btn-sm" name="addshipping"><i class="fa
                                        fa-check"></i>Lưu</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 control-label">Nhóm thuộc tính:</label>
                                                <div class="col-lg-5">
                                                    <select name="group_id" id="group" class="form-control">
                                                        <?php foreach($groups as $group) : ?>
                                                            <option value="<?=$group->id?>"><?=@$group->name;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 control-label">Tên thuộc tính:</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control input-sm validate[required]" name="name"
                                                           value="<?=@$edit->name;?>" placeholder="Nhập tên thuộc tính..."  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 control-label">Kiểu dữ liệu:</label>
                                                <div class="col-lg-5">
                                                    <select name="type" id="type_data" class="form-control">
                                                        <option value="">Chọn kiểu dữ liệu</option>
                                                        <option value="text">Text</option>
                                                        <option value="number">Number</option>
                                                        <option value="selectbox">Select Box</option>
                                                        <option value="checkbox">Check Box</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Thứ tự:</label>
                                                <div class="col-lg-3">
                                                    <input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <div class="table-responsive col-sm-5">
                                                <table class="table table-hover" id="discount">
                                                    <thead>
                                                    <tr class="active">
                                                        <th>Thứ tự </th>
                                                        <th>Giá trị</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr><td colspan="2"></td><td><a onclick="addDiscount();" class="btn btn-info">Thêm</a></td></tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <div class="col-sm-12  " style="border: 1px solid #ccc;padding: 5px">
                                                <div class=" checklist_cate cat_checklist">
                                                    <?php if (isset($cate_selected)) $cate_selected = $cate_selected;
                                                    else $cate_selected = null;
                                                    view_product_cate_checklist($cate, 0, '', @$cate_selected)?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

<style>
    li{
        list-style: none;
    }
    .checklist_cate ul{padding: 0px; margin: 0px}
    .checklist_cate label{font-weight: normal}
</style>
<script>
    $(document).ready( function() {
        $(".validate").validationEngine();
    });
    $('#type_data').change(function(){
        var data = $(this).val();
        if(data == 'text'){
            $('#gia-tri-khoi-tao').parent().attr("style",'display:none');
        }else{
            $('#gia-tri-khoi-tao').parent().attr("style",'display:block');
        }
    });
</script>
<script type="text/javascript"><!--
    var discount_row = 0;

    function addDiscount() {
        html  = '<tbody id="discount-row' + discount_row + '">';
        html += '<tr>';
        html += '<td width="20%"><input type="text" name="stt[]" value="" /></td>';
        html += '    <td><input type="text" name="value[]" value="" /></td>';
        html += '    <td class="left"><a onclick="$(\'#discount-row' + discount_row + '\').remove();" class="btn btn-danger">Xóa</a></td>';
        html += '  </tr>';
        html += '</tbody>';

        $('#discount tfoot').before(html);


        discount_row++;
    }
    //--></script>