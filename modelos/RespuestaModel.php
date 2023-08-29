<?php

require_once 'Conexion.php';

class RespuestaModel
{

    static public function listarRespuestas($tabla, $columna, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT r.*, concat_ws(' ', pp.nombre, pp.paterno, pp.materno) AS usuario 
        FROM $tabla r JOIN usuario u ON r.id_usuario=u.id_usuario
        JOIN persona pp ON u.id_usuario=pp.id_persona WHERE $columna=:$columna");
        $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function guardarRespuesta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion, imagen, id_usuario, id_pregunta) 
                                                VALUES (:descripcion, :imagen, :id_usuario, :id_pregunta)");

        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(":id_pregunta", $datos['id_pregunta'], PDO::PARAM_INT);

        if ($stmt->execute())
            return true;
        else
            return false;
    }

    static public function listarRespuestasUsuario()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM respuesta WHERE id_usuario= {$_SESSION['id_usuario']} ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
