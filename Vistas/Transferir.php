<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventario</title>
	<?php
		require_once "menu.php";
		require_once "../Clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
	?>
</head>
<body>
	<div class="container">
		<h1>Transferir Productos</h1>
		<div class="row">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <h3>Ubicacion</h3>
                    <select class="form-control input-sm" id="ubicacion" name="ubicacion">
                        <option value="bodega">Bodega</option>
						<?php
							$sql="SELECT id_usuario, usuario, id_privilegio
							from usuario
							where id_privilegio = 2;";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
                </div>
                <div class="col-sm-5">
                    <h3>Buscar Productos</h3>
                    <input type="text" class="input-sm" id="filtro" name="filtro">
                </div>

                
				<div id="tablaArticulosLoad"></div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualiza Producto</h4>
				</div>
				<div class="modal-body">
					<form id="frmArticulosU" enctype="multipart/form-data">
						<input type="text" id="idArticuloU" hidden="" name="idArticuloU">
						<label>Item</label>
						<input type="text" class="form-control input-sm" id="itemU" name="itemU" disabled>
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
						<label>Ubicacion</label>
						<select class="form-control input-sm" id="ubicacion" name="ubicacion">
							<option value="bodega">Bodega</option>
							<?php
								$sql="SELECT id_usuario, usuario, id_privilegio
                                from usuario
                                where id_privilegio = 2;";
								$result=mysqli_query($conexion,$sql);
                                while($ver=mysqli_fetch_row($result)): 
							?>
							<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php 
								endwhile; 
							?>
						</select>
					</form>
				</div>
				<div class="modal-footer">
					<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

				</div>
			</div>
		</div>
	</div>

</body> 
</html>

<script type="text/javascript">


    $( "#ubicacion" ).change(function() {
		aux="Transferir/tablaArticulos.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
		$('#tablaArticulosLoad').load(aux);
	});

	$( "#filtro" ).keyup(function() {
		aux="Transferir/tablaArticulos.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
		$('#tablaArticulosLoad').load(aux);
	});
	function agregaDatosArticulo(idarticulo){
		$.ajax({
			type:"POST",
			data:"idart=" + idarticulo,
			url:"../procesos/inventario/obtenDatosProducto.php",
			success:function(r){
				dato = r.split(";",15);		
                $('#idArticuloU').val(dato[0]);
		
				$('#itemU').val(dato[2]);
			}
		});
	}

	
	$(document).ready(function(){

		$('#tablaArticulosLoad').load("Transferir/tablaArticulos.php?sql=&ubi=1");

		$('#btnActualizaarticulo').click(function(){
			datos=$('#frmArticulosU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/transferir/moverProducto.php",
				success:function(r){
					if(r==1){
                        aux="Transferir/tablaArticulos.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
                        $('#tablaArticulosLoad').load(aux);
                        alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Error al actualizar :(");
					}
				}
			});
		});
	});
</script>

<?php 
	}else{
		header("location:../index.php");
	}
?>