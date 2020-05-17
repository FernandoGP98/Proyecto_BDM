<?php
chdir(dirname(__DIR__));

define("SYS_PATH", "Libs/");
define("APP_PATH", "MVC/");

require SYS_PATH."Router.php";
require APP_PATH."http/routes.php";
require SYS_PATH."Response.php";
require APP_PATH."Models/Conexion.php";
require APP_PATH."Models/test.php";
require APP_PATH."Models/Usuario.php";
require APP_PATH."Models/Comentario.php";
require APP_PATH."Models/Imagen.php";
require APP_PATH."Models/Like.php";
require APP_PATH."Models/Noticia.php";
require APP_PATH."Models/PalabraClave.php";
require APP_PATH."Models/Seccion.php";
require APP_PATH."Models/Video.php";

$url = $_GET["url"];

try{

    $action=Router::getAction($url);
    $controllerName=$action["controller"];
    $method=$action["method"];

    require APP_PATH."Controllers/".$controllerName.".php";
    $controller = new $controllerName();
    $controller->$method();

}catch(Exception $e){
    echo $e->getMessage();
}