<?php
include_once "../models/prinicipalModel.php";
$arrayName = array(
    'dinero' => PrincipalModel::totalDinero(),
    'libros' => PrincipalModel::totalLibro(),
    'transaccion' => PrincipalModel::totalTransacciones()
);
echo json_encode($arrayName);
