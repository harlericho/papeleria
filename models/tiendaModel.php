<?php
include_once "../config/conexion.php";

class TiendaModel
{
    public static function caja($caja)
    {
        try {
            $sql = "UPDATE tienda SET caja = :caja";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":caja", $caja, PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function obtenerDinero(){
        try {
            $sql = "SELECT caja FROM tienda";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
}
