<?php
include_once "../models/libroModel.php";

echo json_encode(LibroModel::listadoLibro());