
<?php 
	session_start();
	require_once "../../clases/Conexion.php";
    
    if(isset($_SESSION['tablaComprasTemp'])){
        $c= new conectar();
        $conexion=$c->conexion();

        $tz = 'America/La_Paz';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

        $fecha = $dt->format('Y-m-d');
        $hora = $dt->format('H:i:s');

        $idusuario=$_SESSION['usuario'];
        $sql="SELECT id_usuario
                from usuario
                where usuario='$idusuario';";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $idusuario=$ver[0];

        $sql="SELECT count(id_proforma)
                from proforma;";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $cantidad=$ver[0]+1;

        $sql="INSERT into proforma values (default,
                        '".$_POST['cliente']."',
                        '$fecha',
                        '$hora',
                        '$idusuario');";
        $result=mysqli_query($conexion,$sql);

        $datos=$_SESSION['tablaComprasTemp'];
        for ($i=0; $i < count($datos) ; $i++) { 
            $d=explode("||", $datos[$i]);

            $sql="INSERT into detalleproforma values (default,
                                    '$cantidad',
                                    '$d[0]',
                                    '$d[6]',
                                    '$d[7]');";
            $result=mysqli_query($conexion,$sql);
            
            $sql="SELECT cantidad from producto where id_producto='$d[0]';";
            $result=mysqli_query($conexion,$sql);
            $stock=mysqli_fetch_row($result);
            $ncantidad=$stock[0]-$d[6];

        }
        unset($_SESSION['tablaComprasTemp']);

        echo "1";
    }else{
        echo 0;
    }
    
 ?>