<?php 

    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar Página Principal</title>
        <?php require_once "menu.php"; ?>
    </head>
     <body>
        <div class="container">
            <div class="text-center">
                <h1>Editar Página Principal</h1>
            </div>
         
        </div>
<center><h2>Información</h2></center>
<table style="margin: auto; width: 800px; "  class="table table-striped table-bordered table-hover ">
  		<thead>
  			<th>Celular</th>
  			<th>Correo</th>
  			<th>Direccion</th>
  			<th>Misión</th>
  			<th>Visión</th>
  			<th>País</th>
  				<th>Descripción</th>
          <th>Modificar</th>

  		</thead>
  		
  		
<?php
			$conexion=mysqli_connect('localhost','root','','Jauzled');
			?>

	<?php		
   	$sql="Select * from paginaPrincipal where idPaginaPrincipal=1";
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result))
      {
        echo "<tr>";
          echo "<td>"; echo $mostrar['celular']; echo "</td>";
          echo "<td>"; echo $mostrar['correo']; echo "</td>";
          echo "<td>"; echo $mostrar['direccion']; echo "</td>";
          echo "<td>"; echo $mostrar['mision']; echo "</td>";
             echo "<td>"; echo $mostrar['vision']; echo "</td>";
             echo "<td>"; echo $mostrar['pais']; echo "</td>";
                echo "<td>"; echo $mostrar['descripcion']; echo "</td>";
       echo "<td>  <a href='../Procesos/EditarPagina/modif_prod1.php?no=".$mostrar['idPaginaPrincipal']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
  
        echo "</tr>";
      }

      ?>
  	</table>

    <hr style="color: #0056b2; " />

<center><h2>Fotos del banner</h2></center>
<div>
  <body style='background-image:url(fondo/wallpaper.jpg);background-attachment:fixed;background-repeat:no-repeat;background-position:50% 50%;'>
     

        <form action="../Procesos/EditarPagina/valida_foto.php" method="POST" enctype="multipart/form-data">
            <center><table border="1">
              <table style="margin: auto; width: 800px; "  class="table table-striped table-bordered table-hover ">
            <tr>        
                <td><strong>URL:</strong></td><td> <input type="text" name="txtnom" value=""></td>
            </tr>
            <tr >
            <td><strong>Foto:</strong></td>  <td><input type="file" name="foto" id="foto"  required></td>
            </tr>
            <tr>
                <?php
        $sql=  mysqli_query($conexion,"select * from foto");
        $c=0;
        while($res=  mysqli_fetch_array($sql)){ 
          
          $c++;
      
    }

   if ($c>=4){?>
            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Publicar"  disabled=""><div class="alert alert-danger">Banner Completo</div></td>
      <?php   }
      else {?>
         <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Publicar" ><div class="alert alert-success">Por favor agregue <?php echo 4-$c;?> fotos. </div></td>

         <?php   }
      ?>
          </table>
            </center></table>
        </form>    
        <br>
         
      <table style="margin: auto; width: 800px; "  class="table table-striped table-bordered table-hover ">
      <thead>
        <th>URL</th>
        <th>Foto</th>
     
          <th>Eliminar</th>

      </thead>
        <?php

        $sql=  mysqli_query($conexion,"select * from foto");
        while($res=  mysqli_fetch_array($sql)){
          
        echo "<tr>";
          echo "<td>"; echo $res['nombre']; echo "</td>";
          echo "<td>"; echo '<img src="'.$res["foto"].'" width="100" heigth="100"><br>'; echo "</td>";
          
        echo "<td> <a href='../Procesos/EditarPagina/eliminar_prod.php?no=".$res['Idfoto']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
        
        echo "</tr>";
      }

      ?>
    </table>
        <br>
    </body>
</div>
    <hr style="color: #0056b2; " />
<div>
  <center><h2>Comentarios</h2></center>
   <form action="../Procesos/EditarPagina/valida_comentario.php" method="POST" enctype="multipart/form-data">
            <center><table border="1">
              <table style="margin: auto; width: 800px; "  class="table table-striped table-bordered table-hover ">
            <tr>        
                <td><strong>Nombre:</strong></td><td> <input type="text" name="txtnom" value=""  required></td>
            </tr>
            <tr >
            <td><strong>Comentario:</strong></td>  <td><input type="text" name="txtcom" value=""  required></td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Publicar"></td>
            </tr>
          </table>
            </center></table>
        </form>  
 <br>
          <table style="margin: auto; width: 800px; "  class="table table-striped table-bordered table-hover ">
      <thead>
        <th>Nombre</th>
        <th>Comentario</th>
     
          <th>Eliminar</th>

      </thead>
        <?php
 
        $sql=  mysqli_query($conexion,"select * from comentario");
        while($res=  mysqli_fetch_array($sql)){
          
        echo "<tr>";
          echo "<td>"; echo $res['nombre']; echo "</td>";
            echo "<td>"; echo $res['comentario']; echo "</td>";
          
        echo "<td> <a href='../Procesos/EditarPagina/eliminar_comentario.php?no=".$res['IdComentario']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
  
        echo "</tr>";
      }

      ?>
    </table>
</div>
</div>

    </body>
</html>

<?php 
    }else{
        header("location:../index.php");
    }
?>