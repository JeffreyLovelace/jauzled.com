<?php 
	require_once "../../clases/Conexion.php";
	$id=$_POST['idcategoria'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from Categoria 
			where id_categoria='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>