<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
 include("includes/header.php"); 
?>

<div id="welcome">	
	<div id="bienvenido">
		<h2>
			Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span>
		</h2>
	</div>

	<div id="finalizar">
		<p>
			<a href="logout.php">Finalice</a> sesión aquí!
		</p>
	</div>
</div>

<?php 
	include("index.php");
	include("includes/footer.php");
}
?>
