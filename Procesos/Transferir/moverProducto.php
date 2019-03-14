<?php 
	session_start();
	require_once "../../clases/Conexion.php";

        $idArticulo=$_POST['idArticuloU'];
        $cantidad=$_POST['cantidadU'];
        $ubicacion=$_POST['ubicacion'];

        if($ubicacion=="bodega"){
            $ubicacion=1;
        }

        $c= new conectar();
        $conexion=$c->conexion();

        $sql="SELECT item, tipo, id_material, id_color, cantidad from producto where id_producto='$idArticulo';";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);

        $sobraCantidad=$ver[4]-$cantidad;
        $sql1="UPDATE producto
            SET cantidad = '$sobraCantidad'
            WHERE id_producto='$idArticulo';";
            $result=mysqli_query($conexion,$sql1);

        $sql="SELECT COUNT(item) from producto where item='".$ver[0]."' and tipo='".$ver[1]."' and id_material='$ver[2]' and id_color='$ver[3]' and id_usuario='$ubicacion';";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        if($ver[0]==0){
            $sql="SELECT * from producto where id_producto='$idArticulo'";
            $result=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result);
            $ver[2]=$ubicacion;
            $ver[10]=$cantidad;
            $sql="insert into Producto values(default,'$ver[1]','$ver[2]','$ver[3]','$ver[4]','$ver[5]','$ver[6]','$ver[7]','$ver[8]','$ver[9]','$ver[10]','$ver[11]');";
            $result=mysqli_query($conexion,$sql);
            echo $result;  
        }else{
            $sql="SELECT item, tipo, id_material, id_color from producto where id_producto='$idArticulo';";
            $result=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result);

            $sql="SELECT id_producto, cantidad from producto where item='".$ver[0]."' and tipo='$ver[1]' and id_material='$ver[2]' and id_color='$ver[3]' and id_usuario='$ubicacion';";
            $result=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result);

            //ver0 id_producto del usuario a actualizar
            //ver1 cantidad del prodcuto 
            $ncantidad=$ver[1]+$cantidad;
            $sql="UPDATE producto
            SET cantidad = '$ncantidad'
            WHERE id_producto='$ver[0]';";
            $result=mysqli_query($conexion,$sql);
            echo $result; 


        }
 ?>