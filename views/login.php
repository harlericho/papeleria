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
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus title="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" name="password" type="password" title="contraseña">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="main.php" class="btn btn-lg btn-success btn-block">
                            <i class="fas fa-sign-in-alt"></i>    
                            Entrar</a>
                            <a href="main.php" class="btn btn-lg btn-primary btn-block">
                            <i class="fas fa-plus-square"></i>    
                            Registrar</a>
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

<script src="../static/js/jquery.min.js"></script>