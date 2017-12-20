<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maquetado</title>
	<link rel="stylesheet" href="css/estiloCelulares.css">
</head>
<body>

	<?php 
	include "script/php/ConexionPDO.php";

	$conn = new ConexionPDO();

	$buscar= strtolower($_REQUEST['noticia']);

	$sql="SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente FROM categorias, noticias WHERE 
		fecha like '%".$buscar."%' or
		nombre like '%".$buscar."%' or
		vistas like '%".$buscar."%' or
		imagen like '%".$buscar."%' or
		titulo like '%".$buscar."%' or
		descripcion like '%".$buscar."%' or
		fuente like '%".$buscar."%'";

	if ($conn->realizarConexion($sql)) {
		$resultado= $conn->hacerConsulta($sql);
		$tamaño = sizeof($resultado);
		if ($tamaño > 0) {
			foreach ($resultado as $celdas) {
				?>
				<div class="recuadro">
					<div class="titulo"><?php echo $celdas['titulo']; ?> / <?php echo $celdas['fuente'] ?></div>
					<img src="img/<?php echo $celdas['imagen'];?>" alt="">
					<div class="informacion">
						<b>S.O:</b> <?php echo $celdas['nombre'] ?><br><br>
						<b>Color:</b> <?php echo $celdas['vistas']; ?><br><br>
						<b>Pantalla:</b> <?php echo $celdas['fecha']; ?><br><br>
						<!--<b>Camara:</b>--> <?php #echo $celdas['camara']; ?> <!--<br><br>-->
						<!--<b>Precio:</b>--><?php #echo $celdas['precio']; ?> <!--<br><br>-->
					</div>
					<div class="descripcion" id="descripcion">
						<b>Ver Más</b>
					</div>
				</div>
				<?php 
			}
		}else{
			?>
			<div class="noresultados">
			<h1> sin resultados </h1>
			</div>
			<?php 
		}
	}
	?>
</body>
</html>