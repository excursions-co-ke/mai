function iter_gioga_initMap() {
	// Creating an object literal containing the properties we want to pass to the map
	var isDraggable = !('ontouchstart' in document.documentElement);
	var options = {
		zoom: 15,
		draggable: isDraggable,
		mapTypeControl: false,
		scrollwheel: false,
		center: new google.maps.LatLng(52.40, -3.61),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles:[{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#333333"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#ffffff"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#fefefe"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#fefefe"},{lightness:17},{weight:1.2}]},{featureType:"landscape",elementType:"geometry",stylers:[{lightness:20},{color:"#ececec"}]},{featureType:"landscape.man_made",elementType:"all",stylers:[{visibility:"on"},{color:"#f0f0ef"}]},{featureType:"landscape.man_made",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#f0f0ef"}]},{featureType:"landscape.man_made",elementType:"geometry.stroke",stylers:[{visibility:"on"},{color:"#bababa"}]},{featureType:"landscape.natural",elementType:"all",stylers:[{visibility:"on"},{color:"#ececec"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi",elementType:"geometry",stylers:[{lightness:21},{visibility:"off"}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#d4d4d4"}]},{featureType:"poi",elementType:"labels.text.fill",stylers:[{color:"#303030"}]},{featureType:"poi",elementType:"labels.icon",stylers:[{saturation:"-100"}]},{featureType:"poi.attraction",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.business",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.government",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.medical",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.park",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#dedede"},{lightness:21}]},{featureType:"poi.place_of_worship",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.school",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"poi.school",elementType:"geometry.stroke",stylers:[{lightness:"-61"},{gamma:"0.00"},{visibility:"off"}]},{featureType:"poi.sports_complex",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#ffffff"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:16}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#f2f2f2"},{lightness:19}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#dadada"},{lightness:17}]}]
	};
	// Creating the map
	var map = new google.maps.Map(document.getElementById('contacts-map'), options);
	// Creating a LatLngBounds object
	var bounds = new google.maps.LatLngBounds();
	// Creating an array that will contain the addresses
	var places = [];
	// Creating a variable that will hold the InfoWindow object
	var infowindow;
	// markerclusterer
	var mcOptions = {gridSize: 50, maxZoom: 15, styles: [{
		height: 53,
		textColor: 'white',
		url: ""+ iter_gioga_map_icons.iter_contacts_cluster +"",
		width: 53
	}]};
	var markerCluster = new MarkerClusterer(map, markers, mcOptions);
	var address = iter_gioga_map_address;
	var popup_content = iter_gioga_map_address;
	var geocoder = new google.maps.Geocoder();
	var markericon = new google.maps.MarkerImage(""+ iter_gioga_map_icons.iter_contacts_icon +"", null, null, null, new google.maps.Size(45,45));
	var markers = [];
	// Adding a LatLng object for each city
	for (var i = 0; i < address.length; i++) {
		(function(i) {
			geocoder.geocode( {'address': address[i]}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					places[i] = results[0].geometry.location;
					// Adding the markers
					var marker = new google.maps.Marker({icon: markericon,position: places[i],animation: google.maps.Animation.DROP});
					
					markers.push(marker);
					//add the marker to the markerClusterer
					markerCluster.addMarker(marker);
					// Creating the event listener. It now has access to the values of i and marker as they were during its creation
					google.maps.event.addListener(marker, 'click', function() {
						// Check to see if we already have an InfoWindow
						if (!infowindow) {
							infowindow = new google.maps.InfoWindow();
						}
						// Setting the content of the InfoWindow
						infowindow.setContent(popup_content[i]);
						// Tying the InfoWindow to the marker
						infowindow.open(map, marker);
					});
					// Extending the bounds object with each LatLng
					bounds.extend(places[i]);
					// Adjusting the map to new bounding box
					map.fitBounds(bounds)
					} else {
					alert(""+ iter_gioga_map_icons.iter_map_alert +"" + status);
				}
			});
		})(i);
	}
};