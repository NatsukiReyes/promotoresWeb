<?php 
	$controlador = new controladorNoticias();

	$usuario = $_SESSION["session_username"];

	$resultado = $controlador->listarCategoria();


	if (isset($_POST['enviar'])) {

		$foto=$_FILES["foto"]["name"];
		$ruta=$_FILES["foto"]["tmp_name"];
		$destino="imagenes/".$foto;
		copy($ruta,$destino);

		$r = $controlador->crear($_POST['fecha'],$foto,$_POST['titulo'],$_POST['descripcion'],$_POST['fuente'],$_POST['categoria'],$usuario);
		header('location: index.php');
			
		if ($r) {
			echo "Se ha registrado una nueva NOTICIA";
		}else{
			echo "El titulo de esa noticias ya esta registrado, le sugerimos cambiarlo";
		}
	}

 ?>

<div class="container mregister">
	<dir id="registrar">
		<h1>
			REGISTRA LA NUEVA NOTICIA
			<br>
			<img src="../imagenes/icons/nueva_noticia.png" height="100%" >
		</h1>
		<hr>
		<form action="" method="POST" enctype="multipart/form-data" id="registerform">
			<p>
				<label for="user_login">Feha<br />
					<input class="input" size="32" type="date" name="fecha" required value="<?php echo date("Y-m-d");?>">
				</label>
			</p>
			<p>	
				<label for="user_pass">Imagen<br />
					<input class="input" size="32" type="file" name="foto" id="foto">
				</label>
			</p>
			<p>		
				<label for="user_pass">Titulo<br />
					<textarea class="input" size="32" type="text" name="titulo" required ></textarea>
				</label>
			</p>
			<p>	
				<label for="user_pass">Descripción<br />
					<textarea class="input" size="32" type="text" name="descripcion" required ></textarea>
				</label>
			</p>
			<p>			
				<label for="user_pass">Fuente<br />
					<input class="input" size="32" type="text" name="fuente" required >
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
				<input type="submit" name="enviar" value="Crear" id="register" class="button">
			</p>
			<hr>	
		</form>
		</dir>
</div>

