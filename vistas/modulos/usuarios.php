<?php
$personas = Persona::listar('persona', null, null);
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
                        <li class="breadcrumb-item">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-danger">PDF</button>
                            <button class="btn btn-success">EXCEL</button>
                            <table class="table table-striped table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Registro</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($personas as $key => $persona) : ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $persona['nombre'] ?></td>
                                            <td><?= $persona['paterno'] ?></td>
                                            <td><?= $persona['materno'] ?></td>
                                            <td><?= $persona['creado_el'] ?></td>
                                            <td><span class="badge bg-success"><?= $persona['estado'] ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>