<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php include 'templates/navbar.php';?>
    <div class="row d-flex justify-content-center">
        <div class="loginBackground">
        </div>
        <div class="contact-form">
            <h2>Ingresar</h2>
            <label>Email</label>
            <input class="form-control" type="text" name="email" placeholder="Ingrese su email">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">
            <div class="row">
                <div class="col-md-6 text-center m-0 p-0">
                    <input class="btn btn-primary mt-3" type="submit" name="" value="Ingresar">
                </div>
                <div class="col-md-6 text-center">
                    <div class="pt-4">
                        <input type="checkbox" id="recordar" name="recordar">
                        <label for="recordar">Recordar me</label>
                    </div>
                </div>
            </div>
            <br><a style="color:aliceblue" href="/Registro"><u>¿No tienes una cuenta? Registrate!</u></a><br>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>

</html>