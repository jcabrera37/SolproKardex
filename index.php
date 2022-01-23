<?php

  $mensaje = '';
  session_start();

if(!empty($_SESSION['active']))
{
  header('location: sistema/SolProKardex.php');

}
else{
  if(!empty($_POST))
  {
  if(empty($_POST['usuario']) || empty($_POST['password']))
  {
    $mensaje = "Ingrese usuario y Contraseña";
  } else{
    require_once "conexionBD.php";
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];

    $query = mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$contrasena'");
				mysqli_close($conection);
				$result = mysqli_num_rows($query);

        if ($result > 0) 
				{
          
          $data = mysqli_fetch_array($query);

          $_SESSION['active'] = true;
					$_SESSION['idUser'] = $data['id_user'];
					$_SESSION['Nombre'] = $data['nombre'];
					$_SESSION['codSerie'] = $data['codserie'];
					$_SESSION['acceso'] = $data['accesoempresa'];
					$_SESSION['idRol'] = $data['id_rol'];

          if($_SESSION['idRol'] == 1)
          {
            ?>
            <meta http-equiv="refresh" content="0.5; url= sistema/SolProKardex.php"/>
                  <script language = javascript>
                  alert("Bienvenido!")
                  </script>
            <?php
          }else{
            ?>
            <meta http-equiv="refresh" content="1; url= sistema/usuario.php"/>
                  <script language = javascript>
                  alert("Bienvenido!")
                  </script>
            <?php
          }
        }else{
          $mensaje = "Datos de inicio de sesión incorrectos";
          session_destroy();
            
        }
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SolproKardex</title>

<!-- base:css -->
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- css -->
<link rel="stylesheet" href="css/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="images/logo.ico" />
</head>

<body>
<div class="container-scroller d-flex">
  <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
              <img src="images/logo.ico" alt="logo">
            </div>
            <h4>Hola! Bienvenido</h4>
            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
            <form class="pt-3" action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="usuario" name="usuario" placeholder="Usuario">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
              </div>
              <div class="alert"><?php echo isset($mensaje)? $mensaje : ''; ?></div>
              <div class="mt-3">
                <!--<a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">Inicia Sesión</a>-->
                <input type="submit" value="INGRESAR" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="vendors/js/vendor.bundle.base.js"></script>

<script src="vendors/js/off-canvas.js"></script>
<script src="vendors/js/hoverable-collapse.js"></script>
<script src="vendors/js/template.js"></script>

</body>

</html>