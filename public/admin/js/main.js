function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
        return false;
}
$(function () {
    $(".textarea").wysihtml5();
});
$(document).ready(function(){
  $('.btn_add_stop_forward').on('click', function(){
    var $container = $(this).parents('table').find('.stop-container');
    var $template = $('.stop-template-forward').clone().removeClass('stop-template-forward');
    $container.append($template);
    $('.delete_forward_stop').on('click', function(){
      $(this).closest('tr').remove();
    });
  });
  $('.btn_add_stop_backward').on('click', function(){
    var $container = $(this).parents('table').find('.stop-container');
    var $template = $('.stop-template-backward').clone().removeClass('stop-template-backward');
    $container.append($template);
    $('.delete_backward_stop').on('click', function(){
      $(this).closest('tr').remove();
    });
  });
});
