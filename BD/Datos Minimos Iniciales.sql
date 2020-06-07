/*
/////////// DATOS MINIMOS INICIALES //////////////
*/

insert into tipousuario (tipousuario) values ("Administrador");
insert into tipousuario (tipousuario) values ("Reportero");
insert into tipousuario (tipousuario) values ("Registrado");

insert into estatus_noticia (estatus) values ("En Redaccion");
insert into estatus_noticia (estatus) values ("Terminada");
insert into estatus_noticia (estatus) values ("Publicada");

insert into usuario (correo,contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, avatar, tipoUsuario, activo)
values ("admin@correo.com", "Administrador1234", "Administrador", "", "", "", "", null, 1, 1);

insert into seccion (seccion_nombre, color, orden) values('Local','ABCFFF',1);
insert into seccion (seccion_nombre, color, orden) values('Deportes','ABCFFF',2);
insert into seccion (seccion_nombre, color, orden) values('Espectaculos','ABCFFF',3);
insert into seccion (seccion_nombre, color, orden) values('Nacional','ABCFFF',4);

insert into palabraclave (PalabraClave) values("Musica");
insert into palabraclave (PalabraClave) values("Deporte");
insert into palabraclave (PalabraClave) values("Clima");
insert into palabraclave (PalabraClave) values("Espectaculos");
