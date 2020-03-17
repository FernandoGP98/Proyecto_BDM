<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/redactar.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="row d-flex justify-content-center">
        <div class="noticia-form">
            <h2>Redactar noticia</h2>
            <form action="">
                <label for="">Titulo</label>
                <input class="form-control" type="text" name="titulo" placeholder="Titulo">

                <label for="">Descripcion</label>
                <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion">

                <label for="">Nota</label>
                <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia">

                <label for="">Palabras clave</label>
                <input class="form-control" style="display:block; width:100%;" type="textarea" name="" id="">
                <div class="dropdown show" style="margin-top:15px;">
                    <button class="btn btn-drop dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Palabras
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Seccion1</a>
                        <a class="dropdown-item" href="#">Seccion2</a>
                        <a class="dropdown-item" href="#">Seccion3</a>
                    </div>
                </div>

                <label for="">Seccion</label>
                <div class="dropdown show">
                    <button class="btn btn-drop dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Secciones
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Seccion1</a>
                        <a class="dropdown-item" href="#">Seccion2</a>
                        <a class="dropdown-item" href="#">Seccion3</a>
                    </div>
                </div>

                <label for="">Lugar del acontecimiento</label>
                <div class="dropdown show">
                    <button class="btn btn-drop dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Estados
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tlaxcala</a>
                        <a class="dropdown-item" href="#">Rio bravo</a>
                        <a class="dropdown-item" href="#">Juarez, NL</a>
                    </div>
                </div>

                <label for="">Multimedia</label>
                <input type="file" name="multimedia" id="multimedia" class="input-multimedia">
                <label for="multimedia" class="btn"><i class="mr-2 fas fa-file-upload"></i>Multimedia</label>


                <div class="text-center">
                    <input class="mb-2 btn btn-submit" type="submit" value="Enviar">
                </div>

            </form>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
    <script>
    tinymce.init({
        selector: '#texto'
    });
    </script>
</body>

</html>