$(function() {
    $('#item_list .item_1').css("display", "none");
    $('#item_list .item_2').css("display", "none");
    $('#item_list .item_3').css("display", "none");
    $('#item_list .item_4').css("display", "none");
    
    $('nav .item_1 p').click(function(){
        $('#item_list .item_2').css("display", "none");
        $('#item_list .item_3').css("display", "none");
        $('#item_list .item_4').css("display", "none");
        if($('#item_list #img_info').css('display') == 'block'){
            $('#item_list #img_info').fadeOut('fast');
        }
        $('#item_list .item_1').toggle('slow');
    });

    $('nav .item_2 p').click(function(){
        $('#item_list .item_1').css("display", "none");
        $('#item_list .item_3').css("display", "none");
        $('#item_list .item_4').css("display", "none");
        if($('#item_list #img_info').css('display') == 'block'){
            $('#item_list #img_info').fadeOut('fast');
        }
        $('#item_list .item_2').toggle('slow');
    });

    $('nav .item_3 p').click(function(){
        $('#item_list .item_1').css("display", "none");
        $('#item_list .item_2').css("display", "none");
        $('#item_list .item_4').css("display", "none");
        if($('#item_list #img_info').css('display') == 'block'){
            $('#item_list #img_info').fadeOut('fast');
        }
        $('#item_list .item_3').toggle('slow');
    });

    $('nav .item_4 p').click(function(){
        $('#item_list .item_1').css("display", "none");
        $('#item_list .item_2').css("display", "none");
        $('#item_list .item_3').css("display", "none");
        if($('#item_list #img_info').css('display') == 'block'){
            $('#item_list #img_info').fadeOut('fast');
        }
        $('#item_list .item_4').toggle('slow');
    });
});