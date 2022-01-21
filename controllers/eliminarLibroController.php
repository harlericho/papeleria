<?php
include_once "../models/libroModel.php";

echo LibroModel::eliminarLibro($_POST["id"]);