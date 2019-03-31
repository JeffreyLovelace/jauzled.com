<?php 

	class conectar{
		private $servidor="jauzled.com";
		private $usuario="web";
		private $password="web2019";
		private $bd="JauzLed";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>