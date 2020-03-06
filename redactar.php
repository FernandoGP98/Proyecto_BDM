<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="row d-flex justify-content-center">
        <div class="loginBackground">
        </div>
        <div class="noticia-form">
            <h2>Redactar noticia</h2>
            <form action="">
                <label for="">Titulo</label>
                <input class="form-control" type="text" name="titulo" placeholder="Titulo">

                <label for="">Descripcion</label>
                <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion">

                <label for="">Nota</label>
                <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia">

                <label for="">Seccion</label>
                <div class="dropdown show">
                    <button class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Seccion1</a>
                        <a class="dropdown-item" href="#">Seccion2</a>
                        <a class="dropdown-item" href="#">Seccion3</a>
                    </div>
                </div>

                <label for="">Lugar del acontecimiento</label>
                <div class="dropdown show">
                    <button class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tlaxcala</a>
                        <a class="dropdown-item" href="#">Rio bravo</a>
                        <a class="dropdown-item" href="#">Juarez, NL</a>
                    </div>
                </div>

                <button class="mb-2 btn btn-primary">Agregar multimedia</button>

                <br><input class="mb-2 btn btn-primary" type="submit" value="Enviar"><br>

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
