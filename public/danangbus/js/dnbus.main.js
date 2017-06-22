$(document).ready(function() {

  DNBus.ShowLocation.showYourLocation();

  $('#input-starting-point').blur(function() {   
    var data;
    var starting_point = $('#input-starting-point').val()+',Đà Nẵng, Việt Nam';
    DNBus.SearchModule.showAddress(starting_point,function(starting_point_latlng){
      data = {
        lat: starting_point_latlng.lat,
        lng: starting_point_latlng.lng,
      }
      DNBus.SearchModule.getBusstopsOfRoute(data, function() {
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
      DNBus.SearchModule.getBusstopsOfRoute(data, function(callback, routes) {
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

var DNBus = {};

var colors= ['aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 
'lime', 'maroon', 'navy', 'olive', 'orange', 'purple', 'red', 
'silver', 'teal', 'white', 'yellow'];

var mymap = new google.maps.Map(document.getElementById('mymap'), {
  zoom: 14,
  center: {lat: 16.058980, lng: 108.204351},
  mapTypeId: 'terrain'
}); 