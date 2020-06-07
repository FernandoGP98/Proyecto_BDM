use bdm_01;

create table if not exists Imagen(
	id_Imagen int unsigned auto_increment not null,
    imagen mediumblob,
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
    color varchar(8),
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
    correo varchar(100) unique,
    contraseña varchar(30) not null,
    firma varchar(30),
    nombre varchar(20),
    apellido_materno varchar(20),
    apellido_paterno varchar(20),
    telefono varchar(15),
    avatar int(10) unsigned not null,
    tipoUsuario int(10) unsigned not null,
    activo bit default 0,
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
    seccion int(10) unsigned not null,
    estatus int(10) unsigned not null,
    autor int(10) unsigned not null,
    palabra int(10) unsigned not null,
    destacada bit default 0,
    activa bit default 1,
    primary key (id_Noticia),
	constraint fk_noticia_seccion foreign key (seccion) references Seccion(id_Seccion),
    constraint fk_noticia_EstatusNoticia foreign key (estatus) references Estatus_Noticia(id_Estatus_Noticia),
    constraint fk_noticia_Usuario foreign key (autor) references  Usuario(id_Usuario),
    constraint fk_noticia_Palabra foreign key (palabra) references  PalabraClave(id_PalabraClave)
);


create table if not exists Comentarios(
	id_Comentario int unsigned auto_increment not null,
    noticia int(10) unsigned not null,
    usuario int(10) unsigned not null,
    comentario varchar(255),
    fecha date,
    primary key	(id_Comentario),
    constraint fk_Comentarios_Noticia foreign key (noticia) references Noticia (id_Noticia),
    constraint fk_Comentarios_Usuario foreign key (usuario) references Usuario (id_Usuario)
);

create table if not exists Likes(
	id_Like int unsigned auto_increment not null,
    noticia int(10) unsigned not null,
    usuario int(10) unsigned not null,
    primary key (id_Like),
    constraint fk_Likes_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_Likes_Usuario foreign key (usuario) references Usuario(id_Usuario)
);

create table if not exists NoticiaImagen(
	id_NoticiaImagen int unsigned auto_increment not null,
    noticia int(10) unsigned not null,
    imagen int(10) unsigned not null,
    primary key (id_NoticiaImagen),
    constraint fk_NoticiaImagen_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_NoticiaImagen_Imagen foreign key (imagen) references Imagen(id_Imagen)
);

create table if not exists NoticiaVideo(
	id_NoticiaVideo int unsigned auto_increment not null,
    noticia int(10) unsigned not null,
    video int(10) unsigned not null,
    primary key (id_NoticiaVideo),
    constraint fk_NoticiaVideo_Noticia foreign key (noticia) references Noticia(id_Noticia),
    constraint fk_NoticiaVideo_Video foreign key (video) references Video(id_Video)
);
