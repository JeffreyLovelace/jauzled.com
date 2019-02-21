<?php

  $consulta=ConsultarProducto($_GET['no']);


  function ConsultarProducto($no_prod)
  {
    $conexion=mysqli_connect('localhost','root','','jauzled');
    $sql="Select * from PaginaPrincipal where idPaginaPrincipal=1";
    $result=mysqli_query($conexion,$sql);
    while($mostrar=mysqli_fetch_array($result))
    return [
      $mostrar['idPaginaPrincipal'],
      $mostrar['celular'],
      $mostrar['correo'],
      $mostrar['direccion'],
      $mostrar['mision'],
      $mostrar['vision'],
      $mostrar['pais'],
      $mostrar['descripcion']
    ];

  }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Producto</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
 
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Datos</h1> </span>
  		<br>
      
	  <form action="modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">

      <input type="hidden" name="idPaginaPrincipal" value="<?php echo $consulta[0]?> ">
      
      <input type="hidden" name="no" value="<?php echo $consulta[0]?> ">
  		<label>Celular: </label>
  		<input type="text" id="celular" name="celular"; value="<?php echo $consulta[1] ?>" ><br>
  		
  		<label>Correo: </label>
  		<input type="text" id="correo" name="correo" value="<?php echo $consulta[2] ?>"><br>
        <label>Dirección: </label>
      <input type="text" id="direccion" name="direccion" value="<?php echo $consulta[3] ?>"><br>


          <label>Misión: </label>
      <textarea style="border-radius: 10px;" rows="3" cols="50" name="mision"> <?php echo $consulta[4] ?> </textarea><br>
          <label>Visión: </label>
      <textarea style="border-radius: 10px;" rows="3" cols="50" name="vision"> <?php echo $consulta[5] ?> </textarea><br>
              <label>País: </label>
      <input type="text" id="pais" name="pais" value="<?php echo $consulta[6] ?>"><br>
  		<label>Descripción: </label>
  		<textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion"> <?php echo $consulta[7] ?> </textarea><br>
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  


</div>


</body>
</html>