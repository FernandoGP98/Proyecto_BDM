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
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if((isset($_FILES['miArchivo'])) && ($_FILES['miArchivo'] !='')){
            $file = $_FILES['miArchivo']; //Asignamos el contenido del parametro a una variable para su mejor manejo
            
            $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
            $fileName = $file['name']; //Obtenemos el nombre del archivo
            $fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensiÃ³n del archivo.
            
            //Comenzamos a extraer la informaciÃ³n del archivo
            $fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
            $contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
            //Una vez leido el archivo se obtiene un string con caracteres especiales.
            $contenido = addslashes($contenido);//se escapan los caracteres especiales
            fclose($fp);//Cerramos el archivo

            $a = Imagen::registro($contenido);
        }
    

    }

    public function test(){
        $imagenes = Imagen::get(1);
        echo '<img src="data:image/jpeg;base64,'.base64_encode($imagenes) .' "/>';
        echo $imagenes->imagen;
        Response::render("test",["imagenes"=>$imagenes]);
    }
}
?>