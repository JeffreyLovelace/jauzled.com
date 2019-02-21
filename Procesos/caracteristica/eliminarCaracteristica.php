<?php 
	require_once "../../clases/Conexion.php";
	$id=$_POST['idcategoria'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from tipo 
			where id_tipo='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>