<?php
class mainController{
    public function index(){
        Seccion::getAll();
        $noticias = Noticia::getAll();
        Response::render("home", ["noticias"=>$noticias]);
    }
}
?>