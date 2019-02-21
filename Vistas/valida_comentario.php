<?php
    $conexion=mysqli_connect('localhost','root','','jauzled');

$nom=$_REQUEST["txtnom"];
$com=$_REQUEST["txtcom"];

mysqli_query($conexion,"insert into comentario (nombre,comentario) values('$nom','$com')");
header("Location: EditarPagina.php");
?>
