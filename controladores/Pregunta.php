<?php

class Pregunta
{

    static public function listarPreguntas($tabla, $columna, $valor)
    {
        $respuesta = PreguntaModel::listarPreguntas($tabla, $columna, $valor);
        return $respuesta;
    }

    public function guardarPregunta()
    {
        if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓ¡Ú¿?!,. ]+$/', $_POST['titulo']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓ¡Ú¿?!,. ]+$/', $_POST['descripcion'])
            ) {
                $directorio = 'vistas/uploads/pregunta/';
                $archivo = $directorio . time() . "." . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                if(move_uploaded_file($_FILES['foto']['tmp_name'], $archivo)){
                    $datos = [
                        'titulo'      => trim($_POST['titulo']),
                        'descripcion' => trim($_POST['descripcion']),
                        'imagen'        => $archivo,
                        'id_usuario'  => 1
                    ];

                    $respuesta = PreguntaModel::guardarPregunta('pregunta', $datos);

                    if($respuesta){
                         echo "<script>
                            let text = 'Pregunta registrado correctamente';
                            if(confirm(text) == true){
                                window.location.href = 'preguntas';
                            }
                        </script>";
                    }else{
                        echo "<script>
                            alert('Error al guardar');
                        </script>";
                    }


                }

            } else {
                echo "<script>
                    alert('El campo título y la descripción no debe contener caracteres especiales.');
                </script>";
            }
        } else {
            echo "<script>
                alert('El campo título y la descripción son requeridos.');
            </script>";
        }
    }
}
