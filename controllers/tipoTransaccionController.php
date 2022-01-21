<?php
include_once "../models/transaccionModel.php";

echo json_encode(TransaccionModel::listadoTipoTransaccion());