<?php

class ComentarioControl{

    public function registro(){
        $com = Comentario::registroComentario($_POST["noticia"],$_POST["usuario"],$_POST["comentario"]);
        $comentarios = Comentario::getComentario($_POST["noticia"]);
        //Response::render("login", ["var"=>$us]);
    }

    public function delete(){
        $com =  Comentario::deleteComentario($_POST["comentario_id"]);
        
    }
}