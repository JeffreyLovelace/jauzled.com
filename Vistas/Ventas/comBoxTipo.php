<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="select item from producto where id_producto=".$_GET['producto'].";";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);


    $sql="select b.id_tipo, d.tipo
    from categoria a, producto b ,usuario c ,tipo d
    where a.id_categoria=b.id_categoria 
    and d.id_tipo=b.id_tipo
    and b.id_usuario=c.id_usuario 
    and c.usuario='".$_SESSION['usuario']."'
    and b.id_tipo=d.id_tipo
    and b.item='".$item[0]."'
    group by tipo;";
    $result=mysqli_query($conexion,$sql);
    while ($color=mysqli_fetch_row($result)):
?>
<option value="<?php echo $color[0] ?>"><?php echo $color[1] ?></option>
<?php endwhile; ?>