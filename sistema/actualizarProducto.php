<?php
session_start();
include "../includes/funcionFecha.php";
if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}
include "../conexionBD.php";

//Actualizar productos

if (!empty($_POST)) 
{
    if (empty($_POST['idproducto']) || empty($_POST['descripcion']))   {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $id = $_POST['idproducto'];
        $ctg = $_POST['categoria'];
        $cod = $_POST['cod'];
        $cod_prd = $_POST['codigoCat'];
        $nomb = $_POST['descripcion'];
        $sec = $_POST['seccion'];
        $mrc = $_POST['marca'];
        $med = $_POST['um'];
        $serie = $_POST['serie'];
        $numorg = $_POST['numerooriginal'];
        $emin = $_POST['eminima'];
        $ctpedir = $_POST['cantapedir'];
        $ctun = $_POST['costounitario'];
        $pctutd = $_POST['pcutilidad'];
        $vtuni = $_POST['ventaunitario'];
        $pctut2 = $_POST['pcutilidad2'];
        $vtun2 = $_POST['ventaunitario2'];
        $pctut3 = $_POST['pcutilidad3'];
        $vtun3 = $_POST['ventaunitario3'];
        $pctut4 = $_POST['pcutilidad4'];
        $vtun4 = $_POST['ventaunitario4'];
        $exini = $_POST['einicial'];
        $ent = $_POST['entradas'];
        $sal = $_POST['salidas'];
        $ctant = $_POST['costoanterior'];
        $pctdesc = $_POST['descuento'];
        $sacsinex = $_POST['sacarsinexistencia'];
        $prov = $_POST['proveedor'];
        $app = $_POST['aplicaciones'];

        $query_update = mysqli_query($connectionTrans, "UPDATE `productos` SET `IDPRODUCTO`='$id',`CODIGO`='$cod',`COD_PROD`='$cod_prd',
        `NOMBRE`='$nomb',`CATEGORIA`='$ctg',`SECCION`='$sec',`MARCA`='$mrc',`MEDIDA`='$med',`SERIE`='$serie',
        `NUMEROORIGINAL`='$numorg',`EMINIMA`='$emin',`CANTAPEDIR`='$ctpedir',`COSTOUNITARIO`='$ctun',
        `PCTUTILIDAD`='$pctutd',`VENTAUNITARIO`='$vtuni',`PCTUTILIDAD2`='$pctut2',`VENTAUNITARIO2`='$vtun2',
        `PCTUTILIDAD3`='$pctut3',`VENTAUNITARIO3`='$vtun3',`PCTUTILIDAD4`='$pctut4',`VENTAUNITARIO4`='$vtun4',
        `EINICIAL`='$exini',`ENTRADAS`='$ent',`SALIDAS`='$sal',`COSTOANTERIOR`='$ctant',`PCTDESCUENTO`='$pctdesc',
        `PROVEEDOR`='$prov',`APLICACIONES`='$app',`SACARSINEXITENCIA`='$sacsinex',`ESTATUS`='1' WHERE IDPRODUCTO = '$id'");

        if ($query_update) 
        {
            echo '<script type="text/javascript">
            alert("Registro modificado correctamente!");
            self.location = "VistaProductos.php"
            </script>';
        }else{
            echo '<script type="text/javascript">
            alert("Error al modificar el registro");
            self.location = "VistaProductos.php"
            </script>';
        }

    }
}

//UPDATE `productos` SET `IDPRODUCTO`='[value-1]',`CODIGO`='[value-2]',`COD_PROD`='[value-3]',`NOMBRE`='[value-4]',`CATEGORIA`='[value-5]',`SECCION`='[value-6]',`MARCA`='[value-7]',`MEDIDA`='[value-8]',`SERIE`='[value-9]',`NUMEROORIGINAL`='[value-10]',`EMINIMA`='[value-11]',`CANTAPEDIR`='[value-12]',`COSTOUNITARIO`='[value-13]',`PCTUTILIDAD`='[value-14]',`VENTAUNITARIO`='[value-15]',`PCTUTILIDAD2`='[value-16]',`VENTAUNITARIO2`='[value-17]',`PCTUTILIDAD3`='[value-18]',`VENTAUNITARIO3`='[value-19]',`PCTUTILIDAD4`='[value-20]',`VENTAUNITARIO4`='[value-21]',`EINICIAL`='[value-22]',`ENTRADAS`='[value-23]',`SALIDAS`='[value-24]',`COSTOANTERIOR`='[value-25]',`PCTDESCUENTO`='[value-26]',`PROVEEDOR`='[value-27]',`APLICACIONES`='[value-28]',`SACARSINEXITENCIA`='[value-29]',`ESTATUS`='[value-30]' WHERE 1

//buscar datos
if(empty($_GET['id'])){
    header('location: VistaProductos.php');
    mysqli_close($connectionTrans);
}
$id_buscado = $_GET['id'];

$consultar_registro = mysqli_query($connectionTrans, "SELECT * FROM `productos` WHERE IDPRODUCTO = '$id_buscado';");

$resultado_busq = mysqli_num_rows($consultar_registro);

if($resultado_busq == 0){
        header('location: VistaProductos.php');
    }else{
        while($datos = mysqli_fetch_array($consultar_registro)){
            $idproducto = $datos['IDPRODUCTO'];
            $categoria = $datos['CATEGORIA'];
            $codigo = $datos['CODIGO'];
            $cod_prod = $datos['COD_PROD'];
            $desc = strtoupper($datos['NOMBRE']);
            $serie = $datos['SERIE'];
            $numoriginal = $datos['NUMEROORIGINAL'];
            $eminima = $datos['EMINIMA'];
            $cantpedir = $datos['CANTAPEDIR'];
            $costounitario = $datos['COSTOUNITARIO'];
            $pcutilidad = $datos['PCTUTILIDAD'];
            $ventaunitario = $datos['VENTAUNITARIO'];
            $pcutilidad2 = $datos['PCTUTILIDAD2'];
            $ventaunitario2 = $datos['VENTAUNITARIO2'];
            $pcutilidad3 = $datos['PCTUTILIDAD3'];
            $ventaunitario3 = $datos['VENTAUNITARIO3'];
            $pcutilidad4 = $datos['PCTUTILIDAD4'];
            $ventaunitario4 = $datos['VENTAUNITARIO4'];
            $einicial = $datos['EINICIAL'];
            $entradas = $datos['ENTRADAS'];
            $salidas =  $datos['SALIDAS'];
            $costoanterior = $datos['COSTOANTERIOR'];
            $pctdescuento = $datos['PCTDESCUENTO'];
            $proveedor =  strtoupper($datos['PROVEEDOR']);
            $aplicaciones = strtoupper($datos['APLICACIONES']);
            $sacarsinexistencia = strtoupper($datos['SACARSINEXITENCIA']);
            
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Actualizar de Productos</title>
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
                <h4 class="card-title">Modificar producto</h4>
                <p class="card-description">
                    Actualizar
                </p>

            <form class="forms-sample" method="POST" action="">
                <input type="text" name="idproducto" value="<?php echo $idproducto; ?>">
                <input type="text" name="cod" value="<?php echo $codigo; ?>">
                <div class="row">

                    <!-- codigo COMPLETO COD-CATEGORIA -->
                    <div class="col-2"> 
                        <label >Categoria</label>
                        <input type="text" class="form-control" name="categoria" placeholder="Categoria"  value="<?php echo $categoria; ?>" readonly>
                    </div>
                    <div class="col-2"> 
                        <label >Codigo</label>
                        <input type="text" class="form-control" name="codigoCat" placeholder="Codigo"  value="<?php echo $cod_prod; ?>" readonly>
                    </div>
                    <!-- codigo -->
                    <div class="col-2">
                            <label >UM</label>
                            <?php
                                $query_um =  mysqli_query($connectionTrans,"SELECT * FROM `medidas`" );
                                $result_um = mysqli_num_rows($query_um);
                            ?>
                            <select name="um" class="form-control" >
                                <?php
                                if ($result_um > 0)
                                {
                                    while ($data_um = mysqli_fetch_array($query_um)) {
                                ?>
                                    <option value="<?php echo $data_um['MEDIDA']?>"  name="um"><?php echo $data_um["MEDIDA"] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-6">
                            <label >Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción de producto"  value="<?php echo $desc; ?>" required style="text-transform: uppercase;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                            <label >Marca</label>
                            <?php
                                $query_marca =  mysqli_query($connectionTrans,"SELECT * FROM `marcas`" );
                                $result_marca = mysqli_num_rows($query_marca);
                            ?>
                            <select name="marca" class="form-control" >
                                <?php
                                if ($result_marca > 0)
                                {
                                    while ($data_marca = mysqli_fetch_array($query_marca)) {
                                ?>
                                    <option value="<?php echo $data_marca['MARCA']?>"  name="marca"><?php echo $data_marca["MARCA"] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-3">
                            <label >Sección</label>
                            <?php
                                $query_seccion =  mysqli_query($connectionTrans,"SELECT * FROM `secciones`" );
                                $result_seccion = mysqli_num_rows($query_seccion);
                            ?>
                            <select name="seccion" class="form-control" >
                                <?php
                                if ($result_seccion > 0)
                                {
                                    while ($data_seccion = mysqli_fetch_array($query_seccion)) {
                                ?>
                                    <option value="<?php echo $data_seccion['SECCION']?>"  name="seccion"><?php echo $data_seccion["SECCION"] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-6">
                        <label >Serie</label>
                        <input type="text" class="form-control" name="serie" placeholder="Número de serie" value="<?php echo $serie; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                            <label >Numero original</label>
                            <input type="text" class="form-control" name="numerooriginal" placeholder="Número Original" value="<?php echo $numoriginal; ?>" required>
                    </div>
                    <div class="col-3">
                            <label >Existencia Mínima</label>
                            <input type="text" class="form-control" name="eminima" placeholder="Existencia Mínima" value="<?php echo $eminima; ?>" required>
                    </div>
                    <div class="col-3">
                            <label >Cantidad a Pedir</label>
                            <input type="text" class="form-control" name="cantapedir" placeholder="Cantidad a pedir" value="<?php echo $cantpedir; ?>" required>
                    </div>
                    <div class="col-3">
                        <label >Costo unitario</label>
                        <input type="text" class="form-control" name="costounitario" placeholder="Costo unitario" value="<?php echo $costounitario; ?>" required>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad</label>
                        <input type="text" class="form-control" name="pcutilidad" placeholder="PC UTILIDAD" value="<?php echo $pcutilidad; ?>" required>
                    </div>
                    <div class="col-4">
                        <label >Venta unitario</label>
                        <input type="text" class="form-control" name="ventaunitario" placeholder="Venta Unitario" value="<?php echo $ventaunitario; ?>" required
                        >
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-4">
                        <label >Porcentaje Utilidad 2</label>
                        <input type="text" class="form-control" name="pcutilidad2" placeholder="Pct Utilidad 2" value="<?php echo $pcutilidad2; ?>" >
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 2</label>
                        <input type="text" class="form-control" name="ventaunitario2" placeholder="Venta unitario 2" value="<?php echo $ventaunitario2; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 3</label>
                        <input type="text" class="form-control" name="pcutilidad3" placeholder="PC Utilidad 3" value="<?php echo $pcutilidad3; ?>">
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 3</label>
                        <input type="text" class="form-control" name="ventaunitario3" placeholder="Venta unitario 3" value="<?php echo $ventaunitario3; ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Porcentaje Utilidad 4</label>
                        <input type="text" class="form-control" name="pcutilidad4" placeholder="PC Utilidad 4" value="<?php echo $pcutilidad4; ?>" >
                    </div>
                    <div class="col-4">
                        <label >Venta Unitario 4</label>
                        <input type="text" class="form-control" name="ventaunitario4" placeholder="Venta unitario 4" value="<?php echo $ventaunitario4; ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label >Existencia Inicial</label>
                        <input type="text" class="form-control" name="einicial" placeholder="Existencia Inicial" value="<?php echo $einicial; ?>" >
                    </div>
                    <div class="col-4">
                        <label >Entradas</label>
                        <input type="text" class="form-control" name="entradas" placeholder="Entradas" value="<?php echo $entradas; ?>" >
                    </div>
                    <div class="col-4">
                        <label >Salidas</label>
                        <input type="text" class="form-control" name="salidas" placeholder="Salidas" value="<?php echo $salidas; ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Costo Anterior</label>
                        <input type="text" class="form-control" name="costoanterior" placeholder="Costo Anterior" value="<?php echo $costoanterior; ?>" >
                    </div>
                    <div class="col-3">
                        <label >Porcentaje Descuento</label>
                        <input type="text" class="form-control" name="descuento" placeholder="Descuento" value="<?php echo $pctdescuento; ?>">
                    </div>
                    <div class="col-3">
                        <label >Sacar sin existencia</label>
                        <input type="text" class="form-control" name="sacarsinexistencia" placeholder="Sacar sin existencia" value="<?php echo $sacarsinexistencia; ?>" style="text-transform: uppercase;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label >Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" value="<?php echo $proveedor; ?>" style="text-transform: uppercase;">
                    </div>
                    <div class="col-9">
                        <label >Aplicaciones</label>
                        <input type="text" class="form-control" name="aplicaciones" placeholder="Aplicaciones" value="<?php echo $aplicaciones; ?>" style="text-transform: uppercase;">
                    </div>
                </div>
                <br><br>
                <center>
                    <a href="VistaProductos.php" class="btn btn-danger">Cancelar </a>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar  </button>
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
