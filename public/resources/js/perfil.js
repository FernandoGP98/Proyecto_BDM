$(document).ready(function(){
    var EliminarElemento;
    var imagen;
    var noticiaNombre;
    var noticiaID;

    var reporteroEliminar;
    var usuarioNombre;
    var usuarioID

    $(".info-registro").hide(200);

    $(".btn-eliminar").click(function(){
        EliminarElemento = $(this).closest(".post-outbox");
        noticiaNombre = EliminarElemento.find(".noticiaNombreI").val();
        noticiaID = EliminarElemento.find(".idNoticiaI").val();
        $("#seccionNombreII").html(noticiaNombre)
        $("#eliminarNoticiaIDII").val(noticiaID)
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#exampleModal");
        $(this).click();
    });

    $(".eliminar-noticia").click(function(){
        //alert(elementoEliminar.innerHtml());
        var form = $("#notaEliminada");
        EliminarElemento.hide(400);
        form.submit();
    });

    $(".cancelar").click(function(){
        EliminarElemento = null;
    });

    $("#telefono").keypress(function(e){
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
    }
    });

    $("#direccion").keypress(function(e){
        //$("#test").html(e.keyCode);
        var key = e.charCode || e.keyCode || 0;            
            return (
                key == 8 || 
                key == 9 ||
                key == 32 || 
                key == 35 || 
                key == 46 ||
                key == 209 ||
                key == 241 ||
                (key >= 65 && key <= 90) ||
                (key >= 97 && key <= 122));
    });

    $("#avatar").change(function() {
        imagen = $(this).clone();
        readURL(this, imagen);
    });

    function readURL(input, intento) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                $("#avatarImg").attr("src",e.target.result)
            }
    
            /* Add input Hidden para subir al server */
            // clone22.removeClass("input-multimedia");
            // clone22.removeAttr("id");
            // clone22.attr("name","imagenes[]");
    
            // $("#contador").html(intento);
            // $("#imagenes-input").append(clone22);
            reader.readAsDataURL(input.files[0]);        
        }
    }

    $("#contraseña").keyup(function(e){
        console.log(contra);
        var contra = $("#contraseña").val()
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
        console.log(contra);
        if(reg.test(contra)){
            console.log(reg.test(contra))
            $(".info-registro").hide(200);
            $("#contraseña").css("background-color", "#6ae68b");
            checkContraseña = true;
            //Registro(checkContraseña, checkCorreo);
            $("#guardarUsuario").attr("hidden",false);
            
        }else{
            $(".info-registro").show(200);
            $("#contraseña").css("background-color", "#fa5448");
            checkContraseña = false;
            //Registro(checkContraseña, checkCorreo);
            $("#guardarUsuario").attr("hidden",true);
        }
    });

});