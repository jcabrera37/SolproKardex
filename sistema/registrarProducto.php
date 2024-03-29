<?php
session_start();
include "../includes/funcionFecha.php";
if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}
include "../conexionBD.php";

if (!empty($_POST)) 
{
    $categoriaseleccionada = $_POST['CATGR'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registro de Productos</title>
<?php include "../includes/includes.php";?>


</head>

<body>
    
<div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    
    <?php include "../includes/sideBar.php";?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <?php include "../includes/navBar.php";?>
    <div class="main-panel">        
        <div class="content-wrapper">
        <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Registrar nuevo producto</h4>
                <p class="card-description">
                    Agregar
                </p>
                <div align="left">
                    <button href="#addUser" title="" data-placement="left" data-toggle="modal" 
                        class="btn btn-primary tooltips" type="button" 
                        data-original-title="Seleccionar Categoría">
                        <span class="fa fa-plus"></span>
                        Selecciona la categoría
                    </button>
                </div>
                <div id="addUser" class="modal fade" tabindex="-1" role="dialog" 
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                            <form class="form-validate form-horizontal" name="form2" action="" method="post" enctype="multipart/form-data">
                                                
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h3 id="miModalLabel" align="center">Selecciona la categoría</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X
                                                            </button>
                                                        </div><!--  fin modal header  -->
                                                        <div class="modal-body">
                                                            <label for="tipo" class="control-label col-lg-4">
                                                                Categoría:
                                                            </label>
                                                            <?php
                                                                $query_categoria =  mysqli_query($connectionTrans,"SELECT * FROM `categorias`" );
                                                                $result_categoria = mysqli_num_rows($query_categoria);
                                                            ?>
                                                            <div class="col-lg-10">
                                                                <select class="form-control input-lg m-bot15" name="CATGR">
                                                                <?php
                                                                    if ($result_categoria > 0)
                                                                    {
                                                                        while ($data_categoria = mysqli_fetch_array($query_categoria)) {
                                                                ?>
                                                                <option value="<?php echo $data_categoria['CODIGO']?>"  name="CATG"><?php echo $data_categoria["CATEGORIA"] ?></option>
                                                                <?php 
                                                                        }
                                                                    }
                                                                ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <br><br>
                                                            
                                                        </div> <!--  fin modal form datos  -->
                                                        <div class="modal-footer">
                                                            
                                                            <button name="seleccionar_categoria" type="submit" class="btn btn-primary"> <strong> Seleccionar</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form><!--  fin formulario modal -->

                                    </div><!--  MODAL AGREGAR USUARIO  -->

                
            <form class="forms-sample" method="get" action="RegistrarProductoNuevo.php">
            <!-- codigo -->
            <div class="col-2">
                    <?php
                        if(!empty($_POST)){
                        $query_prod =  mysqli_query($connectionTrans,"SELECT CODIGO FROM productos WHERE CATEGORIA = '$categoriaseleccionada' ORDER BY CODIGO DESC LIMIT 1;" );
                        $result_prod = mysqli_num_rows($query_prod);
                    ?>
                            
                            <?php
                                    if ($result_prod > 0)
                                    {
                                        while ($data_prod = mysqli_fetch_array($query_prod)) {
                                            $codigo_recuperado = $data_prod['CODIGO'];

                            ?>
                                <input type="hidden" class="form-control" name="codigoCat" placeholder="codigo" value="<?php 
                                    echo $codigo_recuperado; ?>" readonly>
                            <?php
                                }
                        }
                        else{
                            $codigo_recuperado = "0";
                            ?>
                            <input type="hidden" class="form-control" name="codigoCat" placeholder="codigo" value="<?php 
                                    echo $codigo_recuperado; ?>" readonly>
                            <?php
                        }
                    }else{
                        ?>
                        <input type="hidden" class="form-control" name="codigoCat" placeholder="Codigo"  value="0" readonly>
                    <?php
                    }
					?>
                    </div>
                    <!-- codigo -->
                
                <div class="row">
                    <div class="col-6">
                            <label >Categoria</label>
                            <input type="text" class="form-control" name="categoria" placeholder="Categoria"  value="<?php 
                            if (!empty($_POST)) 
                            {
                            echo $categoriaseleccionada;
                            }?>" readonly>
                    </div>

                    <?php
                        $query_UM =  mysqli_query($connectionTrans,"SELECT * FROM `medidas`" );
                        $result_UM = mysqli_num_rows($query_UM);
                    ?>
                    <div class="col-6">
                            <label >UM</label>
                            <select name="um" class="form-control" >
                            <?php
                                    if ($result_UM > 0)
                                    {
                                        while ($data_UM = mysqli_fetch_array($query_UM)) {
                                ?>
                                <option value="<?php echo $data_UM['MEDIDA'] ?>"  name="um"><?php echo $data_UM["MEDIDA"] ?></option>
                                <?php 
							}
						}
					?>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                            <label >Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción de producto" required style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="row">
                    <?php
                        $query_marca =  mysqli_query($connectionTrans,"SELECT * FROM `marcas`" );
                        $result_marca = mysqli_num_rows($query_marca);
                    ?>
                    <div class="col-6">
                            <label >Marca</label>
                            <select name="marca" class="form-control" >
                            <?php
                                    if ($result_marca > 0)
                                    {
                                        while ($data_marca = mysqli_fetch_array($query_marca)) {
                                ?>
                                <option value="<?php echo $data_marca['MARCA'] ?>"  name="marca"><?php echo $data_marca["MARCA"] ?></option>
                                <?php 
                                        }
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="col-6">
                    <?php
                        $query_seccion =  mysqli_query($connectionTrans,"SELECT * FROM `secciones`" );
                        $result_seccion = mysqli_num_rows($query_seccion);
                    ?>
                            <label >Sección</label>
                            <select name="seccion" class="form-control" >
                            <?php
                                    if ($result_seccion > 0)
                                    {
                                        while ($data_seccion = mysqli_fetch_array($query_seccion)) {
                                ?>
                                <option value="<?php echo $data_seccion['SECCION'] ?>"  name="seccion"><?php echo $data_seccion["SECCION"] ?></option>
                                <?php 
                                        }
                                    }

                                    mysqli_close($connectionTrans);
                                ?>
                            </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label >Serie</label>
                        <input type="text" class="form-control" name="serie" placeholder="Número de serie"  required >
                    </div>
                </div>   
                <div class="row">
                    <div class="col-6">
                            <label >Numero original</label>
                            <input type="text" class="form-control" name="numerooriginal" placeholder="Número Original" >
                    </div>
                    <div class="col-6">
                            <label >Existencia</label>
                            <input type="text" class="form-control" name="eminima" placeholder="Existencia Mínima" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                            <label >Ctdad. a Pedir</label>
                            <input type="text" class="form-control" name="cantapedir" placeholder="Cantidad a pedir" >
                    </div>
                    <div class="col-6">
                        <label >Costo unitario</label>
                        <input type="text" class="form-control" name="costounitario" placeholder="Costo unitario" >
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <label >Porcentaje Utilidad</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC UTILIDAD" >
                    </div>
                    <div class="col-6">
                        <label >Venta unitario</label>
                        <input type="text" class="form-control" name="ventaunitario" placeholder="Venta Unitario" >
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <label >Porcentaje Utilidad 2</label>
                        <input type="text" class="form-control" name="pcutilidad2" placeholder="Pct Utilidad 2" >
                    </div>
                    <div class="col-6">
                        <label >Venta Unitario 2</label>
                        <input type="text" class="form-control" name="ventaunitario2" placeholder="Venta unitario 2" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label >Porcentaje Utilidad 3</label>
                        <input type="text" class="form-control" name="pcutilidad3" placeholder="PC Utilidad 3" >
                    </div>
                    <div class="col-6">
                        <label >Venta Unitario 3</label>
                        <input type="text" class="form-control" name="ventaunitario3" placeholder="Venta unitario 3" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label >Porcentaje Utilidad 4</label>
                        <input type="text" class="form-control" name="pcutilidad4" placeholder="PC Utilidad 4" >
                    </div>
                    <div class="col-6">
                        <label >Venta Unitario 4</label>
                        <input type="text" class="form-control" name="ventaunitario4" placeholder="Venta unitario 4" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label >Existencia Inicial</label>
                        <input type="text" class="form-control" name="einicial" placeholder="Existencia Inicial" readonly>
                    </div>
                    <div class="col-6">
                        <label >Entradas</label>
                        <input type="text" class="form-control" name="entradas" placeholder="Entradas"  readonly> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label >Salidas</label>
                        <input type="text" class="form-control" name="salidas" placeholder="Salidas" readonly>
                    </div>
                    <div class="col-6">
                        <label >Existencia</label>
                        <input type="text" class="form-control" name="salidas" placeholder="Salidas" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label >Costo Anterior</label>
                        <input type="text" class="form-control" name="costoanterior" placeholder="Costo Anterior" >
                    </div>
                    <div class="col-6">
                        <label >Porcentaje Descuento</label>
                        <input type="text" class="form-control" name="descuento" placeholder="Descuento" >
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label >Sacar sin existencia</label>
                        <input type="text" class="form-control" name="sacarsinexistencia" placeholder="Sacar sin existencia" style="text-transform: uppercase;">
                    </div>
                    <div class="col-6">
                        <label >Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" style="text-transform: uppercase;">
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-12">
                        <label >Aplicaciones</label>
                        <input type="text" class="form-control" name="aplicaciones" placeholder="Aplicaciones" style="text-transform: uppercase;">
                    </div>
                </div>
                <br><br>
                <center>
                    <a href="VistaProductos.php" class="btn btn-danger">Cancelar </a>
                    <button type="submit" class="btn btn-primary mr-2">Guardar  </button>
                </center>
                
            </form>
            </div>
            </div>
        </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <?php include "../includes/footer.php";?>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?php include "../includes/scriptsJs.php";?>

</body>

</html>
