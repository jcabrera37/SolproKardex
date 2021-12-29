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
        $idmedida = $_GET['id'];
        $medida = strtoupper($_POST['medida']);

        $query_actualizar = mysqli_query($connectionTrans,"UPDATE `medidas` SET `MEDIDA` = '$medida' WHERE `medidas`.`IDMEDIDA` = '$idmedida';");
                //echo $query_insert;
                if ($query_actualizar) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro modificado correctamente!");
                    self.location = "VistaMedidas.php"
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("Error al modificar el registro");
                    self.location = "VistaMedidas.php"
                    </script>';
                }

    }
}

//mostrar datos desde lista

if(empty($_GET['id'])){
    header('location: VistaMedidas.php');
    mysqli_close($connectionTrans);
}
$id_eliminar = $_GET['id'];

$consultar_registro = mysqli_query($connectionTrans, "SELECT * FROM `medidas` WHERE IDMEDIDA = $id_eliminar");

$resultado_busq = mysqli_num_rows($consultar_registro);

if($resultado_busq == 0){
        header('location: VistaMedidas.php');
    }else{
        while($datos = mysqli_fetch_array($consultar_registro)){
            $idmedida = $datos['IDMEDIDA'];
            $medida = $datos['MEDIDA'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Actualización de unidad de medida</title>
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
                <h4 class="card-title">Actualizar Unidades de Medida</h4>
                <p class="card-description">
                    Modificar unidades de medida              </p>
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Nombre de unidad de medida</label>
                    <input type="text" class="form-control" name="medida" placeholder="Unidad de medida" value="<?php echo $medida; ?>" style="text-transform: uppercase;">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="VistaMedidas.php" class="btn btn-danger">Cancelar</a>
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
