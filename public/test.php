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
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>

    <img src="data:image/jpeg;base64,<?=base64_encode($test->imagen)?>" class="nav-avatar" alt="no carga">

</body>
</html>