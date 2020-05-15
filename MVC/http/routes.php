<?php
Router::add("home", "mainController", "index");
Router::add("testRegistrar", "registrarTest", "registrar");
Router::add("getTest", "registrarTest", "testGet");

Router::add("registrarUsuario", "UsuarioControl", "registrar");
Router::add("loginUsuario", "UsuarioControl", "obtener_porCorreoContra");

Router::add("index", "mainController", "index");
?>