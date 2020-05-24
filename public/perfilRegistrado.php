<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <script src="resources/js/perfil.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 vertical-line-right">
            <?php
                    if($_SESSION["usuario"]["imagen"] == null){
                        //echo $_SESSION["usuario"]["imagen"];
                ?>
                <img src="resources/image/no-imagen.jpg"
                width="50%" height="auto" alt="" id="avatarImg">
                <?php 
                }else{
                ?>
            
                <img src="data:image/jpeg;base64,<?=base64_encode( $_SESSION["usuario"]["imagen"])?>"
                    width="50%" height="auto" alt="" id="avatarImg">
                <?php } ?>
                <ul>
                    <li><a id="perfil-info" href="#">Informacion</a></li>
                    <li><a href="logout">Cerrar Sesion</a></li>
                    <li><a href="#" class="btn btn-outline-danger btn-reportero-eliminar" data-toggle="modal" data-target="#reporteroModal">Eliminar Cuenta</a></li>
                </ul>

            </div>
            <div class="col-md-9">
                <div class="info-usuario">
                <form action="modificarUsuario" method="POST" enctype="multipart/form-data">
                        <label class="form-check-label" for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="" value="<?=$_SESSION['usuario']['nombre']?>">
                        <label class="form-check-label" for="">Apellido Paterno</label>
                        <input class="form-control" type="text" name="paterno" id="" value="<?=$_SESSION['usuario']['apellido_paterno']?>">
                        <label class="form-check-label" for="">Apellido Materno</label>
                        <input class="form-control" type="text" name="materno" id="" value="<?=$_SESSION['usuario']['apellido_materno']?>">
                        <label class="form-check-label" for="">Correo</label>
                        <input class="form-control" type="text" name="correo" id="" disabled value="<?=$_SESSION['usuario']['correo']?>">
                        <label class="form-check-label" for="">Contraseña</label>
                        <input class="form-control" type="password" name="contraseña" id="contraseña" value="<?=$_SESSION["usuario"]["contraseña"]?>">
                        <div class="info-registro">
                            <small>La contraseña debe contener 1 letra mayuscula, 1 letra minuscula,
                                1 numero y 8 caracteres</small>
                        </div>
                        <label class="form-check-label" for="">Usuario</label>
                        <input class="form-control" type="text" name="firma" id="" value="<?=$_SESSION['usuario']['firma']?>">
                        <label class="form-check-label" for="">Telefono</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="<?=$_SESSION['usuario']['telefono']?>" maxlength="10">
                        <label for="form-check-control">Avatar</label>
                        <input class="form-control" type="file" name="avatar" id="avatar" accept="image/*">
                        <input type="hidden" name="idUsuario" value="<?=$_SESSION["usuario"]["id_Usuario"]?>">
                        <input class="mb-2 btn btn-submit" type="submit" value="Guardar" id="guardarUsuario">
                </form>
                </div>
            </div>
        </>
    </div>
    <?php include 'templates/footer.php';?>

    <!-- Modal -->

    <!-- Modal Reportero -->
    <div class="modal fade" id="reporteroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar "<?= $_SESSION["usuario"]["firma"]?>" </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Quieres eliminar a este usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancelar-reportero"
                    data-dismiss="modal">Cancelar</button>
                    <form action="borrarUsuarioPropio" method="POST" id="borrarUsuario">
                        <input type="hidden" name="userID" id="" value="<?=$_SESSION["usuario"]["id_Usuario"]?>">
                        <input class="btn btn-danger" type="submit" value="Eliminar" id="guardarUsuario">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $(".publicaciones").hide();
            $("#perfil-info").click(function(){
                $(".publicaciones").hide(400);
                $(".info-usuario").show(400);
            });
            $("#perfil-post").click(function(){
                $(".publicaciones").show(400);
                $(".info-usuario").hide(400);
            });
        });
    </script>
</body>

</html>