$(document).ready(function() {

  $(".btn-search").click(function () {
    var formData;
    var busstops;
    var distance;  
    if($('#address').val()!=''){
      var full_address = $('#address').val()+',Đà Nẵng, Việt Nam';
      showAddress(full_address);
    }
    else {
      alert('Vui lòng nhập địa điểm của bạn ')
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    formData = {
      route_id: $('#route_id').val(),
      status: $('#status').val(),
    }
    $.ajax({
      type: 'POST',
      url: '/search',
      cache: false,
      data: formData,
      success: function (data) {
        busstops = data;
        showNearbusstop(full_address,busstops);
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

   var colors= ['aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 
  'lime', 'maroon', 'navy', 'olive', 'orange', 'purple', 'red', 
  'silver', 'teal', 'white', 'yellow'];
  var r = [];

    if(typeof(routeJSONStr) != "undefined" && routeJSONStr !== null){
      var busstops = JSON.parse(routeJSONStr);
      console.log(busstops);
      r.push(busstops.forward_directions);
      r.push(busstops.backward_directions);

      $.each( r, function( index, v){
        console.log(colors[index]);
        test(v, colors[index]);
      
      });
    }

    if(typeof(routesJSON) != "undefined" && routesJSON !== null){
      var routes = JSON.parse(routesJSON);
      console.log(routes);
      $.each( routes, function( index, route){
        console.log('routes');
        console.log(route);
        r.push(route.forward_directions);
        r.push(route.backward_directions);
      });

      console.log(r);
      $.each( r, function( index, v){
        if(index % 2 != 0){
        console.log(colors[index--]);
        test(v, colors[index--]);
        }
        else {
          console.log(colors[index]);
          test(v, colors[index]);
        }
      });
      
      
    }
});

var mymap = new google.maps.Map(document.getElementById('mymap'), {
  zoom: 14,
  center: {lat: 16.058980, lng: 108.204351},
  mapTypeId: 'terrain'
}); 

// function showBusStopOnMap(busstops,color) {
//   var forward_path = [];  
//   //var backward_path = [];
//   var waypoints_backward;
//   var waypoints_forward;
//   var directions_forward = new google.maps.DirectionsService;
//   //var directions_backward = new google.maps.DirectionsService;
//   var directions_display_forward = new google.maps.DirectionsRenderer({
//     polylineOptions: {
//       strokeColor: color
//     },
//   });
//   // var directions_display_backward = new google.maps.DirectionsRenderer({
//   //   polylineOptions: {
//   //     strokeColor: color
//   //   },
//   // }); 
//   // var mymap = new google.maps.Map(document.getElementById('mymap'), {
//   //   zoom: 10,
//   //   center: {lat: 16.058980, lng: 108.204351},
//   //   mapTypeId: 'terrain'
//   // });
//   directions_display_forward.setMap(mymap);
//   //directions_display_backward.setMap(mymap);
//   $.each( busstops.forward_directions, function( index, busstop ){
//     forward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
//   });
//   // $.each( busstops.backward_directions, function( index, busstop ){
//   //   backward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
//   // });
//   waypoints_forward = getWaypoint(forward_path);
//   //waypoints_backward = getWaypoint(backward_path);
//   drawDirection(directions_forward,directions_display_forward,forward_path,waypoints_forward);
//   //drawDirection(directions_backward,directions_display_backward,backward_path,waypoints_backward);
// }

function getWaypoint(path){
  var path_length = path.length;
  var points = [];
  for(var i = 1; i < path_length-1; i++) { 
    points.push({
      location: path[i],
      stopover: true  
    });
  }
  return points;
}

function drawDirection(directions, directions_display,path,waypoints){
  var path_length = path.length;
  directions.route({
    origin: path[0],
    waypoints: waypoints,
    optimizeWaypoints: true,
    destination: path[path_length-1],
    travelMode: 'DRIVING',
  }, function(response, status) {
      if (status === 'OK') {
        console.log(status);
        console.log(response);
        directions_display.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
}

function drawCircle(your_address){
  var addressCircle = new google.maps.Circle({
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35,
    map: mymap,
    center: your_address,
    radius: 1000,
  });
}

function showAddress(full_address){
  var geocoder = new google.maps.Geocoder();
  var infowindow = new google.maps.InfoWindow();
  var your_address;
  geocoder.geocode({
      address : full_address,
    },
    function(results, status) {
      if (status.toLowerCase() == 'ok') {
      // Get lat, lng
      your_address = new google.maps.LatLng(
        results[0]['geometry']['location'].lat(),
        results[0]['geometry']['location'].lng()
      );
      mymap.setCenter(your_address);
      mymap.setZoom(14);
      infowindow.setPosition(your_address);
      infowindow.setContent('Your address');
      infowindow.open(mymap);
      drawCircle(your_address);
    }
  });
}

function showNearbusstop(full_address, busstops){
  $.each( busstops, function( index, busstop ){
    var directionsService = new google.maps.DirectionsService();
    var request = {
      origin      : full_address, // a city, full address
      destination : {lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)},
      travelMode  : google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      distance = response.routes[0].legs[0].distance.value;
      console.log(distance);
      if (distance < 1000) {
        var marker = new google.maps.Marker({
          map: mymap,
          position: {lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)},
          title: busstop.stop.adresss
        });
        marker.setMap(mymap);
      }; 
    });                             
  });
}

function test(busstops,color){
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
      path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
    });
    waypoints = getWaypoint(path);
    drawDirection(directions,directions_display,path,waypoints);
}

