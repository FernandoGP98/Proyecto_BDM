use bdm_01;

create table if not exists Imagen(
	id_Imagen int unsigned auto_increment not null,
    imagen blob,
    primary key (id_Imagen)
);

create table if not exists Video(
	id_Video int unsigned auto_increment not null,
    direccion varchar(255),
    primary key (id_Video)
);

create table if not exists Seccion(
	id_Seccion int unsigned auto_increment not null,
    seccion_nombre varchar(30),
    orden int,
    activa bit,
    primary key (id_Seccion)
);

create table if not exists TipoUsuario(
	id_TipoUsuario int unsigned auto_increment not null,
    TipoUsuario varchar(30),
    primary key (id_TipoUsuario)
);

create table if not exists PalabraClave(
	id_PalabraClave int unsigned auto_increment not null,
    PalabraClave varchar(20),
    primary key (id_PalabraClave)
);

create table if not exists Estatus_Noticia(
	id_Estatus_Noticia int unsigned auto_increment not null,
    estatus varchar(20),
    primary key (id_Estatus_Noticia)
);

create table if not exists Usuario(
	id_Usuario int unsigned auto_increment not null,
    correo varchar(100),
    contraseña varchar(30),
    nombre varchar(20),
    apellido_materno varchar(20),
    apellido_paterno varchar(20),
    telefono varchar(15),
    avatar int(10) unsigned not null,
    tipoUsuario int(10) unsigned not null,
    activo bit,
    primary key (id_Usuario),
    constraint fk_usuario_imagen foreign key (avatar) references Imagen(id_Imagen),
    constraint fk_usuario_tipoUsuario foreign key (tipoUsuario) references TipoUsuario(id_TipoUsuario)
);

create table if not exists Noticia(
	id_Noticia int unsigned auto_increment not null,
    Titulo varchar(50),
    FechaPublicacion date,
    FechaAcontesimiento date,
    Lugar varchar(250),
    Descripcion varchar(255),
    Texto text,
    seccion int(10) unsigned,
    estatus int(10) unsigned,
    autor int(10) unsigned,
    destacada bit,
    activa bit,
    primary key (id_Noticia),
	constraint fk_noticia_seccion foreign key (seccion) references Seccion(id_Seccion),
    constraint fk_noticia_EstatusNoticia foreign key (estatus) references Estatus_Noticia(id_Estatus_Noticia),
    constraint fk_noticia_Usuario foreign key (autor) references  Usuario(id_Usuario)
);

create table if not exists NoticiaPalabra(
	id_NoticiaPalabra int unsigned auto_increment not null,
    noticia int(10) unsigned,
    palabra int(10) unsigned,
    primary key (id_NoticiaPalabra),
    constraint fk_NoticiaPalabra_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_NoticiaPalabra_PalabraClave foreign key (palabra) references PalabraClave(id_PalabraClave)
);

create table if not exists Comentarios(
	id_Comentario int unsigned auto_increment not null,
    noticia int(10) unsigned,
    usuario int(10) unsigned,
    comentario varchar(255),
    fecha date,
    primary key	(id_Comentario),
    constraint fk_Comentarios_Noticia foreign key (noticia) references Noticia (id_Noticia),
    constraint fk_Comentarios_Usuario foreign key (usuario) references Usuario (id_Usuario)
);

create table if not exists Likes(
	id_Like int unsigned auto_increment not null,
    noticia int(10) unsigned,
    usuario int(10) unsigned,
    primary key (id_Like),
    constraint fk_Likes_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_Likes_Usuario foreign key (usuario) references Usuario(id_Usuario)
);

create table if not exists NoticiaImagen(
	id_NoticiaImagen int unsigned auto_increment not null,
    noticia int(10) unsigned,
    imagen int(10) unsigned,
    primary key (id_NoticiaImagen),
    constraint fk_NoticiaImagen_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_NoticiaImagen_Imagen foreign key (imagen) references Imagen(id_Imagen)
);

create table if not exists NoticiaVideo(
	id_NoticiaVideo int unsigned auto_increment not null,
    noticia int(10) unsigned,
    video int(10) unsigned,
    primary key (id_NoticiaVideo),
    constraint fk_NoticiaVideo_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_NoticiaVideo_Video foreign key (video) references Video(id_Video)
);

/*STORE PROCEDURES*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaBusqueda_ByTitulo`(IN p varchar(50))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where Titulo Like p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaDelete_ById`(IN p int(10))
BEGIN
  delete from noticia where id_Noticia = p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_All`()
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_ById`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where id_Noticia = p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_BySeccion`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where seccion = p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_ByUser`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where autor = p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaRedactar`(IN pTitulo varchar(50), IN pFechaAcontesimiento date,
IN pLugar varchar(250), IN pDescripcion varchar(250), IN pTexto text, 
IN pseccion int(10), IN pstatus int(10), IN pautor int(10))
BEGIN
  insert into noticia (Titulo, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion, estatus, autor) 
        values (pTitulo, pFechaAcontesimiento, pLugar, pDescripcion, pTexto, pseccion, pestatus, pautor);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaSoftDelete_ById`(IN p int(10))
BEGIN
  update noticia set activa=0 where id_Noticia = p;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioRegistro`(IN pCorreo varchar(100), IN pContra varchar(30), IN pFirma varchar(20),
IN pNombre varchar(20), IN pApPaterno varchar(20), IN pApMaterno varchar(20), IN pTelefono varchar(15),
IN pAvatar int(10), IN pTipoUsuario varchar(10))
BEGIN
  INSERT INTO usuario (correo, contraseña, firma, nombre, apellido_paterno, apellido_materno, telefono,avatar, tipoUsuario,activo)
  VALUES (pCorreo, pContra, pFirma, pNombre, pApPaterno, pApMaterno, pTelefono, pAvatar, pTipoUsuario, 0);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioRegistro`(IN pCorreo varchar(100), IN pContra varchar(30), IN pFirma varchar(20),
IN pNombre varchar(20), IN pApPaterno varchar(20), IN pApMaterno varchar(20), IN pTelefono varchar(15),
IN pAvatar int(10), IN pTipoUsuario varchar(10))
BEGIN
  INSERT INTO usuario (correo, contraseña, firma, nombre, apellido_paterno, apellido_materno, telefono,avatar, tipoUsuario,activo)
  VALUES (pCorreo, pContra, pFirma, pNombre, pApPaterno, pApMaterno, pTelefono, pAvatar, pTipoUsuario, 0);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioTipoUsuario_ById`(IN p int(10))
BEGIN
  select tipoUsuario from usuario where id_Usuario = p;
END