<?php
    $conexion=mysqli_connect('localhost','root','','Jauzled');

$nom=$_REQUEST["txtnom"];
$com=$_REQUEST["txtcom"];

mysqli_query($conexion,"insert into comentario (nombre,comentario) values('$nom','$com')");
header("Location:../../Vistas/EditarPagina.php");
?>
