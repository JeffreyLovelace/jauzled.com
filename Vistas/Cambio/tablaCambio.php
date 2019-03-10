<?php 
        require_once "../../clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();

        $venta=$_GET['venta'];

        $sql="select a.item, b.color, a.tipo, c.material, a.potencia, f.precio, f.cantidad, f.id_detalle_venta , f.id_producto
							from producto a, color b, material c, categoria e, detalleventas f
							where a.id_color=b.id_color
							and a.id_material=c.id_material
							and a.id_categoria=e.id_categoria
							and f.id_venta=$venta
							and a.id_producto = f.id_producto;";
        $result=mysqli_query($conexion,$sql);
?>
<br>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<tr>
    <td>item</td>
    <td>Color</td>
    <td>Caracteristica</td>
    <td>Material</td>
    <td>Potencia</td>
    <td>Precio</td>
    <td>Cantidad</td>
    <td>Total</td>
    <td>Editar</td>
    
</tr>

<?php
    $i=0;
    $total=0;
    while ($ver=mysqli_fetch_row($result)):
        $i++;
        
            $total=$total+$ver[5]*$ver[6];
?>
<tr>
    <td><?php echo $ver[0] ?></td>
    <td><?php echo $ver[1] ?></td>
    <td><?php echo $ver[2] ?></td>
    <td><?php echo $ver[3] ?></td>
    <td><?php echo $ver[4] ?></td>
    <td><?php echo $ver[5] ?></td>
    <td><?php echo $ver[6] ?></td>
    <td><?php echo $ver[5]*$ver[6] ?></td>

    <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="agregaDato('<?php echo $ver[7] ?>','<?php echo $ver[8] ?>')">
            <span class="glyphicon glyphicon-pencil"></span>
        </span>
    </td>

</tr>
<?php 
        
    endwhile; 
?>
</table>
<h3>Total Bs: <?php echo $total ?></h3> 