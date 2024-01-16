
<div id="layoutSidenav_content">

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4"><?php echo $titulo; ?></h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>productos" class="btn btn-warning">Productos activos</a>
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                        <th>id</th>
                                <th>Código</th>
                                <th>nombre</th>
                                <th>Precio</th>
                                <th>Existencias</th>
                                <th></th>
                                <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                            <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['codigo']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['precio_venta']; ?></td>
                                    <td><?php echo $dato['existencias']; ?></td>
                                

                                <td><a  data-href="<?php echo base_url() . 'productos/reingresar/' .
                                     $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                     data-placement="top" title="reingresar Registro" class="btn btn-danger"><i class="fas fa-repeat"> </i> Reingresar
                                        </a> </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        </body>

        </html>

        <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <p>¿Desea Reingresar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <a  class="btn btn-danger btn-ok">Reingresar</a>
                </div>
            </div>
        </div>
    </div>