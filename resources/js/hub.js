require('./bootstrap');

$('.full-height').css('height', $(window).outerHeight());

$(window).on('resize', function(){
  $('.full-height').css('height', $(window).outerHeight());
});