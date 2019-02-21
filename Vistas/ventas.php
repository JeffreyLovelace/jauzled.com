<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ventas</title>
	<?php
		require_once "menu.php";
		require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
	?>
</head>
<body>
	<div class="container">
		<h1>Ventas</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmVentasProductos">
					
					<label>Categoria </label><br>
					<select class="form-control btn-block" id="categoria" name="categoria">
						<?php
							$sql="select a.id_categoria, a.categoria from categoria a, producto b ,usuario c where a.id_categoria=b.id_categoria and b.id_usuario=c.id_usuario and c.usuario='".$_SESSION['usuario']."' group by a.categoria;";
							$result=mysqli_query($conexion,$sql);
							while ($categoria=mysqli_fetch_row($result)):
						?>
						<option value="<?php echo $categoria[0] ?>"><?php echo $categoria[1] ?></option>
						<?php endwhile; ?>
					</select>

					<label>Producto </label><br>
					<select class="form-control btn-block" id="productoVenta" name="productoVenta">
						
					</select>

					<label>Color </label><br>
					<select class="form-control btn-block" id="color" name="color">

					</select>

					<label>Material</label>
					<select class="form-control btn-block" id="material" name="material">
							
					</select>
					<label>Tipo</label>
						<select class="form-control btn-block" id="tipo" name="tipo">
							
					</select>

					<label>Cantidad a vender</label>
					<input type="text" class="form-control btn-block" id="cantidadVenta" name="cantidadVenta">

					<label>Precio</label>
					<input type="text" class="form-control btn-block" id="precio" name="precio">
					
					<label>Cantidad Disponible</label>
					<input type="text" class="form-control btn-block" id="cantidadDisp" name="cantidadDisp" disabled>
					<p></p>
					<span class="btn btn-primary" id="btnCantidad" >Cantidad</span>
					<span class="btn btn-primary" id="btnAgregaVenta" >Agregar</span>
					<span class="btn btn-danger" id="btnVaciarVentas">Vaciar ventas</span>
				</form>
			</div>
			<div class="col-sm-8">
				<form id="frmCliente">
					<label>Cliente</label>
					<input type="text" class="form-control btn-block" id="cliente" name="cliente">
					<div id="tablaVentasTempLoad"></div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	$('#productoVenta').select2();
	$(document).ready(function(){

		$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
		$('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());


		$( "#categoria" ).change(function() {
			$('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
		});
		$( "#productoVenta" ).change(function() {
			$('#color').load("ventas/comBoxColor.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
			$('#material').load("ventas/comBoxMaterial.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
			$('#tipo').load("ventas/comBoxTipo.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
			$("#cantidadDisp").val("");
		});

		$( "#btnCantidad" ).click(function() {
			obtenerCantidad();	
		});

		
		

		function obtenerCantidad(){
			datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/obtenerCantidad.php",
				success:function(r){
					if(r==""){
						$("#cantidadDisp").val(0)
					}else{
						$("#cantidadDisp").val(r);
					}
				}
			});
		}

		$('#btnAgregaVenta').click(function(){
			datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/agregaProductoTemp.php",
				success:function(r){
					if(r!=1){
						$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
						$('#frmVentasProductos')[0].reset();
						$('#productoVenta').select2();
						$('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#color').load("ventas/comBoxColor.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#material').load("ventas/comBoxMaterial.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#tipo').load("ventas/comBoxTipo.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$("#cantidadDisp").val("");
						alertify.success("Se Agrego el producto");
					}else{
						alertify.error("No se pudo agregar el producto");
					}
				}
			});
		});

		$('#btnVaciarVentas').click(function(){
			$.ajax({
				url:"../procesos/ventas/vaciarTemp.php",
				success:function(r){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				}
			});
		});

		$('#productoVenta').select2();
	});
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procesos/ventas/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				alertify.success("Se quito el producto :D");
			}
		});
	}

	function crearVenta(){
		datos=$('#frmCliente').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/crearVenta.php",
			success:function(r){
				console.log(r);
				if(r==1){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Venta creada con exito, consulte la informacion de esta en ventas hechas :D");
				}else if(r==100){
					alertify.alert("No hay lista de venta!!");
				}else{
					alertify.error("No se pudo crear la venta");
				}
			}
		});
	}
	function crearProforma(){
		datos=$('#frmCliente').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/crearProforma.php",
			success:function(r){
				console.log(r);
				if(r==1){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Preforma creada con exito");
				}else if(r==100){
					alertify.alert("No hay lista de Proforma");
				}else{
					alertify.error("No se pudo crear la Proforma");
				}
			}
		});
	}
	function fallido(){
		datos=$('#frmVentasProductos').serialize();
		
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/fallido.php",
				success:function(r){
					if(r==1){
						$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
						$('#frmVentasProductos')[0].reset();
						$('#productoVenta').select2();
						$('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#color').load("ventas/comBoxColor.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#material').load("ventas/comBoxMaterial.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$('#tipo').load("ventas/comBoxTipo.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
						$("#cantidadDisp").val("");
						alertify.success("Se Agrego Producto Fallido");
					}else{
						alertify.error("No se pudo registrar el producto");
					}
				}
			});
	}

</script>


<?php 
	}else{
		header("location:../index.php");
	}
?>
