
<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href=""><img src="../images/logo.ico" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href=""><img src="../images/logo.ico" alt="logo"/></a>
          </div>
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Usuario:  <?php echo $_SESSION['Nombre'];?></h4>
          
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <img src="img/carrito.ico" class="nav-link dropdown-toggle img-fluid" height="20px"
                width="50px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"></img>
                  <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                    <table id="lista-carrito" class="table">
                      <thead>
                        <tr>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th></th>
                          </tr>
                          </thead>
                          <tbody></tbody>
                        </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>
                    </div>
              </li>
          </ul>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?php echo fechaC() ?></h4>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                
                <span class="nav-profile-name"><?php echo $_SESSION['Nombre'];?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="mdi mdi-settings text-primary"></i>
                  Configuración
                </a>
                <a class="dropdown-item" href="../includes/cerrarSesion.php">
                  <i class="mdi mdi-logout text-primary"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>
            
          </ul>

                          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
          
        </div>
      
    </nav>