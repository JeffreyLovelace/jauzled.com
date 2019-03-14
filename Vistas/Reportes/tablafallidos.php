<?php 
        require_once "../../Clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();

        $dato=$_GET['dato'];
        $dato=$_GET['dato'];
        $tz = 'America/La_Paz';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

        $dia = $dt->format('d');
        $mes = $dt->format('m');

        $aux=$_GET['ubicacion'];
        if($_GET['ubicacion']=="Todas"){
            $ubicacion="b.id_usuario>=0";
        }else{
            $ubicacion="b.id_usuario='$aux'";
        }

        
        if($dato==1){
            $sql="select a.item, b.usuario, c.cantidad, c.fecha, c.hora from producto a, usuario b, fallido c where a.id_usuario=b.id_usuario and c.id_producto=a.id_producto and $ubicacion and day(c.fecha)=$dia;";
            
                $result=mysqli_query($conexion,$sql);
        }
        if($dato==2){
            $sql="select a.item, b.usuario, c.cantidad, c.fecha, c.hora from producto a, usuario b, fallido c where a.id_usuario=b.id_usuario and c.id_producto=a.id_producto and $ubicacion and month(c.fecha)=$mes;";
            $result=mysqli_query($conexion,$sql);
        }
        if($dato==3){
            $sql="select a.item, b.usuario, c.cantidad, c.fecha, c.hora from producto a, usuario b, fallido c where a.id_usuario=b.id_usuario and c.id_producto=a.id_producto and $ubicacion and c.fecha BETWEEN '".$_GET['ini']."' AND '".$_GET['fin']."';";
            $result=mysqli_query($conexion,$sql);
        }
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