<?php 
	require_once "../../Clases/Conexion.php";
	$datos=array(
		$_POST['idArticuloU'],
        $_POST['categoriaSelectU'],
        $_POST['itemU'],
        $_POST['colorSelectU'],
        $_POST['materialSelectU'],
        $_POST['tipoSelectU'],
        $_POST['precioMinU'],
        "0",
        $_POST['potenciaU'],
        $_POST['cantidadU']
	);
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="UPDATE producto SET id_categoria=".$datos[1].", item='".$datos[2]."', id_color=".$datos[3].", id_material=".$datos[4].", tipo='".$datos[5]."', precio_min=".$datos[6].", precio_max=".$datos[7].", potencia=".$datos[8].", cantidad=".$datos[9]."
						WHERE id_producto=".$datos[0].";";
    echo mysqli_query($conexion,$sql);
 ?>