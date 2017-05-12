$(document).ready(function() {
    showBusStopOnMap("forwardDirection");
}); 
function showBusStopOnMap(type) {
  var busstops;
  if(type == "forwardDirection") {
    busstops = JSON.parse(forwardDirectionJson);
  } else {
    busstops = JSON.parse(backwardDirectionJson);
  }
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  var path = [];
  $.each( busstops, function( index, busstop ){
  
    var marker = new google.maps.Marker({
      map: mymap,
      position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
      title: busstop.adresss
    });
    marker.setMap(mymap);
    path.push({lat: Number(busstop.lat), lng: Number(busstop.lng)});
  });
  var polyline = new google.maps.Polyline({
    path: path,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });
  polyline.setMap(mymap);
}

