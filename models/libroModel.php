<?php
include_once "../config/conexion.php";

class LibroModel
{

    public static function guardarLibro($data)
    {
        try {
            $sql = "INSERT INTO libro (isbn, titulo, precio_c, precio_v, stock, imagen)
            VALUES (:isbn, :titulo, :precio_c, :precio_v, :stock, :imagen)";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":isbn", $data["isbn"], PDO::PARAM_STR);
            $query->bindParam(":titulo", $data["titulo"], PDO::PARAM_STR);
            $query->bindParam(":precio_c", $data["precio_c"], PDO::PARAM_STR);
            $query->bindParam(":precio_v", $data["precio_v"], PDO::PARAM_STR);
            $query->bindParam(":stock", $data["stock"], PDO::PARAM_INT);
            $query->bindParam(":imagen", $data["file"], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function actualizarLibro($data)
    {
        try {
            $sql = "UPDATE libro SET isbn = :isbn, titulo = :titulo, precio_c = :precio_c, precio_v = :precio_v, stock = :stock, imagen = :imagen WHERE id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id", $data["id"], PDO::PARAM_INT);
            $query->bindParam(":isbn", $data["isbn"], PDO::PARAM_STR);
            $query->bindParam(":titulo", $data["titulo"], PDO::PARAM_STR);
            $query->bindParam(":precio_c", $data["precio_c"], PDO::PARAM_STR);
            $query->bindParam(":precio_v", $data["precio_v"], PDO::PARAM_STR);
            $query->bindParam(":stock", $data["stock"], PDO::PARAM_INT);
            $query->bindParam(":imagen", $data["file"], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function libroExistente($isbn)
    {
        try {
            $sql = "SELECT * FROM libro WHERE isbn = :isbn";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":isbn", $isbn, PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function listadoLibro()
    {
        try {
            $sql = "SELECT * FROM libro WHERE estado = 'A' ";
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function eliminarLibro($id)
    {
        try {
            $sql = "UPDATE libro SET estado = 'I' WHERE id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function obtenerLibro($id)
    {
        try {
            $sql = "SELECT * FROM libro WHERE id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function actualizarStock($data)
    {
        try {
            $sql = "UPDATE libro SET stock =:stock  WHERE id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id", $data['id'], PDO::PARAM_INT);
            $query->bindParam(":stock", $data['stock'], PDO::PARAM_INT);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function ImagenId($id)
    {
        try {
            $sql = "SELECT imagen FROM libro WHERE id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function validarUpdateISBN($isbn, $id)
    {
        try {
            $sql = "SELECT COUNT(*) FROM libro WHERE isbn = :isbn AND id_libro = :id";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":isbn", $isbn, PDO::PARAM_STR);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchColumn();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
}
