<?php

class Respuesta {

    static public function listarRespuestas($tabla, $columna, $valor)
    {
        $respuesta = RespuestaModel::listarRespuestas($tabla, $columna, $valor);
        return $respuesta;
    }

    static public function guardarRespuesta()
    {
        if (isset($_POST['descripcion']) && isset($_POST['id_pregunta']) &&  $_POST['descripcion'] !== null)
        {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓ¡Ú¿?!,. ]+$/', $_POST['descripcion'])
            ) {

                $ruta = NULL;
                if(isset($_FILES['foto']['tmp_name']))
                {
                    $directorio = 'vistas/uploads/respuesta/';
                    $archivo = $directorio . time() . "." . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    if(move_uploaded_file($_FILES['foto']['tmp_name'], $archivo))
                        $ruta = $archivo;
                }

                $datos = [
                    'descripcion'   => trim($_POST['descripcion']),
                    'imagen'        => $ruta,
                    'id_usuario'    => $_SESSION['id_usuario'],
                    'id_pregunta'   => $_POST['id_pregunta'],
                ];

                $respuesta = RespuestaModel::guardarRespuesta('respuesta', $datos);

                if($respuesta){
                    echo "<script>
                       let text = 'Respuesta registrado correctamente';
                       if(confirm(text) == true){
                           window.location.href = '" .BASE_URL. "respuesta/".$_POST['id_pregunta']."';
                       }
                   </script>";
               }else{
                   echo "<script>
                       alert('Error al guardar respuesta');
                   </script>";
               }

                
            }else{
                echo "<script>
                    alert('El campo descripción no debe contener caracteres especiales.');
                </script>";
            }
        }
    }

    static public function listarRespuestasUsuario()
    {
        return RespuestaModel::listarRespuestasUsuario();
    }

}