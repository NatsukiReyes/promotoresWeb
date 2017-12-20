<?php
	include_once(".//clases/Noticia.php");

	class controladorNoticias{

		#Atributos
		private $noticia;

		#Metodos
		public function __construct(){
			$this->noticia = new Noticia();
		}

		public function listarNoticias(){
			$resultado = $this->noticia->listarNoticias();
			return $resultado;
		}

		public function listarGoforward(){
			$resultado = $this->noticia->listarGoforward();
			return $resultado;
		}

		public function listarVideojuegos(){
			$resultado = $this->noticia->listarVideojuegos();
			return $resultado;
		}

		public function listarMusica(){
			$resultado = $this->noticia->listarMusica();
			return $resultado;
		}

		public function listarViral(){
			$resultado = $this->noticia->listarViral();
			return $resultado;
		}

		public function listarEspectaculos(){
			$resultado = $this->noticia->listarEspectaculos();
			return $resultado;
		}
		
		public function listarCategoria(){
			$resultado = $this->noticia->listarCategoria();
			return $resultado;
		}

		public function crear($fecha,$imagen,$titulo,$descripcion,$fuente,$id_categoria,$admin){

			$this->noticia->set("fecha", 			   $fecha);
			$this->noticia->set("imagen", 			  $imagen);
			$this->noticia->set("titulo", 			  $titulo);
			$this->noticia->set("descripcion",	 $descripcion);
			$this->noticia->set("fuente", 			  $fuente);
			$this->noticia->set("id_categoria", $id_categoria);
			$this->noticia->set("admin", $admin);

			$resultado = $this->noticia->crear();
			return $resultado;
		}

		public function eliminar($id_noticia){
			$this->noticia->set("id_noticia", $id_noticia);
			$this->noticia->eliminar();
		}

		public function ver($id_noticia){
			$this->noticia->set("id_noticia", $id_noticia);
			$datos = $this->noticia->ver();
			return $datos;
		}

		public function editar($id_noticia,$fecha,$imagen,$titulo,$descripcion,$fuente,$id_categoria){
			$this->noticia->set('id_noticia',     $id_noticia);
			$this->noticia->set('fecha',               $fecha);
			$this->noticia->set('imagen',     		  $imagen);
			$this->noticia->set('titulo',			  $titulo);
			$this->noticia->set('descripcion', 	 $descripcion);
			$this->noticia->set('fuente',			  $fuente);
			$this->noticia->set('id_categoria', $id_categoria);
			$this->noticia->editar();
		}
	}
?>
