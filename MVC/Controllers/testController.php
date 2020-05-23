<?php
class testController{
    
    public function registro(){
        $a = $_GET["test"];
        echo "metodo para obtener el registro $a";
    }

    public function obtener($id){
        echo "obtner $id";
    }

    public function imagen(){
        $count = count($_FILES['myFile']["name"]);

        for ($i=0; $i < $count; $i++) { 
            if(!empty($_FILES["myFile"]["name"][$i])){
                $name = $_FILES["myFile"]["name"][$i];
                $type = $_FILES["myFile"]["type"][$i];
                $data = file_get_contents($_FILES["myFile"]["tmp_name"][$i]);
                $data2 = addslashes($data);
                
                $insert = Imagen::registro($data2);
                $data = null;
                $data2 = null;
            }
        }

        if(!empty($_FILES["video"]["name"])){
            
            $nuevoNombre = uniqid() .".mp4";
            $rutaDeGuardado = "public/resources/video". "/" . $nuevoNombre;
            $rutaFinal = "resources/video". "/" . $nuevoNombre;
            move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);

            $inserVideo = Video::registro($rutaFinal);
        }

        header("Location: test", 301);

    }

    public function test(){
        $imagenes = Imagen::getAll();
        //echo '<img src="data:image/jpeg;base64,'.base64_encode($imagenes->imagen) .' "/>';
        $videos = Video::getAll();
        $id = PalabraClave::getLast();
        echo $id->id;
        Response::render("test",["imagenes"=>$imagenes, "videos"=>$videos]);
    }
}
?>