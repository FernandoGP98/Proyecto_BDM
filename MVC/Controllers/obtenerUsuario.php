<?php
require_once("MVC/Models/Conexion.php");
require_once('MVC/Models/Usuario.php');

$con = new conexion();

$us = new usuario();

$usuario = $us->obtenerUsuario();

require_once('perfil.php');

?>