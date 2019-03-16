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
            $ubicacion="a.id_usuario>=0";
        }else{
            $ubicacion="a.id_usuario='$aux'";
        }

        
        if($dato==1){
            $sql="SELECT a.id_proforma, a.cliente, a.fecha, a.hora, c.usuario FROM proforma a, detalleProforma b, usuario c where $ubicacion and a.id_proforma=b.id_proforma and day(a.fecha)=$dia and c.id_usuario=a.id_usuario group by id_proforma;";
            
                $result=mysqli_query($conexion,$sql);
        }
        if($dato==2){
            $sql="SELECT a.id_proforma, a.cliente, a.fecha, a.hora, c.usuario FROM proforma a, usuario c where $ubicacion and month(a.fecha)=$mes and a.id_usuario=c.id_usuario;";
            $result=mysqli_query($conexion,$sql);
        }
        if($dato==3){
            $sql="SELECT a.id_proforma, a.cliente, a.fecha, a.hora, c.usuario FROM proforma a, usuario c WHERE a.fecha BETWEEN '".$_GET['ini']."' AND '".$_GET['fin']."' and a.id_usuario=c.id_usuario and $ubicacion;";
            $result=mysqli_query($conexion,$sql);
        }
    $result=mysqli_query($conexion,$sql);
        
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<br>
<tr>
    <td>Ubicacion</td>
    <td>Cliente </td>
    <td>Fecha</td>
    <td>Hora</td>
    <td>Monto</td>
    <td>Recibo</td>
</tr>

<?php
    while ($ver=mysqli_fetch_row($result)):
?>
<tr>
    <td><?php echo $ver[4] ?></td>
    <td><?php echo $ver[1] ?></td>
    <td><?php echo $ver[2] ?></td>
    <td><?php echo $ver[3] ?></td>
    <?php
        $tot=0;
        $sql="SELECT a.precio, a.cantidad FROM detalleProforma  a where a.id_proforma=$ver[0];";
        $result1=mysqli_query($conexion,$sql);
        while($dat=mysqli_fetch_row($result1)): 
            $tot=$tot+$dat[0]*$dat[1];
        endwhile; 
    ?>
    <td><?php echo $tot ?></td>
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