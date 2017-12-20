<?php 
	$controlador = new controladorNoticias();

	$resultado = $controlador->listarCategoria();

	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	}else{
		header('location: index.php');
	}

	if (isset($_POST['enviar'])) {

		if ($_FILES['foto']!=null) {
		
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino="imagenes/".$foto;
			copy($ruta,$destino);

			$controlador->editar($_GET['id'], $_POST['fecha'], $foto, $_POST['titulo'], $_POST['descripcion'], $_POST['fuente'], $_POST['categoria']);

			header('location: index.php');
		}else{

			$controlador->editar($_GET['id'], $_POST['fecha'], $_POST['foto_actual'], $_POST['titulo'], $_POST['descripcion'], $_POST['fuente'], $_POST['categoria']);

			header('location: index.php');
		}
	}

	if (isset($_POST['cancelar'])) {
		
		header('location: index.php');
	}
	
 ?>

<div class="container mregister">
	<h1>EDITA LA NOTICIA</h1>
	<hr>
	<form action="" method="POST" enctype="multipart/form-data" id="registerform">
		<p>
			<label for="user_login">Feha:<br />
				<input class="input" size="32" type="date" name="fecha" required value="<?php echo $row['fecha']; ?>">
			</label>
		</p>
		<p>	
			<label for="user_pass">Imagen Actual:<br />
			<input class="input" size="32" type="text" name="foto_actual" disabled = "disabled"  value="<?php echo $row['imagen']; ?>">
			<div id="foto">
				<?php echo '<img src="imagenes/'.$row["imagen"].'" width="450px" ><br>'; ?>
			</div>	
			</label>
		</p>
		<p>	
			<label for="user_pass">Nueva Imagen:<br />
				<input class="input" size="32" type="file" name="foto" id="foto">
			</label>
		</p>
		<p>		
			<label for="user_pass">Titulo:<br />
				<input class="input" size="32" type="text" name="titulo" required value="<?php echo $row['titulo']; ?>"  >
			</label>
		</p>
		<p>	
			<label for="user_pass">Descripción<br />
				<input class="input" size="32" type="text" name="descripcion" required value="<?php echo $row['descripcion']; ?>">
			</label>
		</p>
		<p>			
			<label for="user_pass">Fuente<br />
				<input class="input" size="32" type="text" name="fuente" required value="<?php echo $row['fuente']; ?>">
			</label>
		</p>
		<p>	
			<label for="user_pass">Categoria<br />
				<select class="input" size="1" name="categoria" class="form-control">
		            <option>Seleccione una Opción...</option>
						<?php  
				            while($row = mysql_fetch_array($resultado)){
							echo'<OPTION VALUE="'.$row['id_categoria'].'">'.$row['nombre'].'</OPTION>';
							}
						?>
		    	</select>
			</label>
		</p>
		<p>	
			<input type="submit" name="cancelar" value="Cancelar" id="register" class="button">
			<input type="submit" name="enviar" value="Editar" id="register" class="button">
		</p>	
		<hr>
	</form>
</div>






