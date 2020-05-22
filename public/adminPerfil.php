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
                    <li><a id="admin-usuarios" href="logout">Cerrar Session</a></li>
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
                                foreach ($notas as $item) {
                                    $nota = new Noticia();
                                    $nota = $item;
                                
                        ?>
                        <div class="post-outbox">
                            <div class="post-innerbox">
                                <div class="row">
                                    <div class="col-2 p-1 d-flex justify-content-center">
                                        <img src="resources/image/no-imagen.jpg" width="auto" height="50px" alt="...">
                                    </div>
                                    <div class="col-5 p-0">
                                        <a href="noticia?id=<?=$nota->id?>">
                                            <h4 class="mb-1"><?= $nota->titulo?></h4>
                                        </a>
                                        <div>
                                            <small><?= $nota->descripcion?></small>
                                        </div>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <br>
                                        <h5>Reportero</h5>
                                        <p><?= $nota->autor?></p>
                                    </div>

                                    <div class="col-md-1 text-center">
                                        <p class="estatus">Estatus</p>
                                        <small><?= $nota->estatus?></small>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <br>
                                        <form action="publicar" method="POST">
                                            <input type="hidden" name="idNoticia" id="" value="<?=$nota->id?>">
                                            <input type="hidden" name="userID" id="" value="<?=$_SESSION["usuario"]["id_Usuario"]?>">
                                            <button class="btn btn-outline-success submit">Publicar</button>
                                        </form>
                                        <br><br>
                                        <input type="hidden" name="" class="idNoticiaI" value="<?=$nota->id?>">
                                        <input type="hidden" name="" class="noticiaNombreI" value="<?=$nota->titulo?>">
                                        <button class="btn btn-outline-danger btn-eliminar">Eliminar</button>
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
                                for ($i=0; $i < count($_SESSION['secciones']); $i++) { 
                                ?>
                            <div class="row secciones-lista">
                                <div class="col">
                                    Orden
                                    #
                                </div>
                                <div class="col text-center">
                                    <?= $_SESSION['secciones'][$i]['nombre']?>
                                </div>
                                <div class="col text-center muestra-color">
                                    <div class="color-muestra-final" style="background-color: #<?=$_SESSION['secciones'][$i]['color']?>;"></div>
                                </div>
                                <div class="col">
                                    <div class="boton-modificar" id="modificar-color">
                                        <button class="btn btn-outline-warning">Modificar Color</button>
                                    </div>
                                    <div class="selec-color">
                                        <form action="editarSeccion" method="$_GET">
                                            <label for="">Seleccionar Color:</label>
                                            <input class="jscolor" value="<?=$_SESSION['secciones'][$i]['color']?>" name="color">
                                            <br>
                                            <button class="btn btn-outline-success btn-guardar submit">Guardar</button>
                                            <input type="hidden" name="idSeccion" class="idSeccionI" value="<?=$_SESSION['secciones'][$i]['id']?>">
                                        </form>
                                    </div>

                                </div>
                                <div class="col">
                                    <input type="hidden" name="" class="idSeccionI" value="<?=$_SESSION['secciones'][$i]['id']?>">
                                    <input type="hidden" class="seccionNombreI" value="<?= $_SESSION['secciones'][$i]['nombre']?>">
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
                                    <form action="crearSeccion" method="POST">
                                        <label for="">Nombre Seccion:</label>
                                        <input type="text" class="form-control" id="nuevaSeccion" name="nombreSeccion">
                                        <label for="">Color:</label>
                                        <input class="jscolor form-control" id="nuevoColor" name="colorSeccion">
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
                            <form action="registroByAdmin" method="POST" id="adminRegistro">
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
                                <select class="form-control" name="tipoUsuario" id="">
                                    <?php
                                        foreach ($tiposUsuario as $item) {
                                            $nota = new usuario();
                                            $nota = $item;
                                        
                                    ?>
                                    <option value="<?=$nota->id?>"><?=$nota->tipoUsuario?></option>
                                    <?php
                                        }
                                    ?>
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
                            //users
                            foreach ($users as $item) {
                                $nota = new usuario();
                                $nota = $item;
                            ?>
                            <div class="card col-3 reportero-card">
                                <img class="card-img-top reportero-imagen" src="resources/image/no-imagen.jpg"
                                    alt="Card image">
                                <div class="card-body">
                                    <p class="card-text"><?=$nota->nombre?> <?=$nota->apPaterno?> <?=$nota->apMaterno?></p>
                                    <p class="card-text"><b>Firma:</b> <?=$nota->firma?></p>
                                    <p class="card-text"><b>Contacto:</b> <span><?=$nota->telefono?></span></p>
                                    <input type="text" name="" class="idUsuario" value="<?=$nota->id?>">
                                    <input type="hidden" name="" class="firmaUsuario" value="<?=$nota->firma?>">
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

        <!-- Modal  Noticias -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar <span id="noticiaNombreII">Noticia</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Quieres eliminar esta noticia?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
                        <form action="borrarNota" method="POST" id="notaEliminar">
                            <input type="text" name="idNoticia2" id="idNoticia2" value="">
                            <input type="text" name="userID" id="" value="<?=$_SESSION["usuario"]["id_Usuario"]?>">
                            <button type="button" class="btn btn-danger eliminar-noticia"       
                                data-dismiss="modal">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Reportero -->
        <div class="modal fade" id="reporteroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar <span id="usuarioNombreII"></span></h5>
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
                        <form action="borrarUsuario" method="POST" id="borrarUsuario">
                            <input type="text" name="idUsuario2" id="idUsuario2" value="">
                            <input type="text" name="userID" id="" value="<?=$_SESSION["usuario"]["id_Usuario"]?>">
                            <button type="button" class="btn btn-danger eliminar-reportero"
                            data-dismiss="modal">Eliminar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Secciones -->
        <div class="modal fade" id="seccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar <span id="seccionNombre">Seccion</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Quieres eliminar esta seccion?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelar-seccion"
                            data-dismiss="modal">Cancelar</button>
                            <form action="eliminarSeccion" method="POST" id="seccionEliminada">
                                <input type="text" name="idSeccion" id="eliminarSeccionID" value="">
                                <button type="submit" class="btn btn-danger eliminar-seccion"
                                data-dismiss="modal">Eliminar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>

</html>