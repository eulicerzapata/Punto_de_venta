<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
            <ol class="breadcrumb mb-4">
                <div>
                    <p>
                        <a href="<?php echo base_url(); ?>ventas/eliminados" class="btn btn-warning">Eliminados</a>
                    </p>
                </div>
            </ol>

            <div class="card mb-4">

                <div class="card-body">
                    <!-- Agregar las clases de bootstrap para la tabla -->
                    <table id="datatablesSimple" class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Folio</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Cajero</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['fecha_alta']; ?></td>
                                    <td><?php echo $dato['folio']; ?></td>
                                    <td><?php echo $dato['cliente']; ?></td>
                                    <td><?php echo $dato['total']; ?></td>
                                    <td><?php echo $dato['cajero']; ?></td>

                                    <!-- Agregar las clases de bootstrap para los botones -->
                                    <td><a href="<?php echo base_url() .
                                     'ventas/muestraTicket/' .$dato['id']; ?>"
                                      class="btn btn-primary btn-sm">
                                      <!-- Agregar los iconos de font awesome -->
                                      <i class="fa fa-list-alt"></i>
                                        </a> </td>

                                    <td><a  data-href="<?php echo base_url() . 'ventas/eliminar/' .
                                     $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                     data-placement="top" title="Eliminar Registro" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                        </a> </td>

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
                    <a  class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
