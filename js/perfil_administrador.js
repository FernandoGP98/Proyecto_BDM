$(document).ready(function(){
    var elementoEliminar;
    var reporteroEliminar;
    var seccionEliminar;

    $(".noticias-redaccion").show();
    $(".secciones-administrador").hide();
    $(".usuarios-administrador").hide();
    $(".usuarios-administrador-eliminar").hide();

    $(".selec-color").hide();

    $("#admin-redaccion").click(function(){
        $(".noticias-redaccion").show(400);
        $(".secciones-administrador").hide(400);
        $(".usuarios-administrador").hide(400);
        $(".usuarios-administrador-eliminar").hide(400);
    });

    $("#admin-secciones").click(function(){
        $(".noticias-redaccion").hide(400);
        $(".secciones-administrador").show(400);
        $(".usuarios-administrador").hide(400);
        $(".usuarios-administrador-eliminar").hide(400);
    });

    $("#admin-usuarios").click(function(){
        $(".noticias-redaccion").hide(400);
        $(".secciones-administrador").hide(400);
        $(".usuarios-administrador").show(400);
        $(".usuarios-administrador-eliminar").hide(400);
    });

    $("#admin-usuarios-eliminar").click(function(){
        $(".noticias-redaccion").hide(400);
        $(".secciones-administrador").hide(400);
        $(".usuarios-administrador").hide(400);
        $(".usuarios-administrador-eliminar").show(400);
    });


    $(".boton-modificar").click(function(){
        $(this).hide();
        $(this).siblings().show();
    });

    $(".btn-guardar").click(function(){
        var color = $(this).parent().find(".jscolor").val();

        $(this).parent().hide()
        $(this).parent().siblings().show()
        $(this).closest(".secciones-lista").find(".color-muestra-final").css({"background-color": "#"+color});
    });

    $(".btn-eliminar").click(function(){
        
        elementoEliminar = $(this).closest(".post-outbox");
        //$(this).closest(".post-outbox").hide(400);
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#exampleModal");
        $(this).click();
    });

    $(".eliminar-noticia").click(function(){
        //alert(elementoEliminar.innerHtml());
        elementoEliminar.hide(400);
    });

    $(".cancelar").click(function(){
        elementoEliminar = null;
    });

    $(".btn-reportero-eliminar").click(function(){
        reporteroEliminar = $(this).closest(".reportero-card");
        //reporteroEliminar.hide(400);
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#reporteroModal");
        $(this).click();

    })

    $(".eliminar-reportero").click(function(){
        //alert(elementoEliminar.innerHtml());
        reporteroEliminar.hide(400);
    });

    $(".cancelar-reportero").click(function(){
        reporteroEliminar = null;
    });




    $(".btn-eliminar-seccion").click(function(){
        seccionEliminar = $(this).closest(".secciones-lista");
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#seccionModal");
        $(this).click();

    })

    $(".eliminar-seccion").click(function(){
        //alert(elementoEliminar.innerHtml());
        seccionEliminar.hide(400);
    });

    $(".cancelar-seccion").click(function(){
        seccionEliminar = null;
    });



    $(".crear-seccion").click(function(){
        var nombre = $("#nuevaSeccion").val();
        var color = $("#nuevoColor").val();

        var nuevoElemento = '<div class="row secciones-lista"><div class="col">Orden # </div> <div class="col text-center">'+nombre+'</div><div class="col text-center muestra-color"><div class="color-muestra-final" style="background-color:#'+color+'"></div></div><div class="col"><div class="boton-modificar" id="modificar-color"><button class="btn btn-outline-warning">Modificar Color</button></div><div class="selec-color"><label for="">Seleccionar Color:</label><input class="jscolor" value="ab2567"><br><button class="btn btn-outline-success btn-guardar">Guardar</button></div></div><div class="col"><button class="btn btn-outline-danger btn-eliminar-seccion">Eliminar</button></div></div>'

        //$("#contender-secciones").append(nuevoElemento);
    });

});