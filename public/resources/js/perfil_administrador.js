$(document).ready(function(){
    var elementoEliminar;
    var reporteroEliminar;

    var noticiaNombre;
    var noticiaID;

    var usuarioNombre;
    var usuarioID;
    
    var seccionEliminar;
    var seccionNombre ="tst";
    var seccionID ="te";

    var checkContraseña = false
    var checkCorreo = false;
    $("#registro").attr("disabled", true);


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
        noticiaNombre = elementoEliminar.find(".noticiaNombreI").val();
        noticiaID = elementoEliminar.find(".idNoticiaI").val();
        //$(this).closest(".post-outbox").hide(400);
        $("#noticiaNombreII").html(noticiaNombre);
        $("#idNoticia2").val(noticiaID);
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#exampleModal");
        $(this).click();
    });

    $(".eliminar-noticia").click(function(){
        //alert(elementoEliminar.innerHtml());
        var form = $("#notaEliminar");
        elementoEliminar.hide(400);
        form.submit();
    });

    $(".cancelar").click(function(){
        elementoEliminar = null;
    });

    $(".btn-reportero-eliminar").click(function(){
        /* 
            var usuarioNombre;
            var usuarioID;
        */
        reporteroEliminar = $(this).closest(".reportero-card");
        usuarioNombre = reporteroEliminar.find(".firmaUsuario").val();
        usuarioID = reporteroEliminar.find(".idUsuario").val();
        //reporteroEliminar.hide(400);
        $("#idUsuario2").val(usuarioID);
        $("#usuarioNombreII").html(usuarioNombre);
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#reporteroModal");
        $(this).click();

    })

    $(".eliminar-reportero").click(function(){
        //alert(elementoEliminar.innerHtml());
        var form = $("#borrarUsuario");
        reporteroEliminar.hide(400);
        form.submit();
    });

    $(".cancelar-reportero").click(function(){
        reporteroEliminar = null;
    });




    $(".btn-eliminar-seccion").click(function(){
        seccionEliminar = $(this).closest(".secciones-lista");
        seccionNombre = seccionEliminar.find(".seccionNombreI").val();
        seccionID = seccionEliminar.find(".idSeccionI").val();
        $("#seccionNombre").html(seccionNombre)
        $("#eliminarSeccionID").val(seccionID)
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#seccionModal");
        $(this).click();

    })

    $(".eliminar-seccion").click(function(){
        //alert(elementoEliminar.innerHtml());
        var form = $("#seccionEliminada");
        seccionEliminar.hide(400);
        form.submit();
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


    $("#contraseña").keyup(function(e){
        console.log(contra);
        var contra = $("#contraseña").val()
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
        console.log(contra);
        if(reg.test(contra)){
            console.log(reg.test(contra))
            $(".info-registro-contraseña").hide(200);
            $("#contraseña").css("background-color", "#6ae68b");
            checkContraseña = true;
            Registro(checkContraseña, checkCorreo);
        }else{
            $(".info-registro-contraseña").show(200);
            $("#contraseña").css("background-color", "#fa5448");
            checkContraseña = false;
            Registro(checkContraseña, checkCorreo);
        }
    });

    //

    $("#email").keyup(function(e){
        console.log(correo);
        var correo = $("#email").val()
        var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        console.log(correo);
        if(reg.test(correo)){
            console.log(reg.test(correo))
            $(".info-registro-correo").hide(200);
            $("#email").css("background-color", "#6ae68b");
            checkCorreo = true;
            Registro(checkContraseña, checkCorreo);
        }else{
            $(".info-registro-correo").show(200);
            $("#email").css("background-color", "#fa5448");
            checkCorreo = false;
            Registro(checkContraseña, checkCorreo);
        }
    });

    function Registro(v1,v2){
        if(v1 && v2 == true){
            $("#registro").attr("disabled", false);
        }else{
            $("#registro").attr("disabled", true);
        }
    }

});

/*
$.ajax({
    type:'metodo en el que se enviara o se pedira',
    url:'url en donde se enviara o se solicitara algo',
    data: lo que se enviara o solicitara,
    beforeSend:' si quieres hacer algo antes de que se envie , como notificar al usuario',
    succes:' si todo funciono bien , puedes hacer algo',
    error:' por si ocurre un error',
    timeout: cuanto tiempo quieres que tarde en enviarse el ajax  como maximo, si tarda mas de lo que pusiste , inmediatamenet marca error
});
*/