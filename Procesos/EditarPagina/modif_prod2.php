<?php
	   $conexion=mysqli_connect('localhost','root','','Jauzled');

	ModificarProducto($_POST['idPaginaPrincipal'],$_POST['celular'], $_POST['correo'], $_POST['direccion'], $_POST['mision'], $_POST['vision'], $_POST['pais'], $_POST['descripcion']);

	function ModificarProducto($id, $celular, $correo, $direccion,$mision,$vision,$pais,$descripcion)
	{   $conexion=mysqli_connect('localhost','root','','Jauzled');
		$sentencia="UPDATE paginaPrincipal SET idPaginaPrincipal='1', celular= '".$celular."', correo='".$correo."', direccion='".$direccion."', mision='".$mision."', vision='".$vision."', pais='".$pais."', descripcion='".$descripcion."' 
		where idPaginaPrincipal=1";
		mysqli_query($conexion,$sentencia);
	}
?>

<script type="text/javascript">
	
	window.location.href='../../Vistas/EditarPagina.php';
</script>