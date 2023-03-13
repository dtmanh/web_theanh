<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('techadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i>Nhóm thành viên
                    </li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="text-right" style="padding-bottom: 15px">
                    <a href="<?=base_url('techadmin/group/add')?>" class="btn btn-success btn-xs">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                    <a onclick="ActionDelete('frmGroup')" class="btn btn-danger btn-xs">
                        <i class="fa fa-times"></i> Xóa
                    </a>
                </div>
                <div class="clear"></div>

                <div class="">
                    <form name="frmGroup" method="post" action="<?=base_url('techadmin/group/delete')?>">
                    <table width="100%" class="table" border="0" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr class="active">
                            <th width="25" class="title_list">#</th>
                            <th width="20" class="title_list">
                                <input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'frmGroup',0)" />
                            </th>
                            <th width="150" class="title_list">
                                Tên nhóm
                                <!--<img src="<?php /*echo base_url(); */?>templates/admin/images/sort_asc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>name/by/asc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />
                                <img src="<?php /*echo base_url(); */?>templates/admin/images/sort_desc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>name/by/desc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />-->
                            </th>
                            <th class="title_list">
                                <?php /*echo $this->lang->line('descr_list'); */?>Mô tả
                            </th>
                            <th class="title_list">
                                <?php /*echo $this->lang->line('permission_list'); */?>Phân quyền
                            </th>
                            <th width="10%" class="title_list">
                                <?php /*echo $this->lang->line('order_list'); */?>Thứ tự
                                <!--<img src="<?php /*echo base_url(); */?>templates/admin/images/sort_asc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>order/by/asc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />
                                <img src="<?php /*echo base_url(); */?>templates/admin/images/sort_desc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>order/by/desc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />-->
                            </th>
                            <th width="10%" class="title_list">
                                <?php /*echo $this->lang->line('status_list'); */?>Trạng thái
                            </th>
                            <th width="5%" class="title_list text-center">
                                ID
                                <?php /*echo $this->lang->line('id_list'); */?><!--
                                <img src="<?php /*echo base_url(); */?>templates/admin/images/sort_asc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>id/by/asc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />
                                <img src="<?php /*echo base_url(); */?>templates/admin/images/sort_desc.gif" onclick="ActionSort('<?php /*echo $sortUrl; */?>id/by/desc<?php /*echo $pageSort; */?>')" style="cursor:pointer;" border="0" />-->
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!---->
                        <?php $idDiv = 1; ?>
                        <?php foreach($group as $groupArray){ ?>
                            <tr style="background:#<?php if($idDiv % 2 == 0){echo 'F7F7F7';}else{echo 'FFF';} ?>;" id="DivRow_<?php echo $idDiv; ?>" onmouseover="ChangeStyleRow('DivRow_<?php echo $idDiv; ?>',<?php echo $idDiv; ?>,1)" onmouseout="ChangeStyleRow('DivRow_<?php echo $idDiv; ?>',<?php echo $idDiv; ?>,2)">
                                <td class="detail_list" style="text-align:center;"><b><?php echo $sTT++; ?></b></td>
                                <td class="detail_list" style="text-align:center;">
                                    <input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $groupArray->gro_id; ?>" <?php if($groupArray->gro_id == 1 || $groupArray->gro_id == 2 || $groupArray->gro_id == 3 || $groupArray->gro_id == 4){echo 'disabled="disabled"';} ?> onclick="DoCheckOne('frmGroup')" />
                                </td>
                                <td class="detail_list">
                                    <a class="menu" href="<?php if($groupArray->gro_id == 1 || $groupArray->gro_id == 2 || $groupArray->gro_id == 3 || $groupArray->gro_id == 4){echo '#';}else{ ?><?php echo base_url() ?>techadmin/group/add/<?php echo $groupArray->gro_id; ?><?php } ?>" title="<?php if($groupArray->gro_id != 1 && $groupArray->gro_id != 2 && $groupArray->gro_id != 3 && $groupArray->gro_id != 4){echo $this->lang->line('edit_tip');} ?>">
                                        <?php echo $groupArray->gro_name; ?>
                                    </a>
                                </td>
                                <td class="detail_list">
                                    <?php echo sub($groupArray->gro_descr, 50); ?>
                                </td>
                                <td class="detail_list">
                                    <?php /*echo $groupArray->gro_id;*/?>
                                    <?php
                                    if($groupArray->gro_id == 4){
                                        echo 'Toàn quyền quản trị';}
                                    elseif($groupArray->gro_id == 1 || $groupArray->gro_id == 2 || $groupArray->gro_id == 3 || $groupArray->gro_permission == 'none'){echo 'Không có quyền quản trị';
                                    }else{echo 'Tùy thuộc chức năng';} ?>
                                </td>
                                <td class="detail_list" style="text-align:center;">
                                    <b><?php echo $groupArray->gro_order; ?></b>
                                </td>
                                <td class="detail_list" style="text-align:center;">
                                    <?php if($groupArray->gro_status == 1){ ?>
                                        <img src="<?php echo base_url(); ?>assets/img/admin/active.png" onclick="ActionStatus('<?=base_url('techadmin/group/deactive/'.$groupArray->gro_id)?>')" style="cursor:pointer;" border="0" title="<?php echo $this->lang->line('deactive_tip'); ?>" />
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>assets/img/admin/deactive.png" onclick="ActionStatus('<?=base_url('techadmin/group/active/'.$groupArray->gro_id)?>')" style="cursor:pointer;" border="0" title="<?php echo $this->lang->line('active_tip'); ?>" />
                                    <?php } ?>
                                </td>
                                <td class="detail_list" style="text-align:center;">
                                    <?php echo $groupArray->gro_id; ?>
                                    <!--<a class="btn btn-xs btn-default"  href="<?php /*if($groupArray->gro_id == 1 || $groupArray->gro_id == 2 || $groupArray->gro_id == 3 || $groupArray->gro_id == 4){echo '#';}else{ */?><?php /*echo base_url() */?>techadmin/group/add/<?php /*echo $groupArray->gro_id; */?><?php /*} */?>" title="<?php /*if($groupArray->gro_id != 1 && $groupArray->gro_id != 2 && $groupArray->gro_id != 3 && $groupArray->gro_id != 4){echo "Sửa nhóm";} */?>"><i class='fa fa-pencil'></i></a>-->
                                    <!--<a href="<?/*=base_url();*/?>techadmin/group/add/<?/*=@$groupArray->gro_id*/?>" class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>-->
                                    <!--<a href="<?/*=base_url()*/?>/cat_delete/1" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-danger" title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>-->
                                </td>
                            </tr>
                            <?php $idDiv++; ?>
                        <?php } ?>
                        <!---->
                        <tr>
                            <td id="show_page" colspan="8"><?php echo $linkPage; ?></td>
                        </tr>
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

        <link href="<?=base_url('assets/css/bootstrap-toggle.min.css')?>" rel="stylesheet">
        <script src="<?=base_url('assets/js/bootstrap-toggle.min.js')?>"></script>

        <script type="text/javascript">

            function active_user(user){
                var baseurl = '<?php echo base_url();?>';

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: baseurl + 'admin/users/active_user',
                    data: {id:user},
                    success: function (ketqua) {

                    }
                })
            }
            function changeStatus(id) {
                var data = {id: id};
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?=  base_url('techadmin/users/changeStatusUser')?>",
                    cache: false,
                    dataType: 'json',
                    success: function (e) {
                        if (e) {
                            $("#" + id).html(e);
                        }
                    }
                });
            }
        </script>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>