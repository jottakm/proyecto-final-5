<?php

class Persona
{
    static public function listar($tabla, $columna, $valor)
    {
        return PersonaModel::listar($tabla, $columna, $valor);
    }
}
