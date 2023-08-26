<?php

class Usuario
{

    static public function guardarUsuario()
    {
        if (isset($_POST['nombre']) && isset($_POST['paterno']) && isset($_POST['correo']) && isset($_POST['clave'])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['paterno']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['materno']) &&
                (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL) !== NULL)
            ) {

                $tabla = 'persona';
                $datos = [
                    'nombre' => trim($_POST['nombre']),
                    'paterno' => trim($_POST['paterno']),
                    'materno' => trim($_POST['materno'])
                ];

                $id_persona = UsuarioModel::registrarPersona($tabla, $datos);

                if($id_persona){
                    $tabla = 'usuario';
                    $datos = [
                        'id_usuario' => $id_persona,
                        'usuario'    => trim($_POST['correo']),
                        'clave'      => password_hash($_POST['clave'], PASSWORD_DEFAULT),
                        'rol'        => 'usuario'
                    ];

                    $respuesta = UsuarioModel::registrarUsuario($tabla, $datos);

                    if($respuesta){
                        $usuario = UsuarioModel::mostrarUsuario($id_persona);
                        $_SESSION['id_usuario'] = $usuario['id_usuario'];
                        $_SESSION['nombre'] = $usuario['nombre'];
                        $_SESSION['paterno'] = $usuario['paterno'];
                        $_SESSION['materno'] = $usuario['materno'];
                        $_SESSION['correo'] = $usuario['correo'];
                        $_SESSION['rol'] = $usuario['rol'];

                        echo "<script>
                            window.location.href = '" .BASE_URL. "preguntas';
                        </script>";
                    }

                }

            } else {
                echo "<script>
                    alert('El campo nombre, paterno, correo y la clave no debe contener caracteres especiales y debe ser un correo válido.');
                </script>";
            }
        }
    }
}
