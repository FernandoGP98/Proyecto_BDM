<?php
class mainController{
    public function index(){
        $secciones = Seccion::getAll();
        Response::render("home", ["secciones"=>$secciones]);
    }
}
?>