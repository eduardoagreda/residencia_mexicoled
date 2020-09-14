<?php

class Conexion{

    

    public static function conectar()
    {
        try {
            $cn = new PDO("mysql:host=localhost;dbname=login-php", "mauricio", "mauricio");

            return $cn;
            
        } catch (PDOException $e) {
            die($ex->getMessage());
        }
    }
}

