<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="librerias/jquery-3.2.1.min.js"></script>
</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4 ">
            </div>
			<div class="col-sm-4 col-md-4 col-lg-4 ">
				<div class="panel panel-primary">
					<div class="panel panel-body ">
                        <div>
                            <img src="img/jauz.png" class="img-responsive center-block">
                        </div>
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Contraseña</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p id="error" style="color: red;"></p>
							<span class="btn btn-primary btn-lg btn-block" id="entrarSistema">Entrar</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
            datos=$('#frmLogin').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"Procesos/Login.php",
                success:function(r){
                    if(r==1){
                        window.location="Vistas/inventario.php";
                    }else{
                        document.getElementById("error").innerHTML = "* Revise el usuario y la contraseña";  
                    }
                }
            });
        });
	});
</script>