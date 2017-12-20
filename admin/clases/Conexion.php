<?php

	class Conexion{

		#Atributos
		private $host;
		private $user;
		private $pass;
		private $bd;

		#Metodos
		public function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->bd = "transmedia";

			$con = mysql_connect($this->host, $this->user, $this->pass);
			if ($con) {
				mysql_select_db($this->bd, $con);
			}
		}

		public function consultaSimple($sql){
			mysql_query($sql);
		}

		public function consultaRetorno($sql){
			$consulta = mysql_query($sql);
			return $consulta;
		}


	public function getInfoComboBox($tabla, $colum_codigo, $colum_nombre){
		$this->conectar();
		$sql = "SELECT * FROM ".$tabla;
		$resp = $this->conn->consultar($sql);
		$info = array(); 
		$i = 0;
		while($datos = @mysql_fetch_array($resp)){
			$info[$i] = $datos[$colum_codigo];
			$i++;
			$info[$i] = $datos[$colum_nombre];
			$i++;
		}
		$this->desconectar();
		return $info;
		}
	}
?>