var imagen = 0;
var clone22;

$("#multimedia").change(function() {
    imagen = imagen + 1;
    clone22 = $(this).clone();
    readURL(this, imagen);
});

$("#multimedia-v").change(function(){
    var value = '     <i class="fas fa-check-circle"></i>'
    $("#video_input").append(value);
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
