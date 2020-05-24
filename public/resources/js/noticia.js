$(document).ready(function(){

    var comentarioEliminar;

    $("img.like").hover(function(){
        var like = $(this).attr("like");

        if(like == 1){
            $(this).attr("src","resources/image/like_red.png");
        }else if(like == 0){
            $(this).attr("src","resources/image/like_blue.png");
        }
    });

    $("img.like").mouseleave(function(){
        var like = $(this).attr("like");

        if(like == 1){
            $(this).attr("src","resources/image/like_blue.png");
        }else if(like == 0){
            $(this).attr("src","resources/image/like_gray.png");
        }
    });


    $(".btn-eliminar-comentario").click(function(){
        comentarioEliminar = $(this).closest(".comentarios");
        comentarioEliminar.hide(400);

    })

    $(".like").click(function(){
        var form = $("#formLike");
        form.submit();
    });

});