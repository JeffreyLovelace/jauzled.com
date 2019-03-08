<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Colores</title>
        <?php require_once "menu.php"; ?>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <h1>Colores</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmCategorias">
                        <h2>Nuevo color</h2>
                        <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                        <br>
                        <span class="btn btn-primary btn-lg btn-block" id="btnAgregaCategoria">Agregar</span>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div id="tablaCategoriaLoad"></div>
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
                        <form id="frmCategoriaU">
                            <input type="text" hidden="" id="idcategoria" name="idcategoria">
                            <label>Colores</label>
                            <input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<script type="text/javascript">
//Botones
    $(document).ready(function(){

        $('#tablaCategoriaLoad').load("Colores/tablaColores.php");

        $('#btnAgregaCategoria').click(function(){
            
            datos=$('#frmCategorias').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../Procesos/colores/agregaColor.php",
                success:function(r){
                    if(r==1){
                        $('#frmCategorias')[0].reset();
                        $('#tablaCategoriaLoad').load("colores/tablaColores.php");
                        alertify.success("Categoria agregada con exito");
                    }else{
                        alertify.error("No se pudo agregar categoria");
                    }
                }
            });
        });

        $('#btnActualizaCategoria').click(function(){

            datos=$('#frmCategoriaU').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/colores/actualizaColor.php",
                success:function(r){
                    if(r==1){
                        $('#tablaCategoriaLoad').load("colores/tablaColores.php");
                        alertify.success("Actualizado con exito :)");
                    }else{
                        alertify.error("no se pudo actaulizar :(");
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
//Funciones
    function agregaDato(idCategoria,categoria){
        $('#idcategoria').val(idCategoria);
        $('#categoriaU').val(categoria);
    }
    function eliminaCategoria(idcategoria){
        alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
            $.ajax({
                type:"POST",
                data:"idcategoria=" + idcategoria,
                url:"../procesos/colores/eliminarColor.php",
                success:function(r){
                    if(r==1){
                        $('#tablaCategoriaLoad').load("colores/tablaColores.php");
                        alertify.success("Eliminado con exito");
                    }else{
                        alertify.error("No se pudo eliminar");
                    }
                }
            });
        }, function(){ 
            alertify.error('Cancelo !')
        });
    }
</script>
<?php 
    }else{
        header("location:../index.php");
    }
?>