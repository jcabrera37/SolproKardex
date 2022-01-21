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
<title>Secciones - Admin</title>
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
                <a href="registrarSeccion.php"> 
                    <h4 class="card-title">Secciones 
                        <span class="float-right"> 
                            <button type="button" class="btn btn-success btn-fw" >
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>  Agregar nueva sección 
                            </button> 
                        </span>
                    </h4>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Codigo
                            </th>
                            <th>
                                Sección
                            </th>
                        </tr>
                    </thead>
                    <?php
                        //paginador
                        $sql_registros = mysqli_query($connectionTrans,"SELECT COUNT(*) AS total_registros FROM secciones WHERE ESTATUS = 1;");
                        $result_registros = mysqli_fetch_array($sql_registros);
                        $total_registros = $result_registros['total_registros'];

                        $reg_pagina = 5;//total de registros por paginas

                        if (empty($_GET['pagina'])) {
                            $pagina = 1;
                        }else{
                            $pagina = $_GET['pagina'];
                        }
                        $desde = ($pagina-1) * $reg_pagina;
                        $total_paginas = ceil($total_registros / $reg_pagina);

                        $consulta = mysqli_query($connectionTrans, "SELECT * FROM `secciones` WHERE ESTATUS = '1' 
                                                                    ORDER BY SECCION LIMIT $desde,$reg_pagina;");
                        mysqli_close($conection);
                        $resultado = mysqli_num_rows($consulta);

                        if ($resultado > 0){
                            while ($datos = mysqli_fetch_array($consulta)){
                                ?>
                    <tbody>
                        <tr>
                            <input type="hidden" name="IDSECCIONES" value="<?php echo $datos['IDSECCIONES']; ?>">
                            <td>
                                <?php echo $datos['CODIGO']; ?>
                            </td>
                            <td>
                                <?php echo $datos['SECCION']; ?>
                            </td>
                            <td>
                                <a class="btn btn-dark sm" href="../sistema/actualizarSeccion.php?id=<?php echo $datos['IDSECCIONES']?>">Editar</a>
                                |
                                <a class="btn btn-danger sm" href="eliminarSeccion.php?id=<?php echo $datos['IDSECCIONES']?>">Eliminar</a>
                            </td>
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
        <!--paginador-->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo 1;?>">Primer</a></li>
                    <?php
                        for ($i=1; $i <= $total_paginas; $i++) { 
                            if ($i == $pagina) {
                                echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                            }
                            
                        }
                    ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas;?>">Última</a></li>
                </ul>
            </nav>
        <!--paginador-->
        </div><!-- content-wrapper ends -->
        
        <?php include "../includes/footer.php";?>
        
    </div> <!-- main-panel ends -->
    
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include"../includes/scriptsJs.php";?>;
</body>

</html>
