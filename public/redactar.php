<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <script src="resources/js/redactar.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>

    <div class="container">
        <div class="row d-flex justify-content-md-center">
            <div class="col-md-10">
                <div class="noticia-form">
                    <h2>Redactar noticia</h2>
                    <form action="noticiaRegistro" method="POST" id="formNota" enctype="multipart/form-data">
                        <label for="">Titulo</label>
                        <input class="form-control" type="text" name="titulo" placeholder="Titulo" id="pTituto">
                        <br>
                        <label for="">Descripcion</label>
                        <!-- <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion"> -->
                        <textarea name="descripcion" class="form-control" placeholder="Descripcion" cols="30" id="pDescripcion"
                            rows="5"></textarea>
                        <br>

                        <label for="">Nota</label>
                        <!-- <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia"> -->
                        <textarea id="texto" class="form-control" name="texto"  cols="30" rows="15"
                            placeholder="Noticia"></textarea>
                        <br>

                        <label for="">Lugar del acontecimiento</label>
                        <input class="form-control" style="display:block; width:100%;" type="textarea" name="lugar"
                            id="pLugar">

                        <label for="">Fecha de Acontesimiento</label>
                        <input class="form-control" style="display:block; width:100%;" type="date" name="fecha"
                            id="pFecha" value="null">

                        <label for="">Seccion</label>
                        <select name="seccion" id="custom-busqueda" class="form-control">
                        <?php
                                if(isset($_SESSION['secciones'])){
                                    for ($i=0; $i < count($_SESSION['secciones']); $i++) { 
                                ?>
                                <option class="dropdown-item" value="<?= $_SESSION['secciones'][$i]['id']?>"><?= $_SESSION['secciones'][$i]['nombre']?></option>
                            <?php 
                                }
                            }
                            ?>
                        </select>

                        <label for="">Palabra clave</label>
                        <input class="form-control" style="display:block; width:100%;" type="text" 
                        name="nuevaPalabra" id="palabranueva" placeholder="Palabra..." hidden>

                        <select name="palabraClave" id="palabraClave" class="form-control">
                        <?php
                            if($palabras != null){
                                foreach ($palabras as $item) {
                                    $palabra = new Seccion();
                                        $palabra = $item;
                                ?>
                                <option value="<?=$palabra->id?>"><?= $palabra->PalabraClave?></option>
                            <?php
                            }
                        }
                        ?>
                        <option value="nueva" id="nuevaSelect"><i>Nueva Palabra</i></option>
                        </select>
                        <div class="contenedor-imagenes" style="width: 100%;">
                            <label for="">Imagenes</label>
                            
                            <input type="file" name="fileImagenes[]" id="multimedia"
                                class="input-multimedia" accept="image/*" required
                                style="width: 70%">

                            <label id="img_input" for="multimedia" class="btn"><i
                                    class="mr-2 fas fa-file-upload"></i>Imagenes</label>

                            <div class="img-carousel">

                            </div>

                        </div>

                        <div id="imagenes-input" hidden>
                            <small>Esto va HIDDEN al final, lo dejo por ahora, para asegurarme de que funciona</small>
                            <br>
                            Imagenes: <span id="contador">###</span>
                            <br>
                        </div>


                        <div>
                        <label for="">Video</label>
                            <input type="file" name="video" id="multimedia-v"
                                class="input-multimedia" accept="video/*" required
                                style="width: 70%">
                                <label id="video_input" for="multimedia-v" class="btn">
                                    <i class="mr-2 fas fa-file-upload"></i>
                                    Video
                                </label>
                                <video width="100%" height="512px" controls>
                                <source src="<?= $nota->video ?>" id="video_here">
                                    Your browser does not support HTML5 video.
                                </video>                                                     
                        </div>
                        

                        <input type="text" value="<?=$_SESSION["usuario"]["id_Usuario"]?>" name="autor" hidden>
                        <input type="text" value="1" name="estatus" id="estatusNota" hidden>
                        <div class="text-center ">
                            <input class="mb-2 btn btn-submit" type="button" value="Terminar" id="terminarNota" hidden>
                            <input class="mb-2 btn btn-submit" type="button" value="Guardar" id="guardarNota" hidden>
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
        <script type="text/javascript" src="extras/slick/slick.min.js"></script>
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