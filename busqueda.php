<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="mt-md-5 col-md-10">
                <form class="form-inline my-2 my-lg-0" action="busqueda.php">
                    <input id="search-bar" style="width:90%; height:100px; font-size: 40px;" class="form-control mr-sm-2" type="search"
                        placeholder="Buscar" aria-label="Search">
                    <a id="search-btn" class="ml-md-4 mr-md-4" type="submit"><i id="buscar-red" class="fas fa-search fa-2x"> </i></a>
                </form>
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
                                        <img src="image/no-imagen.jpg" width="auto" height="100px" alt="...">
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