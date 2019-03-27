<?php 
	require_once "../../Clases/Conexion.php";
    $ubicacion $_POST['ubicacion'];

	$c= new conectar();
	$conexion=$c->conexion();

	$sql="$ubicacion as";
    echo mysqli_query($conexion,$sql);
    
 ?>