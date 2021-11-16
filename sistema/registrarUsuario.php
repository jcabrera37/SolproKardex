<?php
session_start();
include "../includes/funcionFecha.php";
if (empty($_SESSION['active'])) 
	{
		header('location: ../');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registro de usuarios</title>
<?php include "../includes/includes.php";?>

<link rel="shortcut icon" href="../images/logo.ico" />
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
                <h4 class="card-title">Registro de Usuarios</h4>
                <p class="card-description">
                    Registrar
                </p>
                <form class="forms-sample">
                <div class="form-group">
                    <label >Nombre de Usuario</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <label>Clave</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Clave">
                </div>
                <div class="form-group">
                    <label>Codigo Serie</label>
                    <input type="text" class="form-control" id="codserie" placeholder="Codigo">
                </div>
                <div class="form-group">
                    <label >Acceso a empresa</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Acceso">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                <button class="btn btn-light">Cancelar</button>
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
