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
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $codserie = $_POST['codserie'];
        $acceso = $_POST['acceso'];
        $rol = $_POST['tipo']; 
        $estatus = 1; //activo 1 desactivado es 2

        $query_insert = mysqli_query($conection,"INSERT INTO `usuarios` (`id_user`, `nombre`, `usuario`, `clave`, `codserie`, `accesoempresa`, `id_rol`, `estatus`) 
                                                VALUES (NULL, '$nombre', '$usuario', '$clave', '$codserie', '$acceso', '$rol', '$estatus');");
                                                echo $query_insert;
                if ($query_insert) 
                {
                    echo '<script type="text/javascript">
                    alert("Usuario creado correctamente!");
                    self.location = "VistaUsuarios.php"
                    </script>'
                    ;

                }else{
                    echo '<script type="text/javascript">
                    alert("Error al crear el usuario");
                    self.location = "VistaUsuarios.php"
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
                <div class="form-group">
                    <?php 
						$query_tipo = mysqli_query($conection,"SELECT * FROM `rol`" );
						$result_tipo = mysqli_num_rows($query_tipo);
					?>
                    <label >Tipo de Usuario</label>
                    <select name="tipo" id="agrTipo" class="form-control">
                    <?php 
					if ($result_tipo > 0) 
						{
							while ($data_tipo = mysqli_fetch_array($query_tipo)) {
					?>
                        <option value="<?php echo $data_tipo['id_rol'] ?>"  name="tipo"><?php echo $data_tipo["nombre_rol"] ?></option>
                        
                    <?php 
							}
						}
					?>
                    </select>
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
