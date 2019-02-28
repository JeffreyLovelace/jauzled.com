<?php 

	class conectar{
		private $servidor="181.114.114.160";
		private $usuario="Jauzled";
		private $password="jauzled123";
		private $bd="jauzled";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>