$(document).ready(function(){
     // Carga de Imagen
     var imagen = 0;
     $("#img_input").change(function() {
         imagen++;
        readURL(this, imagen);
    });


    function readURL(input, intento) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                if(intento == 1){
                    $("#primera").attr("src",e.target.result)
                }else{
                    var elemento = '<div class="carousel-item"><img class="d-block w-100" src="'+e.target.result+'" alt="First slide"></div>'


                //$("#nueva-imagen").attr("src", e.target.result);
                $("#nueva-imagen").append(elemento);
                }
                
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    
    
});