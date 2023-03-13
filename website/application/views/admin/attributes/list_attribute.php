<?php
/**
 * Created by JetBrains PhpStorm.
 * User: NguyenDai
 * Date: 8/16/16
 * Time: 1:40 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url('techadmin')?>">Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Danh sách thuộc tính
                    </li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="text-left" style="padding-bottom: 15px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Thuộc tính</h3>
                            <div class="pull-right">
                                <a href="<?=base_url('techadmin/attribute/add')?>">
                                    <div class="btn btn-success btn-xs"><i class="fa fa-plus"></i>Thêm</div>
                                </a>
                                <!--<a onclick="ActionDelete('frmNews')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-times"></i> Xóa
                                </a>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form name="frmNews" method="post" action="">
                            <table class="table table-hover">
                                <thead>
                                <tr class="success">
                                    <!--<th width="5%"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'frmNews',0)"></th>-->
                                    <th>Tên thuộc tính</th>
                                    <th>Tên nhóm thuộc tính</th>
                                    <th width="15%">Giá trị</th>
                                    <th>Sắp xếp</th>
                                    <th>Hiển thị</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($attris as $attri) : ?>
                                    <?php 
                                        ($attri->home == 1)?$home='background:#000088':$home='';
                                        ($attri->hot == 1)?$hot='background:#ff0000':$hot='';
                                        ($attri->focus == 1)?$focus='background:green':$focus='';
                                     ?>
                                    <tr>
                                        <!--<td>
                                            <input type="checkbox" name="checkone[]" id="checkone" value="<?/*=$attri->id;*/?>">
                                        </td>-->
                                        <td><?=@$attri->name;?></td>
                                        <td><?=@$attri->group_name;?></td>
                                        <td><?=@$attri->text;?></td>
                                        <td><?=@$attri->sort;?></td>
                                        <td>
                                            <div data-toggle='tooltip' data-placement='top' title='home' data-value='<?=$attri->id?>' data-view='home' class='view_color_sale' style='border: 1px solid #000088;margin-right: 10px;<?=$home?>'></div>
                                            <div data-toggle='tooltip' data-placement='top' title='hot' data-value='<?=$attri->id?>' data-view='hot' class='view_color_sale' style='border: 1px solid #ff0000;margin-right: 10px;<?=$hot?>'></div>
                                            <div data-toggle='tooltip' data-placement='top' title='focus' data-value='<?=$attri->id?>' data-view='focus' class='view_color_sale' style='border: 1px solid green;margin-right: 10px;<?=$focus?>'></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?=site_url('techadmin/attribute/edit/'.$attri->id)?>" class="btn btn-xs btn-default" title="S?a"><i class="fa fa-pencil"></i></a>
                                            <a href="<?=site_url('techadmin/attribute/delete/'.$attri->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-danger" title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links(); // tạo link phân trang
                        ?>
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


<style type="text/css">
    .view_color_sale {
        width: 10px;
        height: 10px;
        float: left;
        margin-top: 5px;
        cursor: pointer;
    }
</style>
<script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })


            $('.view_color_sale').click(function(){

                
                var color = $( this ).css( "border-color" );
                var background = $( this ).css( "background-color" );

                var baseurl = $("#baseurl").val();
                //alert(baseurl);
                //alert($( this ).attr('data-value'));

                //var id= $( this ).attr('data-value');
                //var view=$( this ).attr('data-view');
                //alert(id+view);
                var form_data = {
                    id: $( this ).attr('data-value'),view:$( this ).attr('data-view'),
                };
                //alert(id);
                $.ajax({
                    url: baseurl+"techadmin/attribute/update_attr_view",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    success: function (rs) {

                    }
                });
                if(color!=background){
                    $( this ).css( "background-color",color ) ;
                }else{
                    $( this ).css( "background-color",'#fff' ) ;
                }
            });
</script>