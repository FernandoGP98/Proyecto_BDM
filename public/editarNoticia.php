<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <!-- MIS LINKS-->
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
                    <form action="noticiaRegistro" method="POST" id="formNota">
                        <label for="">Titulo</label>
                        <input class="form-control" type="text" name="titulo" placeholder="Titulo" 
                        id="" value="<?= $nota->titulo ?>">
                        <br>
                        <label for="">Descripcion</label>
                        <!-- <input class="form-control" type="textarea" name="descripcion" placeholder="Descripcion"> -->
                        <textarea name="descripcion" class="form-control" placeholder="Descripcion" cols="30" id=""
                            rows="5"><?= $nota->descripcion ?></textarea>
                        <br>

                        <label for="">Nota</label>
                        <!-- <input id="texto" class="form-control" type="textarea" name="texto" placeholder="Noticia"> -->
                        <textarea id="texto" class="form-control" name="texto" id="" cols="30" rows="15"
                            placeholder="Noticia"><?= $nota->texto ?></textarea>
                        <br>

                        <label for="">Lugar del acontecimiento</label>
                        <input class="form-control" style="display:block; width:100%;" type="textarea" name="lugar"
                        id="" value="<?= $nota->lugar ?>">

                        <label for="">Fecha de Acontesimiento</label>
                        <input class="form-control" style="display:block; width:100%;" type="date" name="fecha"
                        id="" value="<?= $nota->fechaAcontesimiento ?>">                        

                        <label for="">Seccion</label>
                        <div class="dropdown show">
                            <button class="btn btn-drop dropdown-toggle" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Secciones
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php
                                    if(isset($_SESSION['secciones'])){
                                        for ($i=0; $i < count($_SESSION['secciones']); $i++) { 
                                    ?>
                                    <a class="dropdown-item" href="#"><?= $_SESSION['secciones'][$i]['nombre']?></a>
                                <?php 
                                    }
                                }
                                ?>
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
                            <?php
                            if($palabras != null){
                                    foreach ($palabras as $item) {
                                        $palabra = new Seccion();
                                        $palabra = $item;
                                ?>
                                <a class="dropdown-item" href="#"><?= $palabra->PalabraClave?></a>
                                <?php
                                }
                            }
                                ?>
                            </div>
                        </div>
                        <div class="contenedor-imagenes" style="width: 100%;">
                            <label for="">Imagenes</label>
                            <input type="file" name="fileImagenes[]" id="multimedia"
                                class="input-multimedia" accept="image/*" required
                                style="width: 70%">
                            <label id="img_input" for="multimedia" class="btn"><i
                                    class="mr-2 fas fa-file-upload"></i>Imagenes</label>

                            <div class="img-carousel">
                                <div>
                                    <img class="img-slide" width="100%" height="512px" src="resources/image/no-imagen.jpg" alt="First slide"
                                        id="primera">
                                </div>
                            </div>
                        </div>

                        <div id="imagenes-input">
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
                        </div>
                        

                        <input type="text" value="<?=$nota->autor?>" name="autor">
                        <input type="text" value="1" name="estatus" id="estatusNota">
                        <div class="text-center">
                            <input class="mb-2 btn btn-submit" type="button" value="Terminar" id="terminarNota"></input>
                            <input class="mb-2 btn btn-submit" type="button" value="Guardar" id="guardarNota">
                        </div>

                    </form>
                </div>
            </div>
            <div id=anterior hidden>
                <?= $nota->texto ?>
            </div>
        </div>
        <?php include 'templates/footer.php';?>
        <script>
        tinymce.init({
            selector: '#texto',
            setup: function(editor) {
                editor.on('init', function() {
            });
            }
        });

        //tinymce.activeEditor.setContent('<span>algo mas</span>');
        </script>
        <script src="js/redactar.js"></script>
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