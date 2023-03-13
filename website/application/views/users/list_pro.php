<section class="content clearfix">
    <div class="container">
        <div class="clearfix row">
            <ul class="breadcrumb">
                <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                <li><a href="javascript:void(0)">Danh sách sản phẩm</a> </li>
            </ul>
        </div>
        <div class="row">
            <div class="block-content  clearfix">
                <div class="pro_floo clearfix">
                    <?php echo $this->load->widget('blkmenu_users');?>
                    <div class="col-md-9 col-right col-sm-9 col-xs-12 box-user">
                        <?php if($this->session->flashdata('sussec')): ?>
                        <div class="alert alert-success">
                            <strong>Thông báo!</strong> <?=$this->session->flashdata('sussec')?>.
                        </div>
                        <?php endif; ?>
                        <header class="page-header">
                            <h1 class="page-title">
                                Danh sách sản phẩm đã đăng
                            </h1>
                        </header>
                        <div class="clearfix-20"></div>
                        <div class="clearfix">
                            <div class="clearfix"></div>
                            <div class="clearfix">
                                <a href="<?= base_url('users/add_product') ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                                <a onclick="ActionDelete('formbk')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> Xóa
                                </a>
                            </div>
                            <div class="clearfix-10"></div>
                            <div>
                                <form name="formbk" method="post" action="<?=base_url('users/deletes')?>">
                                    <div class="table-responsive">
                                        <table class="table  table-hover table-bordered">
                                            <tr>
                                                <th width="3%"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
                                                <th width="2%">STT</th>
                                                <th width="10%">Ảnh</th>
                                                <th >Tên sản phẩm</th>
                                                <th width="10%">Danh mục</th>
                                                <th width="10%">Trạng thái</th>
                                                <th width="10%">Tình Trạng </th>
                                                <th width="10%">Ngày đăng</th>                                                
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <?php if(isset($prolist)): ?>
                                            <?php $s=1; ?>
                                            <?php foreach($prolist as $v): ?>
                                            <tr>
                                                    <td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
                                                    <td><?= $s++; ?></td>
                                                    <td>
                                                        <img  src="<?= base_url('upload/img/products/'.$v->pro_dir.'/thumbnail_2_'.@$v->image) ?>" style="width: 65px; height: 40px">
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('users/edit/' . $v->id) ?>" title="Sửa sản phẩm">
                                                            <?= @$v->name ?>
                                                        </a>
                                                    </td>
                                                    <td><?= @$v->cat_name->name; ?></td>
                                                    <td class="text-center">
                                                        <?php if($v->active == 1) : ?>
                                                                <img title="Đã được duyệt" src="<?=base_url()?>assets/img/admin/active.png"  style="cursor:pointer;" border="0" alt="Hoạt động" />
                                                        <?php else :?>
                                                                <img title="Chưa được duyệt" src="<?=base_url()?>assets/img/admin/deactive.png" style="cursor:pointer;" border="0" alt="Không hoạt động" />
                                                        <?php endif ;?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($v->status){
                                                                echo "Còn Hàng";
                                                            }else{
                                                                echo "Hết Hàng";
                                                            }
                                                         ?>
                                                    </td>
                                                    <td><?=date('d/m/Y',$v->time);?></td>
                                                    <td class="text-center">
                                                        <div style="text-align: center; " class="action">
                    
                                                            <a href="<?=base_url($v->alias.'.html')?>" class="btn btn-xs btn-default" target="_blank" title="Xem trước"><i class="fa fa-eye"></i></a>
                                                            <a href="<?= base_url('users/edit/' . $v->id) ?>" class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('users/delete/' . $v->id) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                               class="btn btn-xs btn-danger"title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>

                                                        </div>
                                                    </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="pagination  ">
                            <?php
                            
                            echo $this->pagination->create_links(); // tạo link phân trang
                            ?>

                        </div>
                    </div>
                    <div id="images_up"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function DoCheck(status,FormName,from_)
    {
        var alen=eval('document.'+FormName+'.elements.length');
        alen=(alen>1)?eval('document.'+FormName+'.checkone.length'):0;
        if (alen>0)
        {
            for(var i=0;i<alen;i++)
                eval('document.'+FormName+'.checkone[i].checked=status');
        }
        else
        {
            eval('document.'+FormName+'.checkone.checked=status');
        }
        if(from_>0)
            eval('document.'+FormName+'.checkall.checked=status');
    }
    function ActionDelete(formName)
    {
        var $check = false;
        jQuery("input[name='checkone[]']").each(function(){
            if($(this).is(':checked')){
                $check = true;
            }
        });
        if($check == false){
            alert('Bạn chưa chọn mục nào để xóa');
        }
        else{
            if(confirm('Bạn có chắc chắn muốn xóa không ?')){
                eval('document.' + formName + '.submit();');
            }
        }
    }
    function image_up(id)
    {
        $.ajax({
            type:'GET',
            url: '<?=base_url()?>users/up_image2',
            dataType: 'html',
            data:{id:id},
            success: function(rs)
            {
                console.log(rs);
                $('#images_up').html(rs);
                $('#images_u').modal();
            }
        });
    }
</script>