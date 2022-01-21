<?php
include_once "../models/libroModel.php";
if (file_exists($_FILES['file']['tmp_name'])) {
    $photo = $_FILES['file']['name'];
    $url = "../static/uploads/";
    $target = $url . basename($photo);
    copy($_FILES['file']['tmp_name'], $target);
} else {
    $photo = "sin-imagen.png";
}
$arrayName = array(
    'isbn' => $_POST['isbn'],
    'titulo' => $_POST['titulo'],
    'precio_c' => $_POST['precio_c'],
    'precio_v' => (($_POST['precio_c'] * 0.12) + $_POST['precio_c']),
    'stock' => $_POST['stock'],
    'file' => $photo,
);

if (LibroModel::libroExistente($arrayName["isbn"])) {
    echo 2;
} else {
    echo LibroModel::guardarLibro($arrayName);
}
