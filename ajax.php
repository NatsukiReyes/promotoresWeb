<?php 
	include('incluir/conexion.php');

	class Ajax{

		public $buscador;

		public function Buscar($a){
			$db = new conexion();
			$this->buscador = $db->real_escape_string($a);
			$sql = $db->query("SELECT * FROM noticias WHERE titulo LIKE '%$this->$buscador%' ");

			while ($array = $db->recorrer($sql)) {
				$resultado[] = $array['titulo'];
			}
			return $resultado;

		}
	}


	$busqueda = new Ajax();
	echo json_encode($busqueda->Buscar($_GET['term']));
 ?>