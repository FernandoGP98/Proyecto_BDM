<?php

class NoticiaControl{

    public function index(){
        Response::render("redactar");
    }

    public function registrarNoticia(){
        //echo $_POST["texto"];

        
        $noticia = NoticiaConsulta::registro($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        null , $_POST["estatus"], $_POST["autor"]);

        Response::render("editarNoticia", ["noticia"=>$noticia]);
    }

    public function updateNoticia(){

    }

    public function deleteNoticia(){

    }

    public function obtenerNoticia(){
        //$noticia = new Noticia();
        $noticia = NoticiaConsulta::get($_GET["id"]);
        Response::render("editarNoticia",["nota"=>$noticia]);

        //$noticia = Noticia::get($_GET["id"]);
        //echo $noticia;
        
        //Response::render("editarNoticia", ["noticia"=>$noticia]);
    }
}