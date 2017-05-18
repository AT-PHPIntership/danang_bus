$(document).ready(function() {
  if(typeof(routeJSONStr) != "undefined" && routeJSONStr !== null){
    showBusStopOnMap();
  }
});

function showBusStopOnMap() {
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
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 10,
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
  waypoints_forward = getWaypoint(forward_path);
  waypoints_backward = getWaypoint(backward_path);
  drawDirection(directions_forward,directions_display_forward,forward_path,waypoints_forward);
  drawDirection(directions_backward,directions_display_backward,backward_path,waypoints_backward);
}

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
        directions_display.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
}
   