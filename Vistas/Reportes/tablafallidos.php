<?php 
    require_once "../../Clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $tz = 'America/La_Paz';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

    $dia = $dt->format('d');
    $mes = $dt->format('m');

    $aux=$_GET['ubicacion'];
    if($_GET['ubicacion']=="Gerente"){
        $ubicacion="b.id_usuario=1";
    }else{
        $ubicacion="b.id_usuario='$aux'";
    }
    $sql="select a.item, b.usuario, c.cantidad, c.fecha, c.hora from producto a, usuario b, fallido c where a.id_usuario=b.id_usuario and c.id_producto=a.id_producto and $ubicacion ;";        
    $result=mysqli_query($conexion,$sql);
    
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<br>
<tr>
    <td>Item</td>
    <td>Usuario </td>
    <td>Cantidad</td>
    <td>Fecha</td>
    <td>Hora</td>
</tr>

<?php
    while ($ver=mysqli_fetch_row($result)):
?>
<tr>
    <td><?php echo $ver[0] ?></td>
    <td><?php echo $ver[1] ?></td>
    <td><?php echo $ver[2] ?></td>
    <td><?php echo $ver[3] ?></td>
    <td><?php echo $ver[4] ?></td>
</tr>
<?php 
    endwhile; 
?>
</table>