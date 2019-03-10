<?php 
	session_start();
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $venta=$_POST['id'];
    $anteriorP=$_POST['idant'];
    $categoria=$_POST['categoria'];
    $idproducto=$_POST['productoVenta'];
    $material=$_POST['material'];
    $color=$_POST['color'];

    $cantidad=$_POST['cantidadVenta'];
    $precio=$_POST['precio'];


    $sql="SELECT item
    from producto
    where id_producto='$idproducto';";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);



    $sql="SELECT a.id_producto
    from producto a, usuario b
    where a.id_categoria=$categoria
    and a.item='".$item[0]."'
    and a.id_color=$color
    and a.id_material= $material
    and b.id_usuario=a.id_usuario
    and b.usuario= '".$_SESSION['usuario']."';";
    $result=mysqli_query($conexion,$sql);
    $idp=mysqli_fetch_row($result);


    $sql="UPDATE detalleventas
            SET id_producto = '$idp[0]',
            cantidad = '$cantidad',
            precio = '$precio'
            WHERE id_detalle_venta=$venta";
    $result=mysqli_query($conexion,$sql);
//actualizacantidad nuevo producto
    $sql="SELECT cantidad from producto where id_producto='$idp[0]';";
            $result=mysqli_query($conexion,$sql);
            $stock=mysqli_fetch_row($result);
            $ncantidad=$stock[0]-$cantidad;
            
    $sql="UPDATE producto
            SET cantidad = '$ncantidad'
            WHERE id_producto='$idp[0]';";
            $result=mysqli_query($conexion,$sql);

//actualizacantidad antiguo producto

    $sql="SELECT cantidad from producto where id_producto='$anteriorP';";
            $result=mysqli_query($conexion,$sql);
            $stock=mysqli_fetch_row($result);
            $ncantidad=$stock[0]+$cantidad;
            
    $sql="UPDATE producto
            SET cantidad = '$ncantidad'
            WHERE id_producto='$anteriorP';";
            $result=mysqli_query($conexion,$sql);

    echo $result;
 ?>