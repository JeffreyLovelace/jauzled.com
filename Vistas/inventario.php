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
		<h1>Inventario</h1>
		<div class="row">
			<?php if($_SESSION['privilegio']==1){?>
			<div class="col-sm-4">
				<form id="frmArticulos" enctype="multipart/form-data">
					<label>Categoria</label>
					<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
						<option value="A">Selecciona Categoria</option>
						<?php
							$sql="SELECT id_categoria,categoria
							from categoria";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
					<label>Item</label>
					<input type="text" class="form-control input-sm" id="item" name="item">
					<label>Color</label>
					<select class="form-control input-sm" id="colorSelect" name="colorSelect">
						<?php
							$sql="SELECT id_color,color
							from color;";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
					<label>Material</label>
					<select class="form-control input-sm" id="materialSelect" name="materialSelect">
						<?php
							$sql="SELECT id_material,material
							from material;";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
					<label>Caracteristica</label>
					<input type="text" class="form-control input-sm" id="tipoSelect" name="tipoSelect">
					<label>Precio Minimo</label>
					<input type="text" class="form-control input-sm" id="precioMin" name="precioMin">
					<input type="hidden" class="form-control input-sm" id="precioMax" name="precioMax">
					<label>Potencia</label>
					<input type="text" class="form-control input-sm" id="potencia" name="potencia">
					<label>Cantidad</label>
					<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
                    <label>Imagen</label>
				    <input type="file" id="imagen" name="imagen">
					<br>
					<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
				</form>
			</div>
			
			<div class="col-sm-8">
			
				<div class="col-sm-4">
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
				<?php }?>
				<div class="col-sm-4">
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
						
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
							<option value="A">Selecciona Categoria</option>
							<?php
								$sql="SELECT id_categoria,categoria
								from categoria";
								$result=mysqli_query($conexion,$sql);
								while($ver=mysqli_fetch_row($result)): 
							?>
							<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php 
								endwhile; 
							?>
						</select>
						<label>Item</label>
						<input type="text" class="form-control input-sm" id="itemU" name="itemU">
						<label>Color</label>
						<select class="form-control input-sm" id="colorSelectU" name="colorSelectU">
							<?php
								$sql="SELECT id_color,color
								from color;";
								$result=mysqli_query($conexion,$sql);
								while($ver=mysqli_fetch_row($result)): 
							?>
							<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php 
								endwhile; 
							?>
						</select>
						<label>Material</label>
						<select class="form-control input-sm" id="materialSelectU" name="materialSelectU">
							<?php
								$sql="SELECT id_material,material
								from material;";
								$result=mysqli_query($conexion,$sql);
								while($ver=mysqli_fetch_row($result)): 
							?>
							<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php 
								endwhile; 
							?>
						</select>
						<label>Tipo</label>
						<input type="text" class="form-control input-sm" id="tipoSelectU" name="tipoSelectU">
						</select>
						<label>Precio Minimo</label>
						<input type="text" class="form-control input-sm" id="precioMinU" name="precioMinU">
						<label>Potencia</label>
						<input type="text" class="form-control input-sm" id="potenciaU" name="potenciaU">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
						
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

	$( "#filtro" ).keyup(function() {
		aux="Inventario/tablaInventario.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
		$('#tablaArticulosLoad').load(aux);
	});
	$( "#ubicacion" ).change(function() {
		aux="Inventario/tablaInventario.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
		$('#tablaArticulosLoad').load(aux);
	});

	function agregaDatosArticulo(idarticulo){
		$.ajax({
			type:"POST",
			data:"idart=" + idarticulo,
			url:"../Procesos/Inventario/obtenDatosProducto.php",
			success:function(r){
				dato = r.split(";",15);				
				$('#idArticuloU').val(dato[0]);
				$('#categoriaSelectU').val(dato[1]);
				$('#itemU').val(dato[2]);
				$('#colorSelectU').val(dato[3]);
				$('#materialSelectU').val(dato[4]);
				$('#tipoSelectU').val(dato[5]);
				$('#precioMinU').val(dato[6]);
				$('#precioMaxU').val(dato[7]);
				$('#potenciaU').val(dato[8]);
				$('#cantidadU').val(dato[9]);
			}
		});
	}

	function eliminaArticulo(idArticulo){
		alertify.confirm('¿Desea eliminar este articulo?', function(){ 
			$.ajax({
				type:"POST",
				data:"idarticulo=" + idArticulo,
				url:"../Procesos/Inventario/eliminarProducto.php",
				success:function(r){
					if(r==1){
						aux="Inventario/tablaInventario.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
						$('#tablaArticulosLoad').load(aux);
						alertify.success("Eliminado con exito!!");
					}else{
						alertify.error("No se pudo eliminar :(");
					}
				}
			});
		}, function(){ 
			alertify.error('Cancelo !')
		});
	}



	$(document).ready(function(){

		$('#tablaArticulosLoad').load("Inventario/tablaInventario.php?sql=&ubi=1");

		$('#btnActualizaarticulo').click(function(){
			datos=$('#frmArticulosU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../Procesos/Inventario/actualizarProducto.php",
				success:function(r){
					console.log(r);
					if(r==1){
						aux="Inventario/tablaInventario.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
						$('#tablaArticulosLoad').load(aux);
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Error al actualizar :(");
					}
				}
			});
		});


		$('#btnAgregaArticulo').click(function(){
			
            var formData = new FormData(document.getElementById("frmArticulos"));
			$.ajax({
				url: "../Procesos/Inventario/agregarProducto.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
				success:function(r){
					console.log(r);
					if(r == 1){
						$('#frmArticulos')[0].reset();
						aux="Inventario/tablaInventario.php?sql="+$("#filtro").val()+"&ubi="+$("#ubicacion").val();
						$('#tablaArticulosLoad').load(aux);
						alertify.success("Agregado con exito");
					}else{
						if(r=="dup"){
							alertify.error("Ya existe ese producto");
						}else{
							alertify.error("Fallo en el registro");
						}
							
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