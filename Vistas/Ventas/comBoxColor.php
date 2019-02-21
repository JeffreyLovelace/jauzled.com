<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="select item from producto where id_producto=".$_GET['producto'].";";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);


    $sql="select b.id_color, d.color
    from categoria a, producto b ,usuario c ,color d
    where a.id_categoria=b.id_categoria 
    and d.id_color=b.id_color
    and b.id_usuario=c.id_usuario 
    and c.usuario='".$_SESSION['usuario']."'
    and b.id_color=d.id_color
    and b.item='".$item[0]."'
    group by color;";
    $result=mysqli_query($conexion,$sql);
    while ($color=mysqli_fetch_row($result)):
?>
<option value="<?php echo $color[0] ?>"><?php echo $color[1] ?></option>
<?php endwhile; ?>