/* TRIGER - STORED - FUNCTIONS - VIEWS*/
/*
	NO ESTAN TODAS LAS MODIFICACIONES
    algunas literalmente solo le hice un alter a los Stored que ya tenias,
    pero no recuerdo cuales eran xD
*/

/*===================================================================================================*/
/*===================================================================================================*/
use bdm_01;
/*View - NoticiaImagenes
	- Inner Join entre Imagen y NoticiaImagen para conseguir las imagenes por noticia
*/
create view vNoticiaImagenes as
select I.id_Imagen, I.imagen, NI.noticia 
from imagen as I
inner join noticiaimagen as NI
on I.id_Imagen = NI.imagen;
/*===================================================================================================*/
/*===================================================================================================*/
/* View - Noticia
	- Trae toda la info de la noticia, firma del autor, nombre de la seccion, nombre de la palabra clave, direccion del video
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored 
	 - usa el View de arriba para obtener las imagenes de una noticia en especifico
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
/*===================================================================================================*/
/*===================================================================================================*/
/*Stored - Guardar Imagenes de noticia
	- Hace un Registro en Imagen para despues hacer un Registro en NoticiaImagen
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*FUNCION - Ultima Noticia
	- Regresa la ultima Noticia Registrada para su uso en Trigger y Stored
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
/*===================================================================================================*/
/*===================================================================================================*/
/*FUNCION  - Ultima Imagen
	- Regresa la Ultima Imagen Registrada
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/* Trigger - Borrar Noticia(cambiar nombre)
	- Antes de borrar una noticia Elimina todos los comntarios que pertenescan a ella
    - Imagenes
    - Video
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
/*===================================================================================================*/
/*===================================================================================================*/
/* view - Noticia cards
	- version resumida de la noticia para todas las cards (incluye 1 imagen)
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*Trigger - Borrar Seccion (quita la llave foranea de la seccion en Noticia)
	- puedo usar esto para algo mas
*/
delimiter =)
create trigger tgSeccion
before delete on seccion
for each row
begin

	update noticia set seccion=null, activa = 0 where seccion=old.id_Seccion;

end =)
delimiter ;
/*===================================================================================================*/
/*===================================================================================================*/
/*Trigger - NoticiaVideo
	-Registra un campo en la tabla NoticiaVideo cuando se crea un campo en la tabla Video
*/
delimiter =)
create trigger tgNoticiaVideo
after insert on video
for each row
begin
	insert into noticiavideo (noticia, video) 
    values (ultimaNoticia(),new.id_Video);

end =)
delimiter ;
/*===================================================================================================*/
/*===================================================================================================*/
/*Trigger - Borrar Usuario
	- Borra las noticias sin publicar del usuario
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Funsion - Ultima Palabra
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Funcion
     - obtiene el orden (posicion) de la ultima seccion le suma y lo regresa
     * se usa para cuando se cree una nueva seccion
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Insert/Update seccion
		- Segun la opcion inserta o actualiza una seccion
        - Si actualiza el orden hace todo el proceso para modificar el resto de secciones afectadas
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	View - Usuario con Imagen
*/
create view vUsuario as
select U.id_Usuario, U.correo, U.contraseña, U.firma, U.nombre, U.apellido_materno, 
U.apellido_paterno, U.telefono, U.tipoUsuario, U.activo, I.imagen 
from usuario as U
left join imagen as I
on U.avatar = I.id_Imagen;
/*===================================================================================================*/
/*===================================================================================================*/
/*
	View - Comentario/Usuario/Imagen
*/
create view vComentario as 
select c.id_Comentario, c.comentario, c.fecha, c.noticia, a.firma, a.avatar, i.imagen 
from comentarios as c
inner join usuario as a
on c.usuario = a.id_Usuario
left join imagen as i
on i.id_Imagen = a.avatar;
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Obtener comentarios
		uso de la vista vComentarios
*/
delimiter =)
create procedure obtenerComentarios(
	in noticiaID int
)
begin
	select id_Comentario, comentario, fecha, noticia, firma, imagen 
	from vComentario where noticia = noticiaID;
end =)
delimiter ;
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Para actualizar usuario y agregar avatar si es necesario
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Store para obtener el usuario para reactulizar los datos de la Session
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Para las noticias relacionadas con la palabra Clave
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Para dar y quitar likes
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Funsion -> Obtiene los likes totales de una noticia
*/
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

/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored -> obtiene los likes de la noticia y usuario para comprobar si ya dio like o no a una noticia
*/
DELIMITER //
CREATE PROCEDURE spGetLikes(
	in pNoticia int
)
BEGIN
	select id_Like, usuario from likes where noticia = pNoticia;
END//
DELIMITER ;
/*===================================================================================================*/
/*===================================================================================================*/
/*
	Stored - Para las noticias de la portada (las de arriba)
		son las mas recientes noticias dando prioridad a las destacadas
*/
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
/*===================================================================================================*/
/*===================================================================================================*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*/////////////////////////Modificaciones de Stored ya creado /////////////////////////////////////////////////////*/
/*////////////////////--los ire poniendo segun me acuerde--////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioGet_porCorreoContra`(
	in correo2 varchar(50),
	IN contraseña2 VARCHAR(255)
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where correo = correo2 and contraseña = contraseña2; 
END;

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `testBusquedaOpcion`(
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
END
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaBusqueda_ByTitulo`(IN p varchar(50))
BEGIN
  select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', p , '%') and estatus = 3
        order by FechaPublicacion desc;
END
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/