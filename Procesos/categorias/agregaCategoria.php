<?php 
	session_start();
	require_once "../../clases/Conexion.php";

    $categoria=$_POST['categoria'];

	$c= new conectar();
	$conexion=$c->conexion();

	$sql="INSERT into categoria values (default,'$categoria')";

	echo mysqli_query($conexion,$sql);
 ?>