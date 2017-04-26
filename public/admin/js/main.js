function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
        return false;
}
$(document).ready(function(){
    var count1 = $('#item').find('.order_id_1').val();
    var count2 = $('#item2').find('.order_id_2').val();
    console.log(count1);
    $('.add_to_forwardtrip').click(function(){
      count1 = parseInt(count1) + 1;
      var x = $('#item').clone().attr('id', 'row'+count1).appendTo('#foward_trip');
      $('#row'+count1).find('.order_id_1').val(count1);
      $('.delete1').click(function(){
        $(this).closest('tr').remove();
      });
      // $('#lists').append("<tr> <td> item </td> </tr>");
    });
    $('.add_to_backwardtrip').click(function(){
      count2 = parseInt(count2) + 1;
      var x = $('#item2').clone().attr('id', 'row2'+count2).appendTo('#backward_trip');
      $('#row2'+count2).find('.order_id_2').val(count2);

      // $('#lists').append("<tr> <td> item </td> </tr>");
      $('.delete2').click(function(){
        $(this).closest('tr').remove();  
      
      });
    });
    
    
});
