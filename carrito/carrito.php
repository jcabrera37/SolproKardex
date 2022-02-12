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
                    

        <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>

        <div class="container" id="lista-productos">
            
            <div class="card-deck mb-3 text-center">
                
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">ACEITE 20W50</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/CASTROL SAE 20W50 GLN.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q. <span class="">275</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>4.73 Litros</li>
                            <li>CASTROL</li>
                            <li>SAE 20W50</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">ACEITE 20W50 LITRO </h4>
                    </div>
                    <div class="card-body">
                        <img src="img/CASTROL SAE 20W50 L.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q. <span class="">125</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1 LITRO</li>
                            <li>CASTROL</li>
                            <li>SAE 20W50</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">KIT DE EMPAQUES</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/KIT DE EMPAQUES 3344323.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q. <span class="">2341</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>KIT</li>
                            <li>EMPAQUES DEL SUR</li>
                            <li>EMPAQUE MOTOR TOYOTA 22R</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">
                
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">KIT DE FRENOS</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/KIT FRENOS EVOLUTION.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q/. <span class="">2315</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>KIT</li>
                            <li>EMPAQUES R$M</li>
                            <li>EMPAQUE MOTOR TOYOTA 20R</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">KIT DE FRENOS</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/KIT FRENOS K-SPORT.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q/. <span class="">5769</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>KIT</li>
                            <li>K-SPORT</li>
                            <li>EMPAQUE FRENOS EVOLUTION</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">ACEITE 20W50</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/MOBIL SUPER 20W50 5L.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q/. <span class="">277</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>5 LITROS</li>
                            <li>MOBIL</li>
                            <li>ACEITE SUPER 20W50</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>
<!-- 
            <div class="card-deck mb-3 text-center">
                
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">LG</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/lg.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">4299</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>8 GB RAM</li>
                            <li>COLOR PLATEADO</li>
                            <li>256 GB DD</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">ADVANCE</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/advance.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">869</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>3 GB RAM</li>
                            <li>COLOR NEGRO</li>
                            <li>64 GB DD</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">DELL</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/dell.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">5397</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>8 GB RAM</li>
                            <li>COLOR NEGRO</li>
                            <li>1 TB DD</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>
-->

        </div>
    </main>

    
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>
                
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