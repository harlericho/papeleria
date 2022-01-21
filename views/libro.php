<?php include_once '../templates/header.php'; ?>

<!-- Wrapper -->
<div id="wrapper">
    <?php include_once "../templates/navbar.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Libros</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulario libro
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form role="form" id="formLibro" onsubmit="app.registro()" action="javascript:void(0);" method="POST">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" type="text" name="isbn" placeholder="Escriba un isbn codigo unico" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input class="form-control" type="text" name="titulo" placeholder="Escriba un titulo al libro" required>
                                </div>
                                <div class="form-group">
                                    <label>Precio compra</label>
                                    <input class="form-control" type="text" name="precio_c" placeholder="10.00" required>
                                    <input type="hidden" name="precio_c_u">
                                    <input type="hidden" name="precio_v">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Precio venta</label>
                                    <input class="form-control" type="text" name="precio_v" placeholder="10.00" required>
                                </div> -->
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input class="form-control" min="1" type="number" name="stock" placeholder="1" required>
                                </div>

                                <div class="form-group">
                                    <div id="imagenCargada"></div>
                                </div>

                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="file">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-secondary" onclick="app.reset()">
                                    <i class="fa fa-refresh"></i>
                                    Nuevo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Listado de libros
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div id="tablaLibro"></div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- /#page-wrapper -->

    <!-- #Modal -->
    <div class="panel-body">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Launch Demo Modal
        </button> -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Abastecer libro</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="formAbastecer" action="javascript:void(0);" method="POST">
                            <input type="hidden" name="id_libro_a">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input class="form-control" type="text" name="isbn_a" disabled>
                            </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input class="form-control" type="text" name="titulo_a" disabled>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input class="form-control" min="1" type="text" name="stock_a" disabled>
                            </div>
                            <div class="form-group">
                                <label>Abastecer stock</label>
                                <input class="form-control" min="1" placeholder="1" type="number" name="stock_nuevo_a" autofocus required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" data-dismiss="modal" id="modalCerrar_a">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="app.registroAbastecer()">
                                    <i class="fa fa-plus"></i>
                                    Abastecer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>


    <!-- #Modal -->
    <div class="panel-body">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Launch Demo Modal
        </button> -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Vender libro</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="formVender" action="javascript:void(0);" method="POST">
                            <input type="hidden" name="id_libro_v" id="id_libro_v">
                            <div class="form-group">
                                <label>Tipo transacción</label>
                                <div id="tipo_transaccion"></div>
                            </div>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input class="form-control" type="text" name="isbn_v" disabled>
                            </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input class="form-control" type="text" name="titulo_v" disabled>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input class="form-control" min="1" type="text" name="stock_v" disabled>
                                <input type="hidden" name="stock_v_v" id="stock_v_v">
                                <input type="hidden" name="precio_v_v" id="precio_v_v">
                            </div>
                            <div class="form-group">
                                <label>Stock a vender</label>
                                <input class="form-control" min="1" placeholder="1" type="number" name="stock_vender_v" id="stock_vender_v" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input class="form-control" type="date" name="fecha_vender_v" id="fecha_vender_v" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" data-dismiss="modal" id="modalCerrar_v">Cerrar</button>
                                <button type="button" class="btn btn-info" onclick="app.registroVender()">
                                    <i class="fa fa-dollar"></i>
                                    Vender</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>



    <!-- .panel-body -->
</div>
<!-- /#wrapper -->

<?php include_once '../templates/footer.php'; ?>

<script src="../static/code/libro.js"></script>