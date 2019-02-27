<!DOCTYPE html>
<html>
<head>


	<title>JazuLed</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minumum=1.0">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
</head>
<style type="text/css">
	.slider {
	width: 100%;
	margin: auto;
	overflow: hidden;
}

.slider ul {
	display: flex;
	padding: 0;
	width: 400%;
	
	animation: cambio 20s infinite alternate linear;
}

.slider li {
	width: 100%;
	list-style: none;
}

.slider img {
	width: 100%;
}

@keyframes cambio {
	0% {margin-left: 0;}
	20% {margin-left: 0;}
	
	25% {margin-left: -100%;}
	45% {margin-left: -100%;}
	
	50% {margin-left: -200%;}
	70% {margin-left: -200%;}
	
	75% {margin-left: -300%;}
	100% {margin-left: -300%;}
}
</style>
<body>

	
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
						<li  class="active"><a href="index.php">Inicio</a></li>
						<li><a href="categoria.php">Productos</a></li>
						<li ><a href="contactos.php">Contactos</a></li>
						<li ><a href="login.php">Usuarios</a></li>
				</ul>
			</div>
		</div>	
		</nav>
	</header>
	<br><br>
	<div class="container">
			<div class="slider">
			<ul>
				<?php
    $conexion=mysqli_connect('localhost','root','','jauzled');
        $sql=  mysqli_query($conexion,"select * from foto");
        while($res=  mysqli_fetch_array($sql)){ ?>
				<li>
<a href="<?php echo  $res["nombre"]; ?>" >
  <img src="Vistas/<?php echo  $res["foto"]; ?>"  alt="" style="width:100%; margin-bottom:10px;">
  </a>
 </li>

		 <?php
		}
		?>
			</ul>
		</div>

			<!--Indicadores-->
		

			<!--Contenedor de los slide-->
			
		<!--Controles-->
	
	</div>
  </div>
  
  <section class="main container">

 <div class="main">
        <div class="wrap">
            <div class="content-top">
              <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-group">
                        <div class="list-group-item text-dark">
                        	  <?php
    $conexion=mysqli_connect('localhost','root','','jauzled');
        $sql=  mysqli_query($conexion,"select * from PaginaPrincipal");
        while($res=  mysqli_fetch_array($sql)){ ?>
                            <p class="h2">Misión</p>
                            <p><?php echo $res["mision"] ?></p>

                        </div>
                        <div class="list-group-item text-dark">
                            <p class="h2">Visión</p>
                            <p><?php echo $res["vision"] ?></p>
                        </div>
                        </ul>

                   
												 <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1912.3589623141277!2d-68.0958820994139!3d-16.5403321989916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f212786cf4783%3A0x3327feada9c12e57!2sV.M.+del+Castillo%2C+La+Paz!5e0!3m2!1ses!2sbo!4v1528684752632" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
																</div>
                    </div>

                        <div class="col-md-4 hidden-xs hidden-sm">
                        <ul class="list-group">
                        <div class="list-group-item text-dark">
                         <!--  <center><a href="https://youtu.be/A7ZUsXlQlWU"><h1>YouTube</h1></a></center>-->
                    <a href="https://youtu.be/A7ZUsXlQlWU"  target="_blank"><img src="imgp/youtube.png" class="img-responsive img-rounded" width="30" height="30"  alt=""></a>
		

				<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A7ZUsXlQlWU?autoplay=0" allowfullscreen></iframe>
</div>
                        </div>
                        <div class="list-group-item text-dark">
                        <center><a href="categoria.php"><h1>Productos</h1></a></center>
                     <a href="categoria.php"><img src="imgp/jauzled_imagen1.jfif" class="img-responsive " alt=""></a>
                        </div>
                        </ul>
                 	
                </div>
              </div>
            </div>


</div>
</div>
</div>
</div>
</div></section>
</ul>
</div></div>
</nav>
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