<?php 
	session_start();
	require_once "../../clases/Conexion.php";

    $categoria=$_POST['categoria'];

	$c= new conectar();
	$conexion=$c->conexion();

	$sql="INSERT into tipo values (default,'$categoria')";

	echo mysqli_query($conexion,$sql);
 ?>