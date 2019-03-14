<?php 

	require_once "../../clases/Conexion.php";

	$idart=$_POST['idart'];

	$c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT a.pnombre, a.snombre, a.papellido, a.sapellido, a.usuario, a.password, a.direccion, b.id_privilegio
    from usuario a, privilegio b
    where a.id_privilegio=b.id_privilegio
    and id_usuario=".$idart.";";

    $result=mysqli_query($conexion,$sql);

    $ver=mysqli_fetch_row($result);

    $datos=$ver[0].";".$ver[1].";".$ver[2].";".$ver[3].";".$ver[4].";".$ver[5].";".$ver[6].";".$ver[7];

    echo $datos;

 ?>