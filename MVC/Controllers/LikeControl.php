<?php
class LikeControl{

    public function moverLike(){
        $like = Like::registro($_POST["opcion"],$_POST["noticia"], $_POST["usuario"]);

        header("Location: noticia?id=".$_POST["noticia"], 301);
    }

    public function deleteLike(){
        
    }
}