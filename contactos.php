<!DOCTYPE html>
<html>
<head>
	<title>Contactos</title>
				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minumum=1.0">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
</head>
<body>

	<br><br>
	<header>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			<a href="index.php"><img class="" src="../img/jauz.png" alt="" width="200px" height="50px" ></a>
			</div>

			<div class="collapse navbar-collapse" id="navbar1">
		
			

				<ul class="nav navbar-nav navbar-right">
						<li  ><a href="index.php">Inicio</a></li>
					<li><a href="categoria.php">Productos</a></li>
					<li class="active"><a href="contactos.php">Contactos</a></li>
						<li ><a href="login.php">Usuarios</a></li>
			</div>
		</div>	
		</nav>
	</header>
<body>
	<div class="container">
		<br>
			<form action="" class="">
			
				<div class="form-group">

			<label form="nombre">Nombre:</label>
			<input class="form-control" id="nombre" type="text" placeholder="Nombre:">
				<label form="nombre">Email:</label>
			<input class="form-control" id="nombre" type="text" placeholder="Email:">
				<label form="nombre">Celular:</label>
			<input class="form-control" id="nombre" type="text" placeholder="Celular:">
				</div>

<div class="form-group">
		<label for="mansaje">Mensaje:</label>
		<textarea class="form-control" id="mensaje" placeholder="Escribe tu mensaje"></textarea>
	</div>
	<div class="form-group">
		

		<button class="btn btn-primary">Enviar</button>
			</form>
	</div>
	</div>


</body>
<?php
   $conexion=mysqli_connect('localhost','root','','jauzled');
        $sql=  mysqli_query($conexion,"select * from PaginaPrincipal");
        while($res=  mysqli_fetch_array($sql)){ ?>
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Jauz<span>Led</span></h3>

				<p class="footer-links">
					<a href="index.php">Inicio</a>
					·
					<a href="categoria.php">Productos</a>
					·
					<a href="contactos.php">Contactos</a>
				
				</p>

				<p class="footer-company-name">JauzLed &copy; 2019</p>
			</div>

			<div class="footer-center">

				<div>
				<span class="glyphicon glyphicon-pushpin" style="color:white"></span>
				
					<p><span><?php echo $res["direccion"] ?></span> <?php echo $res["pais"] ?></p>
				</div>
<br>
				<div>
					<span class="glyphicon glyphicon-earphone" style="color:white"></span>
					<p><?php echo $res["celular"] ?></p>
				</div>
<br>	
				<div>
					<span class="glyphicon glyphicon-envelope" style="color:white"></span>
					<p><a href=""><?php echo $res["correo"] ?></a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Sobre JauzLed</span>
					<?php echo $res["descripcion"] ?>
				</p>
<?php
		}
		?>
				<div class="footer-icons">

					<a href="https://www.youtube.com/channel/UCrCqQ8H9iocAyAgxdjj8RTw"  target="_blank"><img src="imgp/youtube1.png" class="img-responsive " alt=""></a>
						<a href="https://www.facebook.com/jauzled/" target="_blank"><img src="imgp/face.png" class="img-responsive img-rounded" alt="" "></a>
						<a href="https://api.whatsapp.com/send?phone=59176764195&text=Me quiero comunicar" target="_blank"><img src="imgp/wapp.png" class="img-responsive img-rounded" alt=""  ></a>
				

				</div>

			</div>

		</footer>
</body>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>