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
    if(empty($_POST['codigo']) || empty($_POST['formaDePago']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $codigo = $_POST['codigo'];
        $formaDePago = $_POST['formaDePago'];
       
        
        $estatus = 1; //activo 1 desactivado es 2

        $query_insert = mysqli_query($connectionTrans,"INSERT INTO `FORMASDEPAGO` (`IDFORMADEPAGO`, `CODIGO`, `FORMADEPAGO`, `ESTATUS` ) 
                                                        VALUES (NULL, '$codigo', '$formaDePago', '$estatus');");
                                                //echo $query_insert;
                if ($query_insert) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro creado correctamente!");
                    self.location = "VistaFormasDePago.php"
                    </script>'
                    ;

                }else{
                    echo '<script type="text/javascript">
                    alert("Error al crear el registro");
                    self.location = "VistaFormasDePago.php"
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
<title>Registro de formas de pago</title>
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
                <h4 class="card-title">Registrar nueva forma de pago</h4>
                <p class="card-description">
                    Registrar
                </p>

            <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Código</label>
                    <input type="text" class="form-control"  name="codigo" placeholder="Código">
                </div>
                <div class="form-group">
                    <label >Forma de Pago</label>
                    <input type="text" class="form-control" name="formaDePago" placeholder="Nombre de categoría">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                <a href="VistaUsuarios.php" class="btn btn-danger">Cancelar</a>
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
