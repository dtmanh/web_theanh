<div class="container">
    <div class="col-main">
        <ul class="breadcrumb back_link ">
            <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
            <li><a href="javascript:void(0)">Cấp lại mật khẩu</a> </li>
        </ul>
        <header class="page-header">
            <h1 class="page-title">
                Vui lòng nhập Email của bạn để lấy lại mật khẩu
            </h1>
        </header>
        <div class="col-sm-offset-2 col-sm-5">
            <div class="clearfix-20"></div>
            <div class="col-md-12"><p class="text-center text-warning"><?=$this->session->flashdata("sussec");?></p></div>
            <form action="" method="post" id="form_get_pass">
                <div class="input-group">
                    <input type="text" name="email" alt="email" placeholder="Nhập địa chỉ Email lấy lại mật khẩu..." id="email" class="input-text  validate[required] form-control" value="">
                    <span class="input-group-btn">
                       <button class="btn btn-blue" id="btn_check" type="button">Gửi</button>
                     </span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix-25"></div>
<script type="text/javascript">
    $('#btn_check').click(function(){
        var check_form = $('#form_get_pass').validationEngine('validate');
        if(check_form == true){
            $('#form_get_pass').submit();
        }
    });
</script>