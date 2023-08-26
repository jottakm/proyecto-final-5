<?php

require_once 'Conexion.php';

class UsuarioModel
{

    static public function registrarPersona($tabla, $datos)
    {
        $consulta = "INSERT INTO $tabla (nombre, paterno, materno) VALUES(:nombre, :paterno, :materno)";
        $con = Conexion::conectar();
        $stmt = $con->prepare($consulta);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':paterno', $datos['paterno'], PDO::PARAM_STR);
        $stmt->bindParam(':materno', $datos['materno'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $con->lastInsertId();
        } else {
            return false;
        }
    }

    static public function registrarUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario, usuario, clave, rol) VALUES( :id_usuario, :usuario, :clave, :rol)");
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
        $stmt->bindParam(':rol', $datos['rol'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function mostrarUsuario($id_persona)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p JOIN usuario u ON p.id_persona = u.id_usuario
                                              WHERE p.id_persona = :id_persona");
        $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
