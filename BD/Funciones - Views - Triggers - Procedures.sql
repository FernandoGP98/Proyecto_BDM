/*
==================================================================================
////////////////////////////////// FUNCIONES /////////////////////////////////////
==================================================================================
*/
DELIMITER //
CREATE FUNCTION ultimaNoticia() 
RETURNS int 
DETERMINISTIC
BEGIN
	declare nota int;
    set nota = (select id_Noticia from noticia
    order by id_Noticia desc limit 1);
    return (nota);
END 
//
DELIMITER ;

DELIMITER //
CREATE FUNCTION ultimaImagen() 
RETURNS int 
DETERMINISTIC
BEGIN
	declare imagen int;
    set imagen = (select id_Imagen from imagen
    order by id_Imagen desc limit 1);
    return (imagen);
END //
DELIMITER ;

DELIMITER //
CREATE FUNCTION ultimaPalabra() 
RETURNS int 
DETERMINISTIC
BEGIN
	declare palabra int;
	
    set palabra = (select id_PalabraClave 
    from palabraclave 
    order by id_PalabraClave desc limit 1);
    
    return (palabra);
END 
//
DELIMITER ;

DELIMITER //
CREATE FUNCTION fNuevoOrden() 
RETURNS int 
DETERMINISTIC
BEGIN
	declare norden int;
    set norden = (select orden from Seccion order by orden desc limit 1) + 1;
    return (norden);
END //
DELIMITER ;

DELIMITER //
CREATE FUNCTION fCountLikes(pNoticia int) 
RETURNS int 
DETERMINISTIC
BEGIN
	declare likesTotales int;
    set likesTotales = (select count(id_Like) from likes where noticia = pNoticia);
    return (likesTotales);
END //
DELIMITER ;

/*
==================================================================================
////////////////////////////////// VIEWS /////////////////////////////////////
==================================================================================
*/
create view vNoticiaImagenes as
select I.id_Imagen, I.imagen, NI.noticia 
from imagen as I
inner join noticiaimagen as NI
on I.id_Imagen = NI.imagen;

create view vVerNoticia as
select N.id_Noticia, N.Titulo, N.FechaPublicacion, N.FechaAcontesimiento, N.Lugar, N.Descripcion, N.Texto, N.destacada, N.activa, N.seccion, S.seccion_nombre, 
N.estatus, N.Autor, U.firma, n.palabra, p.PalabraClave,v.direccion_video 
from noticia as N
inner join noticiavideo as NV
on n.id_Noticia = NV.noticia
inner join video as V
on V.id_Video = NV.video
inner join seccion as S
on S.id_Seccion = N.seccion
inner join usuario as U
on U.id_Usuario = n.Autor
inner join palabraclave as P
on P.id_PalabraClave = N.palabra;

create view vNoticiaCard as
select n.id_Noticia, n.Titulo, n.FechaPublicacion, n.FechaAcontesimiento, n.Descripcion, n.destacada, n.activa, n.estatus, en.estatus as estatusNombre, n.seccion,p.PalabraClave, i.imagen, u.firma, n.autor
from noticia as n
inner join palabraclave as p
on n.palabra = p.id_PalabraClave
inner join noticiaimagen as ni
on ni.noticia = n.id_noticia
inner join imagen as i
on i.id_imagen = ni.imagen
inner join estatus_noticia as en
on en.id_estatus_noticia = n.estatus
inner join usuario as u
on u.id_usuario = n.autor
group by id_noticia;

create view vUsuario as
select U.id_Usuario, U.correo, U.contraseña, U.firma, U.nombre, U.apellido_materno, 
U.apellido_paterno, U.telefono, U.tipoUsuario, U.activo, I.imagen 
from usuario as U
left join imagen as I
on U.avatar = I.id_Imagen;

create view vComentario as 
select c.id_Comentario, c.comentario, c.fecha, c.noticia, a.firma, a.avatar, i.imagen 
from comentarios as c
inner join usuario as a
on c.usuario = a.id_Usuario
left join imagen as i
on i.id_Imagen = a.avatar;

/*
==================================================================================
////////////////////////////////// TRIGGERS /////////////////////////////////////
==================================================================================
*/

delimiter =)
create trigger tgBorrarNoticia
before delete on noticia
for each row
begin
	delete from comentarios where noticia = old.id_Noticia;
    delete from noticiaimagen where noticia = old.id_Noticia;
    delete from noticiavideo where noticia = old.id_Noticia;
end =)
delimiter ;

delimiter =)
create trigger tgSeccion
before delete on seccion
for each row
begin

	update noticia set seccion=null, activa = 0 where seccion=old.id_Seccion;

end =)
delimiter ;

delimiter =)
create trigger tgNoticiaVideo
after insert on video
for each row
begin
	insert into noticiavideo (noticia, video) 
    values (ultimaNoticia(),new.id_Video);

end =)
delimiter ;

delimiter =)
create trigger triggerUsuarioDelete
after update on usuario
for each row
begin
	if (new.activo = 0) then begin
		delete from noticia where autor = old.id_Usuario and estatus != 3;
    end;
    end if;
end =)
delimiter ;

/*
==================================================================================
////////////////////////////// STORED PROCEDURE //////////////////////////////////
==================================================================================
*/

DELIMITER //
CREATE PROCEDURE obtenerImagenesNoticia(
	in idNoticia int
)
BEGIN
	select id_Imagen, imagen, noticia
    from vNoticiaImagenes
    where noticia = idNoticia;
END //
DELIMITER ;

Delimiter //
CREATE PROCEDURE spImagen(
	in pImagen mediumblob
)
BEGIN
	insert into imagen (imagen) values (pImagen);
    
    insert into noticiaimagen (noticia, imagen) values (ultimaNoticia(), ultimaImagen());
END
//
Delimiter ;

delimiter =)
create procedure pSeccion(
	in opcion int,
	in pId int,
    in pNombre varchar(30),
    in pColor varchar(8),
	in pOrden int,
    in pActiva int
)
begin
declare oldOrden int;

	if (opcion = 1) then
		insert into seccion (seccion_nombre, color, orden, activa) values (pNombre, pColor, fNuevoOrden(), 1);
    end if;
    if(opcion = 2) then
		set oldOrden = (select orden from seccion where id_Seccion = pId);
		
		if(oldOrden != pOrden) then
			if(pOrden < oldOrden) then
				update seccion set orden = (orden + 1) where orden between pOrden and oldOrden;
			end if;
			if(pOrden > oldOrden) then
				update seccion set orden = (orden - 1) where orden between oldOrden and pOrden;
			end if;
		end if;
		update seccion set orden = pOrden, color = pColor, activa = pActiva where id_Seccion = pId;
        
    end if;

end =)
delimiter ;

delimiter =)
create procedure obtenerComentarios(
	in noticiaID int
)
begin
	select id_Comentario, comentario, fecha, noticia, firma, imagen 
	from vComentario where noticia = noticiaID;
end =)
delimiter ;

DELIMITER //
CREATE PROCEDURE spUpdateUsuario(
	in pID int,
	in pNombre varchar(20),
    in pPaterno varchar(20),
    in pMaterno varchar(20),
    in pFirma varchar(30),
    in pTelefono varchar(15),
    in pImagen mediumblob
    in pContraseña varchar(30)
)
BEGIN
	if(pImagen is not null) then
		insert into imagen (imagen) values (pImagen);
        
        update usuario set nombre=pNombre, apellido_paterno=pPaterno, apellido_materno=pMaterno, 
			firma = pFirma, telefono = pTelefono, avatar = ultimaImagen(), contraseña = pContraseña where id_Usuario = pID;
    else
		update usuario set nombre=pNombre, apellido_paterno=pPaterno, apellido_materno=pMaterno, 
			firma = pFirma, telefono = pTelefono, contraseña = pContraseña where id_Usuario = pID;
	end if;
DELIMITER ;

DELIMITER //
CREATE PROCEDURE psUsuarioByID(
	in pID int
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where id_Usuario = pID;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE spNotasRelacionadas(
	in pPalabra varchar(30)
)
BEGIN
	select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento,Descripcion, destacada, activa, 
		estatus, estatusNombre, seccion, PalabraClave, imagen, firma, autor
	from vNoticiaCard
    where PalabraClave = pPalabra and estatus = 3
	order by rand()
	limit 5;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE spLike(
	in opcion int,
    in idNoticia int,
    in idUsuario int
)
BEGIN
	if(opcion = 1) then
		insert into likes (noticia, usuario) values (idNoticia, idUsuario);
	elseif(opcion = 2) then
		delete from likes where noticia = idNoticia and usuario = idUsuario;
    end if;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE spGetLikes(
	in pNoticia int
)
BEGIN
	select id_Like, usuario from likes where noticia = pNoticia;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE spPortada(
)
BEGIN
	select id_Noticia, Titulo, descripcion, activa, destacada, PalabraClave, imagen, FechaPublicacion
	from vNoticiaCard where estatus = 3 and activa = 1
	order by destacada desc, FechaPublicacion desc
	limit 8;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuarioGet_porCorreoContra(
	in correo2 varchar(50),
	IN contraseña2 VARCHAR(255)
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where correo = correo2 and contraseña = contraseña2; 
END;
DELIMITER ;

DELIMITER //
CREATE PROCEDURE testBusquedaOpcion(
	in opcion int,
	IN texto VARCHAR(255),
    in fechaIni date,
    in fechaFin date
)
BEGIN
    case  
	   when opcion = 0 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', texto , '%') and estatus = 3
        order by FechaPublicacion desc;
	   when opcion = 1 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where PalabraClave Like CONCAT('%', texto , '%') and estatus = 3
        order by FechaPublicacion desc;
	   when opcion = 2 then
       SELECT id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen  
		FROM vNoticiaCard WHERE FechaPublicacion  BETWEEN fechaIni AND fechaFin and estatus = 3
        order by FechaPublicacion desc;
	end case;
END;
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaBusqueda_ByTitulo(IN p varchar(50))
BEGIN
  select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', p , '%') and estatus = 3
        order by FechaPublicacion desc;
END
DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuarioGet_ById(IN id int(10))
BEGIN
  select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno,
  telefono, tipoUsuario, activo, imagen
  from vusuario where id_Usuario = id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuarioGet_All()
BEGIN
  select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno,
  telefono, tipoUsuario, activo, imagen
  from vusuario where activo = 1 and tipoUsuario = 2;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuarioBorrar(in id int(10))
BEGIN
  update usuario set activo = 0 where id_Usuario = id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ComentarioRegistro(IN pNoticia int(10), IN pUs int(10), IN pComent varchar(255))
BEGIN
  INSERT INTO comentarios(noticia, usuario, comentario, fecha) VALUES(pNoticia,pUs,pComent,now());
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE videoRegistro(IN url varchar(250))
BEGIN
  insert into video (direccion_video) values (url);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE videoGet_All()
BEGIN
  select id_Video, direccion_video from video;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ComentarioDelete(IN pId int(10))
BEGIN
  delete from comentarios where id_Comentario = pId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE imagenGet_ById(IN pId int(10))
BEGIN
  select id_Imagen, imagen from imagen where id_Imagen=pId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE imagenGet_All()
BEGIN
  select id_Imagen, imagen from imagen;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaRedactar(IN pTitulo varchar(50), IN pFechaAcontesimiento date,
IN pLugar varchar(250), IN pDescripcion varchar(250), IN pTexto text, 
IN pseccion int(10), IN pstatus int(10), IN pautor int(10), IN ppalabra int(10))
BEGIN
  insert into noticia (Titulo, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion, estatus, autor, palabra) 
        values (pTitulo, pFechaAcontesimiento, pLugar, pDescripcion, pTexto, pseccion, pestatus, pautor);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaImagenDelete(IN pId int(10))
BEGIN
  delete from noticiaimagen where id_NoticiaImagen=pId;
END //

DELIMITER //
CREATE PROCEDURE videoDelete(IN pNoticaId int(10), IN pVideoId int(10))
BEGIN
  delete from noticiavideo where noticia=pNoticaId;
  delete from video where id_Video = pVideoId;
END //

DELIMITER //
CREATE PROCEDURE videoGet_ByNoticia(IN pNoticaId int(10))
BEGIN
  select id_NoticiaVideo, video from noticiavideo where noticia=pNoticaId;
END //

DELIMITER //
CREATE PROCEDURE palabraclaveget_ByTexto(IN pTexto varchar(20))
BEGIN
  select id_PalabraClave from palabraclave where PalabraClave=pTexto;
END //

DELIMITER //
CREATE PROCEDURE noticiaUpdate(IN pTitulo varchar(50), IN pFechaAcontesimiento date,
IN pLugar varchar(250), IN pDescripcion varchar(250), IN pTexto text, 
IN pseccion int(10), IN pstatus int(10), IN ppalabra int(10), IN pIdNoticia int(10))
BEGIN
  update noticia set Titulo=pTitulo, FechaAcontesimiento=pFechaAcontesimiento, 
  Lugar=pLugar, Descripcion=pDescripcion, Texto=pTexto, seccion=pseccion, estatus=pstatus,
  palabra=ppalabra
  where id_Noticia=pIdNoticia;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaGet_AllBySeccion(IN idSec int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Descripcion,
  destacada, activa, estatus, estatusNombre, seccion, PalabraClave, imagen,
  firma, autor
  from vNoticiaCard where seccion = idSec and activa = 1 and estatus = 3;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaPubicar(IN pDestacada bit(1), IN pId int(10))
BEGIN
  update noticia set estatus = 3, destacada = pDestacada where id_Noticia = pId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaGet_Home(IN pSec int(10))
BEGIN
 select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Descripcion,
  destacada, activa, estatus, estatusNombre, seccion, PalabraClave, imagen,
  firma, autor
  from vNoticiaCard where seccion = pSec and activa=1 and estatus = 3
  order by destacada desc, FechaPublicacion desc 
  limit 6;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE palabraClaveGet_All()
BEGIN
select id_PalabraClave, PalabraClave from palabraclave;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE palabraClaveGet_Ultima()
BEGIN
select ultimaPalabra();
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE palabraClaveRegistrar(IN palabra varchar(20))
BEGIN
insert into palabraclave (PalabraClave) values (palabra);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE seccionGet_ById(in id int(10))
BEGIN
select id_Seccion, color, orden, activa from seccion where id_Seccion = id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE seccionDelete_ById(in id int(10))
BEGIN
delete from seccion where id_Seccion = id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE tipoUsuarioGet_All()
BEGIN
select id_TipoUsuario, TipoUsuario from tipoUsuario;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE seccionGet_AllOrder()
BEGIN
select id_Seccion, color, orden, activa from seccion order by orden;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuarioGet_porCorreo(IN pCorreo varchar(100))
BEGIN
  SELECT id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, 
  avatar, tipoUsuario, activo from usuario where correo = pCorreo;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE noticiaBusqueda_ByTitulo(IN p varchar(50))
BEGIN
  select id_Noticia, Titulo, descripcion, FechaPublicacion, FechaAcontesimiento, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', p , '%') and estatus = 3 and activa=1
        order by FechaPublicacion desc;
END //
DELIMITER ;

DELIMITER //
CREATE  PROCEDURE BusquedaOpcion(
	in opcion int,
	IN texto VARCHAR(255),
    in fechaIni date,
    in fechaFin date
)
BEGIN
    case  
	   when opcion = 0 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, FechaAcontesimiento, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', texto , '%') and estatus = 3 and activa=1
        order by FechaPublicacion desc;
	   when opcion = 1 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, FechaAcontesimiento,activa, PalabraClave, imagen 
		from vNoticiaCard where PalabraClave Like CONCAT('%', texto , '%') and estatus = 3 and activa=1
        order by FechaPublicacion desc;
	   when opcion = 2 then
       SELECT id_Noticia, Titulo, descripcion, FechaPublicacion, FechaAcontesimiento,activa, PalabraClave, imagen  
		FROM vNoticiaCard WHERE FechaPublicacion  BETWEEN fechaIni AND fechaFin and estatus = 3 and activa=1
        order by FechaPublicacion desc;
	end case;
END //
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE noticiaDelete_ById(IN p int(10))
BEGIN
  delete from noticia where id_Noticia = p;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE noticiaGet_All()
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Descripcion,
  destacada, activa, estatus, estatusNombre, seccion, PalabraClave, imagen,
  firma, autor
  from vNoticiaCard where estatus = 2 and activa = 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE noticiaGet_ById(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar,
  Descripcion, Texto, destacada, activa, seccion, estatus, autor,
  seccion_nombre, firma, palabra, PalabraClave, direccion_video
  from vVerNoticia where id_Noticia = p;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE noticiaGet_BySeccion(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where seccion = p;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE noticiaGet_ByUser(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Descripcion,
  destacada, activa, estatus, estatusNombre, seccion, PalabraClave, imagen,
  firma, autor
  from vNoticiaCard where autor = p and activa = 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE noticiaSoftDelete_ById(IN p int(10))
BEGIN
  update noticia set activa=0 where id_Noticia = p;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE psUsuarioByID(
	in pID int
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where id_Usuario = pID;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE pUpdateSeccion(
	in pId int,
    in pColor varchar(8),
	in pOrden int,
    in pActiva int
)
begin
	declare oldOrden int;
	
    set oldOrden = (select orden from seccion where id_Seccion = pId);
    
	if(oldOrden != pOrden) then
		if(pOrden < oldOrden) then
			update seccion set orden = (orden + 1) where orden between pOrden and oldOrden;
        end if;
        if(pOrden > oldOrden) then
			update seccion set orden = (orden - 1) where orden between oldOrden and pOrden;
        end if;
    end if;
    
    update seccion set orden = pOrden, color = pColor, activa = pActiva where id_Seccion = pId;
end$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE spGetLikes(
	in pNoticia int
)
BEGIN
	select id_Like, usuario from likes where noticia = pNoticia;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE spNotasRelacionadas(
	in pPalabra varchar(30)
)
BEGIN
	select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento,Descripcion, destacada, activa, 
		estatus, estatusNombre, seccion, PalabraClave, imagen, firma, autor
	from vNoticiaCard
    where PalabraClave = pPalabra and estatus = 3
	order by rand()
	limit 5;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE spPortada(
)
BEGIN
	select id_Noticia, Titulo, descripcion, activa, destacada, PalabraClave, imagen
	from vNoticiaCard where estatus = 3 and activa = 1
	order by destacada desc, id_Noticia
	limit 8;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE usuarioGet_porCorreoContra(
	in correo2 varchar(50),
	IN contraseña2 VARCHAR(255)
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where correo = correo2 and contraseña = contraseña2; 
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE usuarioRegistro(IN pCorreo varchar(100), IN pContra varchar(30), IN pFirma varchar(20),
IN pNombre varchar(20), IN pApPaterno varchar(20), IN pApMaterno varchar(20), IN pTelefono varchar(15),
IN pAvatar int(10), IN pTipoUsuario varchar(10))
BEGIN
  INSERT INTO usuario (correo, contraseña, firma, nombre, apellido_paterno, apellido_materno, telefono,avatar, tipoUsuario,activo)
  VALUES (pCorreo, pContra, pFirma, pNombre, pApPaterno, pApMaterno, pTelefono, pAvatar, pTipoUsuario, 1);
END$$
DELIMITER ;


