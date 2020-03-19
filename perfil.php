<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/perfil.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 vertical-line-right">
                <img src="https://capenetworks.com/static/images/testimonials/user-icon.svg" width="50%" height="auto"
                    alt="">
                <ul>
                    <li><a id="perfil-info" href="#">Informacion</a></li>
                    <li><a id="perfil-post" href="#">Publicaciones</a></li>
                    <li><a href="">Cerrar Sesion</a></li>
                    <li><a href="">Eliminar cuenta</a></li>
                </ul>

            </div>
            <div class="col-md-9">
                <div class="info-usuario">
                    <label class="form-check-label" for="">Nombre</label>
                    <input class="form-control" type="text" name="" id="" disabled>
                    <label class="form-check-label" for="">Correo</label>
                    <input class="form-control" type="text" name="" id="" disabled>
                    <label class="form-check-label" for="">Firma</label>
                    <input class="form-control" type="text" name="" id="" disabled>
                    <label class="form-check-label" for="">Telefono</label>
                    <input class="form-control" type="text" name="" id="" disabled>
                    <label class="form-check-label" for="">Direccion</label>
                    <input class="form-control" type="text" name="" id="" disabled>
                </div>
                <div class="publicaciones">
                    <div class="">
                        <!--
                        <a class="btn btn-outline-primary" style="margin-left:100px; margin-right:100px;"
                            href="redactar.php">Agregar</a>
                        <a class="btn btn-outline-primary" style="margin-left:100px; margin-right:100px;"
                            href="">Eliminar</a>
                        -->
                    </div>
                    <?php
                    for ($i=0; $i < 5; $i++) { 
                    ?>
                    <div class="post-outbox">
                        <div class="post-innerbox">
                        <div class="row">
                            <div class="col-2 p-1 d-flex justify-content-center">
                                <img src="image/no-imagen.jpg" width="auto" height="50px" alt="...">
                            </div>
                            <div class="col-6 p-0">
                                <a href="noticia.php">
                                <h4 class="mb-1">Titulo</h4>
                                </a>
                                <div>
                                    <small>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
                                        Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
                                        cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una 
                                        galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. </small>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <button class="btn btn-outline-warning">Editar</button>
                            <br><br>
                                <button class="btn btn-outline-danger" >Eliminar</button>
                            </div>
                            <div class="col-md-2 text-right">
                                <p class="estatus">Estatus:</p>
                                <small>Edicion</small>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
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