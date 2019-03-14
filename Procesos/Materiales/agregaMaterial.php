<?php 
	session_start();
	require_once "../../Clases/Conexion.php";

    $categoria=$_POST['categoria'];

	$c= new conectar();
	$conexion=$c->conexion();

	$sql="INSERT into material values (default,'$categoria')";

	echo mysqli_query($conexion,$sql);
 ?>