<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<form action="dang-tin.html" class="form-horizontal" id="frmPosting" method="post" name="frmPosting" enctype="multipart/form-data">
	<div id="divPostNews">
		<div class="rowHeader"><h2>Thông tin cơ bản</h2></div>
			<div class="rowContent">
				<div class="rowContentLeft" style="width: 85%;">
					<div class="postrow">
						<div class="group_one">
							<div class="base1">
								Tỉnh/Thành phố(<span class="redfont">*</span>)
							</div>
							<div class="base2">
								<select id="ddlCity" name="ddlCity" onChange="geocode_load();" class="dropdown-list required">
									<option value="">-- Tỉnh/thành phố --</option>
									<?php
									$d->reset();
									$sql="select id,ten_$lang from #_city_list where hienthi =1 order by stt asc";
									$d->query($sql);
									$province_list = $d->result_array();
									for($i=0,$count_tinh=count($province_list);$i<$count_tinh;$i++) { ?>
									<option value="<?=$province_list[$i]['id']?>"><?=$province_list[$i]["ten_$lang"]?></option>
									<? }?>
								</select>
								<span class="errorMessage"></span>
								<input type="hidden" name="hddCity" id="hddCity" />
							</div>
						</div>
						<div class="group_two">
							<div class="base1">
								Quận/Huyện(<span class="redfont">*</span>)
							</div>
							<div class="base4">
								<select id="ddlDistrict" name="ddlDistrict" onchange="geocode_load();"  class="dropdown-list required">
									<option value="">-- Quận/huyện --</option></select>
									<span class="errorMessage"></span>
									<input type="hidden" name="hddDistrict" id="hddDistrict" />
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="postrow">
							<div class="group_one">
								<div class="base1">
									Phường/Xã
								</div>
								<div class="base2">
									<select id="ddlWard" name="ddlWard" onchange="geocode_load();" class="dropdown-list required">
										<option value="" >-- Phường/xã --</option>
									</select>
									<input type="hidden" name="hddWard" id="hddWard" />
								</div>
							</div>
							<div class="group_two">
								<div class="base1">
									Đường/Phố
								</div>
								<div class="base4">
									<select id="ddlStreet" name="ddlStreet" onchange="geocode_load();" class="dropdown-list required">
										<option value="">-- Đường/phố --</option>
									</select>
									<input type="hidden" name="hddStreet" id="hddStreet" />
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="postrow">
							<div class="group_one">
								<div class="base1">
									Giá<span class="redfont">*</span>
								</div>
								<div class="base2">
									<input name="txtPrice" type="text" id="txtPrice" class="text-field w85per" numberonly="2" maxlength="6" numbersonly="true" decimal="true">
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="postrow">
							<div class="base1">
								Địa chỉ (<span class="redfont">*</span>)
							</div>
							<div class="base5">
								<input name="txtAddress" type="text" id="txtAddress" style="width: 93%;" class="text-field required" maxlength="200"> <p>Bạn có thể nhập địa chỉ chi tiết hơn !!!</p>
								<span class="errorMessage"></span>
							</div>
						</div>      
					</div>
					<div class="clear"></div>
				</div>
				<div class="rowHeader"><h2>Bản đồ</h2></div>
				<div class="rowContent">
					<div class="rowContentLeft">
						<div class="map-notify">Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon<img src="images/map-icon-detail.png" width="14"> tới đúng vị trí của tin rao.</div>
						<div class="rowContent"  id="mapinfo">
							<span id="ctl32_ctl01_GoogleControlWrapper">               
								<input id="Latitude" name="Latitude" type="hidden" value="">
								<input id="Longitude" name="Longitude" type="hidden" value="" />
								<div class="form-editor content-item-map">
									<div class="map-wrapper">
										<div class="map-content">
											<div id="BanDo" class="map-edit"></div>
										</div>
									</div>
								</div><br /><br />
							</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
        
<script type="text/javascript">
    if(1==1) 
    {
        var map;
        var markers;
        var latlngs;
        var gRedIcon = new google.maps.MarkerImage("images/map-icon-detail.png", new google.maps.Size(32, 45), new google.maps.Point(0, 0), new google.maps.Point(15, 45));
        var gSmallShadow = new google.maps.MarkerImage("mm_20_shadow.png", new google.maps.Size(22, 20), new google.maps.Point(0, 0), new google.maps.Point(6, 20));
        var infowindow;
        var geocoder;
        var divThongTin = "<div>Kéo thả nhà đến vị trí mới</div>";

        function initialize() 
        {
            var olat, olng;
            olat = document.getElementById('Latitude').value;
            olng = document.getElementById('Longitude').value;
            if (olat == '' || olat == '0' || olng == '' || olng == '0') {
                olat = 10.77836;
                olng = 106.664468;
            }
            var mapOptions = {
                center: new google.maps.LatLng(olat, olng),
                zoom: 15,
				scrollwheel : true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            latlngs = new google.maps.LatLng(olat, olng);
            map = new google.maps.Map(document.getElementById('BanDo'), mapOptions);
            geocoder = new google.maps.Geocoder();
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);
            infowindow = new google.maps.InfoWindow();

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                icon: gRedIcon
            });

            if ((document.getElementById('Latitude').value != ''
            	&& document.getElementById('Latitude').value != '0')
             	&& (document.getElementById('Longitude').value != ''
             	&& document.getElementById('Longitude').value != '0')) {
                marker.setPosition(new google.maps.LatLng(olat, olng));
            }

            markers = marker;
            google.maps.event.addListener(marker, 'dragstart', function () {
                var place = map.getCenter();
                updateMarkerPosition(place);

                google.maps.event.addListener(marker, 'drag', function () {
                    updateMarkerPosition(marker.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function () {
                    geocodePosition(marker.getPosition());
                });

                marker.setPosition(place);
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(divThongTin);
                infowindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function (e) {
                geocoder.geocode({
                	'latLng': e.latLng},
              		function (results, status) 
              		{
						if (status == google.maps.GeocoderStatus.OK) 
						{
							if (results[0]) 
							{
								if (marker) 
								{
									marker.setPosition(e.latLng);
								}
								else 
								{
									marker = new google.maps.Marker({
										position: e.latLng,
										map: map
									});
								}
								//infowindow.setContent(divThongTin);
								infowindow.open(map, marker);
								updateMarkerPosition(marker.getPosition());
								geocodePosition(marker.getPosition());
								infowindow.setContent(divThongTin);
							}
							else
							{
								document.getElementById('geocoding').innerHTML='No results found';
							}
						}
						else 
						{
							document.getElementById('geocoding').innerHTML='Geocoder failed due to: '+status;
						}
              		});
            });
        }

        function geocode_load()
        {
            $tinh = $("#ddlCity option[value='"+$("#ddlCity").val()+"']").html();
            $quan = $("#ddlDistrict option[value='"+$("#ddlDistrict").val()+"']").html();
            $khu = $("#ddlWard option[value='"+$("#ddlWard").val()+"']").html();
            $duong = $("#ddlStreet option[value='"+$("#ddlStreet").val()+"']").html();
            if($("#ddlCity").val()==''){
               $tinh = ''; 
            }
           
            if($("#ddlDistrict").val()==''){
                $quan = '';
            }
            if($("#ddlWard").val()==''){
                $khu = '';
            }
            if($("#ddlStreet").val()==''){
                $duong ='';
            }
          
            var address = $duong+" "+$khu+" "+$quan+" "+$tinh;
            $("#address").val(address);
            
            var geocoder= new google.maps.Geocoder();
            geocoder.geocode({
                'address': address,
                'partialmatch': true
            }, geocodeResult);
        }

        function geocodeResult(results, status) 
        {
            if (status == 'OK' && results.length > 0) {
                map.fitBounds(results[0].geometry.viewport);
                updateGeocodePosition(results[0].geometry.location);
                markers.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        }

        function geocodePosition(pos)
        {
            var geocoder= new google.maps.Geocoder();
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
        }

        function updateGeocodePosition(latlng)
        {
            document.getElementById('Latitude').value = latlng.lat();
            document.getElementById('Longitude').value = latlng.lng();
            latlngs = latlng;
        }

        function updateMarkerPosition(latlng)
        {
            document.getElementById('Latitude').value = latlng.lat();
            document.getElementById('Longitude').value = latlng.lng();
            latlngs = latlng;
        }

        function updateMarkerAddress(str)
        {
            document.getElementById('address').value = str;
        }

        var markers = new Array();
        function timdiem(diadiems, radiuss)
        {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = new Array();
            var request = {
                location: latlngs,
                radius: radiuss,
                types: diadiems
            };
            var service = new google.maps.places.PlacesService(map);
            service.search(request, callback);
        }

        function callback(results, status)
        {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place)
        {
            var placeLoc = place.geometry.location;
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            markers[markers.length] = marker;

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }

	$("#search_loadmap").click(function () { 
		address=$('#AddressNumber').val();
		$('#address').val(address);
		geocode_load();
	});
	$(document).ready(function(){
	    initialize();
	})
</script>