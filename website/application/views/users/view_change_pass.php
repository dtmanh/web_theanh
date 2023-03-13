<section class="content clearfix">
    <div class="container">
        <div class="row">
            <div class="pull-right">
                <ul class="breadcrumb">
                    <li><a class="breadhome" href="<?=base_url()?>" title="<?=@$this->option->site_name;?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?=lang('home');?></a> </li>
                    <li><a href="javascript:void(0)"><?=lang('user-mana');?></a> </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="block-content clearfix">
                <div class="pro_floo clearfix">
                    <div class="col-md-2 col-sm-2"  style="width: 20%">
                        <div class="row">
                            <div class="acount_nav">
                                <ul>
                                    <li>
                                        <i class="fa fa-user"></i> &nbsp;
                                        <a href="<?= base_url('user-info')?>"><?=lang('user-mana');?></a>
                                    </li>
                                    <!--     <li>
                                    <i class="fa fa-heart-o"></i>
                                    <a href="<?/*= base_url('acount-like')*/?>">Sản phẩm yêu thích</a>
                                </li>-->
                                    <li>
                                        <i class="fa fa-file-text-o"></i> &nbsp;
                                        <a href="<?= base_url('acount-order')?>"> <?=lang('order');?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10"  style="width: 80%">
                        <div class="acount_tit"><?=lang('user-mana');?></div>
                        <div class="clearfix-10"></div>
                        <div class="infor_acount clearfix col-sm-offset-2 col-md-8 col-sm-8">
                            <div class="infor_tit"><?=lang('chang-pass');?></div>
                            <div class="clearfix"></div>
                            <form id="form_change_pass" action="<?=base_url('users_frontend/change_pass')?>" method="post"   class="validate form-horizontal" role="form">
                                <div class="123">
                                    <div class="form-group">
                                        <label class="col-sm-4"><?=lang('account');?></label>
                                        <label class="col-sm-8"><?=@$user_item->email;?></label>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4"><?=lang('old-pass');?></label>
                                        <div class="col-sm-8">
                                            <div id="show_error_pass2"></div>
                                            <input type="password" class="validate[required] form-control"
                                                   onchange="check_pass($(this).val())"
                                                   name="id"  name="old_pass" placeholder="<?=lang('old-pass');?>">
                                            <input id="pass_check" name="pass_check" value="1" type="hidden">
                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4"><?=lang('new-pass');?></label>
                                        <div class="col-sm-8">
                                            <input type="password" class=" validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                                   id="new_pass" name="new_pass" placeholder="<?=lang('new-pass');?>">
                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4"><?=lang('re-pass');?></label>
                                        <div class="col-sm-8">
                                            <input type="password" class="validate[required,equals[new_pass]] form-control"
                                                   name="id" name="re_pass" placeholder="<?=lang('re-pass');?>">
                                        </div>
                                    </div>
                                    <div class="clearfix-5"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4">&nbsp;</label>
                                        <div class="col-sm-8">
                                            <button type="button" name="update_pass" id="update_pass"  class="btn btn-blue btn-sm pull-right" >
                                                <div class="button-green">
                                                    <i class="icons icon-basket-2"></i><?=lang('update');?>
                                                </div>
                                            </button>
                                        </div
                                    </div>

                                    <div class="clearfix-5"></div>


                            </form>
                        </div>
                    </div>

                    <div class="clearfix-10"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix-20"></div>
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
</script>