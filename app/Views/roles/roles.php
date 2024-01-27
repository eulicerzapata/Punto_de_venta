
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4"><?php echo $titulo; ?></h2>
                <ol class="breadcrumb mb-4">
                   <div>
                    <p>
                        <a href="<?php echo base_url(); ?>roles/nuevo" class="btn btn-info">Nuevo</a>
                        <a href="<?php echo base_url(); ?>roles/eliminados" class="btn btn-warning">Eliminados</a>
                    </p>
                   </div> 
                </ol>

                <div class="card mb-4">
                    
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nombre</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($datos as $dato){ ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    
                                    <td><a href="<?php echo base_url().'roles/editar/'.$dato['id']; ?>"
                                    class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i>
                                    </a> </td>

                                    

                                    <td><a  data-href="<?php echo base_url() . 'roles/eliminar/' .
                                     $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                     data-placement="top" title="eliminar Categoria" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                                        </a> </td>

                                        <td><a  href="<?php echo base_url() . 'roles/detalles/' .
                                     $dato['id']; ?>" 
                                       class="btn btn-primary"><i class="fa-solid"></i>
                                        Detalles</a> </td>
                                    
                                </tr>
                                <?php }?>

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
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <p>¿Desea eliminar esta Categoria?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <a  class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>