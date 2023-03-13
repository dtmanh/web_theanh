<article>
    <div class="container">
        <div class="row_pc">

            <div class="content_detail">


                <div class="clearfix"></div>

                <ul class="back_link">
                    <li><a href="<?=base_url()?>">Trang chủ</a></li>
                    <li><a href="#">Chuỗi cửa hàng</a></li>
                </ul>

                <div class="clearfix"></div>

                <h3 class="title_blog"><span class="txt_tit_blog">Chuỗi cửa hàng</span></h3>
                <div class="clearfix clearfix-30"></div>
                <div class="block-content">
                    <div class="col-sm-9">
                        <div class="panel panel-default">
                            <div class="contact-map">
                                <?php
                                    $map_title = '';
                                    $map_phone = '';
                                    $map_adrdress = '';
                                    if($map == null){
                                        if($this->option->map_title !=''){
                                            $map_title = '<div class="map_title"><b>'.$this->option->map_title.'</b></div>';
                                        }
                                        if($this->option->map_adrdress !=''){
                                            $map_adrdress = '<div><b>'.lang('diachi').': </b>'.$this->option->map_adrdress.'</div>';
                                        }

                                        if($this->option->map_phone !=''){
                                            $map_phone = '<div><b>'.lang('phone').': </b>'.$this->option->map_phone.'</div>';
                                        }
                                        $hien_map = "'".$map_title.''.$map_adrdress.''.$map_phone."'";
                                        $coordinates = $this->option->hdfMap;
                                    }else{
                                        $map_title = '<div class="map_title"><b>'.$map->title.'</b></div>';
                                        $map_adrdress = '<div><b>'.lang('diachi').': </b>'.$map->diachi_shop.'</div>';
                                        $map_phone = '<div><b>'.lang('phone').': </b>'.$map->phone.'</div>';
                                        $hien_map = "'".$map_title.''.$map_adrdress.''.$map_phone."'";
                                        $coordinates = $map->toa_domap;
                                    }

                                ?>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1w21tUvxObGqTgv2fKillyxFfQxICJbs&language=vi"></script>
                                <script type="text/javascript">
                                    var map;
                                    var infowindow;
                                    var marker = new Array();
                                    var old_id = 0;
                                    var infoWindowArray = new Array();
                                    var infowindow_array = new Array();

                                    function initialize() {
                                        var defaultLatLng = new google.maps.LatLng<?=$coordinates;?>;
                                        var myOptions = {zoom: 15, center: defaultLatLng, scrollwheel: false, mapTypeId: google.maps.MapTypeId.ROADMAP };
                                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                        map.setCenter(defaultLatLng);
                                        var arrLatLng = new google.maps.LatLng<?=$coordinates;?>;
                                        infoWindowArray[10349] =<?=$hien_map;?>;
                                        loadMarker(arrLatLng, infoWindowArray[10349], 10349);
                                        moveToMaker(10349);
                                    }
                                    function loadMarker(myLocation, myInfoWindow, id) {
                                        marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
                                        var popup = myInfoWindow;
                                        infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
                                        google.maps.event.addListener(marker[id], 'mouseover', function () {
                                            if (id == old_id) return;
                                            if (old_id > 0) infowindow_array[old_id].close();
                                            infowindow_array[id].open(map, marker[id]);
                                            old_id = id;
                                        });
                                        google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
                                            old_id = 0;
                                        });
                                    }
                                    function moveToMaker(id) {
                                        var location = marker[id].position;
                                        map.setCenter(location);
                                        if (old_id > 0) infowindow_array[old_id].close();
                                        infowindow_array[id].open(map, marker[id]);
                                        old_id = id;
                                    }
                                </script>
                                <style type="text/css">
                                    body {
                                        margin: 0;
                                        padding: 0;
                                    }
                                </style>
                                <body onLoad="initialize()" onUnload="GUnload()">
                                <div id="map_canvas" style="width:100%; height: 450px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="panel panel-default panel-body">
                            <ul class="list-group list-map row">
                                <?php if(count($maps)) : ?>
                                    <?php foreach($maps as $km => $map) : ?>
                                        <a href="<?=base_url('chuoi-cua-hang?id='.$map->id)?>" title="<?=@$map->title;?>">
                                            <li class="list-group-item map-item" data-href="<?=@$map->id?>">
                                                <b><?=@$km+1;?>.<?=@$map->title;?></b><br>
                                                <span class="address"><?=@$map->diachi_shop;?></span>
                                            </li>
                                        </a>
                                     <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</article>

