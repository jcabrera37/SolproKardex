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
    if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['codserie']) || empty($_POST['acceso']) )
    {
        echo '<script type="text/javascript">
        alert("Debe llenar los datos correspondientes");
        </script>';
    }else{
        $iduser = $_GET['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $codserie = $_POST['codserie'];
        $acceso = $_POST['acceso'];
        $rol = 2; //rol 1 administrador y rol 2 usuario
        $estatus = 1; //activo 1 desactivado es 2

        $query_actualizar = mysqli_query($conection,"UPDATE `usuarios` SET `usuario` = '$usuario', `clave` = '$clave', `nombre` = '$nombre', `codserie` = '$codserie', `accesoempresa` = '$acceso', `id_rol` = '2', `estatus` = '1' WHERE `usuarios`.`id_user` = '$iduser';");
                //echo $query_insert;
                if ($query_actualizar) 
                {
                    echo '<script type="text/javascript">
                    alert("Usuario modificado correctamente!");
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("Error al modificar el usuario");
                    </script>';
                }

    }
}

//mostrar datos desde lista

if(empty($_GET['id'])){
    header('location: VistaUsuarios.php');
    mysqli_close($conection);
}
$id_usuario_modificar = $_GET['id'];

$consulta_usurario = mysqli_query($conection, "SELECT * FROM usuarios WHERE id_user = $id_usuario_modificar");

mysqli_close($conection);

$resultado_busq = mysqli_num_rows($consulta_usurario);

if($resultado_busq == 0){
    header('location: ListaUsuarios.php');
}else{
    while($datos = mysqli_fetch_array($consulta_usurario)){
        $idusuario = $datos['id_user'];
        $nombre = $datos['nombre'];
        $usuario = $datos['usuario'];
        $clave = $datos['clave'];
        $cod = $datos['codserie'];
        $acceso = $datos['accesoempresa'];

    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Actualización de usuarios</title>
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
                <h4 class="card-title">Actualizar Usuarios</h4>
                <p class="card-description">
                    Modificar usuarios               </p>
                <form class="forms-sample" method="post">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control"  name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label >Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
                </div>
                <div class="form-group">
                    <label>Clave</label>
                    <input type="text" class="form-control"  name="clave" placeholder="Clave" value="<?php echo $clave; ?>">
                </div>
                <div class="form-group">
                    <label>Codigo Serie</label>
                    <input type="text" class="form-control"  name="codserie" placeholder="Codigo" value="<?php echo $cod; ?>">
                </div>
                <div class="form-group">
                    <label >Acceso a empresa</label>
                    <input type="text" class="form-control"  name="acceso" placeholder="Acceso" value="<?php echo $acceso; ?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="SolproKardex.php" class="btn btn-danger">Cancelar</a>
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
