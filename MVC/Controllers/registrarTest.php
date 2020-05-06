<?php
class registrarTest{
    public function registrar(){
        $test = Test::registrarTest("COca1", "Isabel", "Rio", "San Nicolas");
        Response::render("registrarse", ["response"=>"Resultado (Si es uno es que fue exitoso): ".$test, "ejPost"=>$_POST["username"]]);
        //Response::render("registrarse", ["ejPost"=>$_POST["username"]]);
    }
}
?>