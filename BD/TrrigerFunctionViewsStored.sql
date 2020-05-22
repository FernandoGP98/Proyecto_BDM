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
/* Trigger - Borrar Comentarios de una Noticia(cambiar nombre)
	- Antes de borrar una noticia Elimina todos los comntarios que pertenescan a ella
*/
delimiter =)
create trigger triggerDeleteComentarios3
before delete on noticia
for each row
begin
	delete from comentarios where noticia = old.id_Noticia;
end =)
delimiter ;
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

	update noticia set seccion=null where seccion=old.id_Seccion;

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