$(document).ready(function() {

showBusStopOnMap();
});
function showBusStopOnMap() {
  var busstops = JSON.parse(routeJSONStr);
  console.log(busstops);
  var forward_path = [];  
  var backward_path = [];  
  var directionsService_forward = new google.maps.DirectionsService;
  var directionsService_backward = new google.maps.DirectionsService;
  var directionsDisplay_forward = new google.maps.DirectionsRenderer({
    polylineOptions: {
    strokeColor: 'green'
  },
  });
  var directionsDisplay_backward = new google.maps.DirectionsRenderer({
    polylineOptions: {
    strokeColor: 'red'
  },
  }); 
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  directionsDisplay_forward.setMap(mymap);
  directionsDisplay_backward.setMap(mymap);
  $.each( busstops.forward_directions, function( index, busstop ){
    forward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
  });
  $.each( busstops.backward_directions, function( index, busstop ){
    backward_path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
  });
  var waypoints_backward=[];
  var waypoints_forward=[];
  for(var i = 1; i < forward_path.length-1; i++) { 
    waypoints_forward.push({
    location: forward_path[i],
    stopover: true  
    });
  }
  for(var i = 1; i < backward_path.length-1; i++) { 
    waypoints_backward.push({
    location: backward_path[i],
    stopover: true  
    });
  }
   directionsService_forward.route({
    origin: backward_path[0],
    waypoints: waypoints_backward,
    optimizeWaypoints: true,
    destination: backward_path[backward_path.length-1],
    travelMode: 'DRIVING',
  }, function(response, status) {
    if (status === 'OK') {
      directionsDisplay_forward.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
  directionsService_backward.route({
    origin: forward_path[0],
    waypoints: waypoints_forward,
    optimizeWaypoints: true,
    destination: forward_path[forward_path.length-1],
    travelMode: 'DRIVING',
  }, function(response, status) {
    if (status === 'OK') {
      directionsDisplay_backward.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}
   