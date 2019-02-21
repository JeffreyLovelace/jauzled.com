<?php
    session_start();
    require_once "../Clases/Conexion.php";
    
    $usuario=$_POST['usuario'];
    $pass=$_POST['password'];

    $c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT id_privilegio from Usuario where usuario='$usuario' and password='$pass';";
    $result=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['usuario']=$usuario;
        $_SESSION['privilegio']=$ver[0];
        echo 1;
    }else{
        echo 0;
    }
?>