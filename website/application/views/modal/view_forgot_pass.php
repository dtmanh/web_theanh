<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="panel panel-success" >
                <div class="panel-heading">
                    <div class="panel-title"><?=lang('forget_pass');?>
                        <button style="color: red;opacity: 0.9" type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
                <div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="alert_mesage" class="alert alert-danger col-sm-12"></div>
                <div style="padding-top:30px" class="panel-body" >
                    <form action="<?=base_url('customer-forgotpass')?>" method="post" class="validate form-horizontal" role="form" id="frmNewsLetter" novalidate="novalidate">
                        <input name="email" id="email" type="text" placeholder="Email của bạn" class="validate[required,custom[email]] form-control" maxlength="255">
                        <input type="button" id="forgotpass" onclick="check_mail()" name="forgotpass" class="form-control adr button" value="Gửi">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".validate").validationEngine();
    });
</script>
<style>
#myModal .modal-dialog {
    width: 340px;
}
#frmNewsLetter {
    float: left !important;
    padding: 4px 8px;
    height: 48px;
    line-height: 48px;
    position: relative;
}
#frmNewsLetter > #email {
    float: left !important;
    background-color: #F1F1F1 !important;
    color: #999999 !important;
    border-radius: 0;
    border: none;
    width: 230px;
    height: 40px;
    line-height: 40px;
}
#frmNewsLetter > #forgotpass {
    float: left !important;
    background-color: #D50000 !important;
    border-radius: 0;
    width: 60px;
    height: 40px;
        color: #fff;
    font-size: 15px;
}
</style>