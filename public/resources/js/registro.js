$(document).ready(function(){

    var checkContraseña = false
    var checkCorreo = false;

    $("#registro").attr("disabled", true);

    $("#Tel").keypress(function(e){
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
            Registro(checkContraseña, checkCorreo);
        }else{
            $(".info-registro").show(200);
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
            $(".info-registro").hide(200);
            $("#email").css("background-color", "#6ae68b");
            checkCorreo = true;
            Registro(checkContraseña, checkCorreo);
        }else{
            $(".info-registro").show(200);
            $("#email").css("background-color", "#fa5448");
            checkCorreo = false;
            Registro(checkContraseña, checkCorreo);
        }
    });

    function Registro(v1, v2){
        if(v1 && v2 == true){
            $("#registro").attr("disabled", false);
        }else{
            $("#registro").attr("disabled", true);
        }
    }


});