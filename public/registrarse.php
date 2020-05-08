<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <script src="resources/js/registro.js"></script>
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="row d-flex justify-content-center">
        <div class="loginBackground">
        </div>
        <div class="contact-form">
            <h2>Registrate</h2>
            <form action="registrarUsuario" method="post">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" placeholder="Ingrese su email" id="email">

                <label for="firma">Firma</label>
                <input class="form-control" type="text" name="username" placeholder="Ingrese su nombre de usuario"
                    id="firma">

                <label for="contraseña">Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña"
                    id="contraseña">

                <div class="info-registro">
                    <small>La contraseña debe contener un letra mayuscula, una letra minuscula y
                        un numero</small>
                </div>

                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingrese su nombre" id="nombre">
                <label for="ApP">Apellido Paterno</label>
                <input class="form-control" type="text" name="ApPaterno" placeholder="Ingrese su apellido paterno"
                    id="ApP">
                <label for="ApM">Apellido Materno</label>
                <input class="form-control" type="text" name="ApMaterno" placeholder="Ingrese su apellido materno"
                    id="ApM">

                <label for="Tel">Telefono</label>
                <input class="form-control" type="numeric" name="telefono" placeholder="Ingrese su telefono"
                    id="Tel">

                <br><input class="mb-2 btn btn-primary" type="submit" value="Registrarse" id="registro"><br>

                <a style="color:aliceblue" href="login.php"><u>¿Ya tienes una cuenta? Inicia Sesion!</u></a><br>

            </form>
            <br>
        </div>
    </div>
    <?php if (isset($response) ){ ?>
    <p><?=$response?></p>
    <?php } ?>
    <?php if (isset($ejPost) ){ ?>
    <p>Este es la firma <?=$ejPost?></p>
    <?php } ?>
    <?php include 'templates/footer.php';?>
</body>

</html>