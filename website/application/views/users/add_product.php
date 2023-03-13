<section class="content clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb back_link ">
                    <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                    <li><a href="javascript:void(0)">Đăng sản phẩm</a> </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="block-content clearfix">
                <div class="pro_floo clearfix">
                    <?php echo $this->load->widget('blkmenu_users');?>
                    <div class="col-md-9 col-right col-sm-9 col-xs-12 box-user">
                        <div class="clearfix">
                            <header class="page-header">
                                <h1 class="page-title">
                                    Đăng sản phẩm
                                </h1>
                            </header>
                            <div class="clearfix-20"></div>
                                <div class="col-md-12"><p><?=$this->session->flashdata("sessecfull");?></p></div>
                                <form method="post" id="form-bk" class="validate" action="" enctype="multipart/form-data">

                                    <div class="col-md-6 col-md-sm">
                                        <div class="form-group">
                                            <label for="name_pro">Tên sản phẩm:</label>
                                            <input type="text" oninput="createAlias(this)" name="name_pro" class="form-control validate[required]" id="name_pro">
                                        </div>
                                        <div class="form-group" id="error-alias">
                                            <label for="alias">Alias:</label>
                                            <input type="text" onchange="createAlias(this)" name="alias" class="form-control validate[required]" id="alias">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá gốc:</label>
                                            <input type="text" name="price" class="form-control validate[required]" id="price">
                                        </div>
                                        <div class="form-group">
                                            <label for="alias">Giá khuyến mại:</label>
                                            <input type="text" name="price_sale" class="form-control validate[required]" id="price_sale">
                                            <!-- #achor -->
                                        </div>
                                        <div class="form-group" id="choicecate">
                                            <label for="cate_pro">Danh mục sản phẩm:</label>
                                            <script type="text/javascript">
                                                
                                            </script>
                                            <select class="form-control validate[required]" name="cate_pro" id="cate_pro" onchange="getsubcate(this,'#subcate')" data-level="1">
                                                <option disabled selected>--Mời chọn--</option>
                                                <?php 
                                                    foreach ($cate_pro as $key => $cate) {
                                                        if($cate->parent_id == 0){
                                                            echo '<option value="'.$cate->id.'">'.$cate->name.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            
                                            <br>
                                            <select class="form-control hidden" name="subcate" id="subcate" onchange="getsubcate(this,'#subcate2')" data-level="2">
                                                
                                            </select>
                                            <br>
                                            <select class="form-control hidden" name="subcate2" id="subcate2" data-level="3">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-sm">
                                        <div class="form-inline">
                                            <label class="label label-info" for="status">Sản Phẩm Còn/Hết Hàng</label>
                                            <input type="checkbox" name="status" value="1" class="checkbox form-control" id="status" checked="checked"> 
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ảnh đại diện</label>
                                            <input type="file" accept="image/*" id="exampleInputFile" name="userfile" onchange="loadFile(event)" class=" validate[required]">
                                            <div class="col-md-12"><img class="img_up" id="output" style="max-width: 100%;max-height: 120px" /></div>
                                            <p class="help-block">Ảnh sản phẩm cần rõ nét.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-md-sm">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Chọn thêm ảnh (5 ảnh )</label>
                                            <input type="file" accept="image/*" id="exampleInputFile" multiple name="images[]">
                                            <p class="help-block">Ảnh sản phẩm cần rõ nét.</p>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
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
                                                        <textarea name="description" class="form-control validate[required]" rows="5" id="description"></textarea>
                                                        <?php echo display_ckeditor($description); ?>
                                                    </div>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                    <div class="clearfix-5"></div>
                                                    <label for="caption_2">Thông số kỹ thuật:</label>
                                                    <textarea name="caption_2" class="form-control validate[required]" rows="5" id="caption_2"></textarea>
                                                    <?php echo display_ckeditor($caption_2); ?>
                                                </div>
                                                
                                                <div id="menu2" class="tab-pane fade">
                                                    <div class="clearfix-5"></div>
                                                    <label for="detail">Chi tiết :</label>
                                                    <textarea name="detail" class="form-control validate[required]" rows="5" id="detail"></textarea>
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
                                                                     <option value="<?=$row->option_id?>"><?=$row->name?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix-10"></div>
                                                    <div class="col-md-12">
                                                        <div id="list_value"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="hidden" name="addnews" value="1">
                                    <div class="text-center"><button type="button" onclick="createCate()" class="btn btn-blue btn-sm" name="addnews">Thêm mới</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?=base_url();?>/assets/js/admin/main_site.js"></script>
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
        var alias = $('#alias').val()
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
<script type="text/javascript">

$(document).ready(function(){
    $(".validate").validationEngine();
});

    $(function(){
        $('#form-bk').click(function(){
            //var check_form = $('#form_change_pass').validationEngine('validate');
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
    function createCate()
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
            var catesub1 = $('#subcate').val();
            var catesub2 = $('#subcate2').val();
            var checkcate = true;
            if(catesub2 === null){
                validate = false;
                checkcate = false;
            }else{
                validate = true;
                checkcate = true;
            }
            if(catesub1 === null ){
                validate = false;
                checkcate = false;
            }else{
                validate = true;
                checkcate = true;
            } 
            if(cate == null){
                validate = false;
                checkcate = false;
            }else{
                validate = true;
                checkcate = true;
            }

            //console.log(cate+ '/' + catesub1 + '/' + catesub2 + '////'+ checkcate)
            if(!checkcate){
                alert('Bạn Chưa Chọn Danh Mục cho Sản Phẩm !');
                $('#cate_pro').focus();
            }
            // 
            
            var detail= CKEDITOR.instances['detail'].getData();
            var description = CKEDITOR.instances['description'].getData();
            var caption_2 = CKEDITOR.instances['caption_2'].getData();
            console.log(detail.length +'/'+ description.length+'/'+ caption_2.length)
            var validate2 = true;
           
           if((detail.length <= 12) || (description.length <= 12) || (caption_2.length <= 12)){
                alert('Bạn cần cung cấp đầy đủ thông tin: mô tả - kỹ thuật - chi tiết về sản phẩm - tối thiểu 12 ký tự!');
                $('#description').focus();
                validate2 = false;
           }
             
        var validate3 = true;
        if(description.length >= 700){
            alert('Phần Mô Tả Sản phẩm tối đa 700 ký tự !');
                $('#description').focus();
                validate3 = false;
        }   
            if(validate && validate1 && validate2 && validate3){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: base_url() + 'users/checkAdd',
                    data: {alias:$('#alias').val()},
                    success:function(result){
                        if(result.check == true){
                            $('#form-bk').submit();
                            
                        }else{
                            $('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Alias Ngẫu Nhiên đã Tự Động Thêm Vào</div>');
                            NewAlias();
                        }
                    }
                });
            }
        }
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
</script>