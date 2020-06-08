<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="resources/css/reportero.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-md-4">
                <?php
                    if($reportero->imagen == null){
                ?>
                    <img style="object-fit: cover;" src="resources/image/user_icon.png"
                    width="50%" height="auto" alt="" id="avatarImg">
                <?php 
                }else{
                ?>
                    <img src="data:image/jpeg;base64,<?=base64_encode( $reportero->imagen)?>"
                        width="50%" height="auto" alt="" id="avatarImg">
                <?php } ?>
                <h2><?=$reportero->firma?></h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="temp">
                    <?php

                    for ($j=0; $j < ceil(count($noticias)/5); $j++) {
                    ?>
                    <div class="publicaciones">
                        <?php
                        $n=0;
                            for ($i=0; $i <= 4; $i++) {
                                if($n<count($noticias)){
                        ?>
                        <div class="post-outbox">
                            <div class="post-innerbox">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p><?= $noticias[$n]->fechaPublicacion ?></p>
                                    </div>
                                    <div class="col-md-4 p-1 d-flex justify-content-center">
                                        
                                            <img src="data:image/jpeg;base64,<?=base64_encode( $noticias[$n]->imagen)?>"
                                             width="auto" height="100px" alt="">
                                        
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <a href="noticia?id=<?= $noticias[$n]->id ?>">
                                            <h4 class="mb-1"><?= $noticias[$n]->titulo ?></h4>
                                        </a>
                                        <div>
                                            <p><?= $noticias[$n]->descripcion ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $n++;
                                }else{break;}
                        }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
    <!--Slick JS-->
    <script type="text/javascript" src="extras/slick/slick.min.js"></script>
    <script>
    $(function() {
        $('.temp').slick({
            slidesToShow: 1,
            dots: true,
            centerMode: true,
            arrows:false,
        });
    });
    </script>
</body>

</html>