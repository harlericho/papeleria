<?php
include_once "../models/libroModel.php";

$arrayName = array(
    'id' => $_POST['id_libro'],
    'stock' => $_POST['stock_nuevo'] + $_POST['stock_actual'],
);
echo LibroModel::actualizarStock($arrayName);