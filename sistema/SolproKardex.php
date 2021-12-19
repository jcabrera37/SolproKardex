<?php
  session_start();
  include "../includes/funcionFecha.php";
  
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
  <title>SolproKardex - Admin</title>
  <link rel="shortcut icon" href="../images/logo.ico">
  <?php include "../includes/includes.php"; ?>
  <link rel="stylesheet" href="../css/styleCalendar.css">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

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
            <div class="col-lg-8 grid-margin stretch-card">
              <center><img src="../images/portada.jpg" alt="portada"class="img-fluid" width="1366"></center>
            </div>
            <div class="col-lg-4 " >
              <!-- Calendar -->
              <div class="calendar">
                <div class="month">
                  <i class="fas fa-angle-left prev" style="color: aliceblue;"></i>
                  <div class="date">
                    <h1></h1>
                    <p><?php echo fechaC() ?></p>
                  </div>
                  <i class="fas fa-angle-right next" style="color: aliceblue;"></i>
                </div>
                <div class="weekdays">
                  <div>Dom</div>
                  <div>Lun</div>
                  <div>Mar</div>
                  <div>Mie</div>
                  <div>Jue</div>
                  <div>Vie</div>
                  <div>Sab</div>
                </div>
                <div class="days"></div>
              </div>
          <!-- Calendar -->
            </div>
              
          </div>
          <!-- row end -->
          
<br>
<br><br><br><br><br><br>
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
  <script src="../includes/scriptCalendar.js"></script>
</body>

</html>