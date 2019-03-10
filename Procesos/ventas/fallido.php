<?php 
    session_start();

    $tz = 'America/La_Paz';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

    $fecha = $dt->format('Y-m-d');
    $hora = $dt->format('H:i:s');

    $categoria=$_POST['categoria'];
    $idproducto=$_POST['productoVenta'];
    $material=$_POST['material'];
    $color=$_POST['color'];
    $cantidad=$_POST['cantidadVenta'];
    $precio=$_POST['precio'];

    require_once "../../clases/Conexion.php"; 
    $c= new conectar();
    $conexion=$c->conexion();

//OBTENER ID USUARIO

    $us=$_SESSION['usuario'];
    $sql="SELECT id_usuario
    from usuario
    where usuario='$us';";
    $result=mysqli_query($conexion,$sql);
    $usuario=mysqli_fetch_row($result);

    $sql="SELECT item
        from producto
        where id_producto='$idproducto';";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);


    
    
    
    $sql="SELECT a.id_producto , b.usuario
    from producto a, usuario b
    where a.id_categoria=$categoria
    and a.item='".$item[0]."'
    and a.id_color=$color
    and a.id_material= $material
    and b.id_usuario=a.id_usuario
    and b.usuario= '".$_SESSION['usuario']."';";
    $result=mysqli_query($conexion,$sql);
    $idp=mysqli_fetch_row($result);

    $sql="SELECT cantidad from producto where id_producto='$idp[0]';";
    $result=mysqli_query($conexion,$sql);
    $stock=mysqli_fetch_row($result);
    $ncantidad=$stock[0]-$cantidad;

    $sql="UPDATE producto
    SET cantidad = '$ncantidad'
    WHERE id_producto='$idp[0]';";
    $result=mysqli_query($conexion,$sql);
    
    $sql="INSERT into fallido values (default,
        '$idp[0]',
        '$usuario[0]',
        '$cantidad',
        '$fecha',
        '$hora');";
    $result=mysqli_query($conexion,$sql);

    echo $result;

 ?>
 