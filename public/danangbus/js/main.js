$(document).ready(function() {
    showDirection("forward");
}); 
function showDirection(type) {
  var busstops;
  if(type == "forward") {
    busstops = forward;
  } else {
    busstops = backward;
  }
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  var path = [];
  $.each( busstops, function( index, value ){
    var marker = new google.maps.Marker({
      map: mymap,
      position: {lat: Number(value.lat), lng: Number(value.lng)},
      title: value.adresss
    });
    marker.setMap(mymap);
    path.push({lat: Number(value.lat), lng: Number(value.lng)});
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

