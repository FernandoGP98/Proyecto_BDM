<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/noticia.css">
    <script src="js/noticia.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="encabezado col-md-12 text-center">
                <h1>Titulo</h1>
                <hr>
                <h2>Descripcion</h2>
                <hr>
            </div>
        </div>
        <?php
        if(true){
        ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="https://imagenes.milenio.com/iD4EjdR_INry5ysU_NR7_o1SpJg=/958x596/https://www.milenio.com/uploads/media/2020/03/05/personas-sin-sintomas-de-coronavirus_0_41_958_595.jpg"
                    alt="" srcset="">
            </div>
        </div>
        <?php
        }
        ?>
        <div class="contenido-nota pt-md-3">
            <div class="row">
                <div class="contenido col-md-12">
                    <span class="autor">
                        Yo mero
                    </span>
                    <div class="fecha_creacion">
                        <p>
                            Nuevo Leon / 06.03.2020 14:43
                        </p>
                    </div>
                    <div class="nota">
                        <p>El titular de la <b>Comisión Coordinadora de Institutos Nacionales de Salud y Hospitales de
                                Alta
                                Especialidad (CCINSHAE), Gustavo Reyes Terán,</b> señaló que el uso de cubrebocas es
                            únicamente para el personal de salud y pacientes diagnosticados con el nuevo <b
                                style="color: rgb(31, 73, 125);"><a
                                    href="https://www.milenio.com/buscador?text=coronavirus">coronavirus</a></b>.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="seccion col-md-12">
                    <p><b>Seccion: </b>
                        <a class="mr-3" href="">Nacional</a>
                </div>
            </div>

            <div class="row">
                <div class="palabras-clave col-md-12">
                    <p><b>Tags relacionados: </b>
                        <a class="mr-3" href="">Coronavirus</a>
                        <a class="mr-3" href="">Palabra2</a>
                        <a class="mr-3" href="">Palabra3</a>
                        <a class="mr-3" href="">Palabra4</a></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-1 text-center">
                    <p class="like-text">0001</p> 
                </div>
                <div class="col-md-10">
                    <img class="like" src="image/Like_gray.png" width="50px" height="50px" like="0" alt="">
                    <img class="like" src="image/Like_gray.png" width="50px" height="50px" like="1" alt="">
                </div>
            </div>
            <div class="row">
                <div class="card comentarios">
                <div class="card-header">
                    <h4 class="text-center">Comentarios</h4>
                </div>
                <div class="col-md-12">
                    <br>
                    
                    <div class="comentarios-in">

                    <?php
                    for ($i=0; $i < 2; $i++) { 
                    ?>
                        <div class="row">
                            <div class="col-2">
                                <img class="avatar" src="image/no-imagen.jpg" alt="..." >
                                <p><span class="username">Nombre Usuario</span> </p>
                                <small class="fecha">19-03-2020</small>
                            </div>
                            <div class="col">
                                <p class="comentario-publicado" id="comentario-publicado">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
                            </div>
                        </div>
                        <hr>

                    <?php
                        } 
                    ?>
                    </div>


                    <div class="card-header">
                        <h5 class="text-center">Comentar</h5>
                    </div>
                    <form action="" method="post">
                        <textarea name="NuevoComentario" id="NuevoComentario" cols="30" rows="5"  placeholder="Opina algo sobre el tema"></textarea>
                        <!-- <input type="submit" value="Comentar"> -->
                        <br>
                        <button class="mb-2 btn btn-submit"  type="submit">Comentar</button>
                        <img src="image/no-imagen.jpg" class="avatar" alt="">
                    </form>
                    <!--
                    <div class="row">
                        <div class="col-md-1 pl-4 pr-2 text-md-right">
                            <img src="" alt="..." width="40px" height="auto">
                        </div>
                        <div class="col-md-11 pl-0 pr-5">
                            <p style="margin-bottom:3px; font-weight:bold">Soi io</p>
                            <p>Crack</p>
                        </div>
                    </div>
                    -->

                </div>
                </div>                
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>

</html>