<?php 
	require_once "../../clases/Conexion.php";
	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
	);
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE Material set material='$datos[1]'
						where id_material='$datos[0]'";
	echo mysqli_query($conexion,$sql);

 ?>