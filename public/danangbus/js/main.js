$(document).ready(function() {
  var image_maker = {
    url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
    size: new google.maps.Size(20, 32),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(0, 32)
  };
  var mymap = new google.maps.Map(document.getElementById('mymap'), {
    zoom: 14,
    center: {lat: 16.058980, lng: 108.204351},
    mapTypeId: 'terrain'
  });
  $(".btn-search").click(function () {  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    var formData = {
      $route_id: $('#route_id').val(),
      $status: $('#status').val(),
    }
      $.ajax({
        type: 'POST',
        url: '/search',
        cache: false,
        data: formData,
        success: function (data) {
          var busstops = data;
          var geocoder = new google.maps.Geocoder(); 
          geocoder.geocode({
            address : $('#address').val()+',Đà Nẵng, Việt Nam',
          },
          function(results, status) {
            if (status.toLowerCase() == 'ok') {
            // Get center
            var youraddress = new google.maps.LatLng(
              results[0]['geometry']['location'].lat(),
              results[0]['geometry']['location'].lng()
            );
            mymap.setCenter(youraddress);
            mymap.setZoom(14);
            // Set marker also
            marker = new google.maps.Marker({
              position: youraddress, 
              map: mymap, 
              title: $('#address').val(),
            });
            //draw circle 1km
            }
            var cityCircle = new google.maps.Circle({
              strokeColor: '#FF0000',
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: '#FF0000',
              fillOpacity: 0.35,
              map: mymap,
              center: youraddress,
              radius: 1000,
            });

            $.each( busstops, function( index, value ){                
              var directionsService = new google.maps.DirectionsService();

              var request = {
                origin      : $('#address').val()+',Đà Nẵng, Việt Nam', // a city, full address
                destination : {lat: Number(value.stop.lat), lng: Number(value.stop.lng)},
                travelMode  : google.maps.DirectionsTravelMode.DRIVING
              };
              directionsService.route(request, function(response, status) {
                var distance = response.routes[0].legs[0].distance.value;
                if (distance< 1000) {
                  var marker = new google.maps.Marker({
                    map: mymap,
                    icon: image_maker,
                    position: {lat: Number(value.stop.lat), lng: Number(value.stop.lng)},
                    title: value.stop.adresss
                  });
                  marker.setMap(mymap);
                };
              });            
            });
          }
        );
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

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