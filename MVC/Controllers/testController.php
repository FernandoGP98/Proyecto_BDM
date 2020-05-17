<?php
class testController{
    
    public function registro(){
        $a = $_GET["test"];
        echo "metodo para obtener el registro $a";
    }

    public function obtener($id){
        echo "obtner $id";
    }
}
?>