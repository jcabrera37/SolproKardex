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
		$IDELIMINAR = $_POST['IDCATEGORIA'];

		//$query_delete = mysqli_query($conection, "DELETE FROM usuario WHERE idusuario = $idusuario");
		
		$query_delete = mysqli_query($connectionTrans, "UPDATE `CATEGORIAS` SET `ESTATUS` = '0' WHERE `CATEGORIAS`.`IDCATEGORIA` = '$IDELIMINAR';");
		mysqli_close($conection);

		if ($query_delete) 
		{
      echo '<script type="text/javascript">
                    alert("Registro eliminado correctamente!");
                    self.location = "VistaCategorias.php"
                    </script>'
                    ;
		}else{
			echo '<script type="text/javascript">
                    alert("Error al eliminar el registro!");
                    self.location = "VistaCategorias.php"
                    </script>'
                    ;
		}
	}

    //llenar datos del usuario seleccionado
    if (empty($_REQUEST['id'])) 
	{
		header("location: ../sistema/VistaCategorias.php");
		mysqli_close($conection);
	}else{

		$idformaPago = $_REQUEST['id'];
        //echo $idusuario;

		$query = mysqli_query($connectionTrans, "SELECT * FROM `FORMASDEPAGO` WHERE IDFORMADEPAGO = $idformaPago;");
		mysqli_close($conection);

		$result = mysqli_num_rows($query);
		if ($result > 0) {
			while ($data = mysqli_fetch_array($query)) {
				$codigo = $data['CODIGO'];
				$formaPago = $data['FORMADEPAGO'];
        $idformaPago = $data['IDFORMADEPAGO'];
				

			}
		}else{
			header("location: VistaCategorias.php");
		}



	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Formas de Pago - Admin</title>
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
                  <h4 class="card-title">Eliminar Forma de Pago</h4>
                  <div class="table-responsive">
                    


                    <h2>Esta seguro de eliminar el siguiente registro?</h2>
                    <p><b>CODIGO: </b><span><?php echo $codigo ?></span></p>
                    <p><b>FORMA DE PAGO: </b><span><?php echo $formaPago ?></span></p>
                    

                    <form method="post" action="">
                        <input type="hidden" name="idformaPago"  value="<?php echo $idformaPago; ?>">
                        <a href="VistaFormasDePago.php" class="btn btn-danger">Cancelar</a>
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