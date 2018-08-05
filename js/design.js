$(function () {
    var minheight = $(window).height() - $('.top').height() - $('.header').height() - 2 * $('.footer').height() - 20; 
    $('.main').css('minHeight', minheight);
});
