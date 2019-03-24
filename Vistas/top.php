<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Top Ventas</title>
        <?php require_once "menu.php"; ?>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <h1>Top Ventas</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmReporte">
                            <label>Fecha inicial</label>
                            <input type="date" id="fechaIni" name="fechaIni" class="form-control input-sm">

                            <label>Fecha final</label>
                            <input type="date" id="fechaFin" name="fechaFin" class="form-control input-sm"> 
                            <br>
                            <span class="btn btn-primary btn-lg btn-block" id="btnBuscarFecha">Buscar ventas entre fechas</span>
                    </form>
                </div>
                
                <div class="col-sm-6">
                    <div id="tablaTopLoad"></div>
                </div>
            </div>
        </div>

    </body>
</html>
<script type="text/javascript">
//Botones
    $(document).ready(function(){

        $('#tablaTopLoad').load("Top/tablaTop.php?dato=1");

        $('#btnBuscarFecha').click(function(){
            $('#tablaTopLoad').load("Top/tablaTop.php?ini="+$( "#fechaIni" ).val()+"&fin="+$( "#fechaFin" ).val()+"&dato=2");
		});
    });
</script>
<?php 
    }else{
        header("location:../index.php");
    }
?>