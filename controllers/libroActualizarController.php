<?php
include_once "../models/libroModel.php";


$imagen = LibroModel::ImagenId($_POST["id"]);
if (file_exists($_FILES['file']['tmp_name'])) {
    if ($imagen['imagen'] != "sin-imagen.png") {
        unlink("../static/uploads/" . $imagen);
    }
    $photo = $_FILES['file']['name'];
    $url = "../static/uploads/";
    $target = $url . basename($photo);
    copy($_FILES['file']['tmp_name'], $target);
} else {
    $photo = $imagen['imagen'];
}
if ($_POST['precio_c_u'] != $_POST['precio_c']) {
    $precio_c_u = $_POST['precio_c'];
    $precio_v_u = (($_POST['precio_c'] * 0.12) + $_POST['precio_c']);
} else {
    $precio_c_u = $_POST['precio_c_u'];
    $precio_v_u = $_POST['precio_v'];
}
$arrayName = array(
    'id' => $_POST['id'],
    'isbn' => $_POST['isbn'],
    'titulo' => $_POST['titulo'],
    'precio_c' => $precio_c_u,
    'precio_v' => $precio_v_u,
    'stock' => $_POST['stock'],
    'file' => $photo,
);
if (LibroModel::validarUpdateISBN($_POST['isbn'], $_POST['id']) >= 2) {
    echo 2;
} else {
    echo LibroModel::actualizarLibro($arrayName);
}
