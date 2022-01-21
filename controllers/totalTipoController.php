<?php
include_once "../models/transaccionModel.php";
$arrayName = array(
    'efectivo' => TransaccionModel::totalTipoEfectivo('efectivo'),
    'tarjeta' => TransaccionModel::totalTipoTajeta('tarjeta'),
    'transferencia' => TransaccionModel::totalTipoTransferencia('transferencia'),
);
echo json_encode($arrayName);
