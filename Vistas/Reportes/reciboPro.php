<?php 

	require_once "../../clases/Conexion.php"; 
	$c= new conectar();
	$conexion=$c->conexion();
	
	$recibo=$_GET['recibo'];
	$sql="SELECT *
		from proforma
		where id_proforma=$recibo";
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
	<link rel="stylesheet" href="recibo.css">
</head>

<body>
	<div id="botonera">
		<button onClick="javascript:window.print();">Imprimir</button>
	</div>

	<div id="page1">

		<div class="bordeRecibo">
			<header>
				
				<!-- Lado Izquierdo -->
				<div class="column left">
					<div class="container" >
						<div class="row text-center">
							<img src="../../img/Logo.png" alt="logo" width="208" height="85">
						</div>
						<div >
							<div class="row text-center h3">Ing. Yolanda Suxo M.</div>
							<div class="row text-center h3">NUMERO</div>
							<div class="row text-center h3">CORREO</div>
						</div>
					</div>
				</div>

				<div class="column center">
					<div class="row text-center negrita" style="font-size:50px; left:-50;">PROFORMA</div>
				</div>
		
				
				<!-- Lado Derecho -->
				<div class="column right">
					<div class="container">
						<br>
						<div id="lblNroCmp" class="row text-center negrita h3"><span class="negrita">N°</span> <?php echo $recibo ?></div>
						<div class="row text-center h3">ORIGINAL</div>
						<br>
						<div class="row text-center h3">Fecha: <span class=""><?php echo $ventas[2] ?></span></div>
						<div class="row text-center h3">Hora: <span class=""><?php echo $ventas[3] ?></span></div>
					</div>
				</div>
			</header>
			
			<section><b>DATOS DE PROFORMA</b>
				<br>
				<br>
				<span class=""><b> Para: </b></span> <?php echo $ventas[1] ?>
				<br>
				<span class="">	<b> Tienda: </b></span><span id="importeEnLetras"><?php echo $usuario[0] ?></span> 
			</section>

			<section><b>POR CONCEPTO DE</b>
				<br><br>
				<table style="width:100%;">
					<thead>
						<tr>
						<th scope="col">Item</th>
						<th scope="col">Color</th>
						<th scope="col">Caracteristica</th>
						<th scope="col">Potencia</th>
						<th scope="col">Cantidad</th>
						<th scope="col">Precio Unidad</th>
						<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="select a.item, b.color, a.tipo, a.potencia, f.precio, f.cantidad
							from producto a, color b, material c, categoria e, detalleproforma f
							where a.id_color=b.id_color
							and a.id_material=c.id_material
							and a.id_categoria=e.id_categoria
							and f.id_proforma=$recibo
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
			</section>

			<footer>
				<section id="son"> <span class=""><b> TOTAL BS. </b></span> 
					<output id="totalRecibo" class=""><?php echo $total ?></output> 
				</section>
				<br><br><br>
				<section id="hr">
					<div id="" class="pull-right">&nbsp;</div>
					<p class="text-center">Entrege conforme</p>
				</section>
				
				<section id="hd">
					<div id="" class="pull-left">&nbsp;</div>
					<p class="text-center">Recibi conforme</p>
				</section>
				
				
			</footer>
		</div><!-- bordeRecibo -->
	</div><!-- Page1 -->
</body>
</html>
