@extends('templates.danabus.master')

@section('content') 
  <div id="contact" class="contact">
    <div class="section secondary-section">
      <div class="container">
        <div class="title">
          <h1>Tìm Trạm </h1>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">             
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form action="/search " method="POST" id="login-form"  method="post" role="form" style="display: block;">
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                          <div class="form-group">
                            <label>Nhập địa điểm của </label>
                           <input type="text" name="address" id="address">
                          </div>
                          <div class="form-group">
                            <label>Chọn tuyến muốn đi</label>
                           <select class="form-control" id="route">
                             <option value="">-- Choose --</option>
                             @foreach($routes as $item)
                             <option value="{{$item->id}}">{{$item->name}}</option>
                             @endforeach
                           </select>
                          </div>
                          <div class="form-group">
                            <label>Chọn chiều đi </label>
                           <select class="form-control" id="luotdi">
                             <option value="0">Lượt đi </option>
                             <option value="1">Lượt về </option>
                           </select>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            
                              <div class="col-sm-6 col-sm-offset-3">
                                <a href="#" class="submit">SEARCH</a>
                              </div>
                            
                            </div>
                          </div>  
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>              
        </div>
      </div>
      <div id="contact" class="contact">

          <div class="title">
            <h2 class="map">Bản đồ </h2>
          </div>

        <div id="mymap" style="height: 800px; width: 80%; margin: auto;"></div>   
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function() {
    var image = {
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

$(".submit").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            $route_id: $('#route').val(),
            $status: $('#luotdi').val(),
        }
        var type = 'POST'; //for creating new resource


        $.ajax({

            type: type,
            url: '/search',
            cache: false,
            data: formData,
            success: function (data) {
                console.log(data);
                var busstops = data;
                var frequency = data.frequency;
                console.log(frequency);


                var geocoder = new google.maps.Geocoder(); 
                geocoder.geocode({
                    address : $('#address').val()+',Đà Nẵng, Việt Nam',

                  },
                    function(results, status) {
                      if (status.toLowerCase() == 'ok') {
                      // Get center
                      var coords = new google.maps.LatLng(
                        results[0]['geometry']['location'].lat(),
                        results[0]['geometry']['location'].lng()
                      );
                      mymap.setCenter(coords);
                      mymap.setZoom(14);
                
                      // Set marker also
                      marker = new google.maps.Marker({
                        position: coords, 
                        map: mymap, 
                        title: $('#address').val(),
                      });
                
                      }


                      var cityCircle = new google.maps.Circle({
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35,
                        map: mymap,
                        center: coords,
                        radius: 1000,
                      });

                      $.each( busstops.directions, function( index, value ){
                        console.log(value.stop.lat);

                                        
                      
                      var directionsService = new google.maps.DirectionsService();

                      var request = {
                        origin      : $('#address').val()+',Đà Nẵng, Việt Nam', // a city, full address, landmark etc
                        destination : {lat: Number(value.stop.lat), lng: Number(value.stop.lng)},
                        travelMode  : google.maps.DirectionsTravelMode.DRIVING
                      };

                      directionsService.route(request, function(response, status) {
                        var a = response.routes[0].legs[0].distance.value;
                        console.log(a);
                        if (a< 1000) {
                          var marker = new google.maps.Marker({
                              map: mymap,
                              icon: image,
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

});

  </script>
@stop
