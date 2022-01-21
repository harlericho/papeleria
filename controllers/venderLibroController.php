<?php
include_once "../models/transaccionModel.php";
include_once "../models/libroModel.php";
include_once "../models/tiendaModel.php";

$caja_fija = TiendaModel::obtenerDinero();
if ($_POST["stock_vender_v"] <= $_POST["stock_v_v"]) {
    // Calcular el stock actual
    $actualizar_stock = $_POST["stock_v_v"] - $_POST["stock_vender_v"];
    // Valor de la venta
    $valor_venta = $_POST["stock_vender_v"] * $_POST["precio_v_v"];
    $arrayName = array(
        'id_tipo_transaccion' => $_POST['tipo_transaccion_v'],
        'id_libro' => $_POST['id_libro_v'],
        'cantidad' => $_POST['stock_vender_v'],
        'precio_adquirido' => $_POST['precio_v_v'],
        'precio' => $valor_venta,
        'fecha' => $_POST['fecha_vender_v']
    );
    // Actualizar stock del libro
    $arrayName1 = array(
        'id' => $_POST['id_libro_v'],
        'stock' => $actualizar_stock
    );
    // Actualizar caja
    TiendaModel::caja($caja_fija["caja"] + $valor_venta);
    // Actualizar stock
    LibroModel::actualizarStock($arrayName1);
    echo TransaccionModel::generarTransaccion($arrayName);
} else {
    echo 2;
}
