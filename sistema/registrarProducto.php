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
            
                <div class="row">
                    <div class="col-3">
                            <label >Categoria</label>
                            <input type="text" class="form-control" name="categoria" placeholder="Categoria"  value="<?php 
                            if (!empty($_POST)) 
                            {
                            echo $categoriaseleccionada;
                            }?>" readonly>
                    </div>

                    <!-- codigo -->
                    <div class="col-2">
                        <label >Codigo</label>
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
                                <input type="text" class="form-control" name="codigo" placeholder="codigo" value="<?php 
                                    echo $codigo_recuperado; ?>" readonly>
                            <?php
                                }
                        }
                        else{
                            $codigo_recuperado = 0000;
                            ?>
                            <input type="text" class="form-control" name="codigo" placeholder="codigo" value="<?php 
                                    echo $codigo_recuperado; ?>" readonly>
                            <?php
                        }
                    }else{
                        ?>
                        <input type="text" class="form-control" name="codigo" placeholder="Codigo"  value="0" readonly>
                    <?php
                    }
					?>
                    </div>
                    <!-- codigo -->

                    <?php
                        $query_UM =  mysqli_query($connectionTrans,"SELECT * FROM `medidas`" );
                        $result_UM = mysqli_num_rows($query_UM);
                    ?>
                    <div class="col-2">
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
                    <div class="col-5">
                            <label >Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción de producto" required>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $query_marca =  mysqli_query($connectionTrans,"SELECT * FROM `marcas`" );
                        $result_marca = mysqli_num_rows($query_marca);
                    ?>
                    <div class="col-3">
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
                    <div class="col-3">
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
                    <div class="col-6">
                        <label >Serie</label>
                        <input type="text" class="form-control" name="serie" placeholder="Número de serie" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                            <label >Numero original</label>
                            <input type="text" class="form-control" name="numerooriginal" placeholder="Número Original" required>
                    </div>
                    <div class="col-3">
                            <label >Existencia Mínima</label>
                            <input type="text" class="form-control" name="eminima" placeholder="Existencia Mínima" required>
                    </div>
                    <div class="col-3">
                            <label >Cantidad a Pedir</label>
                            <input type="text" class="form-control" name="cantapedir" placeholder="Cantidad a pedir" required>
                    </div>
                    <div class="col-3">
                        <label >Costo unitario</label>
                        <input type="text" class="form-control" name="costounitario" placeholder="Costo unitario" required>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC UTILIDAD" required>
                    </div>
                    <div class="col-4">
                        <label >Venta unitario</label>
                        <input type="text" class="form-control" name="ventaunitario" placeholder="Venta Unitario" required>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad 2</label>
                        <input type="text" class="form-control" name="pcutilidad2" placeholder="Pct Utilidad 2" required>
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 2</label>
                        <input type="text" class="form-control" name="ventaunitario2" placeholder="Venta unitario 2" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 3</label>
                        <input type="text" class="form-control" name="pcutilidad3" placeholder="PC Utilidad 3" required>
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 3</label>
                        <input type="text" class="form-control" name="ventaunitario3" placeholder="Venta unitario 3" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 4</label>
                        <input type="text" class="form-control" name="pcutilidad4" placeholder="PC Utilidad 4" required>
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 4</label>
                        <input type="text" class="form-control" name="ventaunitario4" placeholder="Venta unitario 4" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Existencia Inicial</label>
                        <input type="text" class="form-control" name="einicial" placeholder="Existencia Inicial" required>
                    </div>
                    <div class="col-4">
                        <label >Entradas</label>
                        <input type="text" class="form-control" name="entradas" placeholder="Entradas" required>
                    </div>
                    <div class="col-4">
                        <label >Salidas</label>
                        <input type="text" class="form-control" name="salidas" placeholder="Salidas" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Costo Anterior</label>
                        <input type="text" class="form-control" name="costoanterior" placeholder="Costo Anterior" required>
                    </div>
                    <div class="col-3">
                        <label >Porcentaje Descuento</label>
                        <input type="text" class="form-control" name="descuento" placeholder="Descuento" required>
                    </div>
                    <div class="col-3">
                        <label >Sacar sin existencia</label>
                        <input type="text" class="form-control" name="sacarsinexistencia" placeholder="Sacar sin existencia" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" required>
                    </div>
                    <div class="col-9">
                        <label >Aplicaciones</label>
                        <input type="text" class="form-control" name="aplicaciones" placeholder="Aplicaciones" required>
                    </div>
                </div>
                <br><br>
                <center>
                    <a href="VistaProductos.php" class="btn btn-danger">Cancelar </a>
                    <a href="RegistrarProductoNuevo.php" class="btn btn-primary mr-2">Registrar </a>
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
