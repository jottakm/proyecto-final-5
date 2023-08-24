<?php

class Conexion
{

    static public function conectar()
    {
        $conexion = new PDO("mysql:host=localhost;dbname=proyecto_final", "root", "");
        return $conexion;
    }
}
