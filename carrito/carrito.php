<?php
    session_start();
    include "../includes/funcionFecha.php";
    include "../conexionBD.php";

    if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SolproKardex - Ventas</title>
<link rel="shortcut icon" href="../images/logo.ico">
<?php include "../includes/includes.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/styleCalendar.css" type="text/css">
</head>
<body>
    <div class="container-scroller d-flex">
        <!-- side bar -->
        <?php include "../includes/sideBar.php";?>

        <!-- contenedor principal -->
        <div class="container-fluid page-body-wrapper">
        <!-- nav bar -->    
        <?php include "../includes/navBar.php";?>
        <!-- panel principal -->
                    

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12">
                        
                    </div>

                    
                </div>
            </div>
                
                <!-- row end -->
            <?php include "../includes/footer.php";?>
            <!-- partial -->
            </div>
        </div>
        <!-- contenedor principal -->
    </div>
<!-- container-scroller -->

<?php include "../includes/scriptsJs.php";?>

</body>

</html>