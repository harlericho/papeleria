<?php
include_once "../models/inicioModel.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
}
foreach (InicioModel::obtenerUsuario($_SESSION['usuario']) as $key => $value) {
    $nombres = $value['nombres'];
    $email = $value['email'];
}
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="principal.php">
        Papeleria</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="principal.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <?php echo $email ?>  <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $nombres ?> </a>
                </li>
                <li class="divider"></li>
                <li><a href="salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="principal.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> Sessiones<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="libro.php">Libro</a>
                        </li>
                        <li>
                            <a href="transaccion.php">Transacciones</a>
                        </li>
                        <li>
                            <a href="ventas.php">Ventas</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>