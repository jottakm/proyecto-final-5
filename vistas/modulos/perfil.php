<?php
$preguntas_usuario = Pregunta::listrarPreguntasUsuario('pregunta', 'id_usuario', $_SESSION['id_usuario']);
$respuestas_usuario = Respuesta::listarRespuestasUsuario();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil<small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="perfil">Inicio</a></li>
                        <li class="breadcrumb-item">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="vistas/dist/images/user.png" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $_SESSION['nombre'] . ' ' . $_SESSION['paterno'] . ' ' . $_SESSION['paterno'] ?></h3>

                        <p class="text-muted text-center"><?= $_SESSION['correo'] ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Preguntas</b> <a class="float-right"><?= (count($preguntas_usuario) > 0)? count($preguntas_usuario) : '0' ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Respuestas</b> <a class="float-right"><?= (count($respuestas_usuario) > 0)? count($respuestas_usuario) : '0' ?></a>
                            </li>

                        </ul>

                        <a href="<?= BASE_URL?>salir" class="btn btn-danger btn-block"><b>Cerrar Sesión</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class=" p-2 d-flex justify-content-between">

                        <h2>Preguntas Posteadas</h2>
                        <a href="<?= BASE_URL?>pregunta" class="btn btn-primary ">Formular Pregunta</a>
                    </div>
                    <hr>
                    <div class="card-body">

                        <?php if ($preguntas_usuario) : ?>
                            <?php foreach ($preguntas_usuario as $key => $p) : ?>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="vistas/dist/images/user.png" alt="user image">
                                        <span class="username">
                                            <a href="respuesta/<?= $p['id_pregunta'] ?>"><?= $p['titulo'] ?></a>
                                        </span>
                                        <span class="description">Publicado - <?= $p['creado_el'] ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>

                                        <?= $p['descripcion'] ?>
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Respuestas (<?php echo $p['cantidad_respuestas']; ?>)
                                        </a>

                                    </p>

                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="post">
                                <p>Sin Preguntas Posteadas</p>
                            </div>
                        <?php endif; ?>



                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>