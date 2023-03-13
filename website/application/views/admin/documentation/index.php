

        <!-- Content Header (Page header) -->

        <div class="content-header">

          <h1>

            Techtology 4.0 Hướng dẫn quản trị

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

            <li class="active">Hướng dẫn</li>

          </ol>

        </div>



        <!-- Main content -->

        <div class="content body">

			<?php if(count($cate_all)) : ?>

			<?php $i=0; foreach($cate_all as $cat) : $i++; ?>

			<section id="document_<?=@$cat->id;?>">

			  <h2 class="page-header"><a href="#document_<?=@$cat->id;?>"><?=@$cat->name;?></a></h2>

			  <p class="lead">

				<?=@$cat->description;?>

			  </p>

			</section><!-- /#introduction -->

			 <?php endforeach;?>

			<?php endif;?>

        </div><!-- /.content -->      

	 

