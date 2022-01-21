<?php
include_once "../config/conexion.php";

class TransaccionModel
{
    public static function listadoTipoTransaccion()
    {
        try {
            $sql = "SELECT * FROM tipo_transaccion";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function generarTransaccion($data)
    {
        try {
            $sql = "INSERT INTO transaccion (id_tipo_transaccion, id_libro, cantidad, precio_adquirido, precio, fecha)
            VALUES (:id_tipo_transaccion, :id_libro, :cantidad, :precio_adquirido, :precio, :fecha)";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id_tipo_transaccion", $data["id_tipo_transaccion"], PDO::PARAM_INT);
            $query->bindParam(":id_libro", $data["id_libro"], PDO::PARAM_INT);
            $query->bindParam(":cantidad", $data["cantidad"], PDO::PARAM_INT);
            $query->bindParam(":precio_adquirido", $data["precio_adquirido"], PDO::PARAM_STR);
            $query->bindParam(":precio", $data["precio"], PDO::PARAM_STR);
            $query->bindParam(":fecha", $data["fecha"], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function listadoTransaccion()
    {
        try {
            $sql = "SELECT 
            l.isbn,l.titulo,l.precio_v,l.imagen,t.cantidad,t.precio_adquirido,t.precio,t.fecha,tp.nombre
            FROM transaccion t 
            JOIN tipo_transaccion tp ON t.id_tipo_transaccion = tp.id_tipo_transaccion
            JOIN libro l ON t.id_libro = l.id_libro";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function totalTipoEfectivo($tipo)
    {
        try {
            $sql = "SELECT COUNT(*) from transaccion t 
            JOIN tipo_transaccion tp ON t.id_tipo_transaccion = tp.id_tipo_transaccion
            WHERE tp.nombre =:tipo";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function totalTipoTajeta($tipo)
    {
        try {
            $sql = "SELECT COUNT(*) from transaccion t 
            JOIN tipo_transaccion tp ON t.id_tipo_transaccion = tp.id_tipo_transaccion
            WHERE tp.nombre =:tipo";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function totalTipoTransferencia($tipo)
    {
        try {
            $sql = "SELECT COUNT(*) from transaccion t 
            JOIN tipo_transaccion tp ON t.id_tipo_transaccion = tp.id_tipo_transaccion
            WHERE tp.nombre =:tipo";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function totalPrecioTransaccion(){
        try {
            $sql = "SELECT SUM(precio) FROM transaccion";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function totalCantidadTransaccion(){
        try {
            $sql = "SELECT SUM(cantidad) FROM transaccion";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
}
