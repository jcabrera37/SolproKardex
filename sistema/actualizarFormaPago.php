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
    if(empty($_POST['codigo']) || empty($_POST['formadepago']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $idformadepago = $_GET['id'];
        $codigo = $_POST['codigo'];
        $formadepago = $_POST['formadepago'];

        $query_actualizar = mysqli_query($connectionTrans,"UPDATE `formasdepago` SET `CODIGO` = '$codigo', `FORMADEPAGO` = '$formadepago' WHERE `formasdepago`.`IDFORMADEPAGO` = '$idformadepago';");
                //echo $query_insert;
                if ($query_actualizar) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro modificado correctamente!");
                    self.location = "VistaFormasDePago.php"
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("Error al modificar el registro");
                    self.location = "VistaFormasDePago.php"
                    </script>';
                }

    }
}

//mostrar datos desde lista

if(empty($_GET['id'])){
    header('location: VistaSecciones.php');
    mysqli_close($conection);
}
$id_eliminar = $_GET['id'];

$consulta_formaPago = mysqli_query($connectionTrans, "SELECT * FROM `formasdepago` WHERE IDFORMADEPAGO = $id_eliminar");

//mysqli_close($conection);

$resultado_busq = mysqli_num_rows($consulta_formaPago);

if($resultado_busq == 0){
        header('location: VistaSecciones.php');
    }else{
        while($datos = mysqli_fetch_array($consulta_formaPago)){
            $idformadepago = $datos['IDFORMADEPAGO'];
            $formadepago = $datos['FORMADEPAGO'];
            $codigo = $datos['CODIGO'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Actualización de formas de pago</title>
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
                <h4 class="card-title">Actualizar Formas de Pago</h4>
                <p class="card-description">
                    Modificar Formas de Pago               </p>
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Código</label>
                    <input type="text" class="form-control"  name="codigo" placeholder="Codigo" value="<?php echo $codigo; ?>">
                </div>
                <div class="form-group">
                    <label >Forma de Pago</label>
                    <input type="text" class="form-control" name="formadepago" placeholder="Forma de Pago" value="<?php echo $formadepago; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="VistaFormasDePago.php" class="btn btn-danger">Cancelar</a>
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
