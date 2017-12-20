<?php 

	class Conexion2 extends mysqli{

		public function __construct(){
			parent::__construct('localhost','root','','transmedia');
			$this->query("SET NAMES 'utf8';");
			$this->connect_errno ? die('Error con la conexion') : $x = 'Conectado';
			#echo $x;
			unset($x);
		}

		public function recorrer($y){
			return mysqli_fetch_array($y);
		}

		public function rows($y){
			return mysqli_num_rows($y);
		}
	}


 ?>