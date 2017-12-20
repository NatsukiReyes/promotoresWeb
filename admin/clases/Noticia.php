<?php
	include_once("Conexion.php");

	class Noticia{
		#Atributos
		private $id_noticia;
		private $fecha;
		private $vistas;
		private $imagen;
		private $titulo;
		private $descripcion;
		private $fuente;
		private $id_categoria;
		private $admin;

		private $con;

		#Metodos
		public function __construct(){
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listarNoticias(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='noticias' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarGoforward(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='go_forward' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarVideojuegos(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='videojuegos' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarMusica(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='musica' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarViral(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='Viral' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarEspectaculos(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente,noticias.admin FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND categorias.nombre='espectaculos' ORDER BY id_noticia DESC";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function listarCategoria(){
			$sql = "SELECT * FROM categorias";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}


		public function crear(){
			$sql2 = "SELECT * FROM noticias WHERE titulo = '{$this->titulo}'";
			$resultado = $this->con->consultaRetorno($sql2);
			$num = mysql_num_rows($resultado);
			if ($num != 0) {
				return false;
			}else{
				$sql = "INSERT INTO noticias (fecha, imagen, titulo, descripcion, fuente, id_categoria, admin) VALUES ('{$this->fecha}','{$this->imagen}','{$this->titulo}','{$this->descripcion}','{$this->fuente}','{$this->id_categoria}','{$this->admin}')";
					$this->con->consultaSimple($sql);
					return true;
			}

		}

		public function eliminar(){
			$sql = "DELETE FROM noticias WHERE id_noticia = '{$this->id_noticia}'";
			$this->con->consultaSimple($sql);
		}

		public function ver(){
			$sql = "SELECT noticias.id_noticia, noticias.fecha, categorias.nombre, noticias.vistas, noticias.imagen, noticias.titulo, noticias.descripcion, noticias.fuente FROM categorias, noticias WHERE categorias.id_categoria=noticias.id_categoria AND id_noticia = '{$this->id_noticia}' LIMIT 1 ";
			$resultado = $this->con->consultaRetorno($sql);
			$row = mysql_fetch_assoc($resultado);

			#Set
			$this->id_noticia = $row['id_noticia'];
			$this->fecha = $row['fecha'];
			$this->vistas = $row['vistas'];
			$this->imagen = $row['imagen'];
			$this->titulo = $row['titulo'];
			$this->descripcion = $row['descripcion'];
			$this->fuente = $row['fuente'];
			$this->id_categoria = $row['nombre'];

			return $row;
		}

		public function editar(){
			$sql = "UPDATE noticias SET fecha = '{$this->fecha}', imagen = '{$this->imagen}',titulo = '{$this->titulo}',descripcion = '{$this->descripcion}',fuente = '{$this->fuente}',id_categoria = '{$this->id_categoria}' WHERE id_noticia = '{$this->id_noticia}' ";
			$this->con->consultaSimple($sql);
		}
	}
?>