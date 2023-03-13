<?
$map_title = '';
$map_phone = '';
$map_adrdress = '';
if($map->title !=''){
    $map_title = '<div class="map_title"><b>'.$map->title.'</b></div>';
}
if($map->diachi_shop !=''){
    $map_adrdress = '<div><b>'.lang('diachi').': </b>'.$map->diachi_shop.'</div>';
}

if($this->option->map_phone !=''){
    $map_phone = '<div><b>'.lang('phone').': </b>'.$this->option->map_phone.'</div>';
}
$hien_map = "'".$map_title.''.$map_adrdress;
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?=site_url()?>assets/js/front_end/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1w21tUvxObGqTgv2fKillyxFfQxICJbs&language=vi"></script>
<script type="text/javascript">
    var map;
    var infowindow;
    var marker = new Array();
    var old_id = 0;
    var infoWindowArray = new Array();
    var infowindow_array = new Array();

    function initialize() {
        var defaultLatLng = new google.maps.LatLng<?=$map->toa_dohienthi;?>;
        var myOptions = {zoom: 15, center: defaultLatLng, scrollwheel: false, mapTypeId: google.maps.MapTypeId.ROADMAP };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        map.setCenter(defaultLatLng);
        var arrLatLng = new google.maps.LatLng<?=$this->option->hdfMap;?>;
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
<script type="text/javascript">
    $(document).ready(function(){
        initialize();
    });
</script>
<div id="map_canvas" style="width:100%; height: 450px"></div>