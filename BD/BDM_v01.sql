use bdm_01;

create table if not exists Imagen(
	id_Imagen int auto_increment not null,
    imagen blob,
    primary key (id_Imagen)
);

create table if not exists Video(
	id_Video int auto_increment not null,
    direccion varchar(255),
    primary key (id_Video)
);

create table if not exists Seccion(
	id_Seccion int auto_increment not null,
    seccion_nombre varchar(30),
    orden int,
    activa bit,
    primary key (id_Seccion)
);

create table if not exists TipoUsuario(
	id_TipoUsuario int auto_increment not null,
    TipoUsuario varchar(30),
    primary key (id_TipoUsuario)
);

create table if not exists PalabraClave(
	id_PalabraClave int auto_increment not null,
    PalabraClave varchar(20),
    primary key (id_PalabraClave)
);

create table if not exists Estatus_Noticia(
	id_Estatus_Noticia int auto_increment not null,
    estatus varchar(20),
    primary key (id_Estatus_Noticia)
);

create table if not exists Usuario(
	id_Usuario int auto_increment not null,
    correo varchar(100),
    contraseña varchar(30),
    nombre varchar(20),
    apellido_materno varchar(20),
    apellido_paterno varchar(20),
    telefono varchar(15),
    avatar int,
    tipoUsuario int,
    activo bit,
    primary key (id_Usuario),
    foreign key (avatar) references Imagen(id_Imagen),
    foreign key (tipoUsuario) references TipoUsuario(id_TipoUsuario)
);

create table if not exists Noticia(
	id_Noticia int auto_increment not null,
    Titulo varchar(50),
    FechaPublicacion date,
    FechaAcontesimiento date,
    Lugar varchar(250),
    Descripcion varchar(255),
    Texto text,
    seccion int,
    estatus int,
    autor int,
    activa bit,
    primary key (id_Noticia),
    foreign key (seccion) references Seccion(id_Seccion),
    foreign key (estatus) references Estatus_Noticia(id_Estatus_Noticia),
    foreign key (autor) references  Usuario(id_Usuario)
);

create table if not exists NoticiaPalabra(
	id_NoticiaPalabra int auto_increment not null,
    noticia int,
    palabra int,
    primary key (id_NoticiaPalabra),
    foreign key (noticia) references Noticia(id_Noticia),
    foreign key (palabra) references PalabraClave(id_PalabraClave)
);

create table if not exists Comentarios(
	id_Comentario int auto_increment not null,
    noticia int,
    usuario int,
    comentario varchar(255),
    fecha date,
    primary key	(id_Comentario),
    foreign key (noticia) references Noticia (id_Noticia),
    foreign key (usuario) references Usuario (id_Usuario)
);

create table if not exists Likes(
	id_Like int auto_increment not null,
    noticia int,
    usuario int,
    primary key (id_Like),
    foreign key (noticia) references Noticia(id_Noticia),
    foreign key (usuario) references Usuario(id_Usuario)
);

create table if not exists NoticiaImagen(
	id_NoticiaImagen int auto_increment not null,
    noticia int,
    imagen int,
    primary key (id_Noticia),
    foreign key (noticia) references Noticia(id_Noticia),
    foreign key (imagen) references Imagen(id_Imagen)
);

create table if not exists NoticiaVideo(
	id_NoticiaVideo int auto_increment not null,
    noticia int,
    video int,
    primary key (id_NoticiaVideo),
    foreign key (noticia) references Noticia(id_Noticia),
    foreign key (video) references Video(id_Video)
);