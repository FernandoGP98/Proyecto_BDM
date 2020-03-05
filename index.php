<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <!--Fonst Awesome (Iconos, ejemplo F de facebook)-->
    <link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">

    <!--Slick Carousel-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <!--Estilo default-->
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <!--load styles -->
    <link rel="stylesheet" href="css/index.css">
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
                                <a href="#">
                                    <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                    alt="Card image cap">
                                    
                                </a>
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Titulo Noticia 1 </h5>
                                        </a>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    
                                    <div class="card-img-overlay">
                                        <a href="#">
                                            <img class="image-destacado" src="./image/ultimo_momento_02.png" alt="" srcset="">
                                        </a>
                                    </div>
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 4</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 5 </h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 6</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="inSection">
            </div>
        </div>
        <?php
        for ($i=0; $i < 5; $i++) { 
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
                                <a href="#">
                                    <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                    alt="Card image cap">
                                    
                                </a>
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Titulo Noticia 1 </h5>
                                        </a>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    
                                    <div class="card-img-overlay">
                                        <a href="#">
                                            <img class="image-destacado" src="./image/ultimo_momento_02.png" alt="" srcset="">
                                         </a>
                                    </div>
                        </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Titulo Noticia 2 </h5>
                                        </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Titulo Noticia 3 </h5>
                                        </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 4</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 5 </h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
                            </div>

                            <div class="noticia-card card">
                            <a href="#">
                                <img class="card-img-top" src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" 
                                alt="Card image cap">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Noticia 6</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            
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
    </div>
    <?php include 'templates/footer.php';?>

    <!--Slick JS-->
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.carousel').slick({
            slidesToShow: 3,
            dots: true,
            centerMode: true,
        });
    });
    </script>
</body>

</html>