<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta property="og:title" content="<?= @$Pagetitle; ?>" />

<meta property="og:type" content="<?=@$facebook['type'];?>" />

<meta property="og:image" content="<?=@$facebook['image'];?>" />

<meta property="og:url" content="<?=@$facebook['url'];?>" />
<link rel="shortcut icon" href="<?= base_url(@$this->option->favicon ) ?>"/>

<meta property="og:description" content="<?= @$Description ?>" />

  <title><?= @$headerTitle?></title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/bootstrap.min.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/ionicons.min.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/font-awesome.min.css')?>">

  <!-- Theme style -->
 <!--
  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/AdminTech.min.css')?>">
 <link rel="stylesheet" href="<?=base_url('assets/css_admin/back_end/_all-skins.min.css')?>">-->
  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/skin-green.min.css')?>">



 <!-- iCheck -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/iCheck/flat/blue.css')?>">

  <!-- Morris chart -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/morris/morris.css')?>">

  <!-- jvectormap -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/jvectormap/jquery-jvectormap-1.2.2.css')?>">

  <!-- Date Picker -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datepicker/datepicker3.css')?>">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/daterangepicker/daterangepicker.css')?>">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">



<script src="<?= base_url('assets/css_admin/back_end/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<script src="<?= base_url();?>assets/js_admin/jquery.imgareaselect.min.js" type="text/javascript"></script>
 

<script src="<?= base_url('assets/js_admin/bootstrap.min.js')?>"></script>

	</head>

<body class="skin-green sidebar-mini">

  <input type="hidden" value="<?= base_url()?>" id="base_url" name="">

<div class="wrapper">

	<?php $admin = $this->session->userdata('adminfull'); ?>

  <header class="main-header">

    <a  href="<?= base_url('')?>techadmin" class="logo">

      <span class="logo-mini"><img src="<?= base_url($this->option->site_logo); ?>" title="<?= $this->option->site_name; ?>" alt="<?= $this->option->site_name; ?>"                              class="w_100" width="40" ></span>

      <span class="logo-lg"><img src="<?= base_url($this->option->site_logo); ?>" width="60" title="<?= $this->option->site_name; ?>" alt="<?= $this->option->site_name; ?>"                              class="w_100"></span>

    </a>

    <nav class="navbar navbar-static-top">

      <a href="<?= base_url('techadmin')?>" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>
      <a href="<?= base_url('pm/pm/up_db_to_store')?>" onclick="return confirm('Bạn có chắc chắn muốn cập nhật dữ liệu lên kho?')" class="cick_up" style='color:#fff;    line-height: 45px;'><span>up dữ liệu lên kho</span></a>


      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li class="dropdown tasks-menu">

            <a href="<?= base_url('techadmin/news/newslist')?>" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-fw fa-newspaper-o"></i>

              <span class="label label-warning"><?=@$item_news;?></span>

            </a>

          </li>

          <li class="dropdown messages-menu">

            <a href="<?= base_url('techadmin/email/emails')?>" class="dropdown-toggle">

              <i class="fa fa-envelope-o"></i>

              <span class="label label-success"><?=@$item_email;?></span>

            </a>

          </li>

          <li class=" messages-menu hidden">

            <a href="<?= base_url('techadmin/users/listusers')?>" class="dropdown-toggle">

              <i class="fa fa-users"></i>

              <span class="label label-danger"><?=@$item_member;?></span>

            </a>

          </li>

          <li class=" messages-menu hidden">

            <a href="<?= base_url('techadmin/order/orders')?>" class="dropdown-toggle">

              <i class="fa fa-shopping-cart"></i>

              <span class="label label-success"><?=@$item_order;?></span>

            </a>

          </li>

          <!-- Notifications: style can be found in dropdown.less -->

          <li class="dropdown notifications-menu">

            <a href="<?= base_url('techadmin/contact/contacts')?>" class="dropdown-toggle" >

              <i class="fa fa-bell-o"></i>

              <span class="label label-warning"><?=@$item_contact;?></span>

            </a>

          </li>

          <!-- Tasks: style can be found in dropdown.less -->

          <li class="dropdown tasks-menu hidden">

            <a href="<?= base_url('techadmin/product/products')?>" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-flag-o"></i>

              <span class="label label-danger"><?=@$item_pro;?></span>

            </a>

          </li>

		  <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-language"></i>

             <span class="hidden-xs">Ngôn ngữ</span>

            </a>

            <ul class="dropdown-menu">
              <?php foreach ($config_language as $language) { ?>
              <li><a href="<?= base_url('admin/admin/lang/'.$language->lang) ?>"><img src="<?= base_url($language->icon_language) ?>" width="25" alt="<?=$language->name_language?>"> &nbsp; <?=$language->name_language?></a></li>
             
            <?php } ?>
            </ul>

          </li>

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				Xin chào: 
			  <span class="hidden-xs"><?= $admin->fullname;?></span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->
              <li class="user-header">
                <img src="https://codeglamour.com/php/adminlite/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>

                  <?= $admin->fullname;?> 
                </p>

              </li>

              <!-- Menu Body -->

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="col-lg-5">

                  <a href="<?= base_url('techadmin/users/index')?>" class="btn btn-default btn-flat">Tài khoản</a>

                </div>

				      <div class="col-lg-7">

                  <a href="<?= base_url('techadmin/doi-mat-khau')?>" class="btn btn-default btn-flat">Thay đổi mật khẩu</a>

                </div>

              </li>

            </ul>

          </li>
		    <li class="dropdown">

            <a href="<?= base_url('techadmin/logout/index')?>" class="dropdown-toggle" >
             <span class="hidden-xs">Thoát</span>

            </a>
          </li>
		  
          <!-- Control Sidebar Toggle Button -->

          <li class="dropdown">

             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i></a>

			<ul class="dropdown-menu">

				<li>

					<a href="<?= base_url('techadmin/users/listuser_admin')?>"><i class="fa fa-fw fa-users"></i>

						Thành viên

					</a>

				</li>

				<?php if($this->session->userdata('sessionGroupAdmin')>=3){?>

				<li>

					<a href="<?= base_url('techadmin/group/listGroup')?>"><i class="fa fa-fw fa-refresh"></i> Quản lý  module</a>

				</li>

        <li>

          <a href="<?= base_url('techadmin/admin/listDoc')?>"><i class="fa fa-fw fa-refresh"></i> Quản lý hướng dẫn</a>

        </li>
        <li>

          <a href="<?= base_url('techadmin/admin/delete_domain')?>"><i class="fa fa-fw fa-refresh"></i>Xóa code website</a>

        </li>
        <?php } ?>
       

			</ul>

          </li>
            
            <span class="right-bar-btn" style="cursor: pointer;"><i class="fa fa-th-large"></i></span>

        </ul>
        <div class="bar-right">
          <h2>Thay đổi theme</h2>
          <form action="<?=base_url('techadmin/admin/add_body')?>" name="formbk2" method="post">
           <input type="hidden" name="id" value="<?=$this->option->id?>" >
           <ul class="color">
            <li>
              <div class=" clearfix goet">
                  <label class="" style="color: #fff;float: left;padding: 5px 5px;">Màu body:</label>
                  <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$this->option->id;?>" id="cb_1" <?=$this->option->mamau==1?'checked=""':''?> type="checkbox" data-value="<?=$this->option->id;?>" data-placement="site_option" data-view="mamau">
                  <label class="tgl-btn " for="cb_1"></label>
                </div>
              <span class="chose-color" style="margin-top: 10px;"><input type="color" name="color"  value="<?=@$this->option->color?>"></span>
            </li>
            <li>
              <span>Font size body</span> 
              <select name="size" class="form-control input-sm">
                <option value="" <?php if(@$this->option->size == ''){echo 'selected';} ?>>Lựa chọn</option>
                <option value="8" <?php if(@$this->option->size == '8'){echo 'selected';} ?>>8 px</option>
                <option value="10" <?php if(@$this->option->size == '10'){echo 'selected';} ?>>10 px</option>
                <option value="12" <?php if(@$this->option->size == '12'){echo 'selected';} ?>>12 px</option>
                <option value="14" <?php if(@$this->option->size == '14'){echo 'selected';} ?>>14 px</option>
                <option value="16" <?php if(@$this->option->size == '16'){echo 'selected';} ?>>16 px</option>
                <option value="18" <?php if(@$this->option->size == '18'){echo 'selected';} ?>>18 px</option>
                <option value="20" <?php if(@$this->option->size == '20'){echo 'selected';} ?>>20 px</option>
                <option value="22" <?php if(@$this->option->size == '22'){echo 'selected';} ?>>22 px</option>
                <option value="24" <?php if(@$this->option->size == '24'){echo 'selected';} ?>>24 px</option>
                <option value="26" <?php if(@$this->option->size == '26'){echo 'selected';} ?>>26 px</option>
              </select></li>
              <li>
               <span>Font chữ body</span> 
               <select name="fontchu" class="form-control input-sm">
                 <option value="" <?php if(@$this->option->fontchu == ''){echo 'selected';} ?>>Lựa chọn</option>
                 <option value="Verdana,Arial,sans-serif" <?php if(@$this->option->fontchu == 'Verdana,Arial,sans-serif'){echo 'selected';} ?>>Verdana,Arial,sans-serif</option>
                 <option value="Arial" <?php if(@$this->option->fontchu == 'Arial'){echo 'selected';} ?>>Arial</option>
                 <option value="FontAwesome" <?php if(@$this->option->fontchu == 'FontAwesome'){echo 'selected';} ?>>FontAwesome</option>
                 <option value="fantasy" <?php if(@$this->option->fontchu == 'fantasy'){echo 'selected';} ?>>fantasy</option>
               </select></li>
               <li>
                <span>Font size h1</span> 
                <select name="h1size" class="form-control input-sm">
                  <option value="" <?php if(@$this->option->h1size == ''){echo 'selected';} ?>>Lựa chọn</option>
                  <option value="8" <?php if(@$this->option->h1size == '8'){echo 'selected';} ?>>8 px</option>
                  <option value="10" <?php if(@$this->option->h1size == '10'){echo 'selected';} ?>>10 px</option>
                  <option value="12" <?php if(@$this->option->h1size == '12'){echo 'selected';} ?>>12 px</option>
                  <option value="14" <?php if(@$this->option->h1size == '14'){echo 'selected';} ?>>14 px</option>
                  <option value="16" <?php if(@$this->option->h1size == '16'){echo 'selected';} ?>>16 px</option>
                  <option value="18" <?php if(@$this->option->h1size == '18'){echo 'selected';} ?>>18 px</option>
                  <option value="20" <?php if(@$this->option->h1size == '20'){echo 'selected';} ?>>20 px</option>
                  <option value="22" <?php if(@$this->option->h1size == '22'){echo 'selected';} ?>>22 px</option>
                  <option value="24" <?php if(@$this->option->h1size == '24'){echo 'selected';} ?>>24 px</option>
                  <option value="26" <?php if(@$this->option->h1size == '26'){echo 'selected';} ?>>26 px</option>
                </select></li>
                <li>
                  <span>Font chữ h1</span> 
                  <select name="h1fchu" class="form-control input-sm">
                    <option value="" <?php if(@$this->option->h1fchu == ''){echo 'selected';} ?>>Lựa chọn</option>
                    <option value="Verdana,Arial,sans-serif" <?php if(@$this->option->h1fchu == 'Verdana,Arial,sans-serif'){echo 'selected';} ?>>Verdana,Arial,sans-serif</option>
                    <option value="Arial" <?php if(@$this->option->h1fchu == 'Arial'){echo 'selected';} ?>>Arial</option>
                    <option value="FontAwesome" <?php if(@$this->option->h1fchu == 'FontAwesome'){echo 'selected';} ?>>FontAwesome</option>
                    <option value="fantasy" <?php if(@$this->option->h1fchu == 'fantasy'){echo 'selected';} ?>>fantasy</option>

                  </select>
                </li>
                <li><div class=" clearfix goet">
                  <label class="" style="color: #fff;float: left;padding: 5px 5px;">Hiển thị:</label>
                  <input class="tgl tgl-ios tgl_checkbox view_color" data-id="<?=$this->option->id;?>" id="cb_<?=$this->option->id;?>" <?=$this->option->status==1?'checked=""':''?> type="checkbox" data-value="<?=$this->option->id;?>" data-placement="site_option" data-view="status">
                  <label class="tgl-btn " for="cb_<?=$this->option->id;?>" ></label>
                </div></li>
                <li class="text-right"> <button type="submit" class="btn btn-success btn-xs" name="add_news"><i
                  class="fa fa-check"></i> Cập nhật
                </button></li>
                </ul>
            </form>
          </div>
      </div>

    </nav>

  </header>
  <style type="text/css">
  .right-bar-btn:hover{
       background: rgba(0,0,0,0.1);
  }
    .bar-right {
      position: fixed;
      right: 0;
      bottom: 0;
      width: 230px;
      background: #333;
      top: 50px;
      padding: 20px;
      z-index: 1;
      transform: translateX(100%);
      transition: all 0.5s;
    }
    .bar-right h2{
      color: #fff;
      font-size: 18px;
      margin-bottom: 10px;
    }
    .right-bar-btn {
      color: #fff;
    margin: 15px;
    display: inline-block;
    }
    .bar-right.on{
      transform: translateX(0);
      transition: all 0.5s;
    }
    .color {
      padding: 0;
    }
    .color li{
          margin-bottom: 10px;
    }
    .color li span{
      color: #fff;
    }
    .chose-color {
      position: relative;
      display: block;

    }
    .chose-color:before{
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: block;
      background: url(<?=base_url()?>assets/img/giaimau.png) no-repeat ;
      background-size: 100% 100%;

    }
    .chose-color input{
      position: relative;
      z-index: 1;
      width: 100%;
      opacity: 0;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.right-bar-btn').click(function() {
        $('.bar-right').toggleClass('on');

      });
      $('.chose-color input').click(function() {
       $(this).css({
         opacity: '1',
       });
      });
    });

  </script>

  <aside class="main-sidebar">

    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://codeglamour.com/php/adminlite/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php if($this->session->userdata('sessionGroupAdmin')>=3){?>
      <ul class="sidebar-menu">
        <li id="admin_roles" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Roles &amp; Permissions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin_roles"><a href="<?= base_url()?>techadmin/users/listuser_admin"><i class="fa fa-circle-o"></i> Roles &amp; Permissions</a></li>
          </ul>
        </li>
      </ul><?php } ?>
      <ul class="sidebar-menu">
    <?php if($this->session->userdata('phanquyen')) {

            $stt=1; foreach ($this->session->userdata('phanquyen') as $v) { ?>

    <li class="treeview <?php if($v->active ==0){ echo'hidden'; }?> <?php if (check_phanquyen($u_access,$v->resource)==false){ echo 'hidden';} ?>">

      <?php if(!empty($v->cat_sub)): ?>

          <a href="#">

           <i class="fa <?php if(!empty($v->icon)){ echo($v->icon); }else{ echo'fa-book';} ?>"></i>

            <span><?=@$v->name;?></span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

      <ul class="treeview-menu">

        <?php  $stt=1; foreach ($v->cat_sub as $sub){ ?>

        <li class=" <?php  if(check_phanquyen($u_access, $v->resource, $sub->resource)==false){echo'hidden';}  ?>">

          <a href="<?= base_url(@$sub->alias)?>">

          <i class="fa <?php if(!empty($sub->icon)){?> <?=$sub->icon;?><?php }else{ ?> fa-book <?php } ?>"></i>

          <span><?=@$sub->name;  ?></span>

          <span class="pull-right-container hidden">

            <span class="label label-primary pull-right">4</span>

          </span>

          </a>

        </li>

        <?php } ?>

      </ul>

      <?php else: ?>

      <a href="<?= base_url(@$v->alias)?>">

        <i class="fa <?php if(!empty($v->icon)){ echo($v->icon); }else{ echo'fa-book';} ?>"></i>

        <span><?=@$v->name;  ?></span>

       </a>

      <?php endif; ?>

    </li>

    <?php } } ?>

    <li><a href="<?= base_url('techadmin/admin/documentation')?>"><i class="fa fa-book"></i> <span>Hướng dẫn quản trị</span></a></li>
<!-- chi hien thị trên may noi bo khi xuat ra se k co -->
		<!-- <li><a href="<?= base_url('techadmin/admin/setup_wiget')?>"><i class="fa fa-book"></i> <span>Cấu hình wiget</span></a></li> -->
<!-- DONG KHOI -->

      </ul>

    </section>

  </aside>

  <style>.an{display:none;}.hienthi{display:block;}</style>

  <div class="content-wrapper">