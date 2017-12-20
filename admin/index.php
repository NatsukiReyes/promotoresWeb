<?php
	include_once("modulos/Enrutador.php");
	include_once("modulos/Controlador.php");

	
	if(!isset($_SESSION["session_username"])) {
		header("location:login.php");
	} else {
?>

<!DOCTYPE html>
<html lang="es">
<html>
<head>
	<meta charset="utf-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
		<ul class="menu_admin">
			<li><a class="a_dos" href="index.php">Inicio</a></li>
			<li><a class="a_dos"  href="?cargar=crear">Nueva Noticia</a></li>
			<li><a class="a_dos"  href="register.php">Nuevo Administrador</a></li>
		</ul>
	</nav>

	<section>
		<?php
			$enrutador = new Enrutador();
			if ($enrutador->validarGET($_GET['cargar'])) {
				$enrutador->cargarVista($_GET['cargar']);
			}
		?>
	</section>

</body>
<?php
}
?>
</html>