<?php

class ComentarioControl{

    public function registro(){
        $com = Comentario::registroComentario($_POST["noticia"],$_POST["idUsuario"],$_POST["NuevoComentario"]);
        //$comentarios = Comentario::getComentarios($_POST["noticia"]);
        //$noticia = Noticia::get($_POST["noticia"]);

        header("Location: noticia?id=".$_POST["noticia"], 301);
        //Response::render("noticia",["nota"=>$noticia, "comentarios"=>$comentarios]);
    }

    public function delete(){
        $com =  Comentario::deleteComentario($_POST["idComentario"]);
        header("Location: noticia?id=".$_POST["idNoticia"], 301);
    }
}