<?php 
	require_once "../../clases/Conexion.php";
	$id=$_POST['idarticulo'];

	$c= new conectar();
	$conexion=$c->conexion();
	$sql="DELETE from Producto 
			where id_producto='$id'";
	echo mysqli_query($conexion,$sql);
	
 ?>