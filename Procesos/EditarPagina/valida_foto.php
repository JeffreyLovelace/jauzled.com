<?php
    $conexion=mysqli_connect('localhost','root','','jauzled');

$nom=$_REQUEST["txtnom"];
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);
mysqli_query($conexion,"insert into foto (nombre,foto) values('$nom','$destino')");
header("Location: /Vistas/EditarPagina.php");
?>
