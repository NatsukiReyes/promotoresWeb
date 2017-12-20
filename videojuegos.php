<!DOCTYPE html>
   <head>
        <title>TMTV/Videojuegos</title>
        <link rel="shorcut icon" href="imagenes/icons/logo.jpg" type="image/x-icon">
    </head>

        <?php include("menu.php"); ?>

         <section id="banner">
            <?php include("slider.php"); ?>
         </section>
         
        <section>
            <?php include("aside.php"); ?>
        </section>

    <div class="titulo_seccion">
        <h3><b>Videojuegos</b></h3>
         <section id="noticia">
               <?php 
                include "script/php/ConexionPDO.php";
                $conn = new ConexionPDO();
                $sql="SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='videojuegos' ORDER BY id_noticia DESC";  
                
                if ($conn -> realizarConexion()) {
                    $resultado = $conn -> hacerConsulta($sql);
                   
                    foreach ($resultado as $valores) {   
                        ?>
                        <article class="noticia_dos">
                            <article class="noticia">
                                <span class="fecha">
                                    <img src="imagenes/icons/fecha.png" alt="Fecha" class="ima"><?php echo $valores['fecha'];?>
                                </span>
                                <span class="tipo">
                                    <img src="imagenes/icons/tipo.png" alt="Tipo" class="ima"><?php echo $valores['nombre'];?>
                                </span>
                                <span class="vista">
                                    <img src="imagenes/icons/vista.png" alt="Vistas" class="ima"><?php echo $valores['vistas'];?>
                                </span>
                                <figure>
                                    <img src="admin/imagenes/<?php echo $valores['imagen']; ?>" alt="natsuki" width="300px">
                                </figure>
                                <h2>
                                    <?php echo $valores['titulo']; ?>
                                </h2>
                                <p>
                                   <?php 
                                        $cadena=$valores['descripcion'];
                                        if(strlen($cadena) > 20){
                                        $cadena = substr($cadena,0,150)."...";
                                        } 
                                        echo $cadena;
                                    ?>
                                </p>
                                <p class="fuente">
                                   <b>Fuente: </b><?php echo $valores['fuente']; ?>
                                </p>
                            </article>
                        
                            <a class="leer_mas" href="ver_noticia.php?id=<?php echo $valores['id_noticia']; ?>">Leer mas</a>
                        </article>
                <?php
                    }
                } else {
                echo "Conexion no exitosa";
                }
                ?>
        </section>    
    </div>
             
<?php include("footer.php"); ?>     
    </body>
</html>