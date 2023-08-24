<?php

if(isset($_GET['ruta'])){
    $vista = explode('/', $_GET['ruta']);
    $vista = $vista[0];

}else{
    $vista = 'preguntas';
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultas | Posgrado</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="<?= BASE_URL?>vistas/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL?>vistas/dist/css/adminlte.min.css" />
    <!-- SCRIPTS    -->
    <script src="<?= BASE_URL?>vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Boostrap v 4.6 -->
    <script src="<?= BASE_URL?>vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- adminlte 3.0.1 -->
    <script src="<?= BASE_URL?>vistas/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition layout-top-nav">

    <?php
    include_once 'modulos/header.php';
    if ($vista === 'preguntas' || $vista === 'perfil' || $vista === 'respuesta' || $vista === 'pregunta') {
        include_once 'modulos/' . $vista . '.php';
    } else {
        include_once 'modulos/404.php';
    }
    include_once 'modulos/footer.php';
    ?>

</body>

</html>