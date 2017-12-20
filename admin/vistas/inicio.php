<?php 
	$controlador = new controladorNoticias();
	$resultado1 = $controlador->listarNoticias();
	$resultado2 = $controlador->listarGoforward();
	$resultado3 = $controlador->listarVideojuegos();
	$resultado4 = $controlador->listarMusica();
	$resultado5 = $controlador->listarViral();
	$resultado6 = $controlador->listarEspectaculos();
?>


<h1>Noticias</h1>
<div class="seccion">
	<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">Noticias</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado1)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>



<h1>GoForward</h1>
<div class="seccion">
<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">GoForward</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado2)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>





<h1>Videojuegos</h1>
<div class="seccion">
	<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">Videojuegos</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado3)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>




<h1>Música</h1>
<div class="seccion">
<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">Musica</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado4)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>




<h1>Viral</h1>
<div class="seccion">
	<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">Viral</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado5)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>




<h1>Espectaculos</h1>
<div class="seccion">
<table  bgcolor="#F8F8F8 " border="3px">
		<thead>
			<tr>
               <th class="encabezado" colspan="8">Viral</th>
            </tr>
			<th class="fecha">Fecha</th>
			<th class="vistas">Vistas</th>
			<th class="imagen">Imagen</th>
			<th class="titulo">Titulo</th>
			<th class="descripcion">Descripción</th>
			<th class="fuente">Fuente</th>
			<th class="admin">Admin</th>
			<th class="accion">Acción</th>
		</thead>
		<tbody>
		<?php while($row = mysql_fetch_array($resultado6)): ?>
			<tr>
				<td><?php echo $row['fecha']; ?></td>
				<td><?php echo $row['vistas']; ?></td>
				<td><?php echo '<img src="imagenes/'.$row["imagen"].'" width="100%"><br>'; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td>
					<?php
						$cadena = $row['descripcion']; 
						if(strlen($cadena) > 20){
	                    $cadena = substr($cadena,0,50)."...";
	                    } 
	                    echo $cadena;
					?>
				</td>
				<td><?php echo $row['fuente']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>
					<div class="acciones">
						<a class="no" href="?cargar=ver&id=<?php echo $row['id_noticia']; ?>">
							Ver
							<img class="img_accion" src="../imagenes/icons/ver.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=editar&id=<?php echo $row['id_noticia']; ?>">
							Editar
							<img class="img_accion" src="../imagenes/icons/editar.png">
						</a>
					</div>
					<div class="acciones">
						<a class="no" href="?cargar=eliminar&id=<?php echo $row['id_noticia']; ?>">
							Eliminar
							<img class="img_accion" src="../imagenes/icons/eliminar.png">
						</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
</div>


