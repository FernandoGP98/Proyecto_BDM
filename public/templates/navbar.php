<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light nav-logo">
    <div class="logo">
        <a class="" href="index.php">
            <h1>Noticias</h1>
        </a>
    </div>

    <div class="collapse navbar-collapse d-flex justify-content-end">
        <a class="mr-3 my-2 my-sm-0" href="redactar.php"><i class="fas fa-pen-fancy"></i></a>
        <a class="btn btn-outline-succes my-2 my-sm-0" href="login.php">Ingresar</a>
        <a class="btn btn-outline-succes my-2 my-sm-0" href="registrarse.php">Registrarse</a>
        <a class="btn btn-outline-succes my-2 my-sm-0" href="adminperfil.php">
            <img src="./image/no-imagen.jpg" class="nav-avatar" alt="">
        </a>
        <form class="form-inline my-2 my-lg-0" action="busqueda.php">
            <input id="search-bar" style="display: none" class="form-control mr-sm-2" type="search" placeholder="Buscar"
                aria-label="Search">
            <a id="search-btn" class="ml-md-2 mr-md-2" type="button" ><i class="fas fa-search"> </i></a>
        </form>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse mx-auto">
        <div class="container">
            <div class="row sections">
            <ul class="navbar-nav mr-auto secciones">
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion1 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion2 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion3 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion4 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion5 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion6 <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active col">
                    <a class="nav-link" href="#">Seccion7 <span class="sr-only"></span></a>
                </li>
            </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    $("#search-btn").click(function(){
        if ($("i").hasClass("fa-search")) {
            $(".fa-search").removeClass("fa-search").addClass("fa-times-circle");   
        }else{
            $(".fa-times-circle").removeClass("fa-times-circle").addClass("fa-search");
        }
        $("#search-bar").toggle("swing").show();
    });
</script>