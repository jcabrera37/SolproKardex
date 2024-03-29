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
    if(empty($_POST['codigo']) || empty($_POST['categoria']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $codigo = $_POST['codigo']; $CD_MY = strtoupper($codigo);
        $categoria = $_POST['categoria']; $CT = strtoupper($categoria);
        
        $estatus = 1; //activo 1 desactivado es 2

        $query_insert = mysqli_query($connectionTrans,"INSERT INTO `CATEGORIAS` (`IDCATEGORIA`, `CODIGO`, `CATEGORIA`) 
                                                        VALUES (NULL, '$CD_MY', '$CT');");
                if ($query_insert) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro creado correctamente!");
                    self.location = "VistaCategorias.php"
                    </script>'
                    ;

                }else{
                    echo '<script type="text/javascript">
                    alert("Error al crear el registro");
                    self.location = "VistaCategorias.php"
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
                <h4 class="card-title">Registrar nueva categoría</h4>
                <p class="card-description">
                    Registrar
                </p>

            <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Código</label>
                    <input type="text" class="form-control"  name="codigo" placeholder="Código">
                </div>
                <div class="form-group">
                    <label >Nombre categoría</label>
                    <input type="text" class="form-control" name="categoria" placeholder="Nombre de categoría" style="text-transform: uppercase;">
                </div>
                <a href="VistaUsuarios.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary mr-2">Guardar</button>
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
