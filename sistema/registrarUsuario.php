<?php
session_start();
include "../includes/funcionFecha.php";
if (empty($_SESSION['active'])) 
	{
		header('location: ../');
	}
include "../conexionBD.php";

if (!empty($_POST)) 
{
    if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['codserie']) || empty($_POST['acceso']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $codserie = $_POST['codserie'];
        $acceso = $_POST['acceso'];
        $rol = 2; //rol 1 administrador y rol 2 usuario
        $estatus = 1; //activo 1 desactivado es 2

        $query_insert = mysqli_query($conection,"INSERT INTO `usuarios` (`id_user`, `nombre`, `usuario`, `clave`, `codserie`, `accesoempresa`, `id_rol`, `estatus`) 
                                                VALUES (NULL, '$nombre', '$usuario', '$clave', '$codserie', '$acceso', '$rol', '$estatus');");
                                                echo $query_insert;
                 if ($query_insert) 
                 {
                    echo '<script type="text/javascript">
                    alert("Usuario creado correctamente!");
                    </script>';
                 }else{
                    echo '<script type="text/javascript">
                    alert("Error al crear el usuario");
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
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control"  name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label >Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <label>Clave</label>
                    <input type="text" class="form-control"  name="clave" placeholder="Clave">
                </div>
                <div class="form-group">
                    <label>Codigo Serie</label>
                    <input type="text" class="form-control"  name="codserie" placeholder="Codigo">
                </div>
                <div class="form-group">
                    <label >Acceso a empresa</label>
                    <input type="text" class="form-control"  name="acceso" placeholder="Acceso">
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
