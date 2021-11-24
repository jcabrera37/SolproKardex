<?php
  session_start();
  include "../includes/funcionFecha.php";
  include "../conexionBD.php";
  if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}

    if (!empty($_POST))
	{
		$idusuario = $_POST['idusuario'];

		//$query_delete = mysqli_query($conection, "DELETE FROM usuario WHERE idusuario = $idusuario");
		
		$query_delete = mysqli_query($conection, "UPDATE `usuarios` SET `estatus` = '0' WHERE `usuarios`.`id_user` = '$idusuario'");
		mysqli_close($conection);

		if ($query_delete) 
		{
		 	header("location: VistaUsuarios.php");
		}else{
			echo "Error al eliminar usuario";
		}

	}

    //llenar datos del usuario seleccionado
    if (empty($_REQUEST['id']) || $_REQUEST['id'] == 1 ) 
	{
		header("location: ../sistema/VistaUsuarios.php");
		mysqli_close($conection);
	}else{

		$idusuario = $_REQUEST['id'];
        echo $idusuario;

		$query = mysqli_query($conection, "SELECT u.id_user, u.usuario, u.nombre, u.codserie, u.id_rol, r.nombre_rol
                                            from usuarios u
                                            INNER JOIN rol r
                                            on u.id_rol = r.id_rol
                                            WHERE u.id_user = '$idusuario';");
		mysqli_close($conection);

		$result = mysqli_num_rows($query);
		if ($result > 0) {
			while ($data = mysqli_fetch_array($query)) {
				$nombre = $data['nombre'];
				$usuario = $data['usuario'];
				$rol = $data['nombre_rol'];

			}
		}else{
			header("location: lista_usuarios.php");
		}



	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SolproKardex - Admin</title>
  <link rel="shortcut icon" href="../images/logo.ico">
  <?php include "../includes/includes.php"; ?>

</head>
<body>
  <div class="container-scroller d-flex">
    <!-- side bar -->
    <?php include "../includes/sideBar.php";?>
    <!-- contenedor principal -->
    <div class="container-fluid page-body-wrapper">
    <!-- Barra de navegacion -->
    <?php include "../includes/navBar.php";?>
    <!-- panel principal -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Eliminar Usuarios</h4>
                  <div class="table-responsive">
                    


                    <h2>Esta seguro de eliminar el siguiente registro?</h2>
                    <p>Nombre: <span><?php echo $nombre ?></span></p>
                    <p>Usuario: <span><?php echo $usuario ?></span></p>
                    <p>Tipo de Usuario: <span><?php echo $rol ?></span></p>

                    <form method="post" action="">
                        <input type="hidden" name="idusuario"  value="<?php echo $idusuario; ?>">
                        <a href="VistaUsuarios.php" class="btn btn-danger">Cancelar</a>
                        <input type="submit" value="Aceptar" class="btn btn-primary" >
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->

          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <?php include "../includes/footer.php";?>
        <!-- partial -->
      </div>
      
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include "../includes/scriptsJs.php";?>
</body>

</html>