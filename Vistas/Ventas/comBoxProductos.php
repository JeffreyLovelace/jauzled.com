<option value="A">Escoja un Producto</option>
<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="select b.id_producto, b.item 
        from categoria a, producto b ,usuario c 
        where a.id_categoria=b.id_categoria 
        and b.id_usuario=c.id_usuario 
        and c.usuario='".$_SESSION['usuario']."' 
        and a.id_categoria=".$_GET['categoria']." 
        group by b.item;";
    $result=mysqli_query($conexion,$sql);
    while ($producto=mysqli_fetch_row($result)):
?>
<option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
<?php endwhile; ?>