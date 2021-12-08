<?php
session_start();
include "../includes/funcionFecha.php";
if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}
    include "../conexionBD.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usuarios - Admin</title>
<?php include "../includes/includes.php";?>
</head>

<body>
<div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <?php include "../includes/sideBar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
<!-- partial:../../partials/_navbar.html -->
    <?php include "../includes/navBar.php"; ?>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <a href="registrarUsuario.php"> 
                    <h4 class="card-title">Usuarios 
                        <span class="float-right"> 
                            <button type="button" class="btn btn-success btn-fw" >
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>  Agregar nuevo 
                            </button> 
                        </span>
                    </h4>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        
                        <th>
                            Usuario
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Cod. Serie
                        </th>
                        <th>
                            Tipo
                        </th>
                        <th>
                            Acciones
                        </th>
                        <th>
                            Ver información
                        </th>
                        </tr>
                    </thead>
                    <?php
                        $consulta = mysqli_query($conection, "SELECT u.id_user, u.usuario, u.nombre, u.codserie, u.id_rol, r.nombre_rol
                        from usuarios u
                        INNER JOIN rol r
                        on u.id_rol = r.id_rol
                        WHERE u.estatus = 1;");

                        mysqli_close($conection);

                        $resultado = mysqli_num_rows($consulta);

                        if ($resultado > 0){
                            while ($datos = mysqli_fetch_array($consulta)){
                                ?>
                    <tbody>
                    <tr>
                        <input type="hidden" name="idusuario" value="<?php echo $datos['id_user']; ?>">
                        
                        <td>
                        <?php echo $datos['usuario']; ?>
                        </td>
                        <td>
                        <?php echo $datos['nombre']; ?>
                        </td>
                        <td>
                        <?php echo $datos['codserie'];?>
                        </td>
                        <td>
                        <?php echo $datos['nombre_rol'];?>
                        </td>
                        <td>
                        <a class="btn btn-dark sm" href="../sistema/actualizarUsuario.php?id=<?php echo $datos['id_user']?>">Editar</a>
                        <?php if($datos['id_rol'] != 1) { ?>
                        |
                        <a class="btn btn-danger sm" href="eliminarUsuario.php?id=<?php echo $datos['id_user']?>">Eliminar</a>
                            <?php }?>
                        </td>
                        <td><a class="btn btn-warning sm" href="#?id=<?php echo $datos['id_user']?>">Ver</a></td>
                        </tr>
                        
                    </tbody>
                    <?php 
						
					}
				}
			?>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div><!-- row ends -->
        </div><!-- content-wrapper ends -->
        
        <?php include "../includes/footer.php";?>
        
    </div> <!-- main-panel ends -->
    
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include"../includes/scriptsJs.php";?>;
</body>

</html>
