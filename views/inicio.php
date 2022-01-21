<?php
include_once "../templates/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <img src="../static/img/logo.ico" alt="papeleria" width="50">
                    <h3 class="panel-title">Sessión Inicio</h3>
                </div>
                <div class="panel-body">
                    <form role="form" onsubmit="app.inicio()" action="javascript:void(0);" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus title="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" name="password" type="password" title="contraseña">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">
                                <i class="fa fa-sign-out"></i>
                                Entrar</button>
                            <center>
                                <a href="registro.php" class="row">
                                    <i class="fa fa-plus-square"></i>
                                    Registrar</a>
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

<script src="../static/code/inicio.js"></script>