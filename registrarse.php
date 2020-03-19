<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/registrar.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="row d-flex justify-content-center">
        <div class="loginBackground">
        </div>
        <div class="contact-form">
            <h2>Registrate</h2>
            <form action="">
                <label for="">E-mail</label>
                <input class="form-control" type="email" name="email" placeholder="Ingrese su email">

                <label for="">Nick</label>
                <input class="form-control" type="text" name="username" placeholder="Ingrese su nombre de usuario">

                <label for="">Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">

                <br><input class="mb-2 btn btn-primary" type="submit" value="Registrarse"><br>

                <a style="color:aliceblue" href="/Login"><u>¿Ya tienes una cuenta? Inicia Sesion!</u></a><br>

            </form>
            <br>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>

</html>