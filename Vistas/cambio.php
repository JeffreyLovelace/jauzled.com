<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cambiar</title>
        <?php 
            require_once "menu.php";
            require_once "../clases/Conexion.php"; 
            $c= new conectar();
            $conexion=$c->conexion();

            $sql="SELECT id_usuario, usuario
            from usuario
            where usuario='".$_SESSION['usuario']."';";
            $result=mysqli_query($conexion,$sql);

            $usuario=mysqli_fetch_row($result);
            
        ?>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <h1>Cambiar</h1> 
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmVentas">
                        <label>Cliente - Recibo</label>
                        <select class="form-control input-sm" id="tipoSelectU" name="tipoSelectU">
                            <?php 
                                $tz = 'America/La_Paz';
                                $timestamp = time();
                                $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                                $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

                                $mes = $dt->format('m');
                            
                                $sql="SELECT id_venta, cliente, fecha, hora, id_venta FROM ventas where id_usuario='".$usuario[0]."' and month(fecha)=$mes;";
                                $result=mysqli_query($conexion,$sql);
                                while ($ver=mysqli_fetch_row($result)):
                            ?>

                            <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]." -- ".$ver[4]; ?></option>  
                            
                            <?php endwhile; ?>
                        </select>
                        <br>
                        <span class="btn btn-primary btn-lg btn-block" id="btnVer">Ver</span>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div id="tablaCambio"></div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualiza colores</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmCambioU">
                            <input type="hidden"  id="id" name="id">
                            <input type="hidden"  id="idant" name="idant">
                            
                            <label>Categoria </label><br>
                            <select class="form-control btn-block" id="categoria" name="categoria">
                                <?php
                                    $sql="select a.id_categoria, a.categoria from categoria a, producto b ,usuario c where a.id_categoria=b.id_categoria and b.id_usuario=c.id_usuario and c.usuario='".$_SESSION['usuario']."' group by a.categoria;";
                                    $result=mysqli_query($conexion,$sql);
                                    while ($categoria=mysqli_fetch_row($result)):
                                ?>
                                <option value="<?php echo $categoria[0] ?>"><?php echo $categoria[1] ?></option>
                                <?php endwhile; ?>
                            </select>

                            <label>Producto </label><br>
                            <select class="form-control btn-block" id="productoVenta" name="productoVenta">
                                
                            </select>

                            <label>Color </label><br>
                            <select class="form-control btn-block" id="color" name="color">

                            </select>

                            <label>Material</label>
                            <select class="form-control btn-block" id="material" name="material">
                                    
                            </select>


                            <label>Cantidad a vender</label>
                            <input type="text" class="form-control btn-block" id="cantidadVenta" name="cantidadVenta">

                            <label>Precio</label>
                            <input type="text" class="form-control btn-block" id="precio" name="precio">

                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCambiar" class="btn btn-warning" data-dismiss="modal">Cambiar</button>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    function agregaDato(venta,antprod){
        $('#id').val(venta);
        $('#idant').val(antprod);
    }
    
    $(document).ready(function(){
        $('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
        $('#btnVer').click(function(){
            $('#tablaCambio').load("Cambio/tablaCambio.php?venta="+$('#tipoSelectU').val());
        });
        $( "#categoria" ).change(function() {
			$('#productoVenta').load("ventas/comBoxProductos.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
		});
		$( "#productoVenta" ).change(function() {
			$('#color').load("ventas/comBoxColor.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
			$('#material').load("ventas/comBoxMaterial.php?categoria="+$( "#categoria" ).val()+"&producto="+$( "#productoVenta" ).val());
			$("#cantidadDisp").val("");
        });
        
        $( "#btnCambiar" ).click(function() {
            datos=$('#frmCambioU').serialize();
            console.log(datos);
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/Cambio/crearCambio.php",
                success:function(r){
                    console.log(r);
                    if(r==1){
                        location.reload();
                        alertify.success("Actualizado con exito :)");
                    }else{
                        alertify.error("no se pudo actaulizar :(");
                    }
                }
            });
		});
    });
</script>
<?php 
    }else{
        header("location:../index.php");
    }
?>