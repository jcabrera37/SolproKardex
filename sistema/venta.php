<?php
    session_start();
    include "../includes/funcionFecha.php";
    include "../conexionBD.php";

    if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SolproKardex - Ventas</title>
<link rel="shortcut icon" href="../images/logo.ico">
<?php include "../includes/includes.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body>
    <div class="container-scroller d-flex">
        <!-- side bar -->
        <?php include "../includes/sideBar.php";?>

        <!-- contenedor principal -->
        <div class="container-fluid page-body-wrapper">
        <!-- side bar -->    
        <?php include "../includes/navBar.php";?>
        <!-- panel principal -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12">

                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="padding-right: 10px;">
                                <div class="card-body" style="padding-right: 10px;">
                                    <h4 class="card-title">Buscar Productos</h4>
                                    <form class="form-inline" action="buscarProducto.php" method="post" style="padding-right: 3px;">
                                        <select name="TIPO1" id="" class="form-control" style="width: 100px;  padding: 7px; font-size: 10pt;">
                                            <option value="MARCA">MARCA</option>
                                            <option value="CODIGO">CODIGO</option>
                                        </select>
                                        <input type="CODIGO" name="TERMINO1" class="form-control" placeholder="Buscar..." style="width: 100px; padding: 7px; font-size: 10pt;">
                                        <select name="TIPO2" id="" class="form-control" style="width: 120px;  padding: 7px; font-size: 10pt;">
                                            <option value="NOMBRE">NOMBRE</option>
                                            <option value="SERIE">SERIE</option>
                                            <option value="APLICACION">APLICACION</option>
                                        </select>
                                        <input type="text" name="TERMINO2" class="form-control" placeholder="Buscar" style="width: 100px;  padding: 7px;  padding: 7px; font-size: 10pt;">
                                        
                                        <center><button type="submit" class="btn btn-primary" style="width: 20px;"><i class="mdi mdi-search-web"></i></a></button></center>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-14">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Productos</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"> 
                                            <thead>
                                                <tr>
                                                    <td>COD</td>
                                                    <td>NOMBRE</td>
                                                    <td>EXISTENCIA</td>
                                                    <td>PRECIO</td>
                                                    <td>MARCA</td>
                                                    <td>SERIE</td>
                                                    <td>APLICACIONES</td>
                                                    <td>Agregar</td>
                                                </tr>
                                            </thead>
                                            <?php
                                                $query = mysqli_query($connectionTrans, "SELECT COD_PROD, NOMBRE, EXACTUAL, VENTAUNITARIO, MARCA, SERIE, APLICACIONES 
                                                                                        FROM productos 
                                                                                        WHERE ESTATUS = 1;");

                                                $resultado = mysqli_num_rows($query);

                                                if ($resultado > 0){
                                                    while ($datos = mysqli_fetch_array($query)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $datos['COD_PROD']?></td>
                                                    <td><?php echo $datos['NOMBRE']?></td>
                                                    <td><?php echo $datos['EXACTUAL']?></td>
                                                    <td><?php echo $datos['VENTAUNITARIO']?></td>
                                                    <td><?php echo $datos['MARCA']?></td>
                                                    <td><?php echo $datos['SERIE']?></td>
                                                    <td><?php echo $datos['APLICACIONES']?></td>
                                                    <td><a href="" style="font-size: 18pt;"><i class="mdi mdi-plus-box"></i></a></td>
                                                </tr>
                                            <?php }
                                            }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Productos a Facturar</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"> 
                                            <thead>
                                                <tr>
                                                    <td>COD</td>
                                                    <td>PROD</td>
                                                    <td>CTDAD</td>
                                                    <td>PRECIO</td>
                                                    <td>% DESC.</td>
                                                    <td>DESC.</td>
                                                    <td>SUB-TOTAL</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>001002</td>
                                                    <td>ACEITE 20W50</td>
                                                    <td>1</td>
                                                    <td>170.00</td>
                                                    <td>5</td>
                                                    <td>7</td>
                                                    <td>165.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                       
                                        <div class="row">
                                            <div class="col-md-6"><h4>IVA </h4></div>
                                            <div class="col-md-6 text-right">Q. 19.80</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><h4>Sub-Total </h4></div>
                                            <div class="col-md-6 text-right">Q. 145.20</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><h3>TOTAL </h3></div>
                                            <div class="col-md-6 text-right"><H4>Q. 165.00</H4></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                <!-- row end -->
            <?php include "../includes/footer.php";?>
            <!-- partial -->
            </div>
        </div>
        <!-- contenedor principal -->
    </div>
<!-- container-scroller -->

<?php include "../includes/scriptsJs.php";?>

</body>

</html>