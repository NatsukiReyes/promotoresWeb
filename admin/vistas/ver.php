<?php 
	$controlador = new controladorNoticias();

	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	}else{
		header('location: index.php');
	}

 ?>
 


<section id="ver_admin_n">
    <article class="noticia_vn">
        <span class="fecha_vn">
            <img src="../imagenes/icons/fecha.png" alt="Fecha" class="ima"><?php echo $row['fecha'];?>
        </span>
        <span class="tipo_vn">
            <img src="../imagenes/icons/tipo.png" alt="Tipo" class="ima"><?php echo $row['nombre'];?>
        </span>
        <span class="vista_vn">
            <img src="../imagenes/icons/vista.png" alt="Vistas" class="ima"><?php echo $row['vistas'];?>
        </span>
        <figure>
            <img src="imagenes/<?php echo $row['imagen'];?>" alt="natsuki" width="300px">
        </figure>
        <h2><?php echo $row['titulo'];?></h2>
        <p><?php echo $row['descripcion'];?></p>
        <hr>
        <p><b>Fuente: </b><?php echo $row['fuente'];?></p>               
        <div id="botones-para-compartir">
            <p class="p_social"><b>Comparte en redes sociales</b></p>
            <a href="javascript:void(0);" onclick="window.open(&quot;http://www.facebook.com/sharer.php?u=URL_BLOG&quot;,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="compartir en facebook" class="facebooko" height="40" src="http://1.bp.blogspot.com/-rwK-4X3iLjc/ViFsOclr9NI/AAAAAAAABwc/ocBw9cxRK2M/s1600/facebook-long.png" title="compartir en facebook" width="40" /></a>
            <a href="javascript:void(0);" onclick="window.open(&quot;https://plus.google.com/share?url=URL_BLOG&quot;,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="compartir en google+" class="googleo" height="40" src="http://1.bp.blogspot.com/-SKqPlZHzLgg/ViFsOt7HbeI/AAAAAAAABw0/bQQhWqgEpWM/s1600/google-long.png" title="compartir en google+" width="40" /></a>
            <a href="javascript:void(0);" onclick="window.open(&quot;http://twitter.com/home?status=URL_BLOG&quot;,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="compartir en twitter" class="twittero" height="40" src="http://4.bp.blogspot.com/-gqVyoE8cVME/ViFsO009lbI/AAAAAAAABwo/1oK8cUnY36Q/s1600/twitter-long.png" title="compartir en twitter" width="40" /></a>
            <a href="javascript:void(0);" onclick="window.open(&quot;https://www.pinterest.com/pin/create/button/?url=URL:BLOG&quot;,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="compartir en pinterest" class="pinteresto" height="40" src="http://2.bp.blogspot.com/-YHRlPeWHV-I/ViFsO1cYtsI/AAAAAAAABwk/UNnCLCBic9o/s1600/pinterest-long.png" title="compartir en pinterest" width="40" /></a>
            <a href="javascript:void(0);" onclick="window.open(&quot;https://www.linkedin.com/shareArticle?mini=URL_BLOG&quot;,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="compartir en likedin" class="likedino" height="40" src="http://4.bp.blogspot.com/-WBa3E0lZI-8/ViFsOraP3DI/AAAAAAAABwg/eWD_6bYykMQ/s1600/linkedin-long.png" title="compartir en likedin" width="40" /></a>
        </div>
    </article>
</section>
