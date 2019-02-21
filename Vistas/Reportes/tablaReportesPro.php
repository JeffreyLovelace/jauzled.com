<?php 
        require_once "../../clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();

        $dato=$_GET['dato'];
        $tz = 'America/La_Paz';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

        $dia = $dt->format('d');
        $mes = $dt->format('m');

        if($dato==1){
            $sql="SELECT id_proforma, cliente, fecha, hora FROM proforma where id_usuario='".$_GET['ubicacion']."' and day(fecha)=$dia;";
            $result=mysqli_query($conexion,$sql);
        }
        if($dato==2){
            $sql="SELECT id_proforma, cliente, fecha, hora FROM proforma where id_usuario='".$_GET['ubicacion']."' and month(fecha)=$mes;";
            $result=mysqli_query($conexion,$sql);
        }
        if($dato==3){
            $sql="SELECT id_proforma, cliente, fecha, hora  FROM proforma WHERE fecha BETWEEN '".$_GET['ini']."' AND '".$_GET['fin']."';";
            $result=mysqli_query($conexion,$sql);
        }
        $result=mysqli_query($conexion,$sql);
        
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<br>
<tr>
    <td>Cliente </td>
    <td>Fecha</td>
    <td>Hora</td>
    <td>Recibo</td>
    
</tr>

<?php
    while ($ver=mysqli_fetch_row($result)):
?>
<tr>
    <td><?php echo $ver[1] ?></td>
    <td><?php echo $ver[2] ?></td>
    <td><?php echo $ver[3] ?></td>
    <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="verProforma('<?php echo $ver[0] ?>')">
            <span class="glyphicon glyphicon-pencil"></span>
        </span>
    </td>

</tr>
<?php 
    endwhile; 
?>
</table>