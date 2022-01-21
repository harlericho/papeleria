<?php
include_once "../config/conexion.php";

class InicioModel
{
    public static function guardarLogin($data)
    {
        try {
            $sql = "INSERT INTO login (nombres, email, password)
            VALUES (:nombres, :email, :password)";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
            $query->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $query->bindParam(":password", $data["password"], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function usuarioExistente($email)
    {
        try {
            $sql = "SELECT * FROM login WHERE email = :email";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function inicio($data)
    {
        try {
            $sql = "SELECT * FROM login WHERE email = :email AND password = :password";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $query->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
    public static function obtenerUsuario($email)
    {
        try {
            $sql = "SELECT * FROM login WHERE email = :email";
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Error " . $th->getMessage());
        }
    }
}
