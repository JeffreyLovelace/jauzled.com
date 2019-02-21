<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
?>


<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
	<?php
		require_once "menu.php";
		require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
	?>
</head>
<body>
	<div class="container">
		<h1>Usuarios</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmArticulos" enctype="multipart/form-data">
					<label>Tipo de Usuario</label>
					<select class="form-control input-sm" id="TipoSelect" name="tipoSelect">
						<option value="A">Selecciona Privilegio</option>
						<?php
							$sql="SELECT id_privilegio,privilegio
							from privilegio";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
					<label>Primer Nombre</label>
					<input type="text" class="form-control input-sm" id="pNombre" name="pNombre">
					<label>Segundo Nombre</label>
					<input type="text" class="form-control input-sm" id="sNombre" name="sNombre">
					<label>Primer Apellido</label>
					<input type="text" class="form-control input-sm" id="pApellido" name="pApellido">
					<label>Segundo Apellido</label>
					<input type="text" class="form-control input-sm" id="sApellido" name="sApellido">
					<label>Nombre de usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" name="usuario">
					<label>Password</label>
					<input type="text" class="form-control input-sm" id="password" name="password">
					<label>Direccion</label>
					<input type="text" class="form-control input-sm" id="direccion" name="direccion">
					<br>
					<span id="btnAgregaUsuario" class="btn btn-primary">Agregar</span>
				</form>
			</div>
			<div class="col-sm-8">
				<div id="tablaUsuariosLoad"></div>
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
					<input type="text"  id="idUsuarioU" name="idUsuarioU" hidden="">

					<label id="Ltipo">Tipo de Usuario</label>
					<select class="form-control input-sm" id="TipoSelectU" name="TipoSelectU">
						<option value="A">Selecciona Privilegio</option>
						<?php
							$sql="SELECT id_privilegio,privilegio
							from privilegio";
							$result=mysqli_query($conexion,$sql);
							while($ver=mysqli_fetch_row($result)): 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php 
							endwhile; 
						?>
					</select>
					<label>Primer Nombre</label>
					<input type="text" class="form-control input-sm" id="pNombreU" name="pNombreU">
					<label>Segundo Nombre</label>
					<input type="text" class="form-control input-sm" id="sNombreU" name="sNombreU">
					<label>Primer Apellido</label>
					<input type="text" class="form-control input-sm" id="pApellidoU" name="pApellidoU">
					<label>Segundo Apellido</label>
					<input type="text" class="form-control input-sm" id="sApellidoU" name="sApellidoU">
					<label>Nombre de usuario</label>
					<input type="text" class="form-control input-sm" id="usuarioU" name="usuarioU">
					<label id="Lpass">Password</label>
					<input type="text" class="form-control input-sm" id="passwordU" name="passwordU">
					<label>Direccion</label>
					<input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
						
					<br>
						

					</form>
				</div>
				<div class="modal-footer">
					<button id="btnActualizarUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

				</div>
			</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	function agregaDatosUsuario(idUsuarioU){
		$.ajax({
			type:"POST",
			data:"idart=" + idUsuarioU,
			url:"../procesos/usuarios/obtenDatosUsuario.php",
			success:function(r){
				dato = r.split(";",15);				
				$('#pNombreU').val(dato[0]);
				$('#sNombreU').val(dato[1]);
				$('#pApellidoU').val(dato[2]);
				$('#sApellidoU').val(dato[3]);
				$('#usuarioU').val(dato[4]);
				$('#passwordU').val(dato[5]);
				$('#direccionU').val(dato[6]);
				$('#TipoSelectU').val(dato[7]);
				$('#idUsuarioU').val(idUsuarioU);
				if(dato[7]==1 & dato[4]!="<?php echo $_SESSION['usuario']; ?>"){
					$('#passwordU').attr("type", "hidden");
					$('#Ltipo').text(" ");
					$('#Lpass').text(" ");
					$('#TipoSelectU').attr("style", "display:none;");
				}else{
					$('#passwordU').attr("type", " ");
					$('#Lpass').text("Password");
					$('#Ltipo').text("Tipo de Usuario");
					$('#TipoSelectU').attr("style", "display:block;");
				}
			}
		});
	}

	function eliminaArticulo(idArticulo){
		alertify.confirm('¿Desea eliminar este usuario?', function(){ 
			$.ajax({
				type:"POST",
				data:"idarticulo=" + idArticulo,
				url:"../procesos/usuarios/eliminarUsuario.php",
				success:function(r){
					if(r==1){
						$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("No se pudo eliminar");
					}
				}
			});
		}, function(){ 
			alertify.error('Cancelo !')
		});
	}


	$(document).ready(function(){

		$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");

		$('#btnActualizarUsuario').click(function(){
			datos=$('#frmArticulosU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/usuarios/actualizarUsuraio.php",
				success:function(r){
					if(r==1){
						$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Error al actualizar ");
					}
				}
			});
		});


		$('#btnAgregaUsuario').click(function(){
			datos=$('#frmArticulos').serialize();
			$.ajax({
				type:"POST",
                data:datos,
				url: "../procesos/usuarios/agragarUsuario.php",
				success:function(r){
					if(r == 1){
						$('#frmArticulos')[0].reset();
						$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
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