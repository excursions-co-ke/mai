function iter_gioga_initMap() {
	var isDraggable = !('ontouchstart' in document.documentElement);
	var map_style = ('2' == iter_gioga_home_map_icons.iter_gioga_style_map) ? [{"featureType": "water","elementType": "geometry","stylers": [{ "color": "#193341" }]},{"featureType": "landscape","elementType": "geometry","stylers": [{ "color": "#2c5a71" }]},{"featureType": "road","elementType": "geometry","stylers": [{ "color": "#29768a" },{ "lightness": -37 }]},{"featureType": "poi","elementType": "geometry","stylers": [{ "color": "#406d80" }]},{"featureType": "transit","elementType": "geometry","stylers": [{ "color": "#406d80" }]},{"elementType": "labels.text.stroke","stylers": [{ "visibility": "on" },{ "color": "#3e606f" },{ "weight": 2 },{ "gamma": 0.84 }]},{"elementType": "labels.text.fill","stylers": [{ "color": "#999999" }]},{"featureType": "administrative","elementType": "geometry","stylers": [{ "weight": 0.6 },{ "color": "#1a3541" }]},{"elementType": "labels.icon","stylers": [{ "visibility": "off" }]},{"featureType": "poi.park","elementType": "geometry","stylers": [{ "color": "#2c5a71" }]}] : [{ "elementType": "labels.text", "stylers": [ { "visibility": "on" } ] },{ "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [ { "color": "#f5f5f2" }, { "visibility": "on" } ] },{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#999999" } ] },{ "featureType": "transit", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.attraction", "stylers": [ { "visibility": "off" } ] },{ "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" }, { "visibility": "on" } ] },{ "featureType": "poi.business", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.medical", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.place_of_worship", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.school", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.sports_complex", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#ffffff" }, { "visibility": "simplified" } ] },{ "featureType": "road.arterial", "stylers": [ { "visibility": "simplified" }, { "color": "#ffffff" } ] },{ "featureType": "road.highway", "elementType": "labels.icon", "stylers": [ { "color": "#ffffff" }, { "visibility": "off" } ] },{ "featureType": "road.highway", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road.arterial", "stylers": [ { "color": "#ffffff" } ] },{ "featureType": "road.local", "stylers": [ { "color": "#ffffff" } ] },{ "featureType": "poi.park", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },{ "featureType": "water", "stylers": [ { "color": "#35b8ab" } ] },{ "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [ { "color": "#c4c4c1" } ] },{ "featureType": "landscape", "stylers": [ { "color": "#e5e8e7" } ] },{ "featureType": "poi.park", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road", "stylers": [ { "color": "#ffffff" } ] },{ "featureType": "poi.sports_complex", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] },{ "featureType": "water", "stylers": [ { "color": "#80DEEA" } ] },{ "featureType": "road.local", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road.local", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] },{ "featureType": "poi.government", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] },{ "featureType": "landscape", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] },{ "featureType": "road.local", "stylers": [ { "visibility": "simplified" } ] },{ "featureType": "road" },{ },{ "featureType": "road.highway" }];
	var options = {
		zoom: 3,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.DEFAULT,
		},
		center: new google.maps.LatLng(43.309191, 55.037841),
		mapTypeControl: false,
		disableDefaultUI: true,
		draggable: isDraggable,
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: map_style
	};

	// Creating the map
	var map = new google.maps.Map(document.getElementById('iter-home-map'), options);
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
		url: ""+ iter_gioga_home_map_icons.iter_home_cluster +"",
		width: 53
	}]};
	var markerCluster = new MarkerClusterer(map, markers, mcOptions);
	var address = iter_gioga_home_map_tours;

	var geocoder = new google.maps.Geocoder();
	var markers = [];
	// Adding a LatLng object for each city
	for (var i = 0; i < address.length; i++) {
		(function(i) {
			// Adding the markers
			var markericon = new google.maps.MarkerImage(""+ iter_gioga_home_map_icons.iter_home_icon +"", null, null, null, new google.maps.Size(45,45));

			if (address[i][1] == 'undefined') {
				description = '';
				} else {
				description = address[i][1];
			}
			if (address[i][2] == 'undefined') {
				price = '';
				} else {
				price = address[i][2];
			}
			if (address[i][3] == 'undefined') {
				img = '';
				} else {
				img = address[i][3];
			}
			if (address[i][4] == 'undefined') {
				web = '';
				} else {
				web = address[i][4];
			}

			if (address[i][6] && address[i][7]) {
				var marker = new google.maps.Marker({
					icon: markericon,
					animation: google.maps.Animation.DROP,
					position: new google.maps.LatLng(address[i][6], address[i][7]),
					title: address[i][0],
					desc: description,
					price: price,
					img: img,
					web: web
				});
				
				markers.push(marker);
					
				if (web.substring(0, 6) != "http://") {
					link = "http://" + web;
					} else {
					link = web;
				}
				bindInfoWindow(marker, map, address[i][0], description, price, img, web, link);
				
				//add the marker to the markerClusterer
				markerCluster.addMarker(marker);
				
				// Extending the bounds object with each LatLng
				bounds.extend(new google.maps.LatLng(address[i][6], address[i][7]));
				// Adjusting the map to new bounding box
				map.fitBounds(bounds)
				
			} else {
				geocoder.geocode( {'address': address[i][5]}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						places[i] = results[0].geometry.location;
						// Adding the markers
						var marker = new google.maps.Marker({
							icon: markericon,
							animation: google.maps.Animation.DROP,
							position: places[i],
							title: address[i][0],
							desc: description,
							price: price,
							img: img,
							web: web
						});
						markers.push(marker);
					
						if (web.substring(0, 6) != "http://") {
							link = "http://" + web;
							} else {
							link = web;
						}
						bindInfoWindow(marker, map, address[i][0], description, price, img, web, link);
						
						//add the marker to the markerClusterer
						markerCluster.addMarker(marker);
						
						// Extending the bounds object with each LatLng
						bounds.extend(places[i]);
						// Adjusting the map to new bounding box
						map.fitBounds(bounds)
					} else {
						alert(""+ iter_gioga_home_map_icons.iter_home_map_alert +"" + status);
					}
				});
			}
		})(i);
	}

	// Setting the content of the InfoWindow
	function bindInfoWindow(marker, map, title, desc, price, img, web, link) {
		var infoWindowVisible = (function() {
			var currentlyVisible = false;
			return function(visible) {
				if (visible !== undefined) {
					currentlyVisible = visible;
				}
				return currentlyVisible;
			};
		}());
		iw = new google.maps.InfoWindow({ maxWidth: 400 });

		google.maps.event.addListener(marker, 'click', function() {
			if (infoWindowVisible()) {
				iw.close();
				infoWindowVisible(false);
				} else {
				var btntext = ""+ iter_gioga_home_map_icons.iter_map_details +"";
				iw.setContent("<div class='infoWindowGoogle'><div class='col-md-6 col-xs-12 infow-img' style='background-image:url(" + img + ")'></div><div class='col-md-6 col-xs-12 infow-det'><h4>" + title + "</h4><p>" + desc + "</p><p>" + price + "</p><a class='simple-link hvr-pop' href='" + web + "'' >" + btntext + "</a></div></div>");
				iw.open(map, marker);
				infoWindowVisible(true);
			}
		});
	}
};
