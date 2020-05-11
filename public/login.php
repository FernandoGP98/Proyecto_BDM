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
        <div class="contact-form">
            <h2>Ingresar</h2>
            <form action = "testRegistrar" method="post">
                <label>Email</label>
                <input class="form-control" type="text" name="email" placeholder="Ingrese su email">
                <label>Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">
                <div class="row">
                    <div class="col-md-6 text-center m-0 p-0">
                        <!--<a class="btn btn-primary mt-3" type="submit" name="" value="Ingresar"
                            href="perfil.php">Ingresar</a>-->
                            <input class="btn btn-primary mt-3" type="submit" name="" value="Ingresar">
                    </div>
                </div>
            </form>
            <br><a style="color:aliceblue" href="registrarse.php"><u>¿No tienes una cuenta? Registrate!</u></a><br>
        </div>
    </div>
    <!--
        NO SE QUE ES ESTO O PARA QUE ES //JAJAJ al registrarse le puse que se redireccionara al login y 
        nomas para checar puse que mandara una variable y aqui la pongo
        <p><?=$var?><p> 
    -->
    <p><?=$var?><p>
            <?php include 'templates/footer.php';?>
</body>

</html>