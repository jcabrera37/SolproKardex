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
    if(empty($_POST['codigo']) || empty($_POST['seccion']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $idseccion = $_GET['id'];
        $codigo = $_POST['codigo'];
        $seccion = $_POST['seccion'];

        $query_actualizar = mysqli_query($connectionTrans,"UPDATE `secciones` SET `CODIGO` = '$codigo', `SECCION` = '$seccion' WHERE `secciones`.`IDSECCIONES` = '$idseccion';");
                //echo $query_insert;
                if ($query_actualizar) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro modificado correctamente!");
                    self.location = "VistaSecciones.php"
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("Error al modificar el registro");
                    self.location = "VistaSecciones.php"
                    </script>';
                }

    }
}

//mostrar datos desde lista

if(empty($_GET['id'])){
    header('location: VistaMarcas.php');
    mysqli_close($conection);
}
$id_eliminar = $_GET['id'];

$consulta_seccion = mysqli_query($connectionTrans, "SELECT * FROM `marcas` WHERE IDMARCA = $id_eliminar");

//mysqli_close($conection);

$resultado_busq = mysqli_num_rows($consulta_seccion);

if($resultado_busq == 0){
        header('location: VistaSecciones.php');
    }else{
        while($datos = mysqli_fetch_array($consulta_seccion)){
            $idseccion = $datos['IDMARCA'];
            $marca = $datos['MARCA'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Actualización de Marcas</title>
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
                <h4 class="card-title">Actualizar Marcas</h4>
                <p class="card-description">
                    Modificar Marca               </p>
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Sección</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca" value="<?php echo $marca; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="VistaMarcas.php" class="btn btn-danger">Cancelar</a>
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
