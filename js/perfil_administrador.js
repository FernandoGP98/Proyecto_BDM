$(document).ready(function(){
    $(".noticias-redaccion").show();
    $(".secciones-administrador").hide();
    $(".usuarios-administrador").hide();

    $(".selec-color").hide();

    $("#admin-redaccion").click(function(){
        $(".noticias-redaccion").show(400);
        $(".secciones-administrador").hide(400);
        $(".usuarios-administrador").hide(400);
    });

    $("#admin-secciones").click(function(){
        $(".noticias-redaccion").hide(400);
        $(".secciones-administrador").show(400);
        $(".usuarios-administrador").hide(400);
    });

    $("#admin-usuarios").click(function(){
        $(".noticias-redaccion").hide(400);
        $(".secciones-administrador").hide(400);
        $(".usuarios-administrador").show(400);
    });


    $(".boton-modificar").click(function(){
        $(this).hide();
        $(this).siblings().show();
    });

    $(".btn-guardar").click(function(){
        $(this).parent().hide()
        $(this).parent().siblings().show()
    });


});