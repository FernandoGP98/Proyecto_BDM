<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/redactar.css">
    <script src="js/redactar.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
            <div class="noticia-form">
            <h2>Redactar noticia</h2>
            <form action="">
                <label for="">Titulo</label>
                <input class="form-control" type="text" name="titulo" placeholder="Titulo">
                <br>
                <label for="">Descripcion</label>
                <!-- <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion"> -->
                <textarea name="descripcion" class="form-control" placeholder="Descripcion" cols="30" rows="5"></textarea>
                <br>        

                <label for="">Nota</label>
                <!-- <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia"> -->
                <textarea id="texto" class="form-control" name="texto" id="" cols="30" rows="15" placeholder="Noticia"></textarea>
                <br>

                <label for="">Lugar del acontecimiento</label>
                <input class="form-control" style="display:block; width:100%;" type="textarea" name="lugar" id="">

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

                <label for="">Multimedia</label>
                <input type="file" name="multimedia" id="multimedia" class="input-multimedia">
                <label for="multimedia" class="btn"><i class="mr-2 fas fa-file-upload"></i>Multimedia</label>


                <!--
                
                <div class="contenedor-imagenes" style="width: 100%;">



                    <img class="d-block w-100" src="image/no-imagen.jpg" alt="First slide" id="primera">
                    <input type="file" name="image" class="file form-control form_nueva_receta" accept="image/*" id="img_input" required style="width: 70%">
                    <i class="fas fa-plus-square fa-2x"></i>
                    <br><br>
                </div>  

                -->

                <div class="text-center">
                    <input class="mb-2 btn btn-submit" type="submit" value="Enviar">
                </div>

            </form>
            </div>
            
        </div>
        <div class="col-2"></div>
    </div>
    <?php include 'templates/footer.php';?>
    <script>
    tinymce.init({
        selector: '#texto'
    });
    </script>
</body>

</html>