<?php
$columna = null;
$valor   = null;
$preguntas = Pregunta::listarPreguntas('pregunta', $columna, $valor);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item">Preguntas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity ">

                                    <?php if (count($preguntas) > 0) : ?>
                                        <?php foreach ($preguntas as $pregunta) : ?>
                                            <div class="post clearfix">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="vistas/dist/images/user.png" alt="Imagen de usuario">
                                                    <span class="username">
                                                        <a href="respuesta/<?= $pregunta['id_pregunta'] ?>"><?= $pregunta['titulo'] ?></a>
                                                        <p><?= $pregunta['usuario'] ?></p>
                                                    </span>
                                                    <span class="description">Compartido públicamente - <?= $pregunta['creado_el'] ?></span>
                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    <?= $pregunta['descripcion'] ?>
                                                </p>

                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <h4>Sin preguntas registradas</h4>
                                    <?php endif; ?>

                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">

                            <a class="btn btn-primary btn-block" href="pregunta">
                                Preguntar
                            </a>


                            <a class="btn btn-primary btn-block" href="login.html">
                                Regístrese o inicie sesión para preguntar
                            </a>

                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->
            </div>
        </div>
    </div>
</div>