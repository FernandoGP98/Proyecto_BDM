$(document).ready(function(){
    $(".rango-fechas").hide();


    $("#custom-busqueda").change(function(){
        var busqueda = $(this).val();

        if(busqueda == 2){
            $(".rango-fechas").show(200);
        }else{
            $(".rango-fechas").hide(200);
        }
    })
});