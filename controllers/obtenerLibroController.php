<?php
include_once "../models/libroModel.php";

echo json_encode(LibroModel::obtenerLibro($_POST["id"]));