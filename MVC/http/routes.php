<?php
Router::add("home", "mainController", "index");
Router::add("testRegistrar", "registrarTest", "registrar");
Router::add("getTest", "registrarTest", "testGet");

Router::add("index", "mainController", "index");

//Comentarios
Router::add("comentario","ComentarioControl","registro");

//Noticias
Router::add("redactar","NoticiaControl","index");
Router::add("noticiaRegistro","NoticiaControl","registrarNoticia");
Router::add("noticiaEditar","NoticiaControl","obtenerNoticia");
Router::add("noticiasTodas","NoticiaControl","todasNotas");
Router::add("noticia","NoticiaControl","verNoticia");
Router::add("borrarNota","NoticiaControl","deleteNoticia");
Router::add("borrarNotaAdmin","NoticiaControl","deleteNoticiaAdmin");
Router::add("publicar","NoticiaControl","publicar");
Router::add("guardar","NoticiaControl","updateNoticia");

//Busquda
Router::add("busqueda","NoticiaControl","buscar");
Router::add("buscar","NoticiaControl","busquedaOpcion");

//Usuario
Router::add("loginUsuario", "UsuarioControl", "obtener_porCorreoContra");
Router::add("perfil_administrador","UsuarioControl","administrador");
Router::add("logout","UsuarioControl","logout");
Router::add("login","UsuarioControl","login");
Router::add("registrarse","UsuarioControl","registrarse");
Router::add("registroByAdmin","UsuarioControl","registroByAdmin");
Router::add("borrarUsuario","UsuarioControl","borrarUsuario");
Router::add("registrarUsuario", "UsuarioControl", "registrar");


//Secciones
Router::add("editarSeccion", "SeccionControl","editarSeccion");
Router::add("crearSeccion", "SeccionControl","registarSeccion");
Router::add("eliminarSeccion", "SeccionControl","eliminarSeccion");
Router::add("seccion", "SeccionControl","seccion");



//TEST  test_imagen
Router::add("test_imagen", "testController","imagen");
Router::add("test", "testController","test");


?>