<?php 
	require_once "../../Clases/Conexion.php";
	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
	);
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE material set material='$datos[1]'
						where id_material='$datos[0]'";
	echo mysqli_query($conexion,$sql);
 ?>