<?php 
	require_once "../../clases/Conexion.php";
	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
	);
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE Color set color='$datos[1]'
						where id_color='$datos[0]'";
	echo mysqli_query($conexion,$sql);

 ?>