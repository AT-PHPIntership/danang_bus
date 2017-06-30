DNBus.SearchModule = {
  routes : [],

  /**
  * Draw a circle with a radius of 2km
  * 
  * @param Array your_address
  */
  drawCircle : function(your_address){
    var addressCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: newmap,
      center: your_address,
      radius: 2000,
    });
  },

  /**
  * show your location on map with infowindow
  * 
  * @param String full_address
  * @param Function full_address
  * 
  * @return callback
  */
  showAddress : function(full_address, callback){
    var geocoder = new google.maps.Geocoder();
    var your_location ;
    geocoder.geocode({
        address : full_address,
      },
      function(results, status) {
        if (status.toLowerCase() == 'ok') {
        your_location = new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
        newmap.setCenter(your_location);
        newmap.setZoom(14);
        DNBus.SearchModule.drawCircle(your_location);
        callback({
          lat: results[0].geometry.location.lat(),
          lng: results[0].geometry.location.lng(),
        });
      }
    });
  },

  /**
  * send data to controller and get all busstop of route
  * 
  * @param Object data
  * @param Function callback
  * 
  * @return callback
  */
  getBusstopsOfRoute : function(data, callback){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: '/search/result',
      cache: false,
      data: data,
      success: function (data) {
        $.each( data, function(index, busstop ) {    
          var marker = new google.maps.Marker({
            map: newmap,
            position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
            title: busstop.adresss
          });
          marker.setMap(newmap);
        });
        DNBus.SearchModule.getRoutes(data, function(callbackRoutes, routes) {
          return callback(true, routes);
        }); 
      },
    });
  },

  /**
  * get array routes
  * 
  * @param Object data
  * @param Function callbackRoutes
  * 
  * @return callbackRoutes
  */
  getRoutes : function(data, callbackRoutes){
    $.each( data, function(index, busstop ) {
      $.each( busstop.direction, function(index, route ){ 
        if (DNBus.SearchModule.routes[route.route_id] == undefined) {
          DNBus.SearchModule.routes[route.route_id] = [];
        }
        DNBus.SearchModule.routes[route.route_id].push(busstop);
      });
      if (index == data.length - 1) {
        return callbackRoutes(true, DNBus.SearchModule.routes);
      }
    });
  },

  /**
  * draw polyline from start busstop to destiantion busstop
  * 
  * @param Object busstops
  * @param String color
  */
  drawPolyline : function(busstops, color){
    var path =[];
    var waypoints;
    var directions = new google.maps.DirectionsService;
    var directions_display = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: color
      },
    });
    directions_display.setMap(newmap);
    $.each( busstops, function(index, busstop ){
      path.push({lat: Number(busstop.lat), lng: Number(busstop.lng)});
    });
    waypoints = DNBus.RoutesModule.getWaypoint(path);
    DNBus.RoutesModule.drawDirection(directions, directions_display, path, waypoints);
  },

};