<?php
	class ConexionPDO{
		private $server;
		private $user;
		private $password;
		private $baseDatos;
		private $conexion;

		function ConexionPDO(){
			$argumentos=func_get_args();
			if(count($argumentos)!=0){
				$this->server=$argumetos[0];
				$this->user=$argumentos[1];
				$this->password=$argumentos[2];
				$this->baseDatos=$argumentos[3];
			}else{
				include "incluir/config.php";
				$this->server=${$var1};
				$this->user=${$var2};
				$this->password=${$var3};
				$this->baseDatos=${$var4};
			}
		}

		public function realizarConexion(){
			try {
    				$this->conexion =
    				new PDO("mysql:host=$this->server;dbname=$this->baseDatos",
    				$this->user, $this->password);
    				$this->conexion->setAttribute
                    (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    				//echo "Conexion OK";
					return  true;
    		}
			catch(PDOException $e){
    			echo "La conexión no se pudo realizar: " . $e->getMessage();
    		}
		}
		
		public function hacerConsulta($sql){
			try{
				
				$resultado=$this->conexion->query($sql);
				$rows=$resultado->fetchAll(PDO::FETCH_ASSOC);
				$resultado=$this->conexion->query("SET NAMES 'utf8'");
				return $rows;
			}catch(PDOException $e){
    			echo "La consulta no se pudo realizar: " . $e->getMessage();
    		}
		}

        public function aumentarVistas($id){
            $statement=$this->conexion->prepare("UPDATE noticias SET vistas=vistas+1 WHERE id_noticia= {$id} ");
            $statement->execute();
        }
  
    }
?>
