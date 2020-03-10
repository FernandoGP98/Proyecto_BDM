<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/noticia.css">
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
                    001
                </div>
                <div class="col-md-10">
                    <a class="btn btn-outline-primary">Me gusta</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <input style="width:90%;" type="text" name="" id="">
                        <input type="submit" value="Comentar">
                    </form>
                    <div class="row">
                        <div class="col-md-1 pl-4 pr-2 text-md-right">
                            <img src="" alt="..." width="40px" height="auto">
                        </div>
                        <div class="col-md-11 pl-0 pr-5">
                            <p style="margin-bottom:3px; font-weight:bold">Soi io</p>
                            <p>Crack</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>

</html>