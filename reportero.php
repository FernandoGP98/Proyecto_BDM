<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/reportero.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-md-4">
                <img src="https://capenetworks.com/static/images/testimonials/user-icon.svg" width="10%" height="auto"
                    alt="">
                <h2>Nombre</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="publicaciones">
                    <?php
                    for ($i=0; $i < 5; $i++) { 
                    ?>
                    <div class="post-outbox">
                        <div class="post-innerbox">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>Fecha</p>
                                </div>
                                <div class="col-md-4 p-1 d-flex justify-content-center">
                                    <a href="noticia.php">
                                        <img src="" width="auto" height="50px" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-6 p-0">
                                    <a href="noticia.php">
                                        <h4 class="mb-1">Titulo</h4>
                                    </a>
                                    <div>
                                        <p>Descripcion</p>
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
    <?php include 'templates/footer.php';?>
</body>

</html>