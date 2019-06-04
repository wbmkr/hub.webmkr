require('./bootstrap');

$('.full-height').css('height', $(window).outerHeight());
$('.main-height').css('height', $(window).outerHeight() - $('.header').outerHeight());

$(window).on('resize', function(){
  $('.full-height').css('height', $(window).outerHeight());
  $('.main-height').css('height', $(window).outerHeight() - $('.header').outerHeight());
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})