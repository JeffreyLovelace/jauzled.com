<?php
  require_once "../../Clases/Conexion.php";
  $c= new conectar();
	$conexion=$c->conexion();

$nom=$_REQUEST["txtnom"];
$com=$_REQUEST["txtcom"];

mysqli_query($conexion,"insert into comentario (nombre,comentario) values('$nom','$com')");
header("Location:../../Vistas/EditarPagina.php");
?>
