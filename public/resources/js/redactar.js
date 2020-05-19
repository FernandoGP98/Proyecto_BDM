$(document).ready(function(){

var imagen = 0;
var clone22;

var valImagen = false;
var valVideo = false;
var valTitulo = false;
var valDescripcion = false;
var valTexto = true;
var valLugar = false;
var valFecha = false;

//$("#terminarNota").removeAttr('hidden');

$("#pTituto").change(function(){
    if($(this).val() != ""){
        valTitulo = true;
        console.log("titulo "+valTitulo);
    }

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});


$("#pDescripcion").change(function(){
    if($(this).val() != ""){
        valDescripcion = true;
        console.log("des "+valDescripcion);
    }

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});


$("#texto_ifr").keyup(function(){
    console.log($(this).val());
    if($(this).val() != ""){
        valTexto = true;
        console.log("texto "+valTexto);
    }
    console.log($(this).val());

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});


$("#pLugar").change(function(){
    if($(this).val() != "null"){
        valLugar = true;
        console.log("lugar "+valLugar);
    }

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});


$("#pFecha").change(function(){
    if($(this).val() != ""){
        valFecha = true;
        console.log("fecha "+valFecha);
    }

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});


$("#multimedia").change(function() {
    console.log("entro");
    imagen = imagen + 1;
    clone22 = $(this).clone();
    readURL(this, imagen);
    valImagen = true;

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});

$("#multimedia-v").change(function(){
    var value = '     <i class="fas fa-check-circle"></i>'
    $("#video_input").append(value);
    valVideo = true;

    validar(valImagen, valVideo,valTitulo, valDescripcion, valTexto, valLugar, valFecha);
});

function sliderInit(){
    $('.img-carousel').slick({
        slidesToShow: 1,
        dots: true,
        centerMode: true,
    });
};

function readURL(input, intento) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {

            if(intento == 1){
                $("#primera").attr("src",e.target.result)
            }else{
                var elemento = '<div><img class="img-slide" width="100%" height="512px" src="'+e.target.result+'" alt="First slide"></div>'
                
                //$("#nueva-imagen").attr("src", e.target.result);
                $(".img-carousel").append(elemento);
                $('.img-carousel').slick("unslick");
                sliderInit();
            }
            
        }

        /* Add input Hidden para subir al server */
        clone22.removeClass("input-multimedia");
        clone22.removeAttr("id");
        clone22.attr("name","imagenes[]");

        $("#contador").html(intento);
        $("#imagenes-input").append(clone22);
        reader.readAsDataURL(input.files[0]);        
    }
}

$("#terminarNota").click(function(){
    $("#estatusNota").val("2");
    var form = $("#formNota");
    form.submit();
});

$("#guardarNota").click(function(){
    $("#estatusNota").val("1");
    var form = $("#formNota");
    form.submit();
});

function validar(imagen, video, titulo, descripcion, texto, lugar, fecha){

    if(imagen == true && video == true && titulo == true && descripcion == true 
        && texto == true && lugar == true && fecha == true){
        $("#terminarNota").removeAttr('hidden');
        $("#guardarNota").removeAttr('hidden');
    }else{
        $("#terminarNota").attr("hidden", true);
        $("#guardarNota").attr("hidden", true);
    }

    return false;
}
/**
 * 
var valImagen = false;
var valVideo = false;
var valTitulo = false;
var valDescripcion = false;
var valTexto = false;
var valLugar = false;
var valFecha = false;
 */
});