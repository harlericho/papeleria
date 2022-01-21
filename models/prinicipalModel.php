<?php
include_once "../config/conexion.php";

class PrincipalModel
{

    public static function totalDinero()
    {
        try {
            $sql = "SELECT caja FROM tienda";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }

    public static function totalLibro()
    {
        try {
            $sql = "SELECT count(*) FROM libro";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }

    public static function totalTransacciones()
    {
        try {
            $sql = "SELECT count(*) FROM transaccion";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
}
