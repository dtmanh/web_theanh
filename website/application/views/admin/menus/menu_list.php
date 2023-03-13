<link href="<?= base_url('assets/plugin/nestable/style_nestable.css')?>" media="all" type="text/css" rel="stylesheet">

<script src="<?= base_url('assets/plugin/nestable/jquery.nestable.js')?>"></script>

<script src="<?= base_url('assets/plugin/nestable/menu_list.js')?>"></script>

<?php

#****************************************#

# * @Author: Tran Manh                   #

# * @Email: dangtranmanh051187@gmail.com #

# * @Website: http://techtology4.0.com
             #

# * @Copyright: 2017 - 2018              #

#****************************************#

?>

<section class="content-header">

    <h1>

        Danh sách menus

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('techadmin/menu/menulist')?>">Danh sách Menus</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="row">

		<div class="col-md-12">

			<div class="panel with-nav-tabs panel-default">

				<div class="panel-heading">

					<ul class="nav nav-tabs">
						<li <?php
							if(!isset($_SESSION['tab_active'])||$_SESSION['tab_active']=='main'){
									echo 'class="active"';
							}else echo ''; ?>
							onclick="active_tab($(this).attr('data-items'))" data-items="main">
							<a href="#tab0primary" data-toggle="tab">Menu Main</a>
						</li>
						<?php if (isset($config_menu)) {
			            $stt=0;
			            foreach ($config_menu as $key=>$m) { $stt++;
			                ?>
						<li  <?=($_SESSION['tab_active']==@$m->type)?'class="active"':''; ?>
							onclick="active_tab($(this).attr('data-items'))" data-items="<?=@$m->type;?>">
							<a href="#tab<?=$stt?>primary" data-toggle="tab"><?=@$m->name;?></a>

						</li>
						<?php }  } ?>	

					</ul>

				</div>

				<div class="panel-body">

					<div class="tab-content">

						<div class="tab-pane fade
						<?php
						if(!isset($_SESSION['tab_active'])||$_SESSION['tab_active']=='main'){

							echo 'in active';

						}else echo ''; ?>

						 " id="tab0primary">



							<div class="">
								<div class="cf nestable-lists">
									<!-- input chua mang thu tu menu-->
									<input id="nestable-output-main" name="value" type="hidden">
									<a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('techadmin/menu/add?p=main') ?>">
										 <i class="fa fa-plus"></i> Thêm
									</a>
									<input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary hidden" name="ok"
										   onclick="Save_Order_Menu('nestable-output-main')">

									<div style="clear: both"></div>

									<div class="dd" id="nestable">

										<ol class="dd-list">

											<?php view_menu_admin($menu_main); ?>

										</ol>

									</div>

								</div>

							</div>

						</div>
							<?php if (isset($config_menu)) {
			            $stt=0;
			            foreach ($config_menu as $key=>$m) { $stt++;
			                ?>
						<div class="tab-pane fade  <?=($_SESSION['tab_active']==@$m->type)?'in active':''; ?>" id="tab<?=$stt?>primary">

							<div class="">
								<div class="cf nestable-lists">

									<!-- input chua mang thu tu menu-->

									<input id="nestable-output-<?=@$m->type;?>" name="value" type="hidden">

									<a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('techadmin/menu/add?p='.@$m->type) ?>">

										<i class="fa fa-plus"></i> Thêm

									</a>

									<input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary hidden" name="ok"

										   onclick="Save_Order_Menu('nestable-output-<?=@$m->type;?>')">



									<div style="clear: both"></div>

									<div class="dd" id="nestable_<?=@$m->type;?>">

										<ol class="dd-list">

											<?php view_menu_admin($m->menu); ?>

										</ol>

									</div>

								</div>



							</div>

						</div>
						<?php }  } ?>	
						

					</div>

				</div>

			</div>

		</div>

    </div>

</section>

<style type="text/css">

     .nav-tabs li a{

        padding: 4px 15px !important;

    }

    .nestable-lists{

        border-top: none !important;

    }

    .action {

        position: relative;

    }



    .link_v {

        position: absolute;

        right: 0px;

        top: -34px;

    }



    .link_v  li a{

        padding: 3px 5px !important;

    }

    .link_v  li:hover a{

        text-decoration: underline;

    }

    .drop_action {

        padding: 3px 4px;

        border-radius: 0px;

    }

</style>
<script type="text/javascript">
$(document).ready(function () {
    var base_url = $("#base_url").val();
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
            url: base_url+"techadmin/menu/savelist",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
    };
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output-main')));

    /*begin show_menu*/
        // activate Nestable for list top
    <?php if (isset($config_menu)) {
    $stt=0;
    foreach ($config_menu as $key=>$m) { $stt++;
        ?>    
        $('#nestable_<?=@$m->type;?>').nestable({
            group: 1
        }).on('change', updateOutput);
        // output initial serialised data top
        updateOutput($('#nestable_<?=@$m->type;?>').data('output', $('#nestable-output-<?=@$m->type;?>')));
       <?php } } ?> 
/*end show_menu*/
});
</script>