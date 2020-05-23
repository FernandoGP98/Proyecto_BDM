<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'links.php';?>
    <!--load styles -->
    <title>Index</title>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <hr class="nextSection" style="margin: auto">
                <!-- Obtenemos el nombre y el color de la seccion -->
                <div class="row row-seccion" style="background-color: #<?= $titulo->color?>" style="margin-left: 0 !important; margin-right: 0">
                    <div class="col-12 text-center" >
                        <h2><?= $titulo->nombre?></h2>
                    </div>
                </div>
                <hr class="inSection" style="margin: auto">
                <div class="noticias-redaccion mt-md-3">
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
                                    <div class="col-md-2 p-3 d-flex justify-content-end">
                                        <small>
                                        <?= $nota->fechaPublicacion?>
                                        </small>
                                    </div>
                                    <div class="col-md-3 p-3 d-flex justify-content-center seccion-imagen">
                                        <img src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>" width="auto" height="100px" alt="...">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <a href="noticia?id=<?= $nota->id?>">
                                            <h3 class="mb-1"><?= $nota->titulo?></h3>
                                        </a>
                                        <div>
                                            <small><?= $nota->descripcion?></small>
                                        </div>
                                        <br>
                                        <div>
                                            <small><?=$nota->palabraNombre?></small>
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
                <hr class="inSection">
            </>
        </div>        
    </div>
    <?php include 'templates/footer.php';?>

    <!--Slick JS-->
    <script type="text/javascript" src="extras/slick/slick.min.js"></script>
    <script>
    $(function() {
        $('.carousel').slick({
            slidesToShow: 3,
            dots: true,
            centerMode: true,
        });
    });
    </script>
</body>

</html>