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
                            <?php foreach ($portada as $item) {
                                $nota = new Noticia();
                                $nota = $item;
                                if($nota->destacada == 1){
                            ?>
                            <div class="noticia-card card destacado">
                                <a href="noticia?id=<?=$nota->id?>">
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>"
                                        alt="Card image cap">


                                    <div class="card-body">

                                        <h5 class="card-title"><?=$nota->titulo?></h5>

                                        <p class="card-text"><?=$nota->descripcion?></p>

                                        <div>
                                            <small><?=$nota->palabraNombre?></small>
                                        </div>
                                    </div>
                                    <div class="card-img-overlay">
                                        <img class="image-destacado" src="./resources/image/ultimo_momento_02.png"
                                            alt="" srcset="">
                                    </div>
                                </a>
                            </div>
                            <?php  }else{
                            ?>

                            <div class="noticia-card card">
                                <a href="noticia?id=<?=$nota->id?>">
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>"
                                        alt="Card image cap">

                                    <div class="card-body">

                                        <h5 class="card-title"><?= $nota->titulo ?> </h5>

                                        <p class="card-text"><?= $nota->descripcion ?></p>

                                        <div>
                                            <small><?=$nota->palabraNombre?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                }
                            } 
                            ?>
                        </div>
                    </div>
                </div>
                <hr class="inSection">
            </div>
        </div>
        <?php
        if($_SESSION['secciones']!=NULL){
            for ($i=0; $i < count($_SESSION['secciones']); $i++) { 
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <hr class="nextSection" style="border: 2px solid #<?= $_SESSION['secciones'][$i]['color'] ?>;">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?= $_SESSION['secciones'][$i]['nombre'] ?></h2>
                    </div>
                </div>
                <hr class="inSection" style="border: 1px solid #<?= $_SESSION['secciones'][$i]['color'] ?>;">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="carousel">
                            <?php foreach ($noticias as $item) {
                                $nota = new Noticia();
                                $nota = $item;
                                if($nota->seccion == $_SESSION['secciones'][$i]['id']){
                                    if($nota->destacada == 1){
                            ?>
                            <div class="noticia-card card destacado">
                                <a href="noticia?id=<?=$nota->id?>">
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>"
                                        alt="Card image cap">


                                    <div class="card-body">

                                        <h5 class="card-title"><?=$nota->titulo?></h5>

                                        <p class="card-text"><?=$nota->descripcion?></p>

                                        <div>
                                            <small><?="".$nota->palabraNombre?></small>
                                        </div>
                                    </div>

                                    <div class="card-img-overlay">
                                        <img class="image-destacado" src="./resources/image/ultimo_momento_02.png"
                                            alt="" srcset="">
                                    </div>
                                </a>
                            </div>
                            <?php  }else{
                            ?>

                            <div class="noticia-card card">
                                <a href="noticia?id=<?=$nota->id?>">
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>"
                                        alt="Card image cap">

                                    <div class="card-body">

                                        <h5 class="card-title"><?= $nota->titulo ?> </h5>

                                        <p class="card-text"><?= $nota->descripcion ?></p>

                                        <div>
                                            <small><?=$nota->palabraNombre?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                }} 
                            } 
                            ?>

                        </div>
                    </div>
                </div>
                <hr class="inSection" style="border: 0.2px solid #<?= $_SESSION['secciones'][$i]['color'] ?>;">
            </div>
        </div>
        <?php
            }    
        }
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <hr class="nextSection">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Firmas</h2>
                    </div>
                </div>
                <hr class="inSection">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="carousel">
                            <?php
                            foreach ($firmas as $us) {
                                $usuario = new Usuario();
                                $usuario = $us;
                                if(isset($_SESSION['usuario'])){
                                    if($usuario->id==$_SESSION["usuario"]["id_Usuario"]){
                                    break;
                                    }
                                }                          
                            ?>
                            <div class="noticia-card card">
                                <a href="reportero?id=<?=$usuario->id?>">

                                    <?php
                                        if($usuario->imagen == null){
                                    ?>
                                    <img style="object-fit: cover;" src="resources/image/user_icon.png"
                                        class="card-img-top" alt="Card image cap">
                                    <?php 
                                    }else{
                                    ?>
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?=base64_encode( $usuario->imagen)?>"
                                        style="object-fit:cover;" alt="Card image cap">
                                    <?php } ?>

                                    <div class="card-body">
                                        <h5 class="card-title"><?= $usuario->firma ?></h5>
                                    </div>
                                </a>
                            </div>
                            <?php
                            }
                            ?>
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