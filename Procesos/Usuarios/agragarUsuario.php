<?php 
	session_start();
	require_once "../../clases/Conexion.php";

    $tipo=$_POST['tipoSelect'];
    $pnombre=$_POST['pNombre'];
    $snombre=$_POST['sNombre'];
    $papellido=$_POST['pApellido'];
    $sapellido=$_POST['sApellido'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $direccion=$_POST['direccion'];
    $fecha=date('Y-m-d');

	$c= new conectar();
	$conexion=$c->conexion();

    $sql="INSERT into usuario values (default,'$pnombre','$snombre','$papellido','$sapellido','$usuario','$password','$direccion','$fecha','$tipo');";
    echo mysqli_query($conexion,$sql); 
 ?>