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
                <img src="https://capenetworks.com/static/images/testimonials/user-icon.svg"
                    alt="" id="avatarImg">
                <ul>
                    <li><a id="perfil-info" href="#">Informacion</a></li>
                    <li><a href="logout">Cerrar Sesion</a></li>
                    <li><a href="">Eliminar cuenta</a></li>
                </ul>

            </div>
            <div class="col-md-9">
                <div class="info-usuario">
                    <label class="form-check-label" for="">Nombre</label>
                    <input class="form-control" type="text" name="" id="" value="<?=$_SESSION['usuario']['nombre']?>">
                    <label class="form-check-label" for="">Apellido Paterno</label>
                    <input class="form-control" type="text" name="" id="" value="<?=$_SESSION['usuario']['apellido_paterno']?>">
                    <label class="form-check-label" for="">Apellido Materno</label>
                    <input class="form-control" type="text" name="" id="" value="<?=$_SESSION['usuario']['apellido_materno']?>">
                    <label class="form-check-label" for="">Correo</label>
                    <input class="form-control" type="text" name="" id="" disabled value="<?=$_SESSION['usuario']['correo']?>">
                    <label class="form-check-label" for="">Firma</label>
                    <input class="form-control" type="text" name="" id="" value="<?=$_SESSION['usuario']['firma']?>">
                    <label class="form-check-label" for="">Telefono</label>
                    <input class="form-control" type="text" name="" id="telefono" value="<?=$_SESSION['usuario']['telefono']?>" maxlength="10">
                    <label for="form-check-control">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="avatar">
                </div>
            </div>
        </>
    </div>
    <?php include 'templates/footer.php';?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>¿Quieres eliminar esta noticia?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger eliminar-noticia" data-dismiss="modal">Eliminar</button>
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