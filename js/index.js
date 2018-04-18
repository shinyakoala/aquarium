/* kuhakuクラスのバナーを非表示からある程度スクロールしたらひ表示させる */
$(function() {
    var bana = $('.kuhaku img');
    bana.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if($(this).scrollTop() > 800) {
        //ボタンの表示方法
            bana.fadeIn("slow");
        }else{
        //ボタンの非表示方法
            bana.fadeOut("slow");
        }
    });
});