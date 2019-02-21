<?php 
	require_once "../../clases/Conexion.php";
	$id=$_POST['idarticulo'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from usuario 
			where id_usuario='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>