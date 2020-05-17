<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        foreach ($notas as $row) {
            $noticia = new Noticia();
            $noticia = $row;
        
    ?>
        <div>
            <hr>
        <?= $noticia->id ?>
        <br>
        <?= $noticia->titulo ?>
        <br>
        <?= $noticia->fechaPublicacion ?>
        <br>
        <input type="date" name="" id="" value="<?= $noticia->fechaAcontesimiento ?>">
        <br>
        <?= $noticia->lugar ?>
        <br>
        <?= $noticia->descripcion ?>
        <br>
        <?= $noticia->texto ?>
        <br>
        <?= $noticia->destacada ?>
        <br>
        <?= $noticia->activa ?>
        <br>
        <?= $noticia->seccion ?>
        <br>
        <?= $noticia->status ?>
        <br>
        <?= $noticia->autor ?>
            <hr>
        </div>
    <?php 
    }
    ?>
</body>
</html>