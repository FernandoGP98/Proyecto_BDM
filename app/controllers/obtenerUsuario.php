<?php
require_once("app/Models/Conexion.php");
require_once('app/Models/Usuario.php');

$con = new conexion();

$us = new usuario();

$usuario = $us->obtenerUsuario();

require_once('perfil.php');

?>