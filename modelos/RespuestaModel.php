<?php

require_once 'Conexion.php';

class RespuestaModel
{

    static public function listarRespuestas($tabla, $columna, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna=:$columna");
        $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // static public function guardarPregunta($tabla, $datos)
    // {
    //     $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, descripcion, imagen, id_usuario) 
    //                                             VALUES (:titulo, :descripcion, :imagen, :id_usuario)");

    //     $stmt->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
    //     $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
    //     $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
    //     $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);

    //     if ($stmt->execute())
    //         return true;
    //     else
    //         return false;
    // }
}
