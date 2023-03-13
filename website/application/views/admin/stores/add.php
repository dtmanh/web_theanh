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
        <?=$btn_name;?> vị trí Shopping
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('techadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('techadmin/store/Ds_shopping')?>">Danh sách vị trí Shopping</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>

<!-- <link type="text/css" href="<?= base_url('assets/css_admin/map_css.css') ?>" rel="stylesheet"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Google JavaScript API -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr2TwpsAnblIn5HiI7qWJw2BQ63a2Ojc4"></script>
<style>
#geomap{width: 100%; height: 400px;}
</style>
<section class="content">
    <!-- Page Heading -->
    <div class="row">
        <form class="validate form-horizontal" role="form" id="form-bk" method="POST" action=""
            enctype="multipart/form-data">
            <input type="hidden" name="edit" value="<?= @$row->id; ?>">
            <input type="hidden" name="addnews" value="1">
            <div class="col-md-9" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                       <div class="form-group">

                            <label  class="col-sm-12">Nhập địa chỉ tìm</label>

                            <div class="col-sm-10">

                                <input id="address" type="text" size="50" onfocus="if (this.value == 'Vui lòng nhập địa chỉ để tìm kiếm trên bản đồ!') {this.value = '';} " onblur="if(this.value == ''){this.value = 'Vui lòng nhập địa chỉ để tìm kiếm trên bản đồ!';}" class="form-control input-sm" name="dia_chi_timkiem" value="<?=@$row->tim_kiem;?>">

                            </div>

                            <div class="col-sm-2">

                                <input value="Tìm địa chỉ" onclick="codeAddress()" class="btn btn-success btn-xs get_map" type="button" >

                            </div>

                        </div>
                          <p> <input type="hidden" class="search_latitude" name="lati" size="30" ></p>
                        <p> <input type="hidden" class="search_longitude " name="long" size="30" ></p>
                        <div id="geomap"></div>
                        <div class="form-group">

                            <label  class="col-sm-4">Map title</label>

                            <div class="col-sm-8">

                                <input name="title" type="text" class="form-control input-sm"

                                    value="<?=@$row->title;?>" placeholder="">

                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-sm-4">Map địa chỉ</label>

                            <div class="col-sm-8">


                                <input name="diachi_shop" type="text" class="form-control input-sm"

                                    value="<?=@$row->diachi_shop;?>" placeholder="">

                            </div>

                        </div>

                        <div class="form-group">

                            <label  class="col-sm-4">Map điện thoại</label>

                            <div class="col-sm-8">

                                <input name="phone" type="text" class="form-control input-sm"

                                    value="<?=@$row->phone;?>" placeholder="">

                            </div>

                        </div>
                               
                        <div class="text-right" style="padding-bottom: 15px">
                            <input type="hidden" name="addnews" value="1">
                            <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tùy chọn</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.container-fluid -->
<!-- /.container-fluid -->
<?php

    if(@$row->toa_domap == '(,)'){

        $bien = '(21.03487, 105.78940)';

    }else{

        $bien = @$row->toa_domap;

    }

    ?>
<script type="text/javascript">
    var geocoder;
    var map;
    var marker;

    /*
     * Google Map with marker
     */
    function initialize() {
        var initialLat = $('.search_latitude').val();
        var initialLong = $('.search_longitude').val();
        initialLat = initialLat?initialLat:21.03487;
        initialLong = initialLong?initialLong:105.78940;

        var latlng = new google.maps.LatLng<?=$bien;?>;
        var options = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("geomap"), options);

        geocoder = new google.maps.Geocoder();

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: latlng
        });

        google.maps.event.addListener(marker, "dragend", function () {
            var point = marker.getPosition();
            map.panTo(point);
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                }
            });
        });

    }

    $(document).ready(function () {
        //load google map
        initialize();

        /*
         * autocomplete location search
         */
        var PostCodeid = '#address';
        $(function () {
            $(PostCodeid).autocomplete({
                source: function (request, response) {
                    geocoder.geocode({
                        'address': request.term
                    }, function (results, status) {
                        response($.map(results, function (item) {
                            return {
                                label: item.formatted_address,
                                value: item.formatted_address,
                                lat: item.geometry.location.lat(),
                                lon: item.geometry.location.lng()
                            };
                        }));
                    });
                },
                select: function (event, ui) {
                    $('.search_addr').val(ui.item.value);
                    $('.search_latitude').val(ui.item.lat);
                    $('.search_longitude').val(ui.item.lon);
                    var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                    marker.setPosition(latlng);
                    initialize();
                }
            });
        });

        /*
         * Point location on google map
         */
        $('.get_map').click(function (e) {
            var address = $(PostCodeid).val();
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
            e.preventDefault();
        });

        //Add listener to marker for reverse geocoding
        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('.search_addr').val(results[0].formatted_address);
                        $('.search_latitude').val(marker.getPosition().lat());
                        $('.search_longitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    });

</script>