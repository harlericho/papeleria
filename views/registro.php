<?php
include_once "../templates/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <img src="../static/img/logo.ico" alt="papeleria" width="50">
                    <h3 class="panel-title">Registro usuario</h3>
                </div>
                <div class="panel-body">
                    <form role="form" onsubmit="app.registro()" action="javascript:void(0);" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nuevo nombres" name="nombres" type="text" autofocus title="Nuevo nombres">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nuevo E-mail" name="email" type="email" title="Nuevo email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nueva Contraseña" name="password" type="password" title="Nueva contraseña">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Repetir Contraseña" name="password2" type="password" title="Repetir contraseña">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                <i class="fa fa-save"></i>
                                Guardar</button>
                            <center>
                                <a href="inicio.php" class="row">
                                    <i class="fa fa-home"></i>
                                    Ir a inicio</a>
                            </center>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../templates/footer.php";
?>

<script src="../static/code/registro.js"></script>