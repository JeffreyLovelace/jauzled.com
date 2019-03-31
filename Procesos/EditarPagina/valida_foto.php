<?php
  require_once "../../Clases/Conexion.php";
  $c= new conectar();
	$conexion=$c->conexion();

$nom=$_REQUEST["txtnom"];
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="../../Imagenes/".$foto;
$Guarda="Imagenes/".$foto;
copy($ruta,$destino);
mysqli_query($conexion,"insert into foto (nombre,foto) values('$nom','$Guarda')");
header("Location:../../Vistas/EditarPagina.php");
?>
