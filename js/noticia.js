$(document).ready(function(){

    $("img.like").hover(function(){
        var like = $(this).attr("like");

        if(like == 1){
            $(this).attr("src","image/like_red.png");
        }else if(like == 0){
            $(this).attr("src","image/like_blue.png");
        }
    });

    $("img.like").mouseleave(function(){
        var like = $(this).attr("like");

        if(like == 1){
            $(this).attr("src","image/like_blue.png");
        }else if(like == 0){
            $(this).attr("src","image/like_gray.png");
        }
    });


    

});