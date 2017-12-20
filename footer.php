 <footer>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=125370314514186";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<div class="content_footer">

    <div class="contenedor_un">
        <p class="ult_n_p">NOTICIAS EN IMAGENES</p>
        <br><br>
            <?php 
                $sql="SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria ORDER BY id_noticia DESC LIMIT 8";  
            
                if ($conn -> realizarConexion()) {
                    $resultado = $conn -> hacerConsulta($sql);
                    foreach ($resultado as $valores) {   
                        ?>
                            <figure class="iman">
                                <a class="ult_n" href="ver_noticia.php?id=<?php echo $valores['id_noticia'];?>">
                                    <img class="img" src="admin/imagenes/<?php echo $valores['imagen']; ?>" alt="natsuki" width="100%"></a>
                            </figure>
                    <?php
                    }
                } else {
                    echo "Conexion no exitosa";
                }
            ?>  
    </div>

    <div class="contenedor_un">
       <p class="ult_n_p">SIGUENOS</p>
        <div class="sociales">
            <a class="icon-facebook" href="https://www.facebook.com/TransmediaCanalTV/?fref=ts"></a>
            <a class="icon-twitter" href="https://twitter.com/transmedia_tv"></a>
            <a class="icon-instagram" href="#"></a> 
            <a class="you" href="https://www.youtube.com/channel/UCamVirfhzebgHrb_8SjMHxw">YouTube</a> 
        </div>
    </div>



    <div class="contenedor_un">
        <p class="ult_n_p">ULTIMAS NOTICIAS</p>
            <?php 
                $sql="SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria ORDER BY id_noticia DESC LIMIT 9";  
            
                if ($conn -> realizarConexion()) {
                    $resultado = $conn -> hacerConsulta($sql);
                    foreach ($resultado as $valores) {   
                        ?>
                        <hr id="hr">
                            <h2>
                                <a class="ult_n" href="ver_noticia.php?id=<?php echo $valores['id_noticia'];?>"><?php echo $valores['titulo']; ?></a>
                            </h2>
                    <?php
                    }
                } else {
                    echo "Conexion no exitosa";
                }
            ?>  
    </div>

</div>

<br><br>
<hr id="hr">
 <p class="copy"> Transmedia TV &copy; 2016 </p>
 <p class="autor">Diseño y Desarrollo Web por Asociation (Natsuki & RayJa).</p>
</footer>

        