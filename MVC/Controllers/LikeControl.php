<?php

class LikeControl{

    public function registroLike(){
        $like = Like::registro($_POST["noticia"], $_POST["usuario"]);
    }

    public function deleteLike(){
        $like = Like::delete($_POST["idLike"]);
    }
}