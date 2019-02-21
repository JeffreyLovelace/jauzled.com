

<?php
	session_start();
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();

	if($_GET['ubi']=="bodega"){
		$ubicacion=1;
	}else{
		$ubicacion=$_GET['ubi'];
	}
	
	if($_SESSION['privilegio']==1){
		$sql="select e.categoria, a.item, b.color, c.material, a.tipo, a.precio_min, a.precio_max, a.potencia,a.cantidad,a.id_producto,a.imagen, a.id_usuario
		from producto a, color b, material c, categoria e
		where a.id_color=b.id_color
		and a.id_material=c.id_material
		and a.id_categoria=e.id_categoria
		and a.item LIKE '%".$_GET['sql']."%'
		and a.id_usuario=".$ubicacion.";";
	}else{
		$sql="select e.categoria, a.item, b.color, c.material, a.tipo, a.precio_min, a.precio_max, a.potencia,a.cantidad,a.id_producto,a.imagen, a.id_usuario
		from producto a, color b, material c, categoria e, usuario f
		where a.id_color=b.id_color
		and a.id_material=c.id_material
		and a.id_categoria=e.id_categoria
		and a.id_usuario=f.id_usuario
		and f.usuario='".$_SESSION['usuario']."'
		and a.item LIKE '%".$_GET['sql']."%';";
	}
	$result=mysqli_query($conexion,$sql);
	
 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Productos</label></caption>
	<tr>
		<td>Lugar</td>
		<td>Categoria</td>
		<td style="padding: 5px 30px;">Item</td>
		<td>Color</td>
		<td>Material</td>
		<td>Caracteristica</td>
		<?php if($_SESSION['privilegio']==1){?>
			<td>Precio Minimo</td>
		<?php }?>
		<td>Potencia</td>
		<td>Cantidad</td>
		<td>Imagen</td>	
		<?php if($_SESSION['privilegio']==1){?>
		<td>Editar</td>
		<td>Eliminar</td>
		<?php }?>
	</tr>

	<?php 
		while($ver=mysqli_fetch_row($result)): 
			if($ver[11]==1){
				$ver[11]="Bodega";
			}else{
				$sql2="select direccion from usuario where id_usuario=".$ver[11].";";
				$result2=mysqli_query($conexion,$sql2);
				$ver2=mysqli_fetch_row($result2);
				$ver[11]=$ver2[0];
			}
	?>

	<tr>
		<td><?php echo $ver[11]; ?></td>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
		<?php if($_SESSION['privilegio']==1){?>
			<td><?php echo $ver[5]; ?></td>
		<?php }?>
        <td><?php echo $ver[7]; ?></td>
		<td><?php echo $ver[8]; ?></td>
		<td>
			<a href="<?php echo $ver[10]; ?>"><img class="img-responsive" style="width:100px;" src="<?php echo $ver[10]; ?>"/></a>
		</td>
		<?php if($_SESSION['privilegio']==1){?>
		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[9] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[9] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		<?php }?>
	</tr>
<?php endwhile; ?>
</table>