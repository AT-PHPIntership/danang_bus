DNBus.RoutesModule = {
  /**
  * show all busstop by maker on map
  * 
  * @param object busstops
  * @param String color
  */
  showBusstopOnMap : function(busstops, color){
    var path =[];
    var waypoints;
    var directions = new google.maps.DirectionsService;
    var directions_display = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: color
      },
    });
    directions_display.setMap(mymap);
    $.each( busstops, function(index, busstop ){
      path.push({lat: Number(busstop.stop.lat), lng: Number(busstop.stop.lng)});
    });
    waypoints = DNBus.RoutesModule.getWaypoint(path);
    DNBus.RoutesModule.drawDirection(directions, directions_display, path, waypoints);
  },

  /**
  * get all waypoint of path
  * 
  * @param Array path
  * 
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
  * 
  * @param Object directions
  * @param Object directions_display
  * @param Array path
  * @param Array waypoints
  */
  drawDirection : function (directions, directions_display, path, waypoints){
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

