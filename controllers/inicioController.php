<?php
include_once "../models/inicioModel.php";
session_start();
$arrayName = array(
    'email' => strtolower($_POST['email']),
    'password' => md5($_POST['password']),
);

if (InicioModel::inicio($arrayName)) {
    $_SESSION['usuario'] = $_POST['email'];
    echo 1;
} else {
    echo 0;
}
