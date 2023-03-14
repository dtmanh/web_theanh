	<?php
	if($this->option->map_title !=''){
		$map_title = '<div class="map_title" style="line-height: 25px;"><b>'.$this->option->map_title.'</b></div>';
	}
	if($this->option->map_adrdress !=''){
		$map_adrdress = '<div style="line-height: 25px;"><b>Địa chỉ: </b>'.$this->option->map_adrdress.'</div>';
	}

	if($this->option->map_phone !=''){
		$map_phone = '<div style="line-height: 25px;"><b>Điện thoại: </b>'.$this->option->map_phone.'</div>';
	}
	$hien_map = "'".$map_title.''.$map_adrdress.''.$map_phone."'";
	?>

<div class="map_site">
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
			var defaultLatLng = new google.maps.LatLng<?=$this->option->hdfMap;?>;
			var myOptions = {zoom: 15, center: defaultLatLng, scrollwheel: false, mapTypeId: google.maps.MapTypeId.ROADMAP };
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			map.setCenter(defaultLatLng);
			var arrLatLng = new google.maps.LatLng<?=$this->option->hdfMap;?>;
			infoWindowArray[10349] = <?=$hien_map;?>;
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
	<body onLoad="initialize()" onUnload="GUnload()">
	<div id="map_canvas" style="width:100%; height: 185px"></div>
	</body>
</div>
<style>
.map_site{color:#000;}
</style>