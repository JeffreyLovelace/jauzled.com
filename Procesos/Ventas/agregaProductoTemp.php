<?php 
    session_start();

    $categoria=$_POST['categoria'];
    $idproducto=$_POST['productoVenta'];
    $material=$_POST['material'];
    $color=$_POST['color'];
    $cantidad=$_POST['cantidadVenta'];
    $precio=$_POST['precio'];

    require_once "../../clases/Conexion.php"; 
    $c= new conectar();
    $conexion=$c->conexion();
    $sql="SELECT item
        from producto
        where id_producto='$idproducto';";
    $result=mysqli_query($conexion,$sql);
    $item=mysqli_fetch_row($result);


    $aux=0;
    if(isset($_SESSION['tablaComprasTemp'])){
        for($i=0;$i<count($_SESSION['tablaComprasTemp']);$i++){
            if(substr($_SESSION['tablaComprasTemp'][$i], 0,1)==$idproducto){
                $aux++;
                echo $aux;
            }
            
        }
    }
    
    if($aux==0){
        $sql="SELECT a.id_producto , b.usuario
        from producto a, usuario b
        where a.id_categoria=$categoria
        and a.item='".$item[0]."'
        and a.id_color=$color
        and a.id_material= $material
        and b.id_usuario=a.id_usuario
        and b.usuario= '".$_SESSION['usuario']."';";
        $result=mysqli_query($conexion,$sql);
        $idp=mysqli_fetch_row($result);

        $articulo=$idp[0]."||".$categoria."||".$item[0]."||".$color."||".$material."||".$cantidad."||".$precio;
        $_SESSION['tablaComprasTemp'][]=$articulo;
    }
    

 ?>