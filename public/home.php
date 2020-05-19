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
                <hr class="nextSection">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Portada</h2>
                    </div>
                </div>
                <hr class="inSection">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="carousel">
                            <div class="noticia-card card destacado">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">


                                    <div class="card-body">

                                        <h5 class="card-title">Titulo Noticia 1 </h5>

                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>

                                    <div class="card-img-overlay">
                                        <img class="image-destacado" src="./resources/image/ultimo_momento_02.png" alt=""
                                            srcset="">

                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 2</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 3</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 4</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 5 </h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 6</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="inSection">
            </div>
        </div>
        <?php
        for ($i=0; $i <= 5; $i++) { 
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <hr class="nextSection">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Seccion<?=$i?></h2>
                    </div>
                </div>
                <hr class="inSection">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="carousel">
                            <div class="noticia-card card destacado">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">


                                    <div class="card-body">

                                        <h5 class="card-title">Titulo Noticia 1 </h5>

                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>

                                    <div class="card-img-overlay">

                                        <img class="image-destacado" src="./resources/image/ultimo_momento_02.png" alt=""
                                            srcset="">

                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">

                                        <h5 class="card-title">Titulo Noticia 2 </h5>

                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">

                                        <h5 class="card-title">Titulo Noticia 3 </h5>

                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 4</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 5 </h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="noticia.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Titulo Noticia 6</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="inSection">
            </div>
        </div>
        <?php
        }
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <hr class="nextSection">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Reporteros destacados</h2>
                    </div>
                </div>
                <hr class="inSection">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="carousel">
                            <div class="noticia-card card">
                                <a href="reportero.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Reportero 1 </h5>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="reportero.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Reportero 2 </h5>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="reportero.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Reportero 3 </h5>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="reportero.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Reportero 4 </h5>
                                    </div>
                                </a>
                            </div>

                            <div class="noticia-card card">
                                <a href="reportero.php">
                                    <img class="card-img-top"
                                        src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">Reportero 5 </h5>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="inSection">
            </div>
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