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

    <div class="container">
        <div class="row d-flex justify-content-md-center">
            <div class="col-md-10">
                <div class="noticia-form">
                    <h2>Redactar noticia</h2>
                    <form action="">
                        <label for="">Titulo</label>
                        <input class="form-control" type="text" name="titulo" placeholder="Titulo">
                        <br>
                        <label for="">Descripcion</label>
                        <!-- <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion"> -->
                        <textarea name="descripcion" class="form-control" placeholder="Descripcion" cols="30"
                            rows="5"></textarea>
                        <br>

                        <label for="">Nota</label>
                        <!-- <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia"> -->
                        <textarea id="texto" class="form-control" name="texto" id="" cols="30" rows="15"
                            placeholder="Noticia"></textarea>
                        <br>

                        <label for="">Lugar del acontecimiento</label>
                        <input class="form-control" style="display:block; width:100%;" type="textarea" name="lugar"
                            id="">

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
                        <div class="contenedor-imagenes" style="width: 100%;">
                            <label for="">Multimedia</label>
                            <input type="file" name="file" id="multimedia"
                                class="input-multimedia file form_nueva_receta" accept="image/*" required
                                style="width: 70%">
                            <label id="img_input" for="multimedia" class="btn"><i
                                    class="mr-2 fas fa-file-upload"></i>Multimedia</label>

                            <div class="img-carousel">
                                <div>
                                    <img class="img-slide" width="100%" height="512px" src="image/no-imagen.jpg" alt="First slide"
                                        id="primera">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input class="mb-2 btn btn-submit" type="submit" value="Enviar">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php include 'templates/footer.php';?>
        <script>
        tinymce.init({
            selector: '#texto'
        });
        </script>
        <script src="js/redactar.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script>
        $(function() {
            $('.img-carousel').slick({
                slidesToShow: 1,
                dots: true,
                centerMode: true,
            });
        });
        </script>
</body>

</html>