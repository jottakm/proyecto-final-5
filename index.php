<?php
require_once 'config/config.php';

require_once 'controladores/Layout.php';
require_once 'controladores/Pregunta.php';
require_once 'controladores/Respuesta.php';
require_once 'controladores/Usuario.php';
require_once 'controladores/Persona.php';

require_once 'modelos/PreguntaModel.php';
require_once 'modelos/RespuestaModel.php';
require_once 'modelos/UsuarioModel.php';
require_once 'modelos/PersonaModel.php';


$layout = new Layout();
$layout->layout();