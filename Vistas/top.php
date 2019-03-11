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
                <div class="col-sm-12">
                    <div id="tablaTopLoad"></div>
                </div>
            </div>
        </div>

    </body>
</html>
<script type="text/javascript">
//Botones
    $(document).ready(function(){

        $('#tablaTopLoad').load("Top/tablaTop.php");

    });
</script>
<?php 
    }else{
        header("location:../index.php");
    }
?>