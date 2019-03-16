<?php 
        require_once "../../Clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();

        $tz = 'America/La_Paz';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

        $mes = $dt->format('m');

        $sql="select c.categoria, a.item, SUM(b.cantidad) from producto a, detalleVentas b, categoria c, ventas d where d.id_venta=b.id_venta and a.id_producto=b.id_producto and c.id_categoria=a.id_categoria and month(d.fecha)=$mes group by(a.item) order by SUM(b.cantidad) DESC;";
        $result=mysqli_query($conexion,$sql);
?>
<br>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">

<tr>
    <td>Categoria</td>
    <td>Item</td>
    <td>Cantidad</td>
</tr>

<?php
    $i=0;
    while ($ver=mysqli_fetch_row($result) and $i<10):
?>
<tr>
    <td><?php echo $ver[0] ?></td>
    <td><?php echo $ver[1] ?></td>
    <td><?php echo $ver[2] ?></td>
    
</tr>
<?php 
$i++;
    endwhile; 
?>
</table>