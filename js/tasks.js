$(function () {
    var minheight = $(window).height() - $('.top').height() - $('.header').height() - 2 * $('.footer').height() - 20; 
    $('.main').css('minHeight', minheight);
    var maxheight = Math.max($('.main-left').height() + 12, $('.main-right').height() + 12, minheight);
    $('.main-left').css('height', maxheight);
    $('.main-right').css('height', maxheight);
});
