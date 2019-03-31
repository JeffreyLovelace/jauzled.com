<?php
  $conexion=mysqli_connect('localhost','root','','Jauzled');
echo $_GET['no'];
	EliminarProducto($_GET['no']);

	function EliminarProducto($no)
	{ $conexion=mysqli_connect('localhost','root','','Jauzled');
		$sentencia="delete from foto WHERE Idfoto='".$no."' ";
		mysqli_query($conexion,$sentencia) ;
	}
?>

<script type="text/javascript">

	window.location.href='../../Vistas/EditarPagina.php';

</script>