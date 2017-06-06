function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
        return false;
}
var mymap;
var marker;
var stop_namespace = {
  initMap :function(){
    mymap = new google.maps.Map(document.getElementById('mymap'), {
      zoom: 14,
      center: {lat: 16.058980, lng: 108.204351},
      mapTypeId: 'terrain'
    }); 
  },
  dragMaker :function(address_latlng){
    if (marker) {
      marker.setPosition(address_latlng);
    } 
    else {
      marker = new google.maps.Marker({
        map: mymap,
        position: address_latlng,
        draggable: true
      });
      marker.setMap(mymap);
    }
    google.maps.event.addListener(marker, 'dragend', function(result){
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
    stop_namespace.dragMaker(address_latlng);
  }

  $('#input-address').blur(function() { 
    var address = $('#input-address').val()+',Đà Nẵng, Việt Nam';
    $.getJSON( {
      url  : 'https://maps.googleapis.com/maps/api/geocode/json',
      data : {
        sensor  : false,
        address : address
      },
      success : function(data) {
        var address_latlng = data.results[0].geometry.location;
        $('#input-lat').val(address_latlng.lat);
        $('#input-lng').val(address_latlng.lng);
        stop_namespace.dragMaker(address_latlng);
      }
    });
  });
});
