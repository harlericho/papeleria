<?php
include_once "../models/transaccionModel.php";
include_once "../models/prinicipalModel.php";

$arrayName = array(
    'precio' => TransaccionModel::totalPrecioTransaccion(),
    'cantidad' => TransaccionModel::totalCantidadTransaccion(),
    'libro' => PrincipalModel::totalLibro(),
    'transaccion' => PrincipalModel::totalTransacciones(),
);

echo json_encode($arrayName);
