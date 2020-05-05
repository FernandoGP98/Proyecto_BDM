<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <script src="js/busqueda.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="mt-md-5 col-md-10">
                <div class="card busqueda-card">
                    <form class="form-inline my-2 my-lg-0" action="busqueda.php" style="padding: 30px;">
                        <div class="row" style="width:100%">
                            <div class="col-md-10">
                                <input id="search-bar" style="width:100%; height:auto; font-size: 40px;"
                                    class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            </div>
                            <div class="col-md-2">
                                <a id="search-btn" class="ml-md-4 mr-md-4" type="submit"><i id="buscar-red"
                                        class="fas fa-search fa-4x"> </i></a>
                            </div>
                        </div>
                        <div class="row mt-3" style="width: 100%">
                            <div class="col-md-9">
                                <label class="justify-content-md-start" for="">Tipo de busqueda</label>
                                <select name="" id="custom-busqueda" class="form-control">
                                    <option value="0" selected>Titulo</option>
                                    <option value="1">Palabra Clave</option>
                                    <option value="2">Rango de Fecha</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3 rango-fechas" style="width: 100%">
                            <div class="col-3">
                                <label for="">Desde:</label>
                                <input type="date" name="" id="fecha-inicio" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="">Hasta:</label>
                                <input type="date" name="" id="fecha-fin" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="mt-md-3 col-md-10">
                <!-- Apartado de Noticias -->
                <div class="noticias-redaccion mt-md-3">
                    <h1 class="text-center">Resultado</h1>
                    <br>
                    <div class="card">
                        <?php
                                for ($i=0; $i < 5; $i++) { 
                                ?>
                        <div class="post-outbox">
                            <div class="post-innerbox">
                                <div class="row">
                                    <div class="col-md-2 p-3 d-flex justify-content-end">
                                        <small>
                                            06.03.2020 / 14:43
                                        </small>
                                    </div>
                                    <div class="col-md-3 p-3 d-flex justify-content-center">
                                        <img src="resources/image/no-imagen.jpg" width="auto" height="100px" alt="...">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <a href="noticia.php">
                                            <h3 class="mb-1">Titulo</h3>
                                        </a>
                                        <div>
                                            <small>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                archivos de texto.
                                                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde
                                                el año 1500,
                                                cuando un impresor </small>
                                        </div>
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
    </div>

    <?php include 'templates/footer.php';?>
</body>

</html>