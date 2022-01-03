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
<title>Marcas - Admin</title>
<?php include "../includes/includes.php";?>
<link rel="stylesheet" href="../css/styleCalendar.css">
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
                <div class="card-body" >
                <h4 class="card-title">Productos </h4>

                <div class="row" >
                    <div class="col-lg-2" style="padding: 10px; ">
                        <label for="" class="">Buscar:</label>
                        <input type="text" name="caja_busqueda" id="caja_busqueda" class="btn-busqueda">
                        
                    </div>
                    <div class="col-lg-10">
                        <a href="registrarProducto.php"> 
                            <span class="float-right"> 
                                <button type="button" class="btn btn-success btn-fw" >
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>  Agregar nuevo 
                                </button> 
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                <!-- tabla -->
                <div class="table-responsive" id="datos">
                    
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
