<?php

require_once 'Conexion.php';

class PreguntaModel
{

    static public function listarPreguntas($tabla, $columna, $valor)
    {
        if ($columna === NULL && $valor === NULL) {
            $stmt = Conexion::conectar()->prepare("SELECT p.*, concat_ws(' ', pp.nombre, pp.paterno, pp.materno) AS usuario FROM $tabla p JOIN usuario u ON p.id_usuario=u.id_usuario
                                                  JOIN persona pp ON u.id_usuario=pp.id_persona");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT p.*, concat_ws(' ', pp.nombre, pp.paterno, pp.materno) AS usuario FROM $tabla p JOIN usuario u ON p.id_usuario=u.id_usuario
                                                   JOIN persona pp ON u.id_usuario=pp.id_persona  WHERE $columna=:$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    static public function guardarPregunta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, descripcion, imagen, id_usuario) 
                                                VALUES (:titulo, :descripcion, :imagen, :id_usuario)");

        $stmt->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);

        if ($stmt->execute())
            return true;
        else
            return false;
    }

    static public function listrarPreguntasUsuario($tabla, $columna, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT p.*, (SELECT COUNT(*) FROM respuesta r where r.id_pregunta = p.id_pregunta ) as cantidad_respuestas 
        from pregunta p where id_usuario = $valor");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
