<?php 
	$controlador = new controladorNoticias();

	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	}else{
		header('location: index.php');
	}

	if (isset($_POST['cancelar'])) {
		header('location: index.php');
	}

	if (isset($_POST['eliminar'])) {
		$controlador->eliminar($_GET['id']);
		header('location: index.php');
	}
 ?>

<h1>¿De verdad quiere eliminar esta noticia?</h1>
<hr>
<form action="" method="POST">
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
            <p>
            <input type="submit" value="Cancelar" name="cancelar" id="register" class="button">  
            <input type="submit" value="Eliminar" name="eliminar" id="register" class="button" >   
            </p> 
            <hr>   
        </article>
    </section>
</form>


