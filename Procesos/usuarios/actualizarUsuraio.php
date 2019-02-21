<?php 
    require_once "../../clases/Conexion.php";

    $idusuario=$_POST['idUsuarioU'];
    $tipo=$_POST['TipoSelectU'];
    $pnombre=$_POST['pNombreU'];
    $snombre=$_POST['sNombreU'];
    $papellido=$_POST['pApellidoU'];
    $sapellido=$_POST['sApellidoU'];
    $usuario=$_POST['usuarioU'];
    $password=$_POST['passwordU'];
    $direccion=$_POST['direccionU'];

	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE usuario SET pnombre='".$pnombre."', snombre='".$snombre."', papellido='".$papellido."', sapellido='".$sapellido."', usuario='".$usuario."', password='".$password."', direccion='".$direccion."', id_privilegio=".$tipo."
						WHERE id_usuario=".$idusuario.";";
    echo mysqli_query($conexion,$sql);
 ?>