<?php 
        require_once "../../Clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();

        $sql="SELECT id_color, color
                FROM color;";
        $result=mysqli_query($conexion,$sql);
?>
<br>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<tr>
    <td>Categoria</td>
    <td>Editar</td>
    <td>Eliminar</td>
</tr>

<?php
    $i=0;
    while ($ver=mysqli_fetch_row($result)):
        $i++;
        if($i!=1){
?>
<tr>
    <td><?php echo $ver[1] ?></td>
    <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
            <span class="glyphicon glyphicon-pencil"></span>
        </span>
    </td>
    <td>
        <span class="btn btn-danger btn-xs" onclick="eliminaCategoria('<?php echo $ver[0] ?>')">
            <span class="glyphicon glyphicon-remove"></span>
        </span>
    </td>
</tr>
<?php 
        }
    endwhile; 
?>
</table>