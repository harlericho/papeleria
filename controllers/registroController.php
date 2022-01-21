<?php
include_once "../models/inicioModel.php";

$arrayName = array(
    'nombres' => $_POST['nombres'],
    'email' => strtolower($_POST['email']),
    'password' => md5($_POST['password']),
);
if (InicioModel::usuarioExistente(strtolower($_POST['email']))) {
    echo 2;
} else {
    echo InicioModel::guardarLogin($arrayName);
}
