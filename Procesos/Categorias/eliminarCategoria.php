<?php 
	require_once "../../Clases/Conexion.php";
	$id=$_POST['idcategoria'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from categoria 
			where id_categoria='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>