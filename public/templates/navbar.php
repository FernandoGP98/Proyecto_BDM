<?php
    if(session_status() != 2){
        session_start();
    }
    //session_start();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light nav-logo">
    <div class="logo">
        <a class="" href="home">
            <h1>Noticias</h1>
        </a>
    </div>

    <div class="collapse navbar-collapse d-flex justify-content-end">
        <?php
        if(isset($_SESSION['usuario'])){
            if(($_SESSION['usuario']['tipoUsuario']==2)){
        ?>
        <a class="mr-3 my-2 my-sm-0" href="redactar"><i class="fas fa-pen-fancy"></i></a>
        <?php }} ?>
        <?php
            if(!isset($_SESSION['usuario'])){
        ?>
        <a class="btn_navLR btn btn-outline-succes my-2 my-sm-0" href="login">Ingresar</a>
        <a class="btn_navLR btn btn-outline-succes my-2 my-sm-0" href="registrarse">Registrarse</a>
        <?php } ?>
        <?php
            if(isset($_SESSION['usuario'])){
        ?>
        <a class="btn btn-outline-succes my-2 my-sm-0" href="perfil?id=<?=$_SESSION["usuario"]["id_Usuario"]?>">
            <?=( $_SESSION["usuario"]["firma"])?>
        </a>
        <a class="btn btn-outline-succes my-2 my-sm-0" href="perfil?id=<?=$_SESSION["usuario"]["id_Usuario"]?>">
            <?php
                if($_SESSION["usuario"]["imagen"] == null){
            ?>
            <img src="resources/image/no-imagen.jpg" class="nav-avatar" alt="no avatar">
            <?php 
            }else{
            ?>
            <img src="data:image/jpeg;base64,<?=base64_encode( $_SESSION["usuario"]["imagen"])?>" class="nav-avatar" alt="no cargo">
            <?php } ?>
            
        </a>
        <?php } ?>
        <form class="form-inline my-2 my-lg-0" action="busqueda" method="GET">
            <input id="search-bar" style="display: none" class="form-control mr-sm-2" type="search" placeholder="Buscar"
                aria-label="Search" name="texto">
            <a id="search-btn" class="ml-md-2 mr-md-2" type="button"><i class="fas fa-search"> </i></a>
        </form>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse mx-auto">
        <div class="container">
            <div class="row sections">
                <ul class="navbar-nav mr-auto secciones text-center" style="width: 100%">
                    <?php
                    if(isset($_SESSION['secciones'])){
                        for ($i=0; $i < count($_SESSION['secciones']); $i++) {
                    ?>
                    <li class="nav-item active col" style="background-color: #<?= $_SESSION['secciones'][$i]['color']?>">
                        <a class="nav-link" href="seccion?id=<?=$_SESSION['secciones'][$i]['id']?>"><?= $_SESSION['secciones'][$i]['nombre']?> <span
                                class="sr-only"></span></a>
                    </li>
                    <?php 
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
$("#search-btn").click(function() {
    if ($("i").hasClass("fa-search")) {
        $(".fa-search").removeClass("fa-search").addClass("fa-times-circle");
    } else {
        $(".fa-times-circle").removeClass("fa-times-circle").addClass("fa-search");
    }
    $("#search-bar").toggle("swing").show();
});
</script>