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
                        <i class="fa fa-table"></i> Quản lý nhóm thuộc tính
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
                          enctype="multipart/form-data" >
                        <input type="hidden" name="edit" value="<?=@$edit->id;?>">
                        <div class="admin-content">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-tech">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Nhóm thuộc tính</a></li>
                                        <li><a data-toggle="tab" href="#menu1">Danh mục</a></li>
                                        <li class="pull-right">
                                            <button type="submit" class="btn btn-success btn-sm" name="addshipping"><i class="fa
                                        fa-check"></i> Cập nhật</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-lg-3 control-label">Tên nhóm:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm validate[required]" name="name"
                                                               value="<?=@$edit->name;?>" placeholder="Tên nhóm..."  />
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-lg-3 control-label">Thứ tự:</label>
                                                    <div class="col-lg-8">
                                                        <input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-lg-3 control-label">Mô tả:</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
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
<script src="<?=base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js')?>"></script>
<script>
    $('.cat_checklist').slimScroll({
        height: '500px',
        alwaysVisible: true,
        railVisible: true
    });
</script>

<script>
    $(document).ready( function() {
        $(".validate").validationEngine();
    });
</script>