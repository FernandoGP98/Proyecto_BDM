<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="test_imagen" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="myFile[]"/><br>
        <input type="file" name="myFile[]"/><br>
        <input type="file" name="myFile[]"/><br>
        <br><br>
        <input type="file" name="video" accept="video/*"/><br>
        <input type="submit" name="submit" value="UPLOAD"/>
</form>
    <?php
        foreach ($imagenes as $item) {
            $nota = new Imagen();
            $nota = $item;
    ?>
        <img src="data:image/jpeg;base64,<?=base64_encode($nota->imagen)?>" class="nav-avatar" alt="no carga">
    <?php
    }
    ?>


    <?php
        if(isset($videos)){
        foreach ($videos as $item) {
            $nota = new Video();
            $nota = $item;
    ?>
        <div class="contenido-nota pt-md-3">
            <div class="row">
            <video src="<?=$nota->video?>" 
                width=100%  height=540 controls poster="vistaprevia.jpg">
            </video>
            </div>
        </div>
    <?php
        }
    }
    ?>
    
</body>
</html>