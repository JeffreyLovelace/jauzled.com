<?php 
	require_once "../../Clases/Conexion.php";
	$id=$_POST['idarticulo'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from usuario 
			where id_usuario='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>