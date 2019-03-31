<?php
  require_once "../../Clases/Conexion.php";
  $c= new conectar();
	$conexion=$c->conexion();
	echo $_GET['no'];
	EliminarProducto($_GET['no']);

	function EliminarProducto($no)
	{ 
		require_once "../../Clases/Conexion.php";
  $c= new conectar();
	$conexion=$c->conexion();
		$sentencia="delete from foto WHERE Idfoto='".$no."' ";
		mysqli_query($conexion,$sentencia) ;
	}
?>

<script type="text/javascript">

	window.location.href='../../Vistas/EditarPagina.php';

</script>