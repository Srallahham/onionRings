$(function(){
  // get the click event.
  $('#modalButton').click(function(){
    $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });
});
