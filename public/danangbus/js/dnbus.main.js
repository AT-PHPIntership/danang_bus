$(document).ready(function() {

  navigator.geolocation.getCurrentPosition(function(position) {
    var your_location = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    var infowindow = new google.maps.InfoWindow();
    infowindow.setPosition(your_location);
    infowindow.setContent('Your location');
    infowindow.open(mymap);
    DNBus.SearchModule.drawCircle(your_location);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    data = {
      lat: your_location.lat,
      lng: your_location.lng,
    }
    $.ajax({
      type: "POST",
      url: '/search',
      data: data,
      success: function(data) {
        $.each( data, function( index, busstop ){
          var marker = new google.maps.Marker({
            map: mymap,
            position: {lat: Number(busstop.lat), lng: Number(busstop.lng)},
            title: busstop.adresss
          });
          marker.setMap(mymap);
          marker.addListener('click', function(name) { 
            var list_route_name=$('<ul></ul>'); 
            for (var i = 0; i < busstop.direction.length; i++) {
              list_route_name.append('<li>'+busstop.direction[i].routes.name+ '</li>');
            }
            var infowindow = new google.maps.InfoWindow({
              content: list_route_name.html(),
            });
            infowindow.open(mymap, marker);
          });
        });
      },
    });
  }, function() {

  });

  $('#input-starting-point').blur(function() {   
    var data;
    var starting_point = $('#input-starting-point').val()+',Đà Nẵng, Việt Nam';
    DNBus.SearchModule.showAddress(starting_point,function(starting_point_latlng){
      data = {
        lat: starting_point_latlng.lat,
        lng: starting_point_latlng.lng,
      }
      DNBus.SearchModule.ajaxFunction(data, function() {
        //TODO
      });
    }); 
  });

  $('#input-destination').blur(function() { 
    var data;
    var destination = $('#input-destination').val()+',Đà Nẵng, Việt Nam';
    DNBus.SearchModule.showAddress(destination,function(destination_latlng){
      data = {
        lat: destination_latlng.lat,
        lng: destination_latlng.lng,
      }
      DNBus.SearchModule.ajaxFunction(data, function(callback, routes) {
        if (callback) {
          for (var i = 0; i <= routes.length; i++) {
            if(routes[i] != undefined) {
              DNBus.SearchModule.drawPolyline(routes[i],colors[i]);
            }
          }
        }
      });
    }); 
  });

  if(typeof(routeJSONStr) != "undefined" && routeJSONStr !== null){
    DNBus.RoutesModule.showBusStopOnMap();
  }
});

var colors= ['aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 
'lime', 'maroon', 'navy', 'olive', 'orange', 'purple', 'red', 
'silver', 'teal', 'white', 'yellow'];

var mymap = new google.maps.Map(document.getElementById('mymap'), {
  zoom: 14,
  center: {lat: 16.058980, lng: 108.204351},
  mapTypeId: 'terrain'
}); 