<?php
class mainController{
    public function index(){
        Seccion::getAll();
        Response::render("home");
    }
}
?>