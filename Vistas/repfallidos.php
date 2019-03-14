<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Repotes</title>
        <?php 
            require_once "menu.php";
            require_once "../Clases/Conexion.php"; 
            $c= new conectar();
            $conexion=$c->conexion();
        ?>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <h1>Reportes</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmReporte">
                    
                        <label>Ubicacion</label>
                        <select class="form-control input-sm" id="ubicacion" name="ubicacion">
                            <?php
                                if($_SESSION['privilegio']==1){
                                    $sql="SELECT id_usuario, usuario
                                    from usuario
                                    where id_privilegio!=1";
                                    $result=mysqli_query($conexion,$sql);
                                }else{
                                    $sql="SELECT id_usuario, usuario
                                    from usuario
                                    where usuario='".$_SESSION['usuario']."';";
                                    $result=mysqli_query($conexion,$sql);
                                }
                                while($ver=mysqli_fetch_row($result)): 
                                
                            ?>
                            <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                            <?php 
                                endwhile; 
                            ?>

                        <?php if($_SESSION['privilegio']==1){?>
                            <option value="Todas">Todas</option>
                        <?php } ?> 

                        </select>
                        <?php if($_SESSION['privilegio']==1){?>
                            <label>Fecha inicial</label>
                            <input type="date" id="fechaIni" name="fechaIni" class="form-control input-sm">

                            <label>Fecha final</label>
                            <input type="date" id="fechaFin" name="fechaFin" class="form-control input-sm"> 
                        <?php } ?>   

                        <br>
                        <span class="btn btn-primary btn-lg btn-block" id="btnBuscarDia">Registros fallidos del dia</span>
                        <span class="btn btn-primary btn-lg btn-block" id="btnBuscarMes">Registros fallidos del mes</span>

                        <?php if($_SESSION['privilegio']==1){?>
                            <span class="btn btn-primary btn-lg btn-block" id="btnBuscarFecha">Buscar fallidos entre fechas</span>
                        <?php } ?>
                    </form>
                </div>
                
                <div class="col-sm-6">
                    <div id="tablaReporte"></div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">

    $(document).ready(function(){
        
        $('#btnBuscarDia').click(function(){
            $('#tablaReporte').load("Reportes/tablafallidos.php?ubicacion="+$( "#ubicacion" ).val()+"&dato=1");
		});
        $('#btnBuscarMes').click(function(){
            $('#tablaReporte').load("Reportes/tablafallidos.php?ubicacion="+$( "#ubicacion" ).val()+"&dato=2");
		});
        $('#btnBuscarFecha').click(function(){
            $('#tablaReporte').load("Reportes/tablafallidos.php?ini="+$( "#fechaIni" ).val()+"&fin="+$( "#fechaFin" ).val()+"&dato=3"+"&ubicacion="+$( "#ubicacion" ).val());
		});
        
    });
    

</script>
<?php 
    }else{
        header("location:../index.php");
    }
?>
