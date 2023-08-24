<?php

class Respuesta {

    static public function listarRespuestas($tabla, $columna, $valor)
    {
        $respuesta = RespuestaModel::listarRespuestas($tabla, $columna, $valor);
        return $respuesta;
    }

}