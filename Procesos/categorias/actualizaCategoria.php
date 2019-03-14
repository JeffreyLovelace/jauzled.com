<?php 
	require_once "../../Clases/Conexion.php";
	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
	);
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE categoria set categoria='$datos[1]'
						where id_categoria='$datos[0]'";
	echo mysqli_query($conexion,$sql);

 ?>