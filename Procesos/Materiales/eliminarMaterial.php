<?php 
	require_once "../../Clases/Conexion.php";
	$id=$_POST['idcategoria'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from material 
			where id_material='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>