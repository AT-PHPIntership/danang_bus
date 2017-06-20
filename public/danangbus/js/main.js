$(document).ready(function() {

  navigator.geolocation.getCurrentPosition(function(position) {
    var your_location = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    var infowindow = new google.maps.InfoWindow();
    infowindow.setPosition(your_location);
    infowindow.setContent('Your location');
    infowindow.open(mymap);
    search_module.drawCircle(your_location);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    data = {
      lat: your_location.lat,
      lng: your_location.lng,
    }
    $.ajax({
      type: "POST",
      url: '/search',
      data: data,
      success: function(data) {
        $.each( data, function( index, busstop ){
          var marker = new google.maps.Marker({
            map: mymap,
            position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
            title: busstop.adresss
          });
          marker.setMap(mymap);
          marker.addListener('click', function(name) { 
            var list_route_name=$('<ul></ul>'); 
            for (var i = 0; i < busstop.direction.length; i++) {
              list_route_name.append('<li>'+busstop.direction[i].routes.name+ '</li>');
            }
            var infowindow = new google.maps.InfoWindow({
              content: list_route_name.html(),
            });
            infowindow.open(mymap, marker);
          });
        });
      },
    });
  }, function() {

  });

  $('#input-starting-point').blur(function() { 
    var map = new google.maps.Map(document.getElementById('mymap'), {
      zoom: 14,
      center: {lat: 16.058980, lng: 108.204351},
      mapTypeId: 'terrain'
    });  
    var data;
    var starting_point = $('#input-starting-point').val()+',Đà Nẵng, Việt Nam';
    search_module.showAddress(starting_point,function(starting_point_latlng){
      data = {
        lat: starting_point_latlng.lat,
        lng: starting_point_latlng.lng,
      }
      search_module.ajaxFunction(data, function() {
        //TODO
      });
    }); 
  });

  $('#input-destination').blur(function() { 
    var data;
    var destination = $('#input-destination').val()+',Đà Nẵng, Việt Nam';
    search_module.showAddress(destination,function(destination_latlng){
      data = {
        lat: destination_latlng.lat,
        lng: destination_latlng.lng,
      }
      search_module.ajaxFunction(data, function(callback, routes) {
        if (callback) {
          for (var i = 0; i <= routes.length; i++) {
            if(routes[i] != undefined) {
              search_module.drawPolyline(routes[i],colors[i]);
            }
          }
        }
      });
    }); 
  });

  if(typeof(routeJSONStr) != "undefined" && routeJSONStr !== null){
    routes_module.showBusStopOnMap();
  }
});

var routes = [];

var colors= ['aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 
'lime', 'maroon', 'navy', 'olive', 'orange', 'purple', 'red', 
'silver', 'teal', 'white', 'yellow'];

var mymap = new google.maps.Map(document.getElementById('mymap'), {
  zoom: 14,
  center: {lat: 16.058980, lng: 108.204351},
  mapTypeId: 'terrain'
}); 

var routes_module = {
  showBusStopOnMap:function () {
    var busstops = JSON.parse(routeJSONStr);
    var forward_path = [];  
    var backward_path = [];
    var waypoints_backward;
    var waypoints_forward;
    var directions_forward = new google.maps.DirectionsService;
    var directions_backward = new google.maps.DirectionsService;
    var directions_display_forward = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: 'green'
      },
    });
    var directions_display_backward = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: 'red'
      },
    }); 
    directions_display_forward.setMap(mymap);
    directions_display_backward.setMap(mymap);
    $.each( busstops.forward_directions, function( index, busstop ){
      forward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
    });
    $.each( busstops.backward_directions, function( index, busstop ){
      backward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
    });
    waypoints_forward = routes_module.getWaypoint(forward_path);
    waypoints_backward = routes_module.getWaypoint(backward_path);
    routes_module.drawDirection(directions_forward,directions_display_forward,forward_path,waypoints_forward);
    routes_module.drawDirection(directions_backward,directions_display_backward,backward_path,waypoints_backward);
  },

  getWaypoint:function (path){
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

  drawDirection: function (directions, directions_display,path,waypoints){
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
  }
};

var search_module = {
  drawCircle: function(your_address){
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

  showAddress: function(full_address, callback){
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
        search_module.drawCircle(your_location);
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
        search_module.getRoutes(data, function(callbackRoutes, routes) {
          return callback(true, routes);
        }); 
      },
    });
  },

  getRoutes: function(data, callbackRoutes){
    $.each( data, function( index, busstop ) {
      $.each( busstop.direction, function( index, route ){ 
        if (routes[route.route_id] == undefined) {
          routes[route.route_id] = [];
        }
        routes[route.route_id].push(busstop);
      });
      if (index == data.length - 1) {
        return callbackRoutes(true, routes);
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
    waypoints = routes_module.getWaypoint(path);
    routes_module.drawDirection(directions,directions_display,path,waypoints);
  }

};