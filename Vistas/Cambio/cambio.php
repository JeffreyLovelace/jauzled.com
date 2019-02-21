<?php 

	require_once "../../clases/Conexion.php"; 
	$c= new conectar();
	$conexion=$c->conexion();
	
	$recibo=$_GET['recibo'];
	$sql="SELECT *
		from ventas
		where id_venta=$recibo";
	$result=mysqli_query($conexion,$sql);
	$ventas=mysqli_fetch_row($result);

	$sql="SELECT direccion
		from usuario
		where id_usuario=$ventas[4]";
	$result=mysqli_query($conexion,$sql);
	$usuario=mysqli_fetch_row($result);

?>
<html lang="es">
<head>

</head>

<body>
	<table style="width:100%">
		<thead>
			<tr>
			<th scope="col">Item</th>
			<th scope="col">Color</th>
			<th scope="col">Caracteristica</th>
			<th scope="col">Potencia</th>
			<th scope="col">Precio Unidad</th>
			<th scope="col">Cantidad</th>
			<th scope="col">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql="select a.item, b.color, d.tipo, a.potencia, f.precio, f.cantidad
				from producto a, color b, material c, tipo d, categoria e, detalleventas f
				where a.id_color=b.id_color
				and a.id_material=c.id_material
				and a.id_tipo=d.id_tipo
				and a.id_categoria=e.id_categoria
				and f.id_venta=$recibo
				and a.id_producto = f.id_producto;";
				$result=mysqli_query($conexion,$sql);
				$total=0;
				while($detalle=mysqli_fetch_row($result)): 
					$total=$total+$detalle[5]*$detalle[4];
			?>
			<tr>
			<td><?php echo $detalle[0] ?></td>
				<td><?php echo $detalle[1] ?></td>
				<td><?php echo $detalle[2] ?></td>
				<td><?php echo $detalle[3] ?></td>
				<td><?php echo $detalle[4] ?></td>
				<td><?php echo $detalle[5] ?></td>
				<td><?php echo $detalle[5]*$detalle[4] ?></td>
			</tr>
			<?php 
				endwhile; 
			?>
		</tbody>
	</table>		
</body>
</html>
