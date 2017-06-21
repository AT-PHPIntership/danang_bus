var DNBus = {};
DNBus.SearchModule = {

  routes : [],

  drawCircle : function(your_address){
    var addressCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: mymap,
      center: your_address,
      radius: 2000,
    });
  },

  showAddress : function(full_address, callback){
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var your_location ;
    geocoder.geocode({
        address : full_address,
      },
      function(results, status) {
        if (status.toLowerCase() == 'ok') {
        your_location = new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
        mymap.setCenter(your_location);
        mymap.setZoom(14);
        infowindow.setPosition(your_location);
        infowindow.setContent('Your location');
        infowindow.open(mymap);
        DNBus.SearchModule.drawCircle(your_location);
        callback({
          lat: results[0].geometry.location.lat(),
          lng: results[0].geometry.location.lng(),
        });
      }
    });
  },

  ajaxFunction : function(data, callback){
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
        $.each( data, function( index, busstop ) {    
          var marker = new google.maps.Marker({
            map: mymap,
            position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
            title: busstop.adresss
          });
          marker.setMap(mymap);
        });
        DNBus.SearchModule.getRoutes(data, function(callbackRoutes, routes) {
          return callback(true, routes);
        }); 
      },
    });
  },

    getRoutes : function(data, callbackRoutes){
    $.each( data, function( index, busstop ) {
      $.each( busstop.direction, function( index, route ){ 
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

  getWaypoint : function (path){
    var path_length = path.length;
    var points = [];
    for(var i = 1; i < path_length-1; i++) { 
      points.push({
        location: path[i],
        stopover: true  
      });
    }
    return points;
  },

  drawDirection : function (directions, directions_display,path,waypoints){
    var path_length = path.length;
    directions.route({
      origin: path[0],
      waypoints: waypoints,
      optimizeWaypoints: true,
      destination: path[path_length-1],
      travelMode: 'DRIVING',
    }, function(response, status) {
        if (status === 'OK') {
          directions_display.setDirections(response);
        } else {
          console.log('Directions request failed due to ' + status);
        }
    });
  },

  drawPolyline : function(busstops,color){
    var path =[];
    var waypoints;
    var directions = new google.maps.DirectionsService;
    var directions_display = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: color
      },
    });
    directions_display.setMap(mymap);
    $.each( busstops, function( index, busstop ){
      path.push({lat: Number(busstop.lat), lng: Number(busstop.lng)});
    });
    waypoints = DNBus.SearchModule.getWaypoint(path);
    DNBus.SearchModule.drawDirection(directions,directions_display,path,waypoints);
  },

};