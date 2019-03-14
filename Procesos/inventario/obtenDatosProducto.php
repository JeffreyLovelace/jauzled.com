<?php 

	require_once "../../Clases/Conexion.php";

	$idart=$_POST['idart'];

	$c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT id_producto, id_categoria,item, id_color, id_material, tipo, precio_min, precio_max, potencia, cantidad
        from producto 
        where id_producto=".$idart.";";

    $result=mysqli_query($conexion,$sql);

    $ver=mysqli_fetch_row($result);

    $datos=$ver[0].";".$ver[1].";".$ver[2].";".$ver[3].";".$ver[4].";".$ver[5].";".$ver[6].";".$ver[7].";".$ver[8].";".$ver[9];

    echo $datos;

 ?>