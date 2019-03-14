<?php 
	require_once "../../Clases/Conexion.php";
	$id=$_POST['idcategoria'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from color 
			where id_color='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>