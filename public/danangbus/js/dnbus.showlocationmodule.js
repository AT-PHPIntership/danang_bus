DNBus.ShowLocation = {
  /**
  * Get your location by Geolocation and show it on map
  */
  showYourLocation: function(){
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
          $.each( data, function(index, busstop ){
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
  },
};