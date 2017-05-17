$(document).ready(function() {

showBusStopOnMap();
});
function showBusStopOnMap() {
  var busstops = JSON.parse(routeJSONStr);
  console.log(busstops);
  var forward_path = [];  
  var backward_path = [];  
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
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  directions_display_forward.setMap(mymap);
  directions_display_backward.setMap(mymap);
  $.each( busstops.forward_directions, function( index, busstop ){
    forward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
  });
  $.each( busstops.backward_directions, function( index, busstop ){
    backward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
  });
  var waypoints_backward=[];
  var waypoints_forward=[];
  var forward_path_length = forward_path.length;
  var backward_path_length = backward_path.length;
  for(var i = 1; i < forward_path_length-1; i++) { 
    waypoints_forward.push({
      location: forward_path[i],
      stopover: true  
    });
  }
  for(var i = 1; i < backward_path_length-1; i++) { 
    waypoints_backward.push({
      location: backward_path[i],
      stopover: true  
    });
  }
   directions_forward.route({
    origin: forward_path[0],
    waypoints: waypoints_forward,
    optimizeWaypoints: true,
    destination: forward_path[forward_path_length-1],
    travelMode: 'DRIVING',
  }, function(response, status) {
      if (status === 'OK') {
        directions_display_forward.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
  directions_backward.route({
    origin: backward_path[0],
    waypoints: waypoints_backward,
    optimizeWaypoints: true,
    destination: backward_path[backward_path_length-1],
    travelMode: 'DRIVING',
  }, function(response, status) {
      if (status === 'OK') {
        directions_display_backward.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
}
   