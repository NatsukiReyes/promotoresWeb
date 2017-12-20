<!DOCTYPE html>
<html lang="es">
   <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Transmedia TV</title>
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1,maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/estilo_noticias.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">        
        <script src="js/jquery-3.1.0.min.js"> </script>
        <script src="js/jquery-ui.min.js"> </script>
        <script src="js/modernizr-custom.js"></script><!--Para que el sitio funcione en todos los navegadores-->
        <link rel="shorcut icon" href="imagenes/icons/logo.jpg" type="image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        
        <script>
            $('document').ready(function(){
                $('#buscar').autocomplete({

                    source : 'ajax.php'

                });
            });
        </script>
    </head>

	<body>





    <?php 

    include('incluir/conexion.php');

    if (isset($_POST['buscar'])) {
        $db = new conexion2();
        $filtro = $db->real_escape_string($_POST['buscar']); 
        $sql = $db->query("SELECT * FROM noticias WHERE titulo LIKE '%$filtro%' ");
        $db->query("SET NAMES 'utf8'");  
        echo "<br /><br /><br />";


        if ($db->rows($sql) > 0) {
            while($noticia = $db->recorrer($sql)){
                

        ?>   

        <div class="result">
            <div class="imagen_result">
                <img src="admin/imagenes/<?php echo $noticia['imagen']; ?>" alt="error" width="200px">
            </div>
            <div class="titulo_result">
                <a class="leer" href="ver_noticia.php?id=<?php echo $noticia['id_noticia']; ?>"> <?php echo $noticia['titulo']; ?> </a>
            </div> 
        </div>    

        <?php     
                  }
        }else{
            ?>
                <h2 class="titulo_no">No se encontraron resultados</h2>
            
            <?php
        }      
        

    }else{
        echo "";
    }

    ?>



        <header>
            <div class="contenedor">
                <img src="imagenes/icons/logo.png">
                <input type="checkbox" id="menu-bar">
                <label class="icon-menu" for="menu-bar"></label>
                <nav class="menu">
                    <a class="inicio" href="index.php" id="inicio">Inicio</a>
                    <a class="noticias" href="noticias.php">Noticias</a>
                    <a class="goForward" href="goForward.php">GoForward</a>
                    <a class="videojuegos" href="videojuegos.php">Videojuegos</a>
                    <a class="musica" href="musica.php">Música</a>
                    <a class="viral" href="viral.php">Viral</a>
                    <a class="espectaculos" href="espectaculos.php">Espectáculos</a>
                    <a class="admin" href="admin/login.php">Admin</a>
                    <a class="buscar" href="#">
                        <form id="busqueda" action="" method="POST">
                            <input id="buscar" type="text" name="buscar" placeholder="Busca una noticia" />
                            <input type="submit" name="" value="Buscar">
                        </form>
                    </a>
                </nav>
            </div>
        </header>