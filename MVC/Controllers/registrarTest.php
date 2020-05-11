<?php
class registrarTest{
    public function registrar(){
        $test = Test::registrarTest($_POST["email"], $_POST["password"], "Rio", "San Nicolas");
        Response::render("registrarse", ["response"=>"Resultado (Si es uno es que fue exitoso): ".$test]);
        //Response::render("registrarse", ["ejPost"=>$_POST["username"]]);
    }

    public function testGet(){
        $test = Test::getTest(1);
        Response::render("registrarse", ["response"=> $test]);
    }
}
?>