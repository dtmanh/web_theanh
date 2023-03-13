<link id="jquiCSS" rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/jquery-ui/jquery-ui.css" type="text/css" media="all">
<link href="<?php echo base_url() ?>assets/plugin/color/css/evol-colorpicker.min.css" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/plugin/litebox/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/color/js/evol-colorpicker.min.js" type="text/javascript"></script>
<section class="content clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb back_link ">
                    <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                    <li><a href="javascript:void(0)">Thêm thuộc tính</a> </li>
                </ul>
            </div>
        </div>
        <div class="rơw">
            <div class="block-content clearfix">
                <div class="pro_floo clearfix">
                    <?php echo $this->load->widget('blkmenu_users');?>
                    <div class="col-md-9 col-right col-sm-9 col-xs-12 box-user">
                        <div class="clearfix">
                            <header class="page-header">
                                <h1 class="page-title">
                                    Thêm thuộc tính
                                </h1>
                            </header>
                            <div class="clearfix-20"></div>
                            <div class="col-md-3">
                                <span class="btn btn-info">Danh sách thuộc tính</span>
                                <ul id="box-v">
                                    <?php if(count($list_opt) !=0): ?>
                                    <?php foreach($list_opt as $k => $row): ?>
                                    <?php
                                        if($k == 0){
                                            echo '<input type="hidden" id="o_id" value="'.$row->option_id.'"/>';
                                        }
                                    ?>
                                    <li class="btn btn-default bnt-box" data-id="<?=$row->type?>" onclick="view_value(<?=$row->option_id?>,$(this))"><a href="javascript:;"><?=$row->name?></a></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <?php  if($this->session->flashdata('errorss')):?>
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> <?=$this->session->flashdata('errorss')?>.
                                    </div>
                                <?php endif; ?>
                                <div class="alert alert-warning" id="box-war" style="display: none">
                                    <div class="alert alert-info">
                                        <strong>Thông báo!</strong> Tính năng tạm thời đang khóa.
                                    </div>
                                </div>
                                <div class="box-show" style="display: none;">
                                    <form enctype="multipart/form-data" method="POST" action="<?=base_url('users/add_value')?>">
                                        <input type="hidden" id="opt_id" name="opt_id" value="">
                                        <div class="form-group">
                                            <label for="name_value">Tên thuộc tính:</label>
                                            <input type="text" name="name_value" class="form-control" id="name_value">
                                            <?php if(isset($errors)) echo "<span class='warning'>Vui lòng không để chống trường này.</span>";?>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail1">Chọn màu sắc</label>
                                            <div class="ui-widget ui-widget-content ui-corner-all">
                                                <input id="frenchColor" name="t_color" value="" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail1">Up ảnh: </label>
                                            <input  type="file" id="images" name="userfile" class="form-control" />
                                        </div>
                                        <button type="submit" class="btn btn-default">Thêm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix-20"></div>
                        <div class="col-md-12">
                            <div class="box-view">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="box-val"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.box-show').show();
        var c = $('#o_id').val();
        $('#opt_id').val(c);
        $( "#box-v li" ).first().addClass('active');
        load_tables(c);
    });
    function view_value(id,obj)
    {
        var a = obj.data("id");
        switch (a){
            case 'radio':
                $('.box-show').show(300);
                $('#box-war').hide(300);
                break;
            case 'checkbox':
                $('.box-show').show(300);
                $('#box-war').hide();
                break;
            case 'select':
                $('#box-war').show(300);
                $('.box-show').hide();
                break;
            default:
                break;
        }
        $('#opt_id').val(id);
        load_tables(id);
        $('li').removeClass('active');
        obj.addClass('active');
    }
</script>
<style>
    .bnt-box{width: 89%; margin-top: 5px}
    .evo-pointer { position: absolute;  top: 93px; right: 10px; width: 40px; height: 36px; }
    .evo-cp-wrap {width: 100% !important;}
    .active {
        background-color: #ed1b24 !important;
    }
    .active a {
        color: #ffffff;
    }
</style>
<script>
    function load_tables(id)
    {
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: '<?=base_url('users/view_table')?>',
            data: {id:id},
            success: function(rs)
            {
                $('.box-view').html(rs);
            }
        });
    }
    $(document).ready(function(){

        // Change theme
        $('.css').on('click', function(evt){
            $('#jquiCSS').attr('href','http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/'+this.innerHTML+'/jquery-ui.css');
            $('.css').removeClass('sel');
            $(this).addClass('sel');
        });

        // Events demo
        $('#cp1').colorpicker({
            color:'#8db3e2',
            initialHistory: ['#ff0000','#000000','red', 'purple']
        })
            .on('change.color', function(evt, color){
                $('#cpb').css('background-color',color);
            })
            .on('mouseover.color', function(evt, color){
                if(color){
                    $('#cpb').css('background-color',color);
                }
            });

        $('#getVal').on('click', function(){
            alert('Selected color = "' + $('#cp1').colorpicker("val") + '"');
        });
        $('#setVal').on('click', function(){
            $('#cp1').colorpicker("val",'#31859b');
        });
        $('#enable').on('click', function(){
            $('#cp1').colorpicker("enable");
        });
        $('#disable').on('click', function(){
            $('#cp1').colorpicker("disable");
        });
        $('#clear').on('click', function(){
            var v=$('#cp1').colorpicker("clear") ;
        });
        $('#destroy1').on('click', function(){
            var v=$('#cp1').colorpicker("destroy") ;
        });

        // Instanciate colorpickers
        $('#cpBoth').colorpicker();
        $('#cpInline').colorpicker({color:'#31859b'});
        $('#cpInline2').colorpicker({color:'#31859b', defaultPalette:'web'});

        // Custom theme palette
        $('#customTheme').colorpicker({
            color: '#f44336',
            customTheme: ['#f44336','#ff9800','#ffc107','#4caf50','#00bcd4','#3f51b5','#9c27b0', 'white', 'black']
        });
        $('#cpFocus').colorpicker({showOn:'focus'});
        $('#cpButton').colorpicker({showOn:'button'});
        $('#cpOther').colorpicker({showOn:'none'});
        $('#show').on('click', function(evt){
            evt.stopImmediatePropagation();
            $('#cpOther').colorpicker("showPalette");
        });

        // With transparent color
        $('#transColor').colorpicker({
            transparentColor: true
        });

        // With hidden button
        $('#hideButton').colorpicker({
            hideButton: true
        });

        // No color indicator
        $('#noIndColor').colorpicker({
            displayIndicator: false
        });

        // French colorpicker
        $('#frenchColor').colorpicker({
            strings: "Couleurs de themes,Couleurs de base,Plus de couleurs,Moins de couleurs,Palette,Historique,Pas encore d'historique."
        });

        // Events demo
        $('#getVal2').on('click', function(){
            alert('Selected color = "' + $('#cpInline').colorpicker("val") + '"');
        });
        $('#setVal2').on('click', function(){
            $('#cpInline').colorpicker("val",'#31859b');
        });
        $('#enable2').on('click', function(){
            $('#cpInline').colorpicker("enable");
        });
        $('#disable2').on('click', function(){
            $('#cpInline').colorpicker("disable");
        });
        $('#destroy2').on('click', function(){
            $('#cpInline').colorpicker("destroy");
        });

        // Fix links
        $('a[href="#"]').attr('href', 'javascript:void(0)');

    });
</script>