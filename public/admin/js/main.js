function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
        return false;
}

var stop_module = {
  mymap:null,
  marker:null,
  initMap :function(){
    stop_module.mymap = new google.maps.Map(document.getElementById('mymap'), {
      zoom: 14,
      center: {lat: 16.058980, lng: 108.204351},
      mapTypeId: 'terrain'
    }); 
  },
  dragMaker :function(address_latlng){
    if (stop_module.marker) {
      stop_module.marker.setPosition(address_latlng);
    } 
    else {
      stop_module.marker = new google.maps.Marker({
        map: stop_module.mymap,
        position: address_latlng,
        draggable: true
      });
      stop_module.marker.setMap(stop_module.mymap);
    }
    google.maps.event.addListener(stop_module.marker, 'dragend', function(result){
      $('#input-lat').val(result.latLng.lat());
      $('#input-lng').val(result.latLng.lng());
    });
  }
};

$(function () {
  $(".textarea").wysihtml5();
});

$(document).ready(function(){
  $('.btn-add-stop-forward').on('click', function(){
    var $container = $(this).parents('table').find('.stop-container');
    var $template = $('.stop-template-forward').clone().removeClass('stop-template-forward');
    $container.append($template);
  });

  $('.btn-add-stop-backward').on('click', function(){
    var $container = $(this).parents('table').find('.stop-container');
    var $template = $('.stop-template-backward').clone().removeClass('stop-template-backward');
    $container.append($template);
  });

  $(document).on("click",".btn-delete-stop",function() {
    $(this).closest('tr').remove();
  });

  if($('#input-lat') !='' && $('#input-lng') !=''){
    var address_latlng =  new google.maps.LatLng($('#input-lat').val(),$('#input-lng').val());
    stop_module.dragMaker(address_latlng);
  }

  $('#input-address').blur(function() { 
    var address = $('#input-address').val()+',Đà Nẵng, Việt Nam';
    var geocoder = new google.maps.Geocoder(); 
    geocoder.geocode({
      address : address,
    },
      function(data, status) {
        if (status.toLowerCase() == 'ok') {
          var address_latlng = new google.maps.LatLng(
            data[0]['geometry']['location'].lat(),
            data[0]['geometry']['location'].lng()
          );
          $('#input-lat').val(address_latlng.lat());
          $('#input-lng').val(address_latlng.lng());
          stop_module.dragMaker(address_latlng);
        }
      });
  });
});
