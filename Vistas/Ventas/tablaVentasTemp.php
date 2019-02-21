<?php 

	session_start();
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
 ?>
 

 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
	 <span class="btn btn-success" onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
		 <span class="btn btn-success" onclick="crearProforma()"> Generar proforma
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
		 <span class="btn btn-danger" onclick="fallido()"> Articulo Fallido
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
		<td>Categoria</td>
		<td>Item</td>
		<td>Color</td>
 		<td>Material</td>
 		<td>Tipo</td>
 		<td>Cantidad</td>
		<td>Precio</td>
		<td>Quitar</td>
 	</tr>
 	<?php 
 	$total=0;//esta variable tendra el total de la compra en dinero
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

				$d=explode("||", @$key);
				$sql="select e.categoria, a.item, b.color, c.material, d.tipo, a.precio_min, a.precio_max, a.potencia,a.cantidad
				from producto a, color b, material c, tipo d, categoria e
				where a.id_color=b.id_color
				and a.id_material=c.id_material
				and a.id_tipo=d.id_tipo
				and a.id_categoria=e.id_categoria
				and a.id_producto=$d[0];";
				$result=mysqli_query($conexion,$sql);
				$ver=mysqli_fetch_row($result);
				$d[1]=$ver[0];
				$d[2]=$ver[1];
				$d[3]=$ver[2];
				$d[4]=$ver[3];
				$d[5]=$ver[4];		 
 	 ?>

 	<tr>
	 	<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
		<td><?php echo $d[4] ?></td>
 		<td><?php echo $d[5] ?></td>
 		<td><?php echo $d[6] ?></td>
		<td><?php echo $d[7] ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + ($d[6]*$d[7]);
 		$i++;
 	}
     endif; 
 ?>

 	<tr>
 		<td>Total de venta: <?php echo "Bs. ".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>