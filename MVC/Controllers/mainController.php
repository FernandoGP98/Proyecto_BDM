<?php
class mainController{
    public function index(){
        Response::render("home", ["Titulo"=>"Last Report"]);
    }
}
?>