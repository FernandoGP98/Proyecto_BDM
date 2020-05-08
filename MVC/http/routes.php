<?php
Router::add("home", "mainController", "index");
Router::add("testRegistrar", "registrarTest", "registrar");
Router::add("registrarUsuario", "UsuarioControl", "registrar");
Router::add("index", "mainController", "index");
?>