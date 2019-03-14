
<?php 
	require_once "../../Clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
    $sql="select a.id_usuario, a.pnombre, a.snombre, a.papellido, a.sapellido, a.usuario, a.password, a.direccion, b.privilegio
    from usuario a, privilegio b
    where a.id_privilegio=b.id_privilegio;";
	$result=mysqli_query($conexion,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Productos</label></caption>
	<tr>
		<td>Nombre</td>
		<td>Usuario</td>
		<td>Contraseña</td>
		<td>Direccion</td>
        <td>Privilegio</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[1]." ".$ver[2]." ".$ver[3]." ".$ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
		<?php
			if($ver[8]=="Gerente"){
				$ver[6]="*******";
			}
		?>
		<td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td><?php echo $ver[8]; ?></td>
		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosUsuario('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>