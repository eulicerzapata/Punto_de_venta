<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
            <ol class="breadcrumb mb-4">
                <div>
                    <p>
                        <a href="<?php echo base_url(); ?>compras/eliminados" class="btn btn-warning">Eliminados</a>
                    </p>
                </div>
            </ol>

            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>folio</th>
                                <th>total</th>
                                <th>Fecha</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($compras as $compra) { ?>
                                <tr>
                                    <td><?php echo $compra['id']; ?></td>
                                    <td><?php echo $compra['folio']; ?></td>
                                    <td><?php echo $compra['total']; ?></td>
                                    <td><?php echo $compra['fecha_alta']; ?></td>

                                    <td><a href="<?php echo base_url() .
                                     'compras/muestraCompraPdf/' .$compra['id']; ?>"
                                      class="btn btn-primary">
                                      <i class="fas fa-file-alt"></i>
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