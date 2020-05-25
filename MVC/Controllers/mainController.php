<?php
class mainController{
    public function index(){
        Seccion::getAll();

        $noticias = [];
        if($_SESSION['secciones']!=NULL){
            for ($i=0; $i < count($_SESSION['secciones']); $i++) { 
                $seccion = $_SESSION['secciones'][$i]['id'];
                $notas = Noticia::homeNoticias($seccion);
                
                if(count($notas) > 0){
                    foreach ($notas as $item) {
                        $test = new Noticia();
                        $test = $item;
                        if($item != null){
                            array_push($noticias, $test);    
                        }
                    }
                }
            }
        }
        $firmas = Usuario::getAll();
        $portada = Noticia::portada();

        //$noticias = Noticia::getAll();
        Response::render("home", ["noticias"=>$noticias, "portada"=>$portada, "firmas"=>$firmas]);
    }
}
?>