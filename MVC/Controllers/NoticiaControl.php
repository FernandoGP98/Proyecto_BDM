<?php

class NoticiaControl{

    public function index(){
        Response::render("redactar");
    }

    public function registrarNoticia(){
        //echo $_POST["texto"];

        
        $noticia = Noticia::registro($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        null , $_POST["estatus"], $_POST["autor"]);

        Response::render("redactar");
    }

    public function updateNoticia(){

    }

    public function deleteNoticia(){

    }

    public function obtenerNoticia(){
        //$noticia = new Noticia();
        $noticia = Noticia::get($_GET["id"]);
        Response::render("editarNoticia",["nota"=>$noticia]);
    }

    public function todasNotas(){
        $notas = Noticia::getAll();
        Response::render("test", ["notas"=>$notas]);
    }
}