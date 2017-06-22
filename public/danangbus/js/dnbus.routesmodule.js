DNBus.RoutesModule = {

  /**
  * show all busstop by maker on map
  * @return no
  */
  showBusStopOnMap : function () {
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
    waypoints_forward = DNBus.RoutesModule.getWaypoint(forward_path);
    waypoints_backward = DNBus.RoutesModule.getWaypoint(backward_path);
    DNBus.RoutesModule.drawDirection(directions_forward,directions_display_forward,forward_path,waypoints_forward);
    DNBus.RoutesModule.drawDirection(directions_backward,directions_display_backward,backward_path,waypoints_backward);
  },

  /**
  * get all waypoint of path
  * @param {Array} path
  * @return points
  */
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

  /**
  * draw Direction of routes
  * @param {Object} directions
  * @param {Object} directions_display
  * @param {Array} path
  * @param {Array} waypoints
  * @return no
  */
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
};

