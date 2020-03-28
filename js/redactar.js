var imagen = 0;
$("#img_input").click(function(){
     // Carga de Imagen
     $("#multimedia").change(function() {
         imagen++;
        readURL(this, imagen);
    });
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
                var elemento = '<div><img cclass="img-slide" width="100%" height="512px" src="'+e.target.result+'" alt="First slide"></div>'
                
            //$("#nueva-imagen").attr("src", e.target.result);
            $(".img-carousel").append(elemento);
            $('.img-carousel').slick("unslick");
            sliderInit();
            }
            
        }

        reader.readAsDataURL(input.files[0]);
    }
}
