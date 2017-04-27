function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
        return false;
}
$(document).ready(function(){
    var count_forwardtrip = $('#item_forwardtrip').find('.order_forwardtrip').val();
    var count_backwardtrip = $('#item_backwardtrip').find('.order_backwardtrip').val();
    
    $('.add_to_forwardtrip').click(function(){
      count_forwardtrip = parseInt(count_forwardtrip) + 1;
      var add = $('#item_forwardtrip').clone().attr('id', 'row_forwardtrip'+count_forwardtrip).appendTo('#foward_trip');
      $('#row_forwardtrip'+count_forwardtrip).find('.order_forwardtrip').val(count_forwardtrip);
      var forwardtrip_id = $('.forwardtrip_id');
      $(forwardtrip_id[forwardtrip_id.length-1]).attr('value', 'null');
      $('.delete_forwardtrip').click(function(){
        $(this).closest('tr').remove();
      });
      
    });
    $('.add_to_backwardtrip').click(function(){
      count_backwardtrip = parseInt(count_backwardtrip) + 1;
      var add = $('#item_backwardtrip').clone().attr('id', 'row_backwardtrip'+count_backwardtrip).appendTo('#backward_trip');
      $('#row_backwardtrip'+count_backwardtrip).find('.order_backwardtrip').val(count_backwardtrip);
      var backwardtrip_id = $('.forwardtrip_id');
      $(backwardtrip_id[backwardtrip_id.length-1]).attr('value', 'null');
      $('.delete_backwardtrip').click(function(){
        $(this).closest('tr').remove();
      });
    });
    

});
