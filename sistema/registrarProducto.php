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
    if(empty($_POST['medida']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $medida = $_POST['medida'];
        $estatus = 1; //activo 1 desactivado es 2

        $query_insert = mysqli_query($connectionTrans,"INSERT INTO `medidas` (`IDMEDIDA`,  `MEDIDA`, `ESTATUS`) 
                                                    VALUES (NULL, '$medida', '1');");
                if ($query_insert) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro creado correctamente!");
                    self.location = "VistaMedidas.php"
                    </script>'
                    ;

                }else{
                    echo '<script type="text/javascript">
                    alert("Error al crear el registro");
                    self.location = "VistaMedidas.php"
                    </script>';
                }

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registro de secciones</title>
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
            <form class="forms-sample" method="post">
                <?php
                    $query_categoria =  mysqli_query($connectionTrans,"SELECT * FROM `categorias`" );
                    $result_categoria = mysqli_num_rows($query_categoria);
                ?>

                <div class="row">
                    <div class="col-3">
                            <label >Categoria</label>
                            <select name="categoria" class="form-control" >
                                <?php
                                    if ($result_categoria > 0)
                                    {
                                        while ($data_categoria = mysqli_fetch_array($query_categoria)) {
                                ?>
                                <option value="<?php echo $data_categoria['CODIGO'] ?>"  name="categoria"><?php echo $data_categoria["CATEGORIA"] ?></option>
                                <?php 
							}
						}
					?>
                            </select>
                    </div>
                    <div class="col-2">
                            <label >Codigo</label>
                            <input type="text" class="form-control" name="codigo" placeholder="codigo">
                    </div>
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
                                <option value="<?php echo $data_UM['IDMEDIDA'] ?>"  name="um"><?php echo $data_UM["MEDIDA"] ?></option>
                                <?php 
							}
						}
					?>
                            </select>
                    </div>
                    <div class="col-5">
                            <label >Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción de producto">
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
                                <option value="<?php echo $data_marca['IDMARCA'] ?>"  name="marca"><?php echo $data_marca["MARCA"] ?></option>
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
                                <option value="<?php echo $data_seccion['IDSECCIONES'] ?>"  name="seccion"><?php echo $data_seccion["SECCION"] ?></option>
                                <?php 
                                        }
                                    }

                                    mysqli_close($connectionTrans);
                                ?>
                            </select>
                    </div>
                    <div class="col-6">
                        <label >Serie</label>
                        <input type="text" class="form-control" name="serie" placeholder="Número de serie">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                            <label >Numero original</label>
                            <input type="text" class="form-control" name="numerooriginal" placeholder="Número Original">
                    </div>
                    <div class="col-3">
                            <label >Existencia Mínima</label>
                            <input type="text" class="form-control" name="eminima" placeholder="Existencia Mínima">
                    </div>
                    <div class="col-3">
                            <label >Cantidad a Pedir</label>
                            <input type="text" class="form-control" name="cantapedir" placeholder="Cantidad a pedir">
                    </div>
                    <div class="col-3">
                        <label >Costo unitario</label>
                        <input type="text" class="form-control" name="costounitario" placeholder="Costo unitario">
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC UTILIDAD">
                    </div>
                    <div class="col-4">
                        <label >Venta unitario</label>
                        <input type="text" class="form-control" name="ventaunitario" placeholder="Venta Unitario">
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad 2</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC Utilidad 2">
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 2</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="Venta unitario 2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 3</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC Utilidad 3">
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 3</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="Venta unitario 3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 4</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC Utilidad 4">
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 4</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="Venta unitario 4">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Existencia Inicial</label>
                        <input type="text" class="form-control" name="einicial" placeholder="Existencia Inicial">
                    </div>
                    <div class="col-4">
                        <label >Entradas</label>
                        <input type="text" class="form-control" name="entradas" placeholder="Entradas">
                    </div>
                    <div class="col-4">
                        <label >Salidas</label>
                        <input type="text" class="form-control" name="salidas" placeholder="Salidas">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Costo Anterior</label>
                        <input type="text" class="form-control" name="costoanterior" placeholder="Costo Anterior">
                    </div>
                    <div class="col-3">
                        <label >Porcentaje Descuento</label>
                        <input type="text" class="form-control" name="descuento" placeholder="Descuento">
                    </div>
                    <div class="col-3">
                        <label >Sacar sin existencia</label>
                        <input type="text" class="form-control" name="sacarsinexistencia" placeholder="Sacar sin existencia">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" placeholder="Proveedor">
                    </div>
                    <div class="col-9">
                        <label >Aplicaciones</label>
                        <input type="text" class="form-control" name="aplicaciones" placeholder="Aplicaciones">
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
