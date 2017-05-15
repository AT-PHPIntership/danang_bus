$(document).ready(function() {
    showBusStopOnMap("forwardDirection");
}); 
function showBusStopOnMap(type) {
  var routeJSON = JSON.parse(routeJSONStr);
  var busstops;
  if(type == "forwardDirection") {
    var busstops = routeJSON["forward_directions"];
  } else {
    var busstops = routeJSON["backward_directions"];
  }
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  for (var i = 0; i <= busstops.length; i++) {
    $.each( busstops[i], function( index, busstop ){
      var marker = new google.maps.Marker({
        map: mymap,
        position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
        title: busstop.adresss,
        label: ""+i+""
      });
      marker.setMap(mymap);
    });
  }
}

