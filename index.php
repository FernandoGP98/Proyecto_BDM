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
    <title>Document</title>
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
                    <div class="col-8">
                        <div class="carousel">
                            <div>
                                <h1>1</h1>
                            </div>
                            <div>
                                <h1>2</h1>
                            </div>
                            <div>
                                <h1>3</h1>
                            </div>
                            <div>
                                <h1>4</h1>
                            </div>
                            <div>
                                <h1>5</h1>
                            </div>
                            <div>
                                <h1>6</h1>
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
                    <div class="col-8">
                        <div class="carousel">
                            
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>1</h1>
                            </div>
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>2</h1>
                            </div>
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>3</h1>
                            </div>
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>4</h1>
                            </div>
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>5</h1>
                            </div>
                            <div class="image">
                                <img class="noticia-image"
                                    src="https://steamuserimages-a.akamaihd.net/ugc/861733993522449241/B3D4C96B0DF8FD4EA077003BA4A9CA6A5414FA30/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true"
                                    alt="" srcset="">
                                <h1>6</h1>
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