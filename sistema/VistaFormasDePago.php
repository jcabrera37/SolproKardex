<?php
session_start();
include "../includes/funcionFecha.php";
if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}
    include "../conexionBD.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Formas de pago - Admin</title>
<?php include "../includes/includes.php";?>
</head>

<body>
<div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <?php include "../includes/sideBar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
<!-- partial:../../partials/_navbar.html -->
    <?php include "../includes/navBar.php"; ?>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <a href="registrarFormaDePago.php"> 
                    <h4 class="card-title">Formas de pago 
                        <span class="float-right"> 
                            <button type="button" class="btn btn-success btn-fw" >
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>  Agregar nueva forma de pago 
                            </button> 
                        </span>
                    </h4>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Codigo
                            </th>
                            <th>
                                Forma de pago
                            </th>
                        </tr>
                    </thead>
                    <?php
                        $consulta = mysqli_query($connectionTrans, "SELECT * FROM `FORMASDEPAGO` WHERE ESTATUS = 1;");

                        mysqli_close($conection);

                        $resultado = mysqli_num_rows($consulta);

                        if ($resultado > 0){
                            while ($datos = mysqli_fetch_array($consulta)){
                                ?>
                    <tbody>
                    <tr>
                        <input type="hidden" name="IDFORMADEPAGO" value="<?php echo $datos['IDFORMADEPAGO']; ?>">
                        
                        <td>
                        <?php echo $datos['CODIGO']; ?>
                        </td>
                        <td>
                        <?php echo $datos['FORMADEPAGO']; ?>
                        </td>
                        
                        <td>
                        <a class="btn btn-dark sm" href="../sistema/actualizarCategoria.php?id=<?php echo $datos['IDFORMADEPAGO']?>">Editar</a>
                        
                        |
                        <a class="btn btn-danger sm" href="eliminarFormaDePago.php?id=<?php echo $datos['IDFORMADEPAGO']?>">Eliminar</a>
                           
                        </td>
                        
                        </tr>
                        
                    </tbody>
                    <?php 
						
					}
				}
			?>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div><!-- row ends -->
        </div><!-- content-wrapper ends -->
        
        <?php include "../includes/footer.php";?>
        
    </div> <!-- main-panel ends -->
    
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include"../includes/scriptsJs.php";?>;
</body>

</html>
