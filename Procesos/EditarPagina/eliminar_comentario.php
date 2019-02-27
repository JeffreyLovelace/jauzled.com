<?php
  $conexion=mysqli_connect('localhost','root','','jauzled');
echo $_GET['no'];
	EliminarProducto($_GET['no']);

	function EliminarProducto($no)
	{ $conexion=mysqli_connect('localhost','root','','jauzled');
		$sentencia="delete from comentario WHERE IdComentario='".$no."' ";
		mysqli_query($conexion,$sentencia) ;
	}
?>

<script type="text/javascript">

	window.location.href='/Vistas/EditarPagina.php';
</script>