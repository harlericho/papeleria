<?php
class Conexion
{
    public static function conectar()
    {
        try {
            $link = new PDO(
                "mysql:host=localhost;dbname=db_papeleria",
                "root",
                ""
            );
            $link->exec("set names utf8");
            return $link;
        } catch (\Throwable $th) {
            die("Error en la conexion: " . $th->getMessage());
        }
    }
}
