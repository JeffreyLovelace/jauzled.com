	<?php include('pagination.php'); 
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");?>
<!DOCTYPE html>
<html>
<head>
	<title>Categoria</title>
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
					<li class="active"><a href="categoria.php">Productos</a></li>
					<li ><a href="contactos.php">Contactos</a></li>
						<li ><a href="login.php">Usuarios</a></li>
			</div>
		</div>	
		</nav>
	</header>
<br>
	    <!-- Page Content -->
    <section class="main container">

	<div class="row">
		<section class="posts col-md-9">
				
	
		<div class="miga-de-pan">
			<ol class="breadcrumb">
				<li><a href="index.php">Inicio</a></li>
				<li class="active">Categoría</li>

				
			</ol>
			
		</div>
		

	<h1>Categoría</h1>

	<table class="table table-striped table-bordered table-hover ">
		<tr class="info">
		
			<td>Categoría</td>
			<td>Productos</td>
		</tr>
		 <?php session_start(); 
			while($crow = mysqli_fetch_array($nquery)){ ?>
		<tr>
		
			<td><h4><?php echo $crow['categoria']; ?></h4></td>
			<td>
		<a href="productos.php?id1=<?php echo $crow["id_categoria"];

				  ?>&categoria=<?php echo $crow["categoria"];

				  ?>" class="btn btn-info" >Productos</a>
		<?php 
			 ?>
		


			</td>
		</tr>
		<?php
		}
		?>

	</table>

		
		<div id="pagination_controls">
			<?php echo $paginationCtrls; ?>
		</div>

		</section>
			<?php
			$conexion=mysqli_connect('localhost','root','','Jauzled');
			?>
		<aside class="col-md-3 hidden-xs hidden-sm">
		<div class="list-group">
		<a href="#" class="list-group-item active"> Categoría</a>

		<?php
		$sql="Select * from categoria";
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		?>
		
	
		
		<a href="productos.php?id1=<?php echo $mostrar["id_categoria"];

				  ?>&categoria=<?php echo $mostrar["categoria"];

				  ?>" class="list-group-item" ><?php echo $mostrar["categoria"] ?></a>

		
		<?php
		}
		?>

	</div>
	</aside>
	<aside class="col-md-3 ">
	<div>
	<h4>Comentarios de clientes</h4>
	                     	  <?php
    $conexion=mysqli_connect('localhost','root','','Jauzled');
        $sql=  mysqli_query($conexion,"select * from comentario");
        while($res=  mysqli_fetch_array($sql)){ ?>
	<a href="#" class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $res["nombre"] ?></h4>
		<p class="list-group-item-text"><?php echo $res["comentario"] ?> </p>
	</a>
	<?php
		}
		?>

	</div>
</aside>
</section>
</body>
<?php
   $conexion=mysqli_connect('localhost','root','','Jauzled');
        $sql=  mysqli_query($conexion,"select * from paginaPrincipal");
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
						<a href="https://www.facebook.com/jauzled/" target="_blank"><img src="imgp/face.png" class="img-responsive img-rounded" alt=""></a>
						<a href="https://api.whatsapp.com/send?phone=59176764195&text=Me quiero comunicar" target="_blank"><img src="imgp/wapp.png" class="img-responsive img-rounded" alt=""  ></a>
				

				</div>

			</div>

		</footer>
</body>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>