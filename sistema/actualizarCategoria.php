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
        $idcategoria = $_GET['id'];
        $codigo = $_POST['codigo'];
        $categoria = strtoupper($_POST['categoria']);

        $query_actualizar = mysqli_query($connectionTrans,"UPDATE `categorias` SET `CODIGO` = '$codigo', `CATEGORIA` = '$categoria' 
                                                            WHERE `categorias`.`IDCATEGORIA` = '$idcategoria';");
                if ($query_actualizar) 
                {
                    echo '<script type="text/javascript">
                    alert("Registro modificado correctamente!");
                    self.location = "VistaCategorias.php"
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("Error al modificar el registro");
                    self.location = "VistaCategorias.php"
                    </script>';
                }

    }
}

//mostrar datos desde lista

if(empty($_GET['id'])){
    header('location: VistaCategorias.php');
    mysqli_close($connectionTrans);
}
$id_eliminar = $_GET['id'];

$consulta_categoria = mysqli_query($connectionTrans, "SELECT * FROM `categorias` WHERE IDCATEGORIA = $id_eliminar");

$resultado_busq = mysqli_num_rows($consulta_categoria);

if($resultado_busq == 0){
        header('location: VistaCategorias.php');
    }else{
        while($datos = mysqli_fetch_array($consulta_categoria)){
            $idcategoria = $datos['IDCATEGORIA'];
            $codigo = $datos['CODIGO'];
            $categoria = $datos['CATEGORIA'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Categorias - Admin</title>
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
                <h4 class="card-title">Actualizar categorías</h4>
                <p class="card-description">
                    Modificar Categoría               </p>
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Código</label>
                    <input type="text" class="form-control"  name="codigo" placeholder="Codigo" value="<?php echo $codigo; ?>">
                </div>
                <div class="form-group">
                    <label >Categoría</label>
                    <input type="text" class="form-control" name="categoria" placeholder="Nombre de categoría" value="<?php echo $categoria; ?>" style="text-transform: uppercase;">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="VistaCategorias.php" class="btn btn-danger">Cancelar</a>
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
