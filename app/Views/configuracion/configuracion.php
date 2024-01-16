<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
            
            <?php if(isset($validation)){ ?> 
            <div class="alert alert-danger">
            <?php echo $validation()->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/configuracion/actualizar" autocomplete="off">
                <php csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="tienda_nombre">Nombre de la tienda</label>
                            <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" 
                            value="<?php echo $nombre['valor']; ?>" autofocus required/>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="tienda_rfc">RFC </label>
                            <input class="form-control" id="tienda_rfc" name="tienda_rfc" type="text" 
                            value="<?php echo $rfc['valor']; ?>" autofocus required >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="tienda_telefono">telefono</label>
                            <input class="form-control" id="tienda_telefono" name="tienda_telefono" type="text" 
                            value="<?php echo $telefono['valor']; ?>" autofocus required >
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="tienda_email">correo </label>
                            <input class="form-control" id="tienda_email" name="tienda_email" type="text" 
                            value="<?php echo $email['valor']; ?>" autofocus required  >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label >Dirección</label>
                            <textarea class="form-control" id="tienda_direccion" name="tienda_direccion"
                            autofocus required><?php echo trim($direccion['valor']); ?></textarea>

                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="ticket_leyenda">Leyenda </label>
                            <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda"
                            autofocus required><?php echo $leyenda['valor']; ?>  </textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="<?php echo base_url(); ?>unidades" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
            
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