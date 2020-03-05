<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <script src='https://cdn.tiny.cloud/1/ukoj36fo193sh402uog0h7rdpbf2k1s59f178gsgpw6jhayi/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <!--load styles -->
    <link rel="stylesheet" href="css/index.css">

    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <!--Fonst Awesome (Iconos, ejemplo F de facebook)-->
    <link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
</head>
<body>
    <?php include 'templates/navbar.php';?>

<div class="container">
    <div class="row">
        <h1>Redactar</h1>

    </div>
    <div class="row">
        <div class="col-12">
        <form action="perfil.php" class="form-group">
    <textarea id="mytextarea" name="mytextarea" rows="20" cols="100">Hello, World!</textarea>
    <input type="submit" value="Send">
        </div>
    
  </form>
    </div>
</div>



</body>
</html>
