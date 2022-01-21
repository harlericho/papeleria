<?php include_once '../templates/header.php'; ?>
<!-- Wrapper -->
<div id="wrapper">
    <?php include_once "../templates/navbar.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ventas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nivel transacciones por año
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataLibro"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grado de transacciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="dataTransaccion"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include_once '../templates/footer.php'; ?>
<script src="../static/code/data.js"></script>
<script src="../static/code/data1.js"></script>