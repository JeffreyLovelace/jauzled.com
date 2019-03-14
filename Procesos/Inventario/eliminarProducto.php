<?php 
	require_once "../../Clases/Conexion.php";
	$id=$_POST['idarticulo'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from producto 
			where id_producto='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>