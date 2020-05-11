$(document).ready(function(){
    var EliminarElemento;
    var imagen;

    $(".btn-eliminar").click(function(){
        EliminarElemento = $(this).closest(".post-outbox");
        $(this).attr("data-toggle","modal");
        $(this).attr("data-target","#exampleModal");
        $(this).click();
    });

    $(".eliminar-noticia").click(function(){
        //alert(elementoEliminar.innerHtml());
        EliminarElemento.hide(400);
    });

    $(".cancelar").click(function(){
        EliminarElemento = null;
    });

    $("#telefono").keypress(function(e){
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
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



});