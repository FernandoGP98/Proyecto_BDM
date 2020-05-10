<?php

namespace app\Controllers;

use app\Models\User;
use \Controller;
use \Response;

class HomeController extends Controller{
    public function actionIndex(){
        Response::render("home", ["Titulo"=>"Last Report"]);
    }

    public function actionTest($id){
        $user = User::find($id);
        Response::render("test", ["test"=>$user]);
    }
}
?>