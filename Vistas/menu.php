
<?php require_once "dependencias.php" ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <div id="nav">
        <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100" >
            <div class="container">
                <div class="navbar-header">
                    <div style="margin: 15px auto 15px 15px;">
                        <button type="button" class=" navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="inicio.php"><img class="" src="../img/Logo.png" alt="" width="200px" height="50px" ></a>
                    </div>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($_SESSION['privilegio']==1){?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Caracteristicas<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="colores.php">Colores</a></li>
                                <li><a href="categorias.php">Categorias</a></li>
                                <li><a href="materiales.php">Materiales</a></li>
                                <li><a href="Transferir.php">Transferir</a></li>
                                <li><a href="EditarPagina.php">Editar Pagina Principal</a></li>
                            </ul>
                        </li>   
                        <?php } ?>
                        <li><a href="inventario.php"></span> Inventario</a></li>    
                        
                        <?php if($_SESSION['privilegio']==1){?>
                        
                        <li><a href="usuarios.php"></span> Usuarios</a></li>
                        <?php }else{?>
                            <li><a href="cambio.php"></span> Cambio</a></li>
                            <li><a href="ventas.php"></span> Ventas</a></li>
                        <?php }?> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Reportes<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="repventa.php">Venta</a></li>
                                <li><a href="repproforma.php">Proforma</a></li>
                                <li><a href="repfallidos.php">Fallidos</a></li>
                            </ul>
                        </li>   
                        
                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usuario']; ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li> <a href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</body>
</html>

