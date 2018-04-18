$(function(){
    var setImg = '#mainImg';
    var fadeSpeed = 500;//フェイドが完了する時間
    var switchDelay = 5000;//画像の切り替えする時間
 
    $(setImg).children('img').css({opacity:'0'});
    $(setImg + ' img:first').stop().animate({opacity:'1',zIndex:'20'},fadeSpeed);
 
    setInterval(function(){
        $(setImg + ' :first-child').animate({opacity:'0'},fadeSpeed).next('img').animate({opacity:'1'},fadeSpeed).end().appendTo(setImg);
    },switchDelay);
});