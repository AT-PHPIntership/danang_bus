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
});
