<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
            <ol class="breadcrumb mb-4">
                <div>
                    <p>
                        <a href="<?php echo base_url(); ?>cajas/nuevo_arqueo" class="btn btn-info">Nuevo</a>
                        <a href="<?php echo base_url(); ?>cajas/eliminados" class="btn btn-warning">Eliminados</a>
                    </p>
                </div>
            </ol>

            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>fecha apertura</th>
                                <th>fecha cierre</th>
                                <th>Monto inicial</th>
                                <th>Monto final</th>
                                <th>Total ventas</th>
                                <th>estatus</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['fecha_inicio']; ?></td>
                                    <td><?php echo $dato['fecha_fin']; ?></td>
                                    <td><?php echo $dato['monto_inicial']; ?></td>
                                    <td><?php echo $dato['monto_final']; ?></td>
                                    <td><?php echo $dato['total_ventas']; ?></td>

                                    <?php if ($dato['estatus'] == 1) { ?>
                                        <td>Abierta</td>
                                        <td><a href="<?php echo base_url() . 'cajas/cerrar/'  ?>" data-placement="top" title="Cerrar caja" class="btn btn-danger"><i class="fas fa-lock"></i></a></td>
                                    <?php } else { ?>
                                        <td>Cerrada</td>
                                        <td><a href="#" data-href=" <?php echo base_url() . '/cajas/eliminar/'  ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-success"><i class="fas fa-print"></i></a></td>
                                    <?php } ?>



                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>




    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>