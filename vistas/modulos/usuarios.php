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

                            <div class="d-flex">
                            <form action="<?= BASE_URL ?>controladores/reportes/pdf.php" target="_blank" method="post">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-file-pdf"></i>
                                    PDF
                                </button>
                            </form>
                            
                            &nbsp;

                            <form action="<?= BASE_URL ?>controladores/reportes/excel.php" target="_blank" method="post">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-file-excel"></i>
                                    EXCEL
                                </button>
                            </form>
                            </div>

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