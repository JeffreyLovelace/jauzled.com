<?php 
	session_start();
	require_once "../../Clases/Conexion.php";

    $nombreImg=$_FILES['imagen']['name'];
    $extension = explode(".",$nombreImg);
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/';
    $rutaFinal=$carpeta.$_POST['item'].".".$extension[1];
    $ruta="../Imagenes/".$_POST['item'].".".$extension[1];
    
    //if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
    if(true){
        $categoria=$_POST['categoriaSelect'];
        $item=$_POST['item'];
        $color=$_POST['colorSelect'];
        $material=$_POST['materialSelect'];
        $tipo=$_POST['tipoSelect'];
        $precioMin=$_POST['precioMin'];
        $precioMax="0";
        $potencia=$_POST['potencia'];
        $cantidad=$_POST['cantidad'];
        $usuario=$_SESSION['usuario'];

        $c= new conectar();
        $conexion=$c->conexion();

        $sql="SELECT * from producto where item='$item' and id_categoria='$categoria' and id_color ='$color';";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result); 
        if($ver[0]!=null){
            echo "dup";
        }else{
            $sql="SELECT id_usuario,usuario from usuario where usuario='".$usuario."';";
            $result=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result);

            $sql="INSERT into producto values (default,'$item','1','$categoria','$color','$material','$tipo','$potencia','$precioMin','$precioMax','$cantidad','$ruta');";
            echo mysqli_query($conexion,$sql);
        }
    }
 ?>