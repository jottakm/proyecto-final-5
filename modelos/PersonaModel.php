<?php

require_once 'Conexion.php';

class PersonaModel
{

    static public function listar($tabla, $columna, $valor)
    {
        if ($columna === NULL && $valor === NULL) {
            $stmt = Conexion::conectar()->prepare("SELECT id_persona, nombre, paterno, materno,  DATE_FORMAT(creado_el, '%d-%m-%Y %r') as creado_el , estado FROM $tabla WHERE estado = 'REGISTRADO'");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna=:$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    static public function mostrarUsuario()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p JOIN usuario u ON p.id_persona=u.id_usuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
