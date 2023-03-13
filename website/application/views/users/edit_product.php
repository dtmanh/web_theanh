
<section class="clearfix">
    <div class="container">
        <div class="row">
            <div class="clearfix">
                <ul class="breadcrumb">
                    <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                    <li><a href="javascript:void(0)"><?=lang('user-mana');?></a> </li>
                </ul>
            </div>
            <div class="block-content clearfix">
                <div class="pro_floo clearfix">
                    <?php echo $this->load->widget('blkmenu_users');?>
                    <div class="col-md-9 col-right col-sm-9 col-xs-12 box-user">
                        <div class="clearfix">
                            <header class="page-header">
                                <h1 class="page-title">
                                    Sửa sản phẩm
                                </h1>
                            </header>

                            <div class="clearfix clearfix-20"></div>
                                <div class="col-md-12"><p><?=$this->session->flashdata("sessecfull");?></p></div>
                                <form method="post" id="form-bk" class="validate" action="<?=base_url('users/edit').'/'.$product->id?>" enctype="multipart/form-data">

                                    <div class="col-md-6 col-md-sm">
                                        <div class="form-group">
                                            <label for="name_pro">Tên sản phẩm:</label>
                                            <input type="text" oninput="createAlias(this)" name="name_pro" class="form-control validate[required]" id="name_pro" value="<?=$product->name;?>">
                                        </div>
                                        <div class="form-group" id="error-alias">
                                            <label for="alias">Alias:</label>
                                            <input type="text" onchange="createAlias(this)" name="alias" class="form-control validate[required]" id="alias" value="<?=$product->alias;?>">
                                            <script type="text/javascript">
                                                var randomString = function(length) {
                                                    var text = "";
                                                    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                                                    for(var i = 0; i < length; i++) {
                                                        text += possible.charAt(Math.floor(Math.random() * possible.length));
                                                    }
                                                    return text;
                                                }
                                                function NewAlias() {
                                                    var alias = $('#alias').val();

                                                    if(alias.length <= 0){
                                                        alert('Bạn Chưa Nhập Tên Sản Phẩm !');
                                                        $('#name_pro').focus();
                                                        return null;
                                                    }
                                                    var NewAlias = alias + '-'+ randomString(5);
                                                    $('#alias').val(NewAlias);
                                                    //console.log(NewAlias);
                                                    
                                                }
                                            </script>
                                            <br>
                                            <button type="button" onclick="NewAlias()" id="rngalias" class="btn btn-default">Tạo Alias Ngẫu Nhiên</button>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá gốc:</label>
                                            <input type="text" name="price" class="form-control" id="price" value="<?=$product->price?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alias">Giá khuyến mại:</label>
                                            <input type="text" name="price_sale" class="form-control" id="price_sale" value="<?=$product->price_sale?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cate_pro">Danh mục sản phẩm:</label>
                                            <select class="form-control" name="cate_pro" id="cate_pro">
                                                <option>--Mời chọn--</option>
                                                <?php view_product_cate_select($cate_pro,0,'',$product->category_id); ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-sm">
                                        <div class="form-inline">
                                            <label class="label label-info" for="status">Sản Phẩm Còn/Hết Hàng</label>
                                            <input type="checkbox" name="status" value="1" class="checkbox form-control" id="status" <?php if($product->status){  echo 'checked="checked"'; } ?>> 
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ảnh sản phẩm</label>
                                            <input type="file" accept="image/*" id="exampleInputFile" name="userfile" onchange="loadFile(event)">
                                            <div class="clearfix" style="display: inline-block;border:1px solid #ddd;padding;3px"><img style="max-height: 120px;max-width: 100%" src="<?=base_url('upload/img/products');?>/<?=$product->pro_dir?>/<?=$product->image?>" class="img_up" id="output"/></div>
                                            <p class="help-block">Ảnh sản phẩm cần rõ nét.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-sm">

                                        <div class="form-group">
                                            <label for="exampleInputFile">Chọn thêm ảnh</label>
                                            <input type="file" accept="image/*" id="exampleInputFile" multiple name="images[]">
                                            <p class="help-block">Ảnh sản phẩm cần rõ nét.</p>
                                        </div>
                                        <div class="multi_image" style="max-height: 186px;overflow: auto">
                                            <table class="table">
                                                <?php foreach($images as $img) : ?>
                                                    <tr id="row_<?=@$img->id;?>">
                                                        <td><img style="max-height: 45px;max-width: 100%" src="<?=base_url($img->link);?>"></td>
                                                        <td><button type="button"  onclick="delete_img(<?=@$img->id;?>)" class="btn btn-xs btn-danger" title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </button></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <?php if($this->session->flashdata('mess')): ?>
                                            <div class="alert alert-success">
                                                <strong>Success!</strong> <?=$this->session->flashdata('mess')?>.
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <ul class="navs nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#home">Mô tả</a></li>
                                                <li><a data-toggle="tab" href="#menu1">Thông số kỹ thuật</a></li>
                                                <li><a data-toggle="tab" href="#menu2">Chi Tiết</a></li>
                                                <li><a data-toggle="tab" href="#menu3">Thêm tùy chọn</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">
                                                    <div class="form-group">
                                                        <div class="clearfix-5"></div>
                                                        <label for="description">Mô tả:</label>
                                                        <textarea name="description" class="form-control" rows="5" id="description"><?= base64_decode($product->description) ?></textarea>
                                                        <?php echo display_ckeditor($description); ?>
                                                    </div>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                    <div class="clearfix-5"></div>
                                                    <label for="caption_2">Thông số kỹ thuật:</label>
                                                    <textarea name="caption_2" class="form-control" rows="5" id="caption_2"><?= base64_decode($product->caption_2) ?></textarea>
                                                    <?php echo display_ckeditor($caption_2); ?>
                                                </div>
                                                <div id="menu2" class="tab-pane fade">
                                                    <div class="clearfix-5"></div>
                                                    <label for="detail">Chi tiết:</label>
                                                    <textarea name="detail" class="form-control" rows="5" id="detail"><?= base64_decode($product->detail) ?></textarea>
                                                    <?php echo display_ckeditor($detail); ?>
                                                </div>
                                                <div id="menu3" class="tab-pane fade">
                                                    <div class="clearfix-5"></div>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <label for="option">Danh sách tùy chọn:</label>
                                                            <select name="group" id="option" class="form-control">
                                                                <option value="0">--Chọn Option--</option>
                                                                <?php if(count($options) !=0): ?>
                                                                    <?php foreach($options as $row): ?>
                                                                        <option <?php (count($check_opt) != 0 && $check_opt->option_id == $row->option_id) ? print 'selected="selected"' : ''; ?> value="<?=$row->option_id?>"><?=$row->name?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="clearfix-10"></div>
                                                        <div class="col-md-2 box-opt">
                                                            <ul>
                                                                <li class="title">Danh sách</li>
                                                                <?php if(count($list_opt)!=0): ?>
                                                                <?php foreach($list_opt as $row): ?>
                                                                    <li><i title="xóa tùy chọn" onclick="remove_opt(<?=$row->id?>)" class="fa fa-minus-circle" aria-hidden="true"></i> <a href="javascript:;" onclick="view_list(<?=$row->id?>, <?=$product->id?>)"><?=$row->opt->name?></a></li>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="col-md-12">
                                                                <div id="list_value"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="hidden" name="addnews" value="1">
                                    <button type="button" class="btn btn-sm btn-primary add_pro" name="editnews" onclick="UpdateProducts()">Cập Nhật</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="v_option"></div>
</section>
<style type="text/css">
    .box-opt .title {
        padding: 5px;
        background: #ca181f;
        text-align: center;
        color: #fff;
        font-size: 13px;
        text-transform: uppercase;
        margin-top: 5px;
        border-radius: 4px;
        font-weight: bold;
    }
    .box-opt li {
        padding: 5px;
        background: #0BC7FF;
        margin-top: 5px;
        border-radius: 4px;
    }
    .box-opt li i{
        color: #ffffff;
        font-size: 15px;
        cursor: pointer;
    }
    .box-opt li a{
        padding: 5px 10px 5px 0px;
        font-size: 15px;
        color: #ffffff;
    }
</style>
<script src="<?=base_url();?>/assets/js/admin/main_site.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/front_end/user.js') ?>"></script>
<script type="text/javascript">
    $(function(){
        $('#update_pass').click(function(){
            var check_form = $('#form_change_pass').validationEngine('validate');
            if(check_form){
                $('#form_change_pass').submit();
            }
        });
    });
    var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    };
        function UpdateProducts()
    {
        $('#error-alias .alert-danger').remove();
        if($('#form-bk').validationEngine('validate')){
            // chekc giá sản phảm 
            var price = parseInt($('#price').val());
            var price_sale  = parseInt($('#price_sale').val());
            var validate = true;var validate1 = true;
            if(price_sale > price){
                alert('giá khuyến mại phải thấp hơn giá sản phẩm ! ');
                 $('#price_sale').focus();
                 validate1 = false;
            }
            // check chọn menu danh mục sản phẩm 
            var cate = $('#cate_pro').val(); 
            if(cate == null){
                validate = false;
                checkcate = false;
            }else{
                validate = true;
                checkcate = true;
            }

            if(!checkcate){
                alert('Bạn Chưa Chọn Danh Mục cho Sản Phẩm !');
                $('#cate_pro').focus();
            }
                
            if(validate && validate1){
                $('#form-bk').submit();
            }
        }
    }
    function options(id)
    {
        $.ajax({
            type: 'GET',
            dataType:'html',
            url: base_url()+'users/check_option',
            data: {pid: id},
            success: function(rs)
            {
                $('#v_option').html(rs);
                $('#view_option').modal();
            }
        });
    }
    function remove_opt(oid)
    {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: base_url()+'users/del_opt',
            data: {to_id: oid},
            success: function(rs)
            {
                if(rs.check == true){
                    window.location.reload();
                }
            }
        });
    }
    function view_list(oid, pid)
    {
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: base_url()+'users/getOptionValue',
            data: {id:oid, pid:pid},
            success: function(rs)
            {
                $('#list_value').html(rs);
            }
        });
    }
    function addValue(){
        var i = $('#temps').val();
        addOptionValue(i);
    }
    function addOptionValue(i)
    {
        var id = $('#option_id').val();
        $.ajax({
            type: "get",
            dataType: "html",
            url: '<?=base_url('users/add_tr')?>',
            data:{id:id, temp:i},
            success: function(rs){
                $('#option-value tbody').append(rs);
                var ids = $('#temp_'+i).val();
                $('#temps').val(ids);
            }
        });
    }
    $('#option').change(function(){
        var op = $(this).val();
        options(op);
    });
    function options(id)
    {
        $.ajax({
            type:'GET',
            dataType: 'html',
            url: base_url()+'users/list_option',
            data: {oid:id},
            success: function(rs)
            {
                $('#list_value').html(rs);
            }
        });
    }
</script>
<script type="text/javascript">
    function delete_img($id){
        var check = confirm('Bạn có chắc chắn muốn xóa ảnh này ?');
        if(check){
            $.ajax({
                type:'post',
                dataType: 'json',
                url: base_url()+'users/delete_img',
                data: {id:$id},
                success: function(rs)
                {
                    $('#row_'+ $id).remove();
                }
            });
        }
    }
</script>