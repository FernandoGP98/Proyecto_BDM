<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <!-- <link rel="stylesheet" href="css/registrar.css">
    <link rel="stylesheet" href="css/perfil.css"> -->
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel="stylesheet" href="resources/css/reportero.css">
    <script src="resources/js/perfil_administrador.js"></script>
    <script src="resources/js/jscolor.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 vertical-line-right text-center">
                <img src="https://capenetworks.com/static/images/testimonials/user-icon.svg" width="50%" height="auto"
                    alt="">
                <ul>
                    <li><a id="admin-redaccion" href="#">Noticias en Redaccion</a></li>
                    <li><a id="admin-secciones" href="#">Secciones</a></li>
                    <li><a id="admin-usuarios" href="#">Crear Usuarios</a></li>
                    <li><a id="admin-usuarios-eliminar" href="#">Eliminar Usuarios</a></li>
                </ul>
                
                <ul>
                    <li> ** Temporal **</li>
                    <li><a href="perfil.php">Perfil Reportero</a></li>
                </ul>
            </div>
            <div class="col-8">
                <!-- Apartado de Noticias -->
                <div class="noticias-redaccion">
                    <h1 class="text-center">Noticas en Edicion</h1>
                    <br>
                    <div class="card">
                        <?php
                                for ($i=0; $i < 5; $i++) { 
                                ?>
                        <div class="post-outbox">
                            <div class="post-innerbox">
                                <div class="row">
                                    <div class="col-2 p-1 d-flex justify-content-center">
                                        <img src="resources/image/no-imagen.jpg" width="auto" height="50px" alt="...">
                                    </div>
                                    <div class="col-5 p-0">
                                        <a href="noticia.php">
                                            <h4 class="mb-1">Titulo</h4>
                                        </a>
                                        <div>
                                            <small>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                archivos de texto.
                                                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde
                                                el año 1500,
                                                cuando un impresor (N. del T. persona que se dedica a la imprenta)
                                                desconocido usó una
                                                galería de textos y los mezcló de tal manera que logró hacer un libro de
                                                textos especimen. </small>
                                        </div>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <br>
                                        <h5>Reportero</h5>
                                        <p>Firma Reportero</p>
                                    </div>

                                    <div class="col-md-1 text-center">
                                        <p class="estatus">Estatus</p>
                                        <small>Edicion</small>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <br>
                                        <button class="btn btn-outline-success">Publicar</button>
                                        <br><br>
                                        <button class="btn btn-outline-danger btn-eliminar" >Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                                ?>
                    </div>
                </div>

                <!-- Apartado de Secciones -->
                <div class="secciones-administrador">
                    <div class="container">
                        <h3 class="text-center">Secciones</h3>
                        <hr>
                        <div id="contender-secciones">
                            <?php
                                for ($i=0; $i < 5; $i++) { 
                                ?>
                            <div class="row secciones-lista">
                                <div class="col">
                                    Orden
                                    #
                                </div>
                                <div class="col text-center">
                                    Seccion Nombre
                                </div>
                                <div class="col text-center muestra-color">
                                    <div class="color-muestra-final"></div>
                                </div>
                                <div class="col">
                                    <div class="boton-modificar" id="modificar-color">
                                        <button class="btn btn-outline-warning">Modificar Color</button>
                                    </div>
                                    <div class="selec-color">
                                        <label for="">Seleccionar Color:</label>
                                        <input class="jscolor" value="ab2567">
                                        <br>
                                        <button class="btn btn-outline-success btn-guardar">Guardar</button>
                                    </div>

                                </div>
                                <div class="col">
                                    <button class="btn btn-outline-danger btn-eliminar-seccion">Eliminar</button>
                                </div>
                            </div>

                            <?php
                                }   
                                ?>
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col">
                            <h3 class="text-center">Crear Seccion</h3>
                            <br>
                            <div>
                                <form action="">
                                    <label for="">Nombre Seccion:</label>
                                    <input type="text" class="form-control" id="nuevaSeccion">
                                    <label for="">Color:</label>
                                    <input class="jscolor form-control" id="nuevoColor">
                                    <br>
                                    <button class="btn btn-outline-success crear-seccion">Crear</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Aparatado de Usuarios -->
                <div class="usuarios-administrador">
                    <br><br>
                    <h1 class="text-center">Crear Usuario</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="loginBackground">
                        </div>
                        <div class="contact-form">
                            <h2>Nuevo Usuario</h2>
                            <form action="">
                                <label for="">E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="Ingrese un email" id="email">

                                <label for="">Firma</label>
                                <input class="form-control" type="text" name="username"
                                    placeholder="Ingrese un nombre de usuario">

                                <label for="">Contraseña</label>
                                <input class="form-control" type="password" name="password"
                                    placeholder="Ingrese una contraseña" id="contraseña">
                                <small class="info-registro-contraseña">La contraseña debe contener un letra mayuscula, una letra minuscula y un numero</small>
                
                                <br>
                                <label for="">Tipo de Usuario</label>
                                <select class="form-control" name="" id="">
                                    <option value="0">Administrador</option>
                                    <option value="1">Reportero</option>
                                    <option value="2">Usuario</option>
                                </select>

                                <br><input class="mb-2 btn btn-primary" type="submit" value="Registrar" id="registro"><br>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Aparatado de Eliminar Usuarios -->
                <div class="usuarios-administrador-eliminar">
                    <br><br>
                    <h1 class="text-center">Eliminar Usuario</h1>
                    <div class="container">
                        <div class="row">
                        <?php
                            for ($i=0; $i < 5; $i++) { 
                        ?>
                            <div class="card col-3 reportero-card">
                            <img class="card-img-top reportero-imagen" src="resources/image/no-imagen.jpg" alt="Card image">
                            <div class="card-body">
                                <p class="card-text">Nombre Reportero</p>
                                <p class="card-text"><b>Firma:</b> Firma Chida</p>
                                <p class="card-text"><b>Contacto:</b> <span>##########</span></p>
                                <a href="#" class="btn btn-outline-danger btn-reportero-eliminar">Eliminar</a>
                            </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php include 'templates/footer.php';?>


        <!-- Modal  Noticias -->
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

        <!-- Modal Reportero -->
        <div class="modal fade" id="reporteroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Reportero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Quieres eliminar a este reportero?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar-reportero" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger eliminar-reportero" data-dismiss="modal">Eliminar</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal Secciones -->
        <div class="modal fade" id="seccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Seccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Quieres eliminar esta seccion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar-seccion" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger eliminar-seccion" data-dismiss="modal">Eliminar</button>
            </div>
            </div>
        </div>
        </div>
</body>

</html>