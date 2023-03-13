<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bảng tin
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
         <?php if(isset($module_order)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$item_order;?></h3>
                    <p>Đơn hàng </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?=base_url('techadmin/order/orders')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php } ?>
        <!-- ./col -->
       <?php if(isset($module_news)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=$item_news;?></h3>
                    <p>Tin tức</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-newspaper-o"></i>
                </div>
                <a href="<?= base_url('techadmin/news/newslist')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php } ?><?php if(isset($module_pro)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$item_pro;?></h3>
                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="fa fa-flag-o"></i>
                </div>
                <a href="<?= base_url('techadmin/product/products')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col --><?php } ?><?php if(isset($module_users)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$item_member;?></h3>
                    <p>Thành viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= base_url('techadmin/users/listusers')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php } ?>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=@$this->total_view->today?></h3>
                    <p>Lượt view</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php if(isset($module_contact)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=@$item_contact;?></h3>
                    <p>Liên hệ</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <a href="<?= base_url('techadmin/contact/contacts')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col --><?php } ?><?php if(isset($module_email)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=@$item_email;?></h3>
                    <p>Email đăng ký</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <a href="<?= base_url('techadmin/email/emails')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php } ?><?php if(isset($module_comment)){ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=@$item_comment;?></h3>
                    <p>Bình luận</p>
                </div>
                <div class="icon">
                    <i class="fa fa-comments-o"></i>
                </div>
                <a href="<?= base_url('techadmin/comment/comments')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><?php } ?>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
             <?php if(isset($module_order)){ ?>
			 <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-shopping-cart"></i>
                    <h3 class="box-title">Danh sách đơn hàng mới nhất</h3>
                    <!-- tools box -->
                     <div class="pull-right box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
					<table id="example" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th width="2%" class="no-sort sorting_disabled" rowspan="1" colspan="1" style="width: 40px;" aria-label="Mã ĐH" >Mã ĐH</th>
								<th width="15%" class="sorting" tabindex="0" aria-controls="example" style="width: 160px;" rowspan="1" colspan="1" aria-label="Họ tên khách hàng: activate to sort column ascending" >Tên khách hàng</th>
								<th width="5%" class="sorting" tabindex="0" aria-controls="example" style="width: 70px;" rowspan="1" colspan="1">Tổng giá tiền</th>
								<th width="40" class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 40px;">Xem</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($list)) {
								foreach ($list as $v) {
							?>
							<tr role="row" class="odd">
								<td><a onclick="getModal(<?=$v->id;?>)" data-toggle="modal" title="Xem nội dung đơn hàng"> <?= @$v->code?></a></td>
								<td><a onclick="getModal(<?=$v->id;?>)" data-toggle="modal" title="Xem nội dung đơn hàng"> <?= @$v->fullname?></a></td>
								<td><?=number_format(@$v->total_price);?>&nbsp;đ</td>
								<td><div onclick="getModal(<?=$v->id;?>)" class="btn btn-xs btn-default" data-toggle="modal" title="Xem nội dung đơn hàng">
                                <i class="fa fa-eye" style=""></i></div>
								<a class="btn btn-xs btn-danger"

								   href="<?= base_url('techadmin/order/delete/' . $v->id) ?>" title="Xóa"

								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-times"></i> </a>
								</td>
							</tr>
							 <?php } } ?>
						</tbody>
					</table>
                </div>				
            </div><?php } ?>
            <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-envelope"></i>
                    <h3 class="box-title">Gửi Email hỗ trợ đến Techtology 4.0</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
				<form action="<?= base_url('admin/defaults/send_email')?>" method="post">
                <div class="box-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="mailto" value="cskhtechtology4.0@gmail.com,info@techtology.com.vn" placeholder="Người nhận:" >
							
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Tiêu đề">
                        </div>
                        <div>
                            <textarea name="message" class="textarea" placeholder="Nội dungg" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" class="pull-right btn btn-default" name="send" id="sendEmail">Gửi
                    <i class="fa fa-arrow-circle-right"></i></button>
                </div>
				</form>
            </div>
        </section>
        <!-- /.Left col -->
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
            <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Thống kê truy cập</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <script type="text/javascript">
                        $(function () {
                            var chart;
                            $(document).ready(function () {
                                Highcharts.setOptions({
                                    colors: ['#32353A']
                                });
                                chart = new Highcharts.Chart({
                                    chart: {
                                        renderTo: 'container',
                                        type: 'column',
                                        margin: [50, 30, 80, 60]
                                    },
                                    title: {
                                        text: 'Visits Today: <?php echo date('d-m-Y'); ?>'
                                    },
                                    xAxis: {
                                        categories: [
                        <?php
                            $i = 1;
                            $count = count($chart_data_today);
                            foreach ($chart_data_today as $data) {
                                if ($i == $count) {
                                    echo "'" . $data->hour . "'";
                                } else {
                                    echo "'" . $data->hour . "',";
                                }
                                $i++;
                            }
                            ?>
                                        ],
                                        labels: {
                                            rotation: -45,
                                            align: 'right',
                                            style: {
                                                fontSize: '9px',
                                                fontFamily: 'Tahoma, Verdana, sans-serif'
                                            }
                                        }
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Visits'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    tooltip: {
                                        formatter: function () {
                                            return '<b>' + this.x + '</b><br/>' +
                                                    'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                        }
                                    },
                                    series: [{
                                            name: 'Visits',
                                            data: [
                        <?php
                            $i = 1;
                            $count = count($chart_data_today);
                            foreach ($chart_data_today as $data) {
                                if ($i == $count) {
                                    echo $data->visits;
                                } else {
                                    echo $data->visits . ",";
                                }
                                $i++;
                            }
                            ?>
                                            ],
                                            dataLabels: {
                                                enabled: false,
                                                rotation: 0,
                                                color: '#F07E01',
                                                align: 'right',
                                                x: -3,
                                                y: 20,
                                                formatter: function () {
                                                    return this.y;
                                                },
                                                style: {
                                                    fontSize: '11px',
                                                    fontFamily: 'Verdana, sans-serif'
                                                }
                                            },
                                            pointWidth: 20
                                        }]
                                });
                            });
                        });
                    </script>
                    <div id="container" style="min-width: 300px; height: 180px; margin: 0 auto;display: none;"></div>
                    <div>
                        <div>
                            <div>
                                <strong>Hôm nay :</strong> <?=@$this->today->today?> Lượt truy cập  &nbsp; &nbsp; &nbsp; 
                                <strong>Hôm qua: </strong><?php if(!empty($this->yesterday->today)){ ?> <?=@$this->yesterday->today?> <?php }else{ echo '0'; } ?> Lượt truy cập &nbsp; &nbsp; &nbsp; </br >
                                <strong>Tuần trước: </strong><?php if(!empty($this->last_week->today)){ ?> <?=@$this->last_week->today?> <?php }else{ echo '0'; } ?> Lượt truy cập &nbsp; &nbsp; &nbsp; 
                                <strong>Tổng: </strong> <?=@$this->total_view->today?> Lượt truy cập &nbsp; &nbsp; &nbsp; </br >
                                
                                <strong>Đang online: <?=online();?></strong>
                                </br >
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <span style="font-size: 16px;font-weight: bold; color: #129FEA;">Thống kê truy cập</span>
                        <div style="float: right;margin: -4px 20px 0 5px;">
                            <form id="select_month_year" style="margin: 0;padding: 0;" method="post">
                                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                <?php echo $this->site_config->generate_months() . '&nbsp;&nbsp;' . $this->site_config->generate_years(); ?>
                                <input type="button" name="submit" id="chart_submit_btn" value="Get Data"/>
                            </form>
                        </div>
                    </div>
                    <script type="text/javascript">
						function getModal(id) {
							var baseurl = $('#baseurl').val();
							$('.modal').remove();
							$.ajax({

								type: "GET",

								dataType:"html",

								url: baseurl + 'admin/order/popupdata',

								data: "id=" + id,

								success: function (ketqua) {

									$('body').append(ketqua);

									$("#myModal").modal();

								}

							})

						}

                        $(function () {
                            var chart;
                            $(document).ready(function () {
                                Highcharts.setOptions({
                                    colors: ['#32353A']
                                });
                                chart = new Highcharts.Chart({
                                    chart: {
                                        renderTo: 'month_year_container',
                                        type: 'column',
                                        margin: [50, 30, 80, 60]
                                    },
                                    title: {
                                        text: 'Visits'
                                    },
                                    xAxis: {
                                        categories: [
                        <?php
                            $i = 1;
                            $count = count($chart_data_curr_month);
                            foreach ($chart_data_curr_month as $data) {
                                if ($i == $count) {
                                    echo "'" . $data->day . "'";
                                } else {
                                    echo "'" . $data->day . "',";
                                }
                                $i++;
                            }
                            ?>
                                        ],
                                        labels: {
                                            rotation: -45,
                                            align: 'right',
                                            style: {
                                                fontSize: '9px',
                                                fontFamily: 'Tahoma, Verdana, sans-serif'
                                            }
                                        }
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Visits'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    tooltip: {
                                        formatter: function () {
                                            return '<b>' + this.x + '</b><br/>' +
                                                    'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                        }
                                    },
                                    series: [{
                                            name: 'Visits',
                                            data: [
                        <?php
                            $i = 1;
                            $count = count($chart_data_curr_month);
                            foreach ($chart_data_curr_month as $data) {
                                if ($i == $count) {
                                    echo $data->visits;
                                } else {
                                    echo $data->visits . ",";
                                }
                                $i++;
                            }
                            ?>
                                            ],
                                            dataLabels: {
                                                enabled: false,
                                                rotation: 0,
                                                color: '#F07E01',
                                                align: 'right',
                                                x: -3,
                                                y: 20,
                                                formatter: function () {
                                                    return this.y;
                                                },
                                                style: {
                                                    fontSize: '11px',
                                                    fontFamily: 'Verdana, sans-serif'
                                                }
                                            },
                                            pointWidth: 20
                                        }]
                                });
                            });
                        });
                    </script>
                    <script type="text/javascript">
                        $("#chart_submit_btn").click(function (e) {
                        var baseurl = $('#base_url').val();
                            // get the token value
                            var cct = $("input[name=csrf_token_name]").val();
                            //reset #container
                            $('#month_year_container').html('');
                            $.ajax({
                        url: baseurl + 'visitorcontroller/get_chart_data',
                               // url: "http://localhost/ci3/index.php/visitorcontroller/get_chart_data", //The url where the server req would we made.
                                //async: false,
                                type: "POST", //The type which you want to use: GET/POST
                                data: $('#select_month_year').serialize(), //The variables which are going.
                                dataType: "html", //Return data type (what we expect).
                                csrf_token_name: cct,
                                success: function (response) {
                                    if (response.toLowerCase().indexOf("no data found") >= 0) {
                                        $('#month_year_container').html(response);
                                    } else {
                                        //build the chart
                                        var tsv = response.split(/n/g);
                                        var count = tsv.length - 1;
                                        var cats_val = new Array();
                                        var visits_val = new Array();
                                        for (i = 0; i < count; i++) {
                                            var line = tsv[i].split(/t/);
                                            var line_data = line.toString().split(",");
                                            var date = line_data[0];
                                            var visits = line_data[1];
                                            cats_val[i] = date;
                                            visits_val[i] = parseInt(visits);
                                        }
                                        var _categories = cats_val;
                                        var _data = visits_val;
                                        var chart;
                                        $(document).ready(function () {
                                            Highcharts.setOptions({
                                                colors: ['#32353A']
                                            });
                                            chart = new Highcharts.Chart({
                                                chart: {
                                                    renderTo: 'month_year_container',
                                                    type: 'column',
                                                    margin: [50, 30, 80, 60]
                                                },
                                                title: {
                                                    text: 'Visits'
                                                },
                                                xAxis: {
                                                    categories: _categories,
                                                    labels: {
                                                        rotation: -45,
                                                        align: 'right',
                                                        style: {
                                                            fontSize: '9px',
                                                            fontFamily: 'Tahoma, Verdana, sans-serif'
                                                        }
                                                    }
                                                },
                                                yAxis: {
                                                    min: 0,
                                                    title: {
                                                        text: 'Visits'
                                                    }
                                                },
                                                legend: {
                                                    enabled: false
                                                },
                                                tooltip: {
                                                    formatter: function () {
                                                        return '<b>' + this.x + '</b><br/>' +
                                                                'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                                    }
                                                },
                                                series: [{
                                                        name: 'Visits',
                                                        data: _data,
                                                        dataLabels: {
                                                            enabled: false,
                                                            rotation: 0,
                                                            color: '#F07E01',
                                                            align: 'right',
                                                            x: -3,
                                                            y: 20,
                                                            formatter: function () {
                                                                return this.y;
                                                            },
                                                            style: {
                                                                fontSize: '11px',
                                                                fontFamily: 'Verdana, sans-serif'
                                                            }
                                                        },
                                                        pointWidth: 20
                                                    }]
                                            });
                                        });
                                    }
                                }
                            });
                        });
                    </script>
                    <input type="hidden" value="<?=base_url()?>" id="base_url">
                    <div class="hidden" id="month_year_container" style="min-width: 400px; height: 400px;display: none; margin: 0 auto;display:hidden"></div>
                </div>
                <div class="box-footer clearfix">
                </div>
            </div>
            <?php if(isset($module_pro)){ ?>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">sản phẩm mới gần đây</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if (isset($list_pro)) {
                    $stt=1; foreach ($list_pro as $v) { $stt++; ?>
                  <tr>
                    <td><?=@$stt;?></td>
                    <td><?php if(!empty($v->image)) { ?>
                    <img src="<?= base_url('upload/img/products/'.$v->pro_dir.'/thumbnail_3_'.@$v->image) ?>" style="height: 35px">
                <?php } else echo "<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>" ?>
                    </td>
                    <td><a href="<?=base_url('san-pham/'.$v->alias.'.html')?>" target="_blank"><?=@$v->name?></a></td>
                    <td><?= number_format(@$edit->price) ?></td>
                    <td>
                      <a href="<?= base_url('techadmin/product/edit/' . $v->id) ?>"
                                class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                             <a href="<?= base_url('techadmin/product/images/' . $v->id) ?>" class="btn btn-xs btn-default" title="Ảnh sản phẩm"><i class="fa fa-image"></i></a>
                            <a href="<?= base_url('techadmin/product/delete/' . $v->id) ?>"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                               class="btn btn-xs btn-danger"title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>
                    </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=base_url('techadmin/product/products')?>" class="btn btn-sm btn-info btn-flat pull-right">Xem tất sản phẩm</a>
            </div>
            <!-- /.box-footer -->
          </div>
      <?php } ?>
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>