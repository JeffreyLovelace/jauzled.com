<?php
    error_reporting(0);
    session_start();
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    
    $categoria=$_POST['categoria'];
    $idproducto=$_POST['productoVenta'];
    $material=$_POST['material'];
    $color=$_POST['color'];
    $tipo=$_POST['tipo'];
    $cantidad=$_POST['cantidadVenta'];
    $precio=$_POST['precio'];

    $sql="SELECT item
        from producto
        where id_producto='$idproducto';";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);

    $sql="SELECT a.cantidad
    from producto a, usuario b
    where a.id_categoria=$categoria
    and a.item='".$item[0]."'
    and a.id_color=$color
    and a.id_material= $material
    and a.id_tipo=$tipo
    and b.id_usuario=a.id_usuario
    and b.usuario= '".$_SESSION['usuario']."';";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);

    $result=mysqli_query($conexion,$sql);
    $cantidad=mysqli_fetch_row($result);
    echo $cantidad[0];
    
?>