$(document).ready(function() {
  var routeJSON = JSON.parse(routeJSONStr);
  var busstops = routeJSON["forward_directions"];
  showBusStopOnMap(busstops);
  $('.btn-showforwardDirection').on('click', function(){
    var busstops = routeJSON["forward_directions"];
    showBusStopOnMap(busstops);
  }); 
  $('.btn-showbackwardDirection').on('click', function(){
    var busstops = routeJSON["backward_directions"];
    showBusStopOnMap(busstops);
  });
}); 
function showBusStopOnMap(busstops) {
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

