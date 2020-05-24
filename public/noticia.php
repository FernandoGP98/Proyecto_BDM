<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia</title>
    <?php include 'links.php';?>
    <script src="resources/js/noticia.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="encabezado col-md-12 text-center">
                <h1><?=$nota->titulo?></h1>
                <hr>
                <h2><?=$nota->descripcion?></h2>
                <hr>
            </div>
        </div>
        <?php
        if(true){
        ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="img-carousel">
                    <?php
                        foreach ($imagenes as $item) {
                            $notaI = new Imagen();
                            $notaI = $item;
                        
                    ?>
                    <img class="img-slide imagenNoticia" width="100%" height="512px"
                        src="data:image/jpeg;base64,<?=base64_encode($notaI->imagen)?>">
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="contenido-nota pt-md-3">
            <div class="row">
                <video src="<?=$nota->video?>" width=100% height=540 controls poster="vistaprevia.jpg">
                </video>
            </div>
        </div>


        <div class="contenido-nota pt-md-3">
            <div class="row">
                <div class="contenido col-md-12">
                    <span class="autor">
                        <?=$nota->firma?>
                    </span>
                    <div class="fecha_creacion">
                        <p>
                            <?=$nota->lugar?> / <?=$nota->fechaAcontesimiento?>
                        </p>
                    </div>
                    <div class="nota">
                        <?=$nota->texto?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="seccion col-md-12">
                    <p><b>Seccion: </b>
                        <a class="mr-3" href="seccion?id=<?=$nota->seccion?>"><?=$nota->nombreSeccion?></a>
                </div>
            </div>

            <div class="row">
                <div class="palabras-clave col-md-12">
                    <p><b>Tags relacionados: </b>
                        <small><?=$nota->palabraNombre?></small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1 text-center">
                    <p class="like-text">0001</p>
                </div>
                <div class="col-md-10">
                    <img class="like" src="resources/image/Like_gray.png" width="50px" height="50px" like="0" alt="">
                    <img class="like" src="resources/image/Like_gray.png" width="50px" height="50px" like="1" alt="">
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <hr class="nextSection">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Noticias relacionadas</h2>
                        </div>
                    </div>
                    <hr class="inSection">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="carousel">
                                <?php
                        foreach ($relevantes as $item) {
                            $relevante = new Noticia();
                            $relevante = $item;
                            if($nota->id != $relevante->id){
                        ?>
                                <div class="noticia-card card">
                                    <a href="noticia.php">
                                        <img class="card-img-top"
                                            src="data:image/jpeg;base64,<?=base64_encode($relevante->imagen)?>"
                                            alt="Card image cap">

                                        <div class="card-body">

                                            <h5 class="card-title"><?= $relevante->titulo ?> </h5>

                                            <p class="card-text"><?= $relevante->descripcion ?></p>
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

            <div class="row">
                <div class="card comentarios" style="width: 100%">
                    <div class="card-header">
                        <h4 class="text-center">Comentarios</h4>
                    </div>
                    <div class="col-md-12">
                        <br>

                        <div class="comentarios-in">

                            <?php
                            foreach ($comentarios as $item) {
                            $comentario = new Comentario();
                                $comentario = $item;
                    ?>
                            <div class="comentarios">
                                <div class="row">
                                    <div class="col-2">
                                        <?php
                                        if($comentario->imagen == null){
                                            //echo $_SESSION["usuario"]["imagen"];
                                    ?>
                                        <img class="avatar" src="resources/image/no-imagen.jpg" alt="...">
                                        <?php 
                                    }else{
                                    ?>
                                        <img class="avatar"
                                            src="data:image/jpeg;base64,<?=base64_encode($comentario->imagen)?>"
                                            alt="...">
                                        <?php } ?>

                                        <p><span class="username"><?=$comentario->usuario?></span> </p>
                                        <small class="fecha"><?=$comentario->fecha?></small>
                                    </div>
                                    <div class="col">
                                        <p class="comentario-publicado" id="comentario-publicado">
                                            <?=$comentario->comentario?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                    if(isset($_SESSION['usuario'])){
                                        if($_SESSION['usuario']['id_Usuario'] == $nota->autor || $_SESSION['usuario']['tipoUsuario'] == $nota->autor){
                                ?>
                                <div class="row">
                                    <button class="mb-1 btn btn-submit btn-eliminar-comentario"><i
                                            class="fas fa-trash-alt"></i></button>
                                </div>
                                <?php
                                    }}
                                ?>
                                <hr>
                            </div>
                            <?php
                        } 
                    ?>
                        </div>

                        <?php
                            if(isset($_SESSION['usuario'])){
                        ?>
                        <div class="card-header">
                            <h5 class="text-center">Comentar</h5>
                        </div>
                        <form action="comentario" method="post">
                            <textarea name="NuevoComentario" id="NuevoComentario" cols="30" rows="5"
                                placeholder="Opina algo sobre el tema"></textarea>
                            <!-- <input type="submit" value="Comentar"> -->
                            <br>
                            <input type="hidden" name="idUsuario" id="" value="<?=$_SESSION['usuario']['id_Usuario']?>">
                            <input type="hidden" name="noticia" id="" value="<?=$nota->id?>">
                            <button class="mb-2 btn btn-submit" type="submit">Comentar</button>
                            <img src="data:image/jpeg;base64,<?=base64_encode( $_SESSION["usuario"]["imagen"])?>"
                                class="avatar" alt="">
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>



    <script type="text/javascript" src="extras/slick/slick.min.js"></script>
    <script>
    $(function() {
        $('.img-carousel').slick({
            slidesToShow: 1,
            dots: true,
            centerMode: true,
        });
    });

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